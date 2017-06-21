<?php

namespace App\Http\Controllers;

use App\NewsArticle;
use App\Newsfilter;
use Illuminate\Http\Request;

class NewsPageController extends Controller
{
    public function index()
    {
        $filterOptionsArray = Newsfilter::all();
        $filterOptions = array();
        $filterOptions[0] = 'Alles';
        foreach($filterOptionsArray as $filter)
        {
            $filterOptions[$filter->id] = $filter->name;
        }
        $selectedFilter = session()->get('newsFilter');
        if($selectedFilter == 0)
        {
            $articles = NewsArticle::Where('visible', '=', '1')->get();
        }
        else
        {
            $articles = NewsArticle::Where('visible', '=', '1')->Where('filter_id', '=', $selectedFilter)->get();
        }
        return view('news_page', compact('filterOptions', 'selectedFilter', 'articles'));
    }

    public function setFilter()
    {
        if($_POST['filter'] != null)
        {
            session()->put('newsFilter', $_POST['filter']);
        }
        else
        {
            session()->put('newsFilter', 0);
        }
        return redirect('nieuws');
    }
}
