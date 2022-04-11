<?php
namespace App\Models;

class NoteModel
{
    public array $notes = [];

    public function addNote($note)
    {
        $this->notes[] = $note;
    }
}