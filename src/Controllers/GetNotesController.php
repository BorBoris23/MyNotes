<?php
namespace App\Controllers;

use App\Models\Notes;

class GetNotesController extends AbstractController
{
    private $model;

    public function __construct()
    {
        parent::__construct();
        $this->model = new Notes();
    }

    public function getNotes()
    {
        $notes = $this->noteRepository->findAll();
        foreach ($notes as $note) {
            $note->jsonSerialize();
            $this->model->addNote($note);
        }
        echo json_encode($this->model);
    }
}