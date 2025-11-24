<?php

namespace App\Controllers\error;

class Error404
{
    public function index()
    {
        $data = [
            'title' => '404 error',
            'styles' => ['404.css'],
        ];

        loadView('error/404',$data);
}
}