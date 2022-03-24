<?php
namespace App\Controllers;

use App\Entity\Note;

class AddController extends AbstractController
{
    public function addNote()
    {
        $note = new Note();
        $note->setTitle($_POST['title']);
        $note->setContent($_POST['content']);
        $note->setCreated(new \DateTime('now'));
//        $this->doctrineManager->add(new Note($_POST['title'], $_POST['content'], new \DateTime('now')));
        $this->doctrineManager->add($note);
    }
}
