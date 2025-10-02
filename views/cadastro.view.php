    <?php require 'partials/head.php'; ?>

    <section id="cadastro">
      <img src="/assets/logo.svg" alt="" />
      <h1>House Library</h1>

      <form>
        <p><input type="text" name="nome" placeholder="Nome completo" /></p>
        <p><input type="email" name="email" placeholder="Email" /></p>
        <p><input type="password" name="senha" placeholder="Senha" /></p>
        <p>
          <input
            type="password"
            name="confirmar"
            placeholder="Confirmar senha"
          />
        </p>
        <p><button type="submit">Criar conta</button></p>
      </form>
    </section>
  </body>
</html>