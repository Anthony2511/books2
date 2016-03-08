<?php
/**
 * Created by PhpStorm.
 * User: Anthony
 * Date: 08-03-16
 * Time: 11:48
 */
function index(){
    include ('authors.php');
    $authors = getAuthors();
    $view = $GLOBALS['a'].'_'.$GLOBALS['e'].'.php';

    return ['authors' => $authors, 'view' => $view];
}
function show(){
    include ('authors.php');
    if (isset($_GET['id'])) {
        $id = intval($_GET['id']);
        $author = getAuthor($id);
        $view = $GLOBALS['a'].'_'.$GLOBALS['e'].'.php';

        return ['author' => $author, 'view' => $view];
    } else {
        // rediriger vers une page d'erreur
        die('il manque l identifiant de l auteur');
    }

}
