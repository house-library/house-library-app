<?php

namespace App\Controllers\error;

class Error403
{
    public function index()
    {
        $data = [
            'title' => '403 error',
            'styles' => ['403.css', 'header.css'],
        ];

        loadView('error/403',$data);
}
}