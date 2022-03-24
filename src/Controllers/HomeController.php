<?php
namespace App\Controllers;

use App\Views\Home;

class HomeController
{
    private $home;

    public function __construct()
    {
        $this->home = new Home();
    }

    public function index()
    {
        $this->home->render();
    }
}