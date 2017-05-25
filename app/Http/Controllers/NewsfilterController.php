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
        if($this->checkAdmin()) {
            return view("cms.cms_news_filters");
        }
        else
        {
            return Redirect::to('403');
        }
    }

    public function createEdit()
    {
        if ($this->checkAdmin()) {
            $matchingFilter = Newsfilter::find($_POST['id']);
            return view("cms.cms_edit_newsfilter", compact('matchingFilter'));
        }
        else
        {
            return Redirect::to('403');
        }
    }

    public function createAdd()
    {
        if($this->checkAdmin()) {
            return view("cms.cms_new_newsfilter");
        }
        else
        {
            return Redirect::to('403');
        }
    }

    public function removeFilter()
    {
        if (!$this->checkAdmin()) {
            return Redirect::to('403');
        }
        if ($_POST['id'] != 1) {
            NewsArticle::where('filter_id', '=', $_POST['id'])->update(['filter_id' => 1]);

            Newsfilter::destroy($_POST['id']);
        }
        return Redirect::to("cms/nieuwsfilters");
    }

    public function newFilter()
    {
        if (!$this->checkAdmin()) {
            return Redirect::to('403');
        }
        if ($_POST['name'] != null) {
            Newsfilter::Insert(
                ['name' => $_POST['name']]
            );
            return Redirect::to("cms/nieuwsfilters");
        }
    }

    public function editFilter()
    {
        if (!$this->checkAdmin()) {
            return Redirect::to('403');
        }
        if ($_POST['name'] != null && $_POST['id'] != null) {
            $filter = Newsfilter::find($_POST['id']);
            $filter->name = $_POST['name'];
            $filter->save();
            return Redirect::to("cms/nieuwsfilters");
        }
    }

    private function checkAdmin()
    {
        if (Auth::check()) {
            if (Auth::user()->role == "admin") {
                return true;
            }
        }
        return false;
    }
}
