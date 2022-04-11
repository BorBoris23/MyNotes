<?php
namespace App\Controllers;

class PatchController extends AbstractController
{
    public function patchNote()
    {
        global $_PATCH;

        preg_match_all('/api\/note\/(\d+)/', $_SERVER['REQUEST_URI'], $matches);
        $note = $this->noteRepository->find($matches[1][0]);
        $now = new \DateTime('now');

        $this->parsePatch();

        $note->setTitle($_PATCH['title']);
        $note->setContent($_PATCH['content']);
        $note->setCreated($now);
        $this->doctrineManager->entityManager->flush();

        $note->jsonSerialize();
        $this->model->addNote($note);

        echo json_encode($this->model);
    }

    private function parsePatch()
    {
        $putData = fopen("php://input", "r");

        $raw_data = fread($putData, 1024);

        fclose($putData);

        $boundary = substr($raw_data, 0, strpos($raw_data, "\r\n"));

        if(empty($boundary)) {
            parse_str($raw_data,$data);
            $GLOBALS[ '_PATCH' ] = $data;
        }
    }
}
