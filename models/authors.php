<?php

/**
 * Created by PhpStorm.
 * User: Anthony
 * Date: 08-03-16
 * Time: 11:49
 */
class Authors
{
    function getAuthors()
    {
        $sqlAuthors = 'SELECT * FROM authors';
        $pdoST = $GLOBALS['cn']->query($sqlAuthors);

        return $pdoST->fetchAll();
    }

    function getAuthor($id)
    {
        $sqlAuthor = 'SELECT * FROM authors WHERE id = :id';
        $pdoST = $GLOBALS['cn']->prepare($sqlAuthor);
        $pdoST->execute([':id' => $id]);
        return $pdoST->fetch();
    }
}
