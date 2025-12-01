document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('campo-pagamento');

    if (form) {
        form.addEventListener('submit', function (e) {
            e.preventDefault();

            const formData = new FormData(form);
            const submitButton = form.querySelector('button[type="submit"]');

            submitButton.disabled = true;
            submitButton.textContent = 'Processando...';

            fetch('/pagamento/finalizar', {
                method: 'POST',
                body: formData,
            })
                .then((response) => {
                    if (!response.ok) {
                        throw new Error('Erro na rede ou servidor');
                    }
                    return response.json();
                })
                .then((data) => {
                    if (data.sucesso) {
                        if (data.metodo === 'Pix') {
                            window.location.href = '/historico';
                        } else if (data.metodo === 'Boleto') {
                            window.location.href = '/historico';
                        } else {
                            window.location.href = '/historico';
                        }
                    } else {
                        alert(
                            'Erro ao processar: ' +
                                (data.msg || 'Erro desconhecido')
                        );
                        submitButton.disabled = false;
                        submitButton.textContent = 'Finalizar Compra';
                    }
                })
                .catch((error) => {
                    console.error('Erro:', error);
                    alert('Ocorreu um erro na conexão. Tente novamente.');
                    submitButton.disabled = false;
                    submitButton.textContent = 'Finalizar Compra';
                });
        });
    }
});
