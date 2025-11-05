<?php

namespace App\Controllers;

class ErrorController
{
    public static function notFound($message = 'Erro 404: Não encontrado')
    {
        http_response_code(404);

        $data = [
            'title' => '404 Não Encontrado',
            'styles' => ['error.css'],
            'status' => '404',
            'message' => $message,
        ];

        loadView('error/404', $data);
    }

    public static function notAuthorized($message = 'Erro 403: Não autorizado')
    {
        http_response_code(403);

        $data = [
            'title' => '403 Não Autorizado',
            'styles' => ['error.css'],
            'status' => '403',
            'message' => $message,
        ];

        loadView('error/403', $data);
    }
}
