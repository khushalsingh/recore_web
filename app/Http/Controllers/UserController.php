<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User_model;
use Redirect;
use Validator;
use Auth;
use DB;
use Yajra\Datatables\Facades\Datatables;

class UserController extends Controller {

	private $user_model;

	function __construct() {
		$this->user_model = new User_model();
	}

	function search_talent($category = '', $exp_level = '0') {
		$data = array();
		$data['talent_category_array'] = $this->user_model->get_talent_category_by_slug($category);
		if (count($data['talent_category_array']) === 0) {
			return Redirect::to('/my-dashboard');
		}
		$data['user_talent_array'] = $this->user_model->get_user_talent_by_talent_category_id($data['talent_category_array']->talent_category_id, $exp_level);
		foreach ($data['user_talent_array'] as $key => $user_talent) {
			$data['user_talent_array'][$key]->user_talent_skill_array = $this->user_model->get_user_talent_skill_by_talent_id($user_talent->user_talent_id);
		}
		return view('user.search_talent', $data);
	}

	function talent_network() {
		if (!Auth::check()) {
			return redirect('/register/employer');
		}
		$data = array();
		$data['user_talent_network_array'] = $this->user_model->get_talent_network_by_id(Auth::user()->id);
		return view('user.talent_network', $data);
	}

	function talent_process($date = '') {
		$data = array();
		$data['user_interview_schedule_array'] = $this->user_model->get_user_interview_schedule_by_id(Auth::user()->id, $date);
		return view('user.talent_process', $data);
	}

	function view_resume($user_talent_id = '', Request $request) {
		$data = array();
		$data['user_talent_array'] = $this->user_model->get_user_talent_by_id($user_talent_id);
		if (count($data['user_talent_array']) === 0 || $data['user_talent_array']->user_talent_status !== '1') {
			return Redirect::to('/my-dashboard');
		}
		if ($request->method() === 'POST') {
			$user_talent_network_array = $this->user_model->get_talent_network('2', $user_talent_id);
			if (count($user_talent_network_array) === 0) {
				if ($this->user_model->add_user_talent_network(array(
							'user_talents_id' => $user_talent_id,
							'users_id' => '2',
							'user_talent_network_comment' => $request->input('user_talent_network_comment'),
							'user_talent_network_status' => '1',
							'user_talent_network_created' => date('Y-m-d H:i:s')
						)) > 0) {
					die('1');
				}
				die('0');
			} else {
				echo 'Resume already in your talent network';
				die;
			}
		}
		$data['user_talent_array']->user_talent_experience_array = $this->user_model->get_user_talent_experience_by_talent_id($user_talent_id);
		$data['user_talent_array']->user_talent_skill_array = $this->user_model->get_user_talent_skill_by_talent_id($user_talent_id);
		$data['user_talent_array']->user_talent_service_array = $this->user_model->get_user_talent_service_by_talent_id($user_talent_id);
		$data['user_talent_array']->user_talent_qualification_array = $this->user_model->get_user_talent_qualification_by_talent_id($user_talent_id);
		return view('user.view_resume', $data);
	}

