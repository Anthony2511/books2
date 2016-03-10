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

        $authors = $this->authors_model->getAuthors();
        $view = $GLOBALS['a'] . '_' . $GLOBALS['e'] . '.php';

        return ['authors' => $authors, 'view' => $view];
    }

    function show()
    {

        if (isset($_GET['id'])) {
            $id = intval($_GET['id']);
            $author = $this->authors_model->getAuthor($id);
            $view = $GLOBALS['a'] . '_' . $GLOBALS['e'] . '.php';

            return ['author' => $author, 'view' => $view];
        } else {
            // rediriger vers une page d'erreur
            die('il manque l identifiant de l auteur');
        }

    }
}

