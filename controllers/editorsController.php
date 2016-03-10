<?php

/**
 * Created by PhpStorm.
 * User: Anthony
 * Date: 08-03-16
 * Time: 11:48
 */
class EditorsController
{
    private $editors_model = null;

    public function __construct()
    {
        $this->editors_model = new  Editors();
    }
    function index()
    {
        $editors = $this->editors_model->getEditors();
        $view = $GLOBALS['a'] . '_' . $GLOBALS['e'] . '.php';
        return ['editors' => $editors, 'view' => $view];
    }

    function show()
    {
        if (isset($_GET['id'])) {
            $id = intval($_GET['id']);
            $editor = $this->editors_model->getEditor($id);
            $view = $GLOBALS['a'] . '_' . $GLOBALS['e'] . '.php';

            return ['editor' => $editor, 'view' => $view];
        } else {
            // rediriger vers une page d'erreur
            die('il manque l identifiant de l éditeur');
        }

    }
}

