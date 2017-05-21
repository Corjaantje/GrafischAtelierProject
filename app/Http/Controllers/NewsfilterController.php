<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Newsfilter;
use App\NewsArticle;

class NewsfilterController extends Controller
{
    public function createList()
    {
    	return view("cms.cms_news_filters");
	}
	
	public function createEdit()
	{
		return view("cms.cms_edit_newsfilter");
	}
	
	public function createAdd()
	{
		return view("cms.cms_new_newsfilter");
	}
	
	public function removeFilter()
	{
		if($_POST['id'] != 1)
		{
			NewsArticle::where('filter_id', '=', $_POST['id'])->update(['filter_id' => 1]);
			
			Newsfilter::destroy($_POST['id']);
		}
		return Redirect::to("cms/nieuwsfilters");
	}
}
