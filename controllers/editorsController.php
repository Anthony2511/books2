<?php
/**
 * Created by PhpStorm.
 * User: Anthony
 * Date: 08-03-16
 * Time: 11:48
 */
function index(){
    include ('editors.php');
    $editors = getEditors();
    $view = $GLOBALS['a'].'_'.$GLOBALS['e'].'.php';

    return ['editors' => $editors, 'view' => $view];
}
function show(){
    include ('editors.php');
    if (isset($_GET['id'])) {
        $id = intval($_GET['id']);
        $editor = getEditor($id);
        $view = $GLOBALS['a'].'_'.$GLOBALS['e'].'.php';

        return ['editor' => $editor, 'view' => $view];
    } else {
        // rediriger vers une page d'erreur
        die('il manque l identifiant de l éditeur');
    }

}