	function add_resume(Request $request) {
		$data = array();
		if ($request->method() === 'POST') {
			$rules = array(
				'user_talent_first_name' => 'Required',
				'user_talent_last_name' => 'Required',
				'user_talent_email' => 'Required|unique:user_talents',
				'user_talent_current_position' => 'Required',
				'talent_categories_id' => 'Required',
				'user_talent_contact' => 'Required',
				'user_talent_level_of_experience' => 'Required'
			);
			$validator = Validator::make($request->all(), $rules);
			if (!$validator->fails()) {
				$time_now = date('Y-m-d H:i:s');
				$user_talent_resume_file = $request->input('user_talent_resume');
				$user_talent_image = $request->input('user_talent_image');
				$user_talent_thumb = '';
				if (is_file(public_path() . '/uploads/' . $user_talent_resume_file)) {
					$resume_upload_directory = public_path() . '/uploads/talents/resumes' . date('/Y/m/d/H/i/s', strtotime($time_now));
					if (!is_dir($resume_upload_directory)) {
						mkdir($resume_upload_directory, 0777, TRUE);
					}
					if (copy(public_path() . '/uploads/' . $user_talent_resume_file, $resume_upload_directory . '/' . $user_talent_resume_file)) {
						unlink(public_path() . '/uploads/' . $user_talent_resume_file);
					}
				}
				if (is_file(public_path() . '/uploads/' . $user_talent_image)) {
					$user_talent_image_directory = public_path() . '/uploads/talents/images' . date('/Y/m/d/H/i/s', strtotime($time_now));
					if (!is_dir($user_talent_image_directory)) {
						mkdir($user_talent_image_directory, 0777, TRUE);
					}
					if (copy(public_path() . '/uploads/' . $user_talent_image, $user_talent_image_directory . '/' . $user_talent_image)) {
						unlink(public_path() . '/uploads/' . $user_talent_image);
					}
				}
				$user_talent_array = array(
					'user_talent_first_name' => $request->input('user_talent_first_name'),
					'user_talent_last_name' => $request->input('user_talent_last_name'),
					'user_talent_email' => $request->input('user_talent_email'),
					'user_talent_current_position' => $request->input('user_talent_current_position'),
					'talent_categories_id' => $request->input('talent_categories_id'),
					'user_talent_contact' => $request->input('user_talent_contact'),
					'user_talent_alternative_contact' => $request->input('user_talent_alternative_contact'),
					'user_talent_level_of_experience' => $request->input('user_talent_level_of_experience'),
					'user_talent_video_link' => $request->input('user_talent_video_link'),
					'user_talent_work_style_assessment' => $request->input('user_talent_work_style_assessment'),
					'user_talent_resume' => $user_talent_resume_file != null ? $user_talent_resume_file : '',
					'user_talent_image' => $user_talent_image != null ? $user_talent_image : '',
					'user_talent_thumb' => $user_talent_thumb,
					'user_talent_status' => '1',
					'user_talent_created' => $time_now
				);
				$user_talent_id = $this->user_model->add_user_talent($user_talent_array);
				if ($user_talent_id > 0) {
					if (count($request->input('skills_id')) > 0) {
						foreach ($request->input('skills_id') as $skills) {
							$this->user_model->add_user_talent_skill(array(
								'user_talents_id' => $user_talent_id,
								'skills_id' => $skills,
								'user_talent_skill_status' => '1'
							));
						}
					}
					if (count($request->input('services_id')) > 0) {
						foreach ($request->input('services_id') as $services) {
							$this->user_model->add_user_talent_service(array(
								'user_talents_id' => $user_talent_id,
								'services_id' => $services,
								'user_talent_service_status' => '1'
							));
						}
					}
					for ($i = 0; $i < count($request->input('user_talent_experience_company')); $i++) {
						if ($request->input('user_talent_experience_company')[$i] !== '' || $request->input('user_talent_experience_role')[$i] !== '' || $request->input('user_talent_experience_year')[$i] !== '') {
							$this->user_model->add_user_talent_experience(array(
								'user_talents_id' => $user_talent_id,
								'user_talent_experience_company' => $request->input('user_talent_experience_company')[$i],
								'user_talent_experience_role' => $request->input('user_talent_experience_role')[$i],
								'user_talent_experience_years' => $request->input('user_talent_experience_years')[$i],
								'user_talent_experience_status' => '1'
							));
						}
					}
					for ($i = 0; $i < count($request->input('qualifications_id')); $i++) {
						if ($request->input('qualifications_id')[$i] !== '' || $request->input('courses_id')[$i] !== '' || $request->input('user_talent_qualification_year')[$i] !== '' || $request->input('user_talent_qualification_percentage')[$i] !== '') {
							$this->user_model->add_user_talent_qualification(array(
								'user_talents_id' => $user_talent_id,
								'qualifications_id' => $request->input('qualifications_id')[$i],
								'courses_id' => $request->input('courses_id')[$i],
								'user_talent_qualification_school' => $request->input('user_talent_qualification_school')[$i],
								'user_talent_qualification_status' => '1'
							));
						}
					}
					die('1');
				}
			} else {
				echo implode('<br/>', $validator->errors()->all());
				die;
			}
			die('0');
		}
		$data['qualification_array'] = $this->user_model->get_qualification();
		$data['talent_category_array'] = $this->user_model->get_talent_category();
		$data['skill_array'] = $this->user_model->get_active_skills();
		$data['service_array'] = $this->user_model->get_active_services();
		return view('user.add_resume', $data);
	}

	function get_course_by_qualification_id(Request $request) {
		$validator = Validator::make($request->all(), array('qualifications_id' => 'Required'));
		if (!$validator->fails()) {
			return response()->json($this->user_model->get_course_by_qualification_id($request->input('qualifications_id')));
		} else {
			echo implode('<br/>', $validator->errors()->all());
			die;
		}
		die('0');
	}

