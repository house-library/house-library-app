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
