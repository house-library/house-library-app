document.addEventListener('DOMContentLoaded', function () {
    const formPagamento = document.getElementById('campo-pagamento');

    if (formPagamento) {
        formPagamento.addEventListener('submit', function (e) {
            e.preventDefault();

            const formData = new FormData(this);
            const metodoInput = document.querySelector(
                'input[name="metodo-pagamento"]:checked'
            );
            const metodo = metodoInput ? metodoInput.value : 'pix';

            if (metodo !== 'pix' && metodo !== 'boleto') {
                this.submit();
                return;
            }

            fetch('/pagamento/finalizar', {
                method: 'POST',
                body: formData,
            })
                .then((response) => response.json())
                .then((data) => {
                    if (data.sucesso) {
                        const modal =
                            document.getElementById('modal-pix-overlay');
                        const containerConteudo =
                            modal.querySelector('.modal-pix-content');

                        // Elementos internos
                        const titulo = containerConteudo.querySelector('h2');
                        const texto = containerConteudo.querySelector('p');
                        const img = document.getElementById('img-qrcode-pix');
                        const statusMsg =
                            document.getElementById('status-pagamento');
                        const loader =
                            document.getElementById('loading-spinner');

                        // Limpa botão antigo se houver (para não duplicar)
                        const btnAntigo = document.getElementById(
                            'btn-boleto-dinamico'
                        );
                        if (btnAntigo) btnAntigo.remove();

                        // Reseta visual
                        loader.style.display = 'block';
                        statusMsg.innerHTML = 'Aguardando processamento...';
                        modal.style.display = 'flex';

                        // pix
                        if (data.metodo === 'Pix' && data.qr_code) {
                            titulo.innerText = 'Pagamento via Pix';
                            texto.innerText = 'Escaneie para pagar:';
                            img.style.display = 'block';
                            img.src = data.qr_code;

                            // simula espera de 5s para aprovação
                            setTimeout(() => {
                                statusMsg.innerHTML =
                                    "<strong style='color:green'>Pagamento Aprovado!</strong>";
                                loader.style.display = 'none';
                                setTimeout(() => {
                                    window.location.href = '/explorar';
                                }, 1500);
                            }, 5000);
                        }
                        // boleto
                        else if (data.metodo === 'Boleto' && data.url_boleto) {
                            titulo.innerText = 'Boleto Gerado!';
                            texto.innerText = 'Clique abaixo para visualizar:';

                            img.style.display = 'none'; // Esconde QR Code
                            loader.style.display = 'none'; // tira o loader
                            statusMsg.innerHTML = '';

                            // Cria o botão
                            const btn = document.createElement('a');
                            btn.id = 'btn-boleto-dinamico';
                            btn.href = data.url_boleto;
                            btn.target = '_blank';
                            btn.innerText = 'IMPRIMIR BOLETO';
                            btn.style.cssText =
                                'display:block; background:#243a5a; color:white; padding:15px; text-decoration:none; border-radius:5px; margin-top:10px; font-weight:bold;';

                            // Adiciona o botão após o texto
                            texto.parentNode.insertBefore(btn, statusMsg);

                            // Redireciona após 10 segundos
                            setTimeout(() => {
                                window.location.href = '/explorar';
                            }, 15000);
                        }
                    } else {
                        alert('Erro: ' + (data.msg || 'Erro desconhecido'));
                    }
                })
                .catch((error) => {
                    console.error('Erro:', error);
                    alert('Erro de conexão.');
                });
        });
    }
});
