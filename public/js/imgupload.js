function show(imagem) {
    if (imagem.files && imagem.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            var preview = document.getElementById('preview-imagem');
            if (preview) {
                preview.src = e.target.result;
                preview.style.width = '300px';
            }
        };
        reader.readAsDataURL(imagem.files[0]);
    }
}

// FORMATAR CAMPOS
function formata_mascara(campo_passado, mascara) {
    let campo = campo_passado.value.length;
    let saida = mascara.substring(0, 1);
    let texto = mascara.substring(campo);

    if (texto.substring(0, 1) != saida) {
        campo_passado.value += texto.substring(0, 1);
    }
}