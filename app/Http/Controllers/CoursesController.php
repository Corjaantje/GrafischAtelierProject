<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    /** Returns the main course pages which has buttons to the other subcourse pages*/
    public function createList()
    {
        return view('cms.courses.cms_list_courses');
    }

    /** Returns the course subpage for creating a new course*/
    public function createAdd()
    {
        return view('cms.courses.cms_add_courses');
    }

    /** Returns the course subpage for editing an existing course*/
    public function createEdit()
    {
        return view('cms.courses.cms_edit_courses');
    }

    /** Gets all the data from the POST variable and updates the database*/
    public function editCourse()
    {

    }

    public function createAddConfirmation(Request $request)
    {
        return view('cms.courses.cms_add_courses_confirmation', ['request' => $request]);
    }
    
    public function prepareDatetime($input){
    	
    	$pieces = explode(" ", $input);
    	
    	$date = $pieces[0];
    	
    	$time = substr($pieces[1], 0, -3);
    	
    	$datetime = $date . "T" . $time;
    	
    	return $datetime;
    }

}
