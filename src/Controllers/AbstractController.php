<?php
namespace App\Controllers;

use App\Core\DoctrineManager;
use App\Entity\Note;
use App\Models\NoteModel;

abstract class AbstractController
{
    public $doctrineManager;
    public $noteRepository;
    public $model;

    public function __construct()
    {
        $this->model = new NoteModel();
        $this->doctrineManager = DoctrineManager::getInstance();
        $this->noteRepository = $this->doctrineManager->entityManager->getRepository(Note::class);
    }
}