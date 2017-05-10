<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class NewsfilterController extends Controller
{
    public function createList(){
    	return view("cms.cms_news_filters");
	}
	
	public function createEdit(){
		return view("cms.cms_edit_newsfilter");
	}
	
	public function createAdd(){
		return view("cms.cms_new_newsfilter");
	}
	
	public function removeFilter(){
		
		return Redirect::to("cms/nieuwsfilters");
	}
}
