<?php loadPartial('head', $data); ?>
<?php loadPartial('headeradm'); ?>

<?php include ("vlibras.html");?>

<main>
    <div class="container">
    <span class="material-symbols-outlined">label</span>
    <h1>Categorias</h1>
    </div>

    <div class="divider"></div>

    <div class="input-label">
        <form action="" method="POST">
        <label for="">Nova Categoria</label>
        <input type="text" name="descricao">
        
        <div class="btn-cadastrar">
            <input type="submit" value="cadastrar">
        </div>
        </form>
    </div>

</main>

<?php loadPartial('footer'); ?>


