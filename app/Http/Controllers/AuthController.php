<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Hash;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Auth;
use Redirect;
use Session;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use App\User;

class AuthController extends Controller {

	use AuthenticatesAndRegistersUsers,
	 ThrottlesLogins;

	private $auth_model;

	function __construct() {
		$this->auth_model = new \App\Auth_model();
	}

	function validate_email(Request $request) {
		if ($request->input('email') !== '') {
			if ($request->input('email')) {
				$rule = array('email' => 'Required|email|unique:users');
				$validator = Validator::make($request->all(), $rule);
			}
			if (!$validator->fails()) {
				die('true');
			}
		}
		die('false');
	}

	function register($type = '', Request $request) {
		if (Auth::check()) {
			return redirect('/my-dashboard');
		}
		if ($request->method() === 'POST') {
			$rules = array(
				'user_address' => 'Required',
				'user_first_name' => 'Required',
				'user_last_name' => 'Required',
				'email' => 'Required|email|unique:users',
				'user_contact' => 'Required',
			);
			if ($type === 'employer') {
				$rules['user_company'] = 'Required';
				$rules['user_position'] = 'Required';
				$rules['user_password'] = 'Required|confirmed';
				$rules['user_password_confirmation'] = 'Required';
			}
			if ($type === 'candidate') {
				$rules['user_resume'] = 'Required';
			}
			$validator = Validator::make($request->all(), $rules);
			if (!$validator->fails()) {
				$time_now = date('Y-m-d H:i:s');
				$user_resume_file = $request->input('user_resume');
				if ($type === 'candidate') {
					$password = $time_now;
				} else {
					$password = $request->input('user_password');
				}
				$user_insert_array = array(
					'user_login' => $request->input('email'),
					'user_login_salt' => md5($time_now),
					'password' => Hash::make($password),
					'user_security_hash' => md5($time_now . $password),
					'user_address' => $request->input('user_address'),
					'user_first_name' => $request->input('user_first_name'),
					'user_last_name' => $request->input('user_last_name'),
					'email' => $request->input('email'),
					'user_contact' => $request->input('user_contact'),
					'user_status' => '1',
					'user_created' => date('Y-m-d H:i:s')
				);
				if ($type === 'candidate') {
					$user_insert_array['groups_id'] = '3';
					$user_insert_array['user_is_verified'] = '1';
					$user_insert_array['user_resume'] = $user_resume_file;
				}
				if ($type === 'employer') {
					$user_insert_array['groups_id'] = '2';
					$user_insert_array['user_is_verified'] = '0';
					$user_insert_array['user_position'] = $request->input('user_position');
					$user_insert_array['user_company'] = $request->input('user_company');
				}
				if (is_file(public_path() . '/uploads/' . $user_resume_file)) {
					$resume_upload_directory = public_path() . '/uploads/users/resumes' . date('/Y/m/d/H/i/s', strtotime($time_now));
					if (!is_dir($resume_upload_directory)) {
						mkdir($resume_upload_directory, 0777, TRUE);
					}
					if (copy(public_path() . '/uploads/' . $user_resume_file, $resume_upload_directory . '/' . $user_resume_file)) {
						unlink(public_path() . '/uploads/' . $user_resume_file);
					}
				}
				if ($this->auth_model->add_user($user_insert_array) > 0) {
					die('1');
				}
			} else {
				echo implode('<br/>', $validator->errors()->all());
				die;
			}
			die('0');
		}
		switch ($type) {
			case 'candidate':
				return view('auth/register');
				break;
			case 'employer':
				return view('auth/employer_register');
				break;
			default :
				return view('auth/register');
		}
	}

	function login(Request $request) {
		$rules = array(
			'user_login' => 'Required',
			'user_login_password' => 'Required'
		);
		$validator = Validator::make($request->all(), $rules);
		if (!$validator->fails()) {
			$users = User::with(['groups']);
			$users = User::leftJoin('groups', 'groups.group_id', '=', 'users.groups_id')->where('email', base64_decode(base64_decode(trim($request->input('user_login')))))->first();
			if (Hash::check(base64_decode(base64_decode(trim($request->input('user_login_password')))), $users->password)) {
				Auth::login($users);
				return '1';
			} else {
				echo 'Incorrect email or password.';
				die;
			}
		} else {
			echo implode('<br/>', $validator->errors()->all());
			die;
		}
	}

