<?php

/**
 * Created by PhpStorm.
 * User: Anthony
 * Date: 03-03-16
 * Time: 15:23
 */
class Books
{
    function getBooks()
    {
        $sqlBooks = 'SELECT * FROM books';
        $pdoST = $GLOBALS['cn']->query($sqlBooks);

        return $pdoST->fetchAll();
    }

    function getBook($id)
    {
        $sqlBook = 'SELECT * FROM books WHERE id = :id';
        $pdoST = $GLOBALS['cn']->prepare($sqlBook);
        $pdoST->execute([':id' => $id]);
        return $pdoST->fetch();
    }
}
