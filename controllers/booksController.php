<?php

/**
 * Created by PhpStorm.
 * User: Anthony
 * Date: 03-03-16
 * Time: 16:26
 */
class BooksController
{
    public function index()
    {
        include('Books.php');
        $books = getBooks();
        $view = $GLOBALS['a'] . '_' . $GLOBALS['e'] . '.php';

        return ['books' => $books, 'view' => $view];
    }

    public function show()
    {
        include('Books.php');
        if (isset($_GET['id'])) {
            $id = intval($_GET['id']);
            $book = getBook($id);
            $view = $GLOBALS['a'] . '_' . $GLOBALS['e'] . '.php';

            return ['book' => $book, 'view' => $view];
        } else {
            // rediriger vers une page d'erreur
            die('il manque l identifiant de votre livre');
        }

    }
}

