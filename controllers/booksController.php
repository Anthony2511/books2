<?php

/**
 * Created by PhpStorm.
 * User: Anthony
 * Date: 03-03-16
 * Time: 16:26
 */
class BooksController
{
    private $books_model = null;
    public function __construct()
    {
        $this->books_model = new  Books();
    }

    public function index()
    {
        $books = $this->books_model->getBooks();
        $view = $GLOBALS['a'] . '_' . $GLOBALS['e'] . '.php';

        return ['books' => $books, 'view' => $view];
    }

    public function show()
    {
        if (isset($_GET['id'])) {
            $id = intval($_GET['id']);
            $book = $this->books_model->getBook($id);
            $view = $GLOBALS['a'] . '_' . $GLOBALS['e'] . '.php';

            return ['book' => $book, 'view' => $view];
        } else {
            // rediriger vers une page d'erreur
            die('il manque l identifiant de votre livre');
        }

    }
}

