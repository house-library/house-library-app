<?php
require 'vendor/autoload.php';

echo "Autoload carregado!\n";

if (class_exists('App\Models\Dao\CategoriaDao')) {
    echo "CLASSE CategoriaDao ENCONTRADA!\n";
} else {
    echo "CLASSE AINDA NÃO ENCONTRADA :(\n";
    echo "Arquivos no Dao:\n";
    print_r(glob('App/Models/Dao/*.php'));
}
