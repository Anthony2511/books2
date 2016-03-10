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
        $books = $this->books_model->all();
        $view = 'index_books.php';
        $page_title = 'La liste des livres&nbsp;:';
        return ['books' => $books, 'view' => $view, 'page_title'=> $page_title];
    }

    public function show()
    {
        if (isset($_GET['id'])) {
            $id = intval($_GET['id']);
            $book = $this->books_model->find($id);
            $view = 'show_books.php';
            $page_title = 'La fiche de livre$nbsp;:' . $book->title;

            return ['book' => $book, 'view' => $view, 'page_title' => $page_title];
        } else {
            // rediriger vers une page d'erreur
            die('il manque l identifiant de votre livre');
        }

    }
}

