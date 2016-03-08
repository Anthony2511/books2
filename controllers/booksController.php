<?php
/**
 * Created by PhpStorm.
 * User: Anthony
 * Date: 03-03-16
 * Time: 16:26
 */

function index(){
    include ('books.php');
    $books = getBooks();
    $view = $GLOBALS['a'].'_'.$GLOBALS['e'].'.php';

    return ['books' => $books, 'view' => $view];
}
function show(){
    include ('books.php');
    if (isset($_GET['id'])) {
        $id = intval($_GET['id']);
        $book = getBook($id);
        $view = $GLOBALS['a'].'_'.$GLOBALS['e'].'.php';

        return ['book' => $book, 'view' => $view];
    } else {
        // rediriger vers une page d'erreur
    die('il manque l identifiant de votre livre');
    }

}
