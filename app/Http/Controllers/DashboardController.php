<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use Session;

class DashboardController extends Controller {

	function index(Request $request) {
		return view('dashboard.administrator');
	}

}
