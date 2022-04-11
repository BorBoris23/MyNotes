<?php
namespace App\Controllers;

class GetNotesController extends AbstractController
{
    public $pageNumber;
    public $pageSize;

    public function __construct()
    {
        parent::__construct();
        $this->pageNumber = $this->gettingNumberAndCountItems('pageNumber', 1);
        $this->pageSize = $this->gettingNumberAndCountItems('pageSize', 32);
    }

    public function getNotes()
    {
        $notes = $this->noteRepository->findBy(array(),array(),$this->pageSize,($this->pageNumber-1)*$this->pageSize);
        foreach ($notes as $note) {
            $note->jsonSerialize();
            $this->model->addNote($note);
        }
        echo json_encode($this->model);
    }

    private function gettingNumberAndCountItems($key, $defaultValue)
    {
        if (array_key_exists($key, $_GET)) {
            $number = $_GET[$key];
            if (!is_numeric($number)) {
                $number = $defaultValue;
            }
        } else {
            $number = $defaultValue;
        }
        return $number;
    }
}