<?php
namespace App\Controllers;

use App\Core\DoctrineManager;
use App\Entity\Note;

abstract class AbstractController
{
    public $doctrineManager;
    public $noteRepository;


    public function __construct()
    {
        $this->doctrineManager = DoctrineManager::getInstance();
        $this->noteRepository = $this->doctrineManager->entityManager->getRepository(Note::class);
    }
}