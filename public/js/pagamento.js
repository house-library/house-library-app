document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('campo-pagamento');
    const modalPix = document.getElementById('modal-pix-overlay');
    const imgQrCode = document.getElementById('img-qrcode-pix');
    const tituloModal = document.querySelector('.modal-pix-content h2');
    const textoStatus = document.getElementById('status-pagamento');

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
            .then((response) => response.json())
            .then((data) => {
                if (data.sucesso) {
                    
                    if (data.metodo.toLowerCase() === 'pix') {
                        
                        if (modalPix && imgQrCode) {
                            imgQrCode.src = data.qr_code;
                            
                            if(tituloModal) {
                                tituloModal.textContent = "Pagamento via Pix"; 
                                tituloModal.style.color = ""; // Cor padrão
                            }
                            if(textoStatus) {
                                textoStatus.textContent = "Aguardando confirmação...";
                            }

                            modalPix.style.display = 'flex'; 

                            setTimeout(() => {
                                if(tituloModal) {
                                    tituloModal.textContent = "Pedido Realizado com Sucesso!";
                                    tituloModal.style.color = "#28a745"; 
                                }
                                if(textoStatus) {
                                    textoStatus.textContent = "Redirecionando para seus pedidos...";
                                }
                                
                               

                            }, 3000); 

                            setTimeout(() => {
                                window.location.href = '/historico';
                            }, 6000); 

                        } else {
                            alert('Pedido realizado com sucesso! Redirecionando...');
                            window.location.href = '/historico';
                        }

                    } else if (data.metodo.toLowerCase() === 'boleto') {
                        alert('Sucesso! Boleto gerado.'); 
                        window.location.href = data.url_boleto || '/historico';
                    } else {
                        alert('Pagamento aprovado com sucesso!'); 
                        window.location.href = '/historico';
                    }

                } else {
                    alert('Erro: ' + (data.msg || 'Desconhecido'));
                    submitButton.disabled = false;
                    submitButton.textContent = 'Finalizar Compra';
                }
            })
            .catch((error) => {
                console.error('Erro:', error);
                submitButton.disabled = false;
                submitButton.textContent = 'Finalizar Compra';
            });
        });
    }
});