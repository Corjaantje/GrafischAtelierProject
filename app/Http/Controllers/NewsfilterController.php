<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Newsfilter;
use App\NewsArticle;
use Auth;

class NewsfilterController extends Controller
{
    public function createList()
    {
    	return view("cms.cms_news_filters");
	}
	
	public function createEdit()
	{
	    $matchingFilter = Newsfilter::find($_POST['id']);
		return view("cms.cms_edit_newsfilter", compact('matchingFilter'));
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

	public function newFilter()
    {
        if (!Auth::check())
        {
            return Redirect::to('403');
        }
        if($_POST['name'] != null)
        {
            Newsfilter::Insert(
                ['name' => $_POST['name']]
            );
            return Redirect::to("cms/nieuwsfilters");
        }
    }

    public function editFilter()
    {
        if (!Auth::check())
        {
            return Redirect::to('403');
        }
        if($_POST['name'] != null && $_POST['id'] != null)
        {
            $filter = Newsfilter::find($_POST['id']);
            $filter->name = $_POST['name'];
            $filter->save();
            return Redirect::to("cms/nieuwsfilters");
        }
    }
}
