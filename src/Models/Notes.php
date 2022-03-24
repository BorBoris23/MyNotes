<?php
namespace App\Models;

class Notes
{
    public array $notes = [];
    public $message;

    public function addNote($note)
    {
        $this->notes[] = $note;
    }
}