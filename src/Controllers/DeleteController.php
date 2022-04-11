<?php
namespace App\Controllers;

class DeleteController extends AbstractController
{
    public function deleteNote()
    {
        preg_match_all('/api\/note\/(\d+)/', $_SERVER['REQUEST_URI'], $matches);
        $note = $this->noteRepository->find($matches[1][0]);
        $this->doctrineManager->removeRecord($note);
    }
}