<?php

namespace App\Http\Controllers;

use App\NewsArticle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class NewsArticleController extends Controller
{
    public function insertNewsArticle()
    {
        /*The database ID's start at 0 while the dropdown indexes at 0, for conversion sake are the id's incremented by 1*/
    	$_POST['filter_id']++;
        if ($_POST['id'] == -1 )
        {
            $this->newArticle();
        }
        else
        {
            $this->editArticle();
        }

        return Redirect::to('cms/nieuws');
    }

    /*Creates a new article*/
    private function newArticle()
    {
        $checked = (isset($_POST['visible'])) ? 1 : 0;
        NewsArticle::Insert(['filter_id' => $_POST['filter_id'], 'title' => $_POST['title'], 'description' => $_POST['description'], 'text' => $_POST['text'],
                             'date' => $_POST['date'], 'visible' => $checked ]);

    }

    /*Edits an article
    Currently it checks the ID in the Post, in the future the article will be given as an argument.*/
    private function editArticle() //TODO add argument that will be edited
    {
        $checked = (isset($_POST['visible'])) ? 1 : 0;
        NewsArticle::Where('id', '=', $_POST['id'])->update(['filter_id' => $_POST['filter_id'], 'title' => $_POST['title'],
                           'description' => $_POST['description'], 'text' => $_POST['text'], 'date' => $_POST['date'], 'visible' => $checked ]);
    }

    /* Returns all news articles from the database. */
    public function getAllArticles()
    {
        return App\NewsArticle::all();
    }

    /* Removes a news article from the database, currently not in use */
    public function deleteArticle($id)
    {
        NewsArticle::Where('id', '=', $id)->Delete();
        return redirect('cms');
    }
}
