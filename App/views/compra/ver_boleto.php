<?php

if (!isset($dadosboleto)) {
    die('Erro: Dados do boleto não foram carregados.');
}

extract($dadosboleto);

$raizProjeto = dirname(__DIR__, 3);
$pastaInclude = $raizProjeto . '/include/';

$arquivoFuncoes = $pastaInclude . 'funcoes_real.php';
$arquivoLayout = $pastaInclude . 'layout_real.php';

if (file_exists($arquivoFuncoes)) {
    require_once $arquivoFuncoes;
}

ob_start();

if (file_exists($arquivoLayout)) {
    include $arquivoLayout;
}

$html = ob_get_clean(); // Pega o HTML gerado e limpa o buffer

$html = str_replace('src=imagens/', 'src=/imagens_boleto/', $html);
$html = str_replace('src="imagens/', 'src="/imagens_boleto/', $html);

$htmlLogo =
    '<div style="text-align:center; margin-bottom: 10px;"><img src="/assets/imgs/logo.svg" style="max-height: 60px;"></div>';

$html = str_replace('<body>', '<body>' . $htmlLogo, $html);

// Exibe o boleto corrigido
echo $html;
?>


