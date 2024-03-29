<?php
require_once __DIR__ . './config/bootstrap.php';

use App\Core\Application;
use App\Controllers\HomeController;
use App\Controllers\GetNotesController;
use App\Controllers\AddController;
use App\Controllers\DeleteController;
use App\Controllers\PatchController;

$app = new Application;

$app->router->get('/^$/', [HomeController::class, 'index']);
$app->router->get('/^api\/note((\/){0,1}\?.*)*$/', [GetNotesController::class, 'getNotes']);
$app->router->post('/^api\/note(\?.*)*$/', [AddController::class, 'addNote']);
$app->router->delete('/^api\/note\/\d+$/', [DeleteController::class, 'deleteNote']);
$app->router->patch('/^api\/note\/\d+$/', [PatchController::class, 'patchNote']);

$app->run($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