	function recover(Request $request) {
		$data = array();
		if ($request->method() === 'POST') {
			$rules = array(
				'email' => 'Required|email',
				'user_captcha' => 'Required|validate_captcha'
			);
			$validator = Validator::make($request->all(), $rules);
			if (!$validator->fails()) {
				die('1');
			} else {
				echo implode('<br/>', $validator->errors()->all());
				die;
			}
			die('0');
		}
		return view('auth.recover', $data);
	}

	function upload_files() {
		/**
		 * upload.php
		 *
		 * Copyright 2013, Moxiecode Systems AB
		 * Released under GPL License.
		 *
		 * License: http://www.plupload.com/license
		 * Contributing: http://www.plupload.com/contributing
		 */
// Make sure file is not cached (as it happens for example on iOS devices)
		header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
		header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
		header("Cache-Control: no-store, no-cache, must-revalidate");
		header("Cache-Control: post-check=0, pre-check=0", false);
		header("Pragma: no-cache");

// 5 minutes execution time
		@set_time_limit(5 * 60);

// Uncomment this one to fake upload time
// usleep(5000);
// Settings
		$targetDir = public_path() . "/uploads/";
//$targetDir = 'uploads';
		$cleanupTargetDir = true; // Remove old files
		$maxFileAge = 1800; // Temp file age in seconds
// Create target dir
		if (!file_exists($targetDir)) {
			@mkdir($targetDir);
		}
		// Clean Up Old Files
		$current_dir = @opendir($targetDir);
		while ($filename = @readdir($current_dir)) {
			if ($filename != "." and $filename != ".." and $filename != "index.html" and $filename != ".htaccess") {
				if (is_file($targetDir . $filename) && filemtime($targetDir . $filename) < time() - $maxFileAge) {
					@unlink($targetDir . $filename);
				}
			}
		}
		@closedir($current_dir);
		// Clean Up Old Files End
		// Get a file name
		if (isset($_REQUEST["name"])) {
			$fileName = $_REQUEST["name"];
		} elseif (!empty($_FILES)) {
			$fileName = $_FILES["file"]["name"];
		} else {
			$fileName = uniqid("file_");
		}

		$filePath = $targetDir . DIRECTORY_SEPARATOR . $fileName;

// Chunking might be enabled
		$chunk = isset($_REQUEST["chunk"]) ? intval($_REQUEST["chunk"]) : 0;
		$chunks = isset($_REQUEST["chunks"]) ? intval($_REQUEST["chunks"]) : 0;


// Remove old temp files
		if ($cleanupTargetDir) {
			if (!is_dir($targetDir) || !$dir = opendir($targetDir)) {
				die('{"jsonrpc" : "2.0", "error" : {"code": 100, "message": "Failed to open temp directory."}, "id" : "id"}');
			}

			while (($file = readdir($dir)) !== false) {
				$tmpfilePath = $targetDir . DIRECTORY_SEPARATOR . $file;

				// If temp file is current file proceed to the next
				if ($tmpfilePath == "{$filePath}.part") {
					continue;
				}

				// Remove temp file if it is older than the max age and is not the current file
				if (preg_match('/\.part$/', $file) && (filemtime($tmpfilePath) < time() - $maxFileAge)) {
					@unlink($tmpfilePath);
				}
			}
			closedir($dir);
		}


// Open temp file
		if (!$out = @fopen("{$filePath}.part", $chunks ? "ab" : "wb")) {
			die('{"jsonrpc" : "2.0", "error" : {"code": 102, "message": "Failed to open output stream."}, "id" : "id"}');
		}

		if (!empty($_FILES)) {
			if ($_FILES["file"]["error"] || !is_uploaded_file($_FILES["file"]["tmp_name"])) {
				die('{"jsonrpc" : "2.0", "error" : {"code": 103, "message": "Failed to move uploaded file."}, "id" : "id"}');
			}

			// Read binary input stream and append it to temp file
			if (!$in = @fopen($_FILES["file"]["tmp_name"], "rb")) {
				die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream."}, "id" : "id"}');
			}
		} else {
			if (!$in = @fopen("php://input", "rb")) {
				die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream."}, "id" : "id"}');
			}
		}

		while ($buff = fread($in, 4096)) {
			fwrite($out, $buff);
		}

		@fclose($out);
		@fclose($in);

// Check if file has been uploaded
		if (!$chunks || $chunk == $chunks - 1) {
			// Strip the temp .part suffix off
			rename("{$filePath}.part", $filePath);
		}

// Return Success JSON-RPC response
		die('{"jsonrpc" : "2.0", "result" : null, "id" : "id"}');
	}

}
