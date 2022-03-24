<?php
namespace App\Views;

class Home
{
    public function render()
    {
        echo '<!doctype html>
                <html lang="en">
                    <head>
                        <meta charset="UTF-8">
                        <meta name="viewport"
                              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
                        <meta http-equiv="X-UA-Compatible" content="ie=edge">
                        <title>My Note</title>
                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
                        <script src="myJs/ajax.js" defer=""></script>
                        <script src="myJs/myJs.js" defer=""></script>
                    </head>
                    <div class="nav-scroller py-1 mb-2">
                        <form id="addNote" action="/" method="POST">
                            <input type="text" placeholder="title" name="title" required="">
                            <input type="text" placeholder="content" name="content" required="">
                            <button type="submit">add note</button>
                        </form>
                    </div>
                </html>';
    }
}