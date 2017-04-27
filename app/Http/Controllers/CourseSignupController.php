<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CourseSignupController extends Controller
{
    
	public function Signup(){
		
		if(Auth::guest()){
			return Route::to('login');
		} else {
			
			if(isset($_POST['id'])){
				
				$data = ['id' => $_POST['id']];
				
				return view("SignupConfirmation", $data);
				
			} else{
				return back();
			}
			
		}
		
	}
	
	public function Confirmed(){
		
		if(Auth::guest()){
			return Route::to('login');
		} else {
				
			App\Courses_has_users::insert($_POST['CourseId'], Auth::user()->id);
			return Route::to('agenda');
		}
		
	}
	
}
