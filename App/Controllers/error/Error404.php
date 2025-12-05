<?php

namespace App\Controllers\error;

class Error404
{
    public function index()
    {
        $data = [
            'title' => '404 error',
            'styles' => ['404.css', 'header.css'],
        ];

        loadView('error/404',$data);
}
}