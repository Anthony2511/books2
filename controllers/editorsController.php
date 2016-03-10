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
        $editors = $this->editors_model->all();
        $view = 'index_editors.php';
        $page_title = "La liste des éditeurs";
        return ['editors' => $editors, 'view' => $view, 'page_title'=> $page_title];
    }

    function show()
    {
        if (isset($_GET['id'])) {
            $id = intval($_GET['id']);
            $editor = $this->editors_model->find($id);
            $page_title = 'La fiche de l éditeur'. $editor->name;
            $view = 'show_editors.php';
            return ['editor' => $editor, 'view' => $view, 'page_title'=> $page_title];
        } else {
            // rediriger vers une page d'erreur
            die('il manque l identifiant de l éditeur');
        }

    }
}

