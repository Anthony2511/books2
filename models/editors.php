<?php
/**
 * Created by PhpStorm.
 * User: Anthony
 * Date: 08-03-16
 * Time: 11:48
 */
class  Editors{
    function getEditors(){
        $sqlEditors = 'SELECT * FROM editors';
        $pdoST = $GLOBALS['cn']->query($sqlEditors);

        return $pdoST->fetchAll();
    }

    function getEditor($id){
        $sqlEditor = 'SELECT * FROM editors WHERE id = :id';
        $pdoST = $GLOBALS['cn']->prepare($sqlEditor);
        $pdoST->execute([':id'=> $id]);
        return $pdoST->fetch();
    }
}

