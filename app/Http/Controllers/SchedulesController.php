<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Schedule;

class SchedulesController extends Controller
{
    //

	public function __construct()
    {
        //$this->middleware('auth');
    }

    public function index()
	{
		$schedules = Schedule::all();
		return view('schedules.index', compact('schedules'));
	}

	public function show(Schedule $schedules)
	{
		return view('schedules.show', compact('schedules'));
	}

	public function apiList(Request $request)
	{
		$sort_data = explode("|",$request->sort);
		$sort = 'name';
		$dir = 'asc';
		$per_page = $request->per_page;
		if (!is_null($sort_data[0]) && $sort_data[0] != "") {$sort = $sort_data[0];}
		if (count($sort_data) > 1) {$dir = $sort_data[1];}
		if (is_null($per_page)) {$per_page = 10;}
		return Schedule::orderBy($sort, $dir)->paginate($per_page);
	}

	public function apiRead(Schedule $schedules)
	{
		return $schedules;
	}
}