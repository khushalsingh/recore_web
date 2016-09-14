<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use App\Http\Requests;
use Mail;
use DB;
use Yajra\Datatables\Facades\Datatables;

class PageController extends Controller {

	public $page_model;

	function __construct() {
		$this->page_model = new \App\Page_model();
	}

	function contact_datatable() {
		return Datatables::queryBuilder(DB::table('contact_us_feeds')
								->where('contact_us_feeds.contact_us_feed_status', '!=', '-1')
								->select('contact_us_feed_id', 'contact_us_feed_first_name', 'contact_us_feed_last_name', 'contact_us_feed_email', 'contact_us_feed_subject', 'contact_us_feed_message', DB::raw("DATE_FORMAT(contact_us_feed_created,'%d %M %Y %H:%i %p') AS contact_us_feed_created"))
				)->make(true);
	}

	function contacts() {
		$data = array();
		return view('page.contacts', $data);
	}

	function post_contact_feed(Request $request) {
		try {
			$rules = array(
				'contact_us_feed_first_name' => 'Required',
				'contact_us_feed_last_name' => 'Required',
				'contact_us_feed_email' => 'Required|email',
				'contact_us_feed_subject' => 'Required',
				'contact_us_feed_message' => 'Required',
			);
			$validator = Validator::make($request->all(), $rules);
			if (!$validator->fails()) {
				$contact_feed_array = array(
					'contact_us_feed_first_name' => $request->input('contact_us_feed_first_name'),
					'contact_us_feed_last_name' => $request->input('contact_us_feed_last_name'),
					'contact_us_feed_email' => $request->input('contact_us_feed_email'),
					'contact_us_feed_subject' => $request->input('contact_us_feed_subject'),
					'contact_us_feed_message' => $request->input('contact_us_feed_message'),
					'contact_us_feed_ip' => $request->ip(),
					'contact_us_feed_user_agent' => $request->server('HTTP_USER_AGENT'),
					'contact_us_feed_status' => '1',
					'contact_us_feed_created' => date('Y-m-d H:i:s')
				);
				if ($this->page_model->add_contact_feeds($contact_feed_array)) {
					$data = array(
						'contact_us_feed_first_name' => $contact_feed_array['contact_us_feed_first_name'],
						'contact_us_feed_last_name' => $contact_feed_array['contact_us_feed_last_name']
					);
//					Mail::send('emails.templates.feed', $data, function ($message) use($contact_feed_array) {
//						$message->from('birendra.singh@erginus.com', 'Birender Singh');
//						$message->to($contact_feed_array['contact_us_feed_email'])->subject('Contact US Feed');
//					});
					die('1');
				}
			} else {
				echo implode('<br/>', $validator->errors()->all());
				die;
			}
			die('0');
		} catch (Exception $e) {
			echo 'Exception occured';
			die;
		}
	}

}
