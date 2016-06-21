<?php

namespace App\Controllers;

use SON\Controller\Action;
use SON\DI\Container;

class Index extends Action
{

    public function index()
    {
        $article = Container::getClass("Article");
        $this->view->articles = $article->fetchAll("order by title");
        $this->render('index');
    }

    public function empresa()
    {
        $article = Container::getClass("Article");
        $this->view->article = $article->find(4);
        $this->render('empresa');
    }
}