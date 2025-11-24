document.addEventListener('DOMContentLoaded', function () {
    // Seleção dos elementos
    const cpfInput = document.getElementById('cpf');
    const emailInput = document.getElementById('email');
    const form = document.getElementById('formCadastro');

    // Seleção dos Spans de Feedback
    const cpfFeedback = document.getElementById('cpfFeedback');
    const emailFeedback = document.getElementById('emailFeedback');

    // Função que conversa com o PHP
    async function verificarExistencia(campo, valor) {
        if (!valor) return false;

        try {
            const response = await fetch('/cadastro/validar', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ campo: campo, valor: valor }),
            });

            if (!response.ok) return false;

            const data = await response.json();
            return data.existe === true;
        } catch (error) {
            console.error('Erro na validação:', error);
            return false;
        }
    }

    // Função visual para mostrar erro
    function exibirFeedback(elemento, mensagem, existe) {
        if (!elemento) return;

        if (existe) {
            elemento.textContent = mensagem;
            elemento.style.color = 'red';
            elemento.style.fontSize = '0.8rem';
            elemento.style.display = 'block';
        } else {
            elemento.textContent = '';
            elemento.style.display = 'none';
        }
    }

    if (cpfInput) {
        cpfInput.addEventListener('blur', async function () {
            const valor = cpfInput.value.trim();
            if (valor) {
                const existe = await verificarExistencia('cpf', valor);
                exibirFeedback(cpfFeedback, 'Este CPF já está em uso.', existe);
                if (existe) cpfInput.style.borderColor = 'red';
                else cpfInput.style.borderColor = '';
            }
        });
    }

    if (emailInput) {
        emailInput.addEventListener('blur', async function () {
            const valor = emailInput.value.trim();
            if (valor) {
                const existe = await verificarExistencia('email', valor);
                exibirFeedback(
                    emailFeedback,
                    'Este e-mail já está em uso.',
                    existe
                );
                if (existe) emailInput.style.borderColor = 'red';
                else emailInput.style.borderColor = '';
            }
        });
    }

    // Bloqueio do Envio do Formulário
    if (form) {
        form.addEventListener('submit', async function (event) {
            if (
                (cpfFeedback && cpfFeedback.textContent !== '') ||
                (emailFeedback && emailFeedback.textContent !== '')
            ) {
                event.preventDefault();
                alert('Corrija os campos em vermelho antes de prosseguir.');
            }
        });
    }
});
