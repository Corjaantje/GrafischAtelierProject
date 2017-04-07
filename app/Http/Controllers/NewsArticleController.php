<?php

namespace App\Http\Controllers;

use App\NewsArticle;
use Illuminate\Http\Request;

class NewsArticleController extends Controller
{
    public function insertNewsArticle() {
        if ($_POST('Id') == -1 ){
            $this->newArticle();
        }
        else {
            $this->editArticle();
        }

        return redirect('cmsEditArticle');
    }

    public function newArticle()
    {
        NewsArticle::Insert(['Title' => $_POST['Title'], 'Image' => $_POST['Image'], 'Description' => $_POST['Description'], 'Text' => $_POST['Text'], 'Date' => $_POST['Date'], 'Visible' => $_POST['Visible'] ]);

    }

    public function editArticle()
    {
        NewsArticle::Where('ID', '=', $_POST['ID'])->update(['Title' => $_POST['Title'], 'Image' => $_POST['Image'], 'Description' => $_POST['Description'], 'Text' => $_POST['Text'], 'Date' => $_POST['Date'], 'Visible' => $_POST['Visible'] ]);
    }

    private function formValid(){

        if(!isset($_POST['Id'])){
            return false;
        }
        return true;
    }

    public function getAllArticles()
    {
        return App\NewsArticle::all();
    }
}
