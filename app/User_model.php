<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class User_model extends Model {

	function get_talent_category_by_slug($category_slug = '') {
		return DB::table('talent_categories')->where('talent_category_slug', $category_slug)->first();
	}

	function get_user_talent_by_talent_category_id($category_id, $exp_level = '0') {
		$where = array('talent_categories_id' => $category_id);
		if ($exp_level != '0') {
			$where['user_talent_level_of_experience'] = $exp_level;
		}
		return DB::table('user_talents')->where($where)->get();
	}

	function get_user_talent_skill_by_talent_id($user_talent_id) {
		return DB::table('user_talent_skills')->leftJoin('skills', 'skills.skill_id', '=', 'user_talent_skills.skills_id')->where('user_talents_id', $user_talent_id)->get();
	}

	function get_user_talent_by_id($user_talent_id) {
		return DB::table('user_talents')->leftJoin('talent_categories', 'talent_categories.talent_category_id', '=', 'user_talents.talent_categories_id')->where('user_talent_id', $user_talent_id)->first();
	}

	function get_user_talent_qualification_by_talent_id($user_talent_id) {
		return DB::table('user_talent_qualifications')->leftJoin('qualifications', 'qualifications.qualification_id', '=', 'user_talent_qualifications.qualifications_id')->leftJoin('courses', 'courses.course_id', '=', 'user_talent_qualifications.courses_id')->where(array('user_talents_id' => $user_talent_id, 'user_talent_qualification_status' => '1'))->get();
	}

	function get_user_talent_service_by_talent_id($user_talent_id) {
		return DB::table('user_talent_services')->leftJoin('services', 'services.service_id', '=', 'user_talent_services.services_id')->where('user_talents_id', $user_talent_id)->get();
	}

	function get_user_talent_experience_by_talent_id($user_talent_id) {
		return DB::table('user_talent_experiences')->where('user_talents_id', $user_talent_id)->get();
	}

	function get_talent_network_by_id($id) {
		return DB::table('user_talent_networks')
						->leftJoin('user_talents', 'user_talents.user_talent_id', '=', 'user_talent_networks.user_talents_id')
						->leftJoin('talent_categories', 'talent_categories.talent_category_id', '=', 'user_talents.talent_categories_id')
						->leftJoin('users', 'users.id', '=', 'user_talent_networks.users_id')
						->where('users_id', $id)->get();
	}

	function get_user_interview_schedule_by_id($employer_id = '', $schedule_date = '', $date = '') {
		$where = array('user_interview_schedules.user_interview_schedule_status' => '0');
		if ($employer_id !== '') {
			$where['users_id'] = $employer_id;
		}
		if ($schedule_date !== '') {
			$where['user_interview_schedule_date'] = $schedule_date;
		}
		$query = DB::table('user_interview_schedules')
				->leftJoin('user_talents', 'user_talents.user_talent_id', '=', 'user_interview_schedules.user_talents_id')
				->leftJoin('talent_categories', 'talent_categories.talent_category_id', '=', 'user_talents.talent_categories_id')
				->where($where);
		if ($date !== '') {
			$query->where('user_interview_schedule_date', 'like', $date);
		}
		return $query->get();
	}

	function get_qualification() {
		return DB::table('qualifications')->where('qualification_status', '1')->get();
	}

	function get_talent_category() {
		return DB::table('talent_categories')->where('talent_category_status', '1')->get();
	}

	function get_active_skills() {
		return DB::table('skills')->where('skill_status', '1')->get();
	}

	function get_active_services() {
		return DB::table('services')->where('service_status', '1')->get();
	}

	function get_course_by_qualification_id($qualification_id) {
		return DB::table('courses')->where(array('qualifications_id' => $qualification_id, 'course_status' => '1'))->get();
	}

	function add_user_talent($user_talent_array) {
		return DB::table('user_talents')->insertGetId($user_talent_array);
	}

	function add_user_talent_skill($user_talent_skill_array) {
		return DB::table('user_talent_skills')->insert($user_talent_skill_array);
	}

	function add_user_talent_service($user_talent_service_array) {
		return DB::table('user_talent_services')->insert($user_talent_service_array);
	}

	function add_user_talent_qualification($talent_qualification_array) {
		return DB::table('user_talent_qualifications')->insert($talent_qualification_array);
	}

	function add_user_talent_experience($user_talent_experience_array) {
		return DB::table('user_talent_experiences')->insert($user_talent_experience_array);
	}

	function get_talent_network($id = '', $talent_id = '') {
		$query = DB::table('user_talent_networks');
		if ($id !== '') {
			$query->where('users_id', $id);
		}
		if ($talent_id !== '') {
			$query->where('user_talents_id', $talent_id);
		}
		$query->where('user_talent_network_status', '1');
		return $query->first();
	}

	function add_user_talent_network($talent_network_array) {
		return DB::table('user_talent_networks')->insertGetId($talent_network_array);
	}

	function edit_user_by_user_id($user_id, $user_details_array) {
		return DB::table('users')->where('id', $user_id)->update($user_details_array);
	}

	function update_user_talent_by_id($user_talent_id, $user_talent_array) {
		return DB::table('user_talents')->where('user_talent_id', $user_talent_id)->update($user_talent_array);
	}

}