	function change_password() {
		$data = array();
		return view('user.change_password');
	}

	function datatable() {
		return Datatables::queryBuilder(DB::table('users')
								->join('groups', 'groups.group_id', '=', 'users.groups_id')
								->where(array(
									array('users.groups_id', '!=', '1'),
									array('users.user_status', '!=', '-1')))
								->select("id", DB::raw('CONCAT(user_first_name," ",user_last_name) as user_name'), 'group_name', 'email', 'user_address', 'user_contact', 'user_company', DB::raw("IF(user_resume='','',CONCAT('" . url('/') . "','/uploads/users/resumes',DATE_FORMAT(user_created,'/%Y/%m/%d/%H/%i/%s/'),user_resume)) as user_resume"), DB::raw("DATE_FORMAT(user_created,'%d %M %Y') AS user_created"), DB::raw("DATE_FORMAT(user_last_logged_in,'%d %M %Y') AS user_last_logged_in"), "user_status")
						)
						->make(true);
	}

	function index() {
		$data = array();
		return view('user.index', $data);
	}

	function change_status(Request $request) {
		$rules = array('id' => 'Required',
			'user_status' => 'Required');
		$validator = Validator::make($request->all(), $rules);
		if (!$validator->fails()) {
			if ($this->user_model->edit_user_by_user_id($request->input('id'), array(
						'user_status' => $request->input('user_status') == 'true' ? '1' : '0',
						'user_modified' => date('Y-m-d H:i:s')
					))) {
				die('1');
			}
		} else {
			echo implode('<br/>', $validator->errors()->all());
			die;
		}
		die('0');
	}

	function talent_datatable() {
		return Datatables::queryBuilder(DB::table('user_talents')
								->leftJoin('talent_categories', 'talent_categories.talent_category_id', '=', 'user_talents.talent_categories_id')
								->where('user_talent_status', '!=', '-1')
								->select('user_talent_id', 'user_talent_first_name', 'user_talent_last_name', 'user_talent_email', 'user_talent_current_position', 'talent_category_name', 'user_talent_contact', 'user_talent_level_of_experience', DB::raw("IF(user_talent_resume='','',CONCAT('" . url('/') . "','/uploads/talents/resumes',DATE_FORMAT(user_talent_created,'/%Y/%m/%d/%H/%i/%s/'),user_talent_resume)) AS resume_file"), 'user_talent_status')
				)->make(true);
	}

	function talents() {
		$data = array();
		return view('user.talents', $data);
	}

	function change_user_talent_status(Request $request) {
		$rules = array('user_talent_id' => 'Required', 'user_talent_status' => 'Required');
		$validator = Validator::make($request->all(), $rules);
		if (!$validator->fails()) {
			if ($this->user_model->update_user_talent_by_id($request->input('user_talent_id'), array(
						'user_talent_status' => $request->input('user_talent_status') == 'true' ? '1' : '0',
						'user_talent_modified' => date('Y-m-d H:i:s')
					))) {
				die('1');
			}
		} else {
			echo implode('<br/>', $validator->errors()->all());
			die;
		}
		die('0');
	}

	function interview_datatable() {
		return Datatables::queryBuilder(DB::table('user_interview_schedules')
								->leftJoin('users', 'users.id', '=', 'user_interview_schedules.users_id')
								->leftJoin('user_talents', 'user_talents.user_talent_id', '=', 'user_interview_schedules.user_talents_id')
								->where(array(
									array('user_talents.user_talent_status', '!=', '-1'),
									array('users.user_status', '!=', '-1'),
									array('user_interview_schedules.user_interview_schedule_date', '>=', date('Y-m-d')),
									array('user_interview_schedules.user_interview_schedule_status', '!=', '-1')
								))
								->select('user_interview_schedule_id', 'user_company', 'user_first_name', 'user_last_name', 'email', 'user_contact', 'user_talent_email', 'user_talent_contact', 'user_talent_first_name', 'user_talent_last_name', DB::raw("CONCAT(DATE_FORMAT(user_interview_schedule_date,'%d %M %Y'),' ',TIME_FORMAT(user_interview_schedule_time,'%h:%i %p')) AS schedule_date"), 'user_interview_schedule_status', 'user_talents_id')
				)->make(true);
	}

	function interviews() {
		$data = array();
		return view('user.interviews', $data);
	}

}
