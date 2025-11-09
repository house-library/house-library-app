<?php

namespace App\Controllers;

class Error404
{
    public function index()
    {
        $data = [
            'title' => '404 error',
            'styles' => ['404.css'],
        ];

        loadView('404',$data);
}
}