<?php

namespace App\Http\Controllers;

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

}
