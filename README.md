# HOUSE-LIBRARY APP

> Projeto de uma loja virtual de eBooks com funcionalidades de cadastro, login, favoritos e carrinho de compras para usuários. Administradores têm acesso a estatísticas de vendas e podem gerenciar o catálogo de eBooks.

---

## Índice
- [Requisitos do Projeto](#-requisitos-do-projeto)
- [Tecnologias Utilizadas](#-tecnologias-utilizadas)
---

## Requisitos do Projeto

Para guiar o desenvolvimento, elencamos os seguintes requisitos funcionais e não funcionais.

### Requisitos Funcionais (RFs)

*Funcionalidades que o usuário e administrador devem ser capazes de fazer no sistema.*

| **#** | **Requisito**               | **Descrição**                                                                                             |
|-------|-----------------------------|---------------------------------------------------------------------------------------------------------|
| 1     | Autenticação de Usuário     | Usuário e administrador podem criar conta, fazer login e logout, informando nome, e-mail, senha, etc.   |
| 2     | Recuperação de Conta        | Sistema envia link para redefinição de senha via e-mail.                                                |
| 3     | Navegação do Usuário        | Usuário pode navegar por categorias, autores, títulos, palavras-chave, etc.                             |
| 4     | Detalhes dos eBooks         | Usuário visualiza título, autor, preço, sinopse dos ebooks.                                            |
| 5     | Compra de eBook             | Sistema com carrinho de compras para selecionar e direcionar ebooks para compra.                        |
| 6     | Histórico de Compras        | Usuário pode visualizar todas as compras realizadas.                                                   |
| 7     | Gerenciamento de eBooks     | Administrador pode cadastrar, editar e excluir ebooks.                                                 |
| 8     | Gerenciamento de Categorias | Administrador pode selecionar categoria para cada ebook.                                              |
| 9     | Gerenciamento de Usuários   | Administrador pode visualizar, bloquear ou excluir contas de usuários.                                 |
| 10    | Visualização de Pedidos     | Administrador acessa painel com estatísticas: total vendas, ebooks mais vendidos, etc.                  |


### Requisitos Não Funcionais (RNFs)

*Os requisitos não funcionais descrevem como o sistema deve se comportar — desempenho, segurança, usabilidade etc.*

| **#** | **Requisito**         | **Descrição**                                                                                   |
|-------|-----------------------|-----------------------------------------------------------------------------------------------|
| 11    | Segurança             | Senhas de usuários e administradores devem ser criptografadas.                                |
| 12    | Desempenho            | Sistema suporta crescimento da base de usuários e ebooks sem perda de desempenho.             |
| 13    | Disponibilidade       | Sistema disponível 99,9% do tempo.                                                           |
| 14    | Performance           | Tempo de resposta inferior a 2 segundos para operações comuns.                               |
| 15    | Compatibilidade       | Compatível com dispositivos móveis, tablets e desktops.                                      |
| 16    | Usabilidade           | Interface intuitiva e acessível para todos os públicos.                                      |
| 17    | Internacionalização   | Suporte para múltiplos idiomas (opcional).                                                   |
| 18    | Formato dos Arquivos  | eBooks disponíveis nos formatos PDF, EPUB e MOBI.                                            |


---

# 📝 Padrão de Commits

| Tipo | Descrição | Exemplo |
| :--- | :--- | :--- |
| `feat` | Adiciona uma nova funcionalidade ao projeto. | `feat: adiciona login com Google` |
| `fix` | Corrige um bug no código. | `fix: corrige validação de e-mail` |
| `docs` | Altera a documentação do projeto. | `docs: atualiza o README` |
| `style` | Aplica formatação de código (espaços, etc.). | `style: remove espaços em branco` |
| `refactor` | Refatora o código sem alterar a funcionalidade. | `refactor: melhora lógica de autenticação` |
| `perf` | Melhora o desempenho da aplicação. | `perf: otimiza consulta ao banco` |
| `test` | Adiciona ou modifica testes automatizados. | `test: adiciona testes unitários` |
| `build` | Altera arquivos de build e dependências. | `build: atualiza versão do React` |
| `ci` | Altera arquivos de integração contínua (CI). | `ci: corrige script de deploy` |
| `chore` | Tarefas de rotina e manutenção. | `chore: adiciona a biblioteca prettier` |

## Tecnologias Utilizadas

*Nesse projeto utilizaremos as linguagens aprendidas em sala de aula para uma maior consolidação desse aprendizado.*

- **HTML5**
- **PHP**
- **SQL**
- **JavaScript**

<p align="left">
  <img src="https://img.shields.io/badge/HTML5-E34F26?style=for-the-badge&logo=html5&logoColor=white" />
  <img src="https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white" />
  <img src="https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white" />
  <img src="https://img.shields.io/badge/JavaScript-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black" />
</p>
