<?php

namespace App\Controllers;

class Error403
{
    public function index()
    {
        $data = [
            'title' => '403 error',
            'styles' => ['403.css'],
        ];

        loadView('403',$data);
}
}