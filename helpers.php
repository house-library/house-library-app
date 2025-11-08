<?php
declare(strict_types=1);

/**
 * Conseguir o caminho base
 *
 * @param string $path
 * @return string
 */
function basePath(string $path = ''): string
{
    return __DIR__ . '/' . $path;
}

/**
 * Carregar a view
 *
 * @param string $name
 * @return void
 */
function loadView(string $name, array $data = []): void
{
    $path = basePath("App/views/{$name}.view.php");

    if (file_exists($path)) {
        $viewData = $data;
        extract($data);

        require $path;
    } else {
        echo "Erro: View '{$name}' não encontrada no caminho: {$path}";
    }
}

/**
 * Carregar a partial
 *
 * @param string $name
 * @return void
 */
function loadPartial(string $name, array $data = []): void
{
    $partialPath = basePath("App/views/partials/{$name}.php");

    if (file_exists($partialPath)) {
        $viewData = $data;
        extract($data);

        require $partialPath;
    } else {
        echo "Erro: Partial '{$name}' não encontrada no caminho: {$partialPath}";
    }
}

// formatar o preço
function formatPrice($preco)
{
    return '$' . number_format(floatval($preco));
}

// higienizar os dados
function sanitize(string $dirty)
{
    return filter_var(trim($dirty), FILTER_SANITIZE_SPECIAL_CHARS);
}

// redirecionar a determinada url
function redirect(string $url)
{
    header("Location: {$url}");
    exit();
}
