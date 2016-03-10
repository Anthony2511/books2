<?php

/**
 * Created by PhpStorm.
 * User: Anthony
 * Date: 08-03-16
 * Time: 11:48
 */
class AuthorsController
{
    private $authors_model = null;

    public function __construct()
    {
        $this->authors_model = new  Authors();
    }

    function index()
    {

        $authors = $this->authors_model->all();
        $view = 'index_authors.php';
        $page_title = 'La liste des auteurs';
        return ['authors' => $authors, 'view' => $view, 'page_title' => $page_title];
    }

    function show()
    {

        if (isset($_GET['id'])) {
            $id = intval($_GET['id']);
            $author = $this->authors_model->find($id);
            $view = 'show_authors.php';
            $page_title = 'La fiche de l auteur' . $author->name;
            return ['author' => $author, 'view' => $view, 'page_title' => $page_title];
        } else {
            // rediriger vers une page d'erreur
            die('il manque l identifiant de l auteur');
        }

    }
}

