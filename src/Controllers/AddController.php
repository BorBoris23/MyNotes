<?php
namespace App\Controllers;

use App\Entity\Note;

class AddController extends AbstractController
{
    public function addNote()
    {
        $note = new Note();
        $now = new \DateTime('now');
        $note->setTitle($_POST['title']);
        $note->setContent($_POST['content']);
        $note->setCreated($now);
        $this->doctrineManager->add($note);

        $note->jsonSerialize();
        $this->model->addNote($note);
        echo json_encode($this->model);
    }
}
