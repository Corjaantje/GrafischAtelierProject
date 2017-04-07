<?php

namespace App\Http\Controllers;

use App\NewsArticle;
use Illuminate\Http\Request;

class NewsArticleController extends Controller
{
    public function insertNewsArticle() {
        if ($_POST['ID'] == -1 ){
            $this->newArticle();
        }
        else {
            $this->editArticle();
        }

        return redirect('cms_nieuws');
    }

    private function newArticle()
    {
        NewsArticle::Insert(['Title' => $_POST['Title'], 'Image' => $_POST['Image'], 'Description' => $_POST['Description'], 'Text' => $_POST['Text'], 'Date' => $_POST['Date'], 'Visible' => $_POST['Visible'] ]);

    }

    private function editArticle()
    {
        NewsArticle::Where('ID', '=', $_POST['ID'])->update(['Title' => $_POST['Title'],  'Description' => $_POST['Description'], 'Text' => $_POST['Text'], 'Visible' => $_POST['Visible'] ]);
    }

    private function formValid(){

        if(!isset($_POST['ID'])){
            return false;
        }
        return true;
    }

    public function getAllArticles()
    {
        return App\NewsArticle::all();
    }
}
