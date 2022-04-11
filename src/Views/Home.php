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
                        <link rel="stylesheet" href="/myCss/popUp.css">
                        <title>My Note</title>
                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
                        <script src="/myJs/ajax.js" defer=""></script>
                        <script src="/myJs/addNoteForm.js" defer=""></script>
                        <script src="/myJs/noteList.js" defer=""></script>
                        <script src="/myJs/popUpWindow.js" defer=""></script>
                        <script src="/myJs/editNoteForm.js" defer=""></script>
                        <script src="/myJs/scroller.js" defer=""></script>
                    </head>
                    <body></body>
                </html>';
    }
}