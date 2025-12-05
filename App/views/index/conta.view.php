<?php loadPartial('head', $viewData); ?>
<?php loadPartial('header'); ?> 
<?php include __DIR__ . '/../vlibras.html'; ?>

<?php $bloqueio = ($isEditing ?? false) ? '' : 'disabled'; ?>

<main class="account-page">
    <div class="account-container">
        
        <div class="page-header">
            <h1><?= ($isEditing ?? false) ? 'Editar Perfil' : 'Minha Conta' ?></h1>
            <p>Gerencie suas informações pessoais</p>
        </div>

        <div class="card-section">
            <div class="section-title">
                <h3>Dados Pessoais</h3>
                
                <?php if (!($isEditing ?? false)): ?>
                    <a href="/conta/editar" class="btn-edit">
                        <i class="fas fa-edit"></i> Editar
                    </a>
                <?php else: ?>
                    <a href="/conta" class="btn-cancel">
                        Cancelar
                    </a>
                <?php endif; ?>
            </div>

            <form id="form-dados" method="POST" action="/conta/atualizar">
                <div class="info-grid">
                    <div class="info-item">
                        <label>Nome Completo</label>
                        <input type="text" name="nome" value="<?= htmlspecialchars($usuario['nome']) ?>" <?= $bloqueio ?>>
                    </div>

                    <div class="info-item">
                        <label>E-mail</label>
                        <input type="email" name="email" value="<?= htmlspecialchars($usuario['email']) ?>" <?= $bloqueio ?>>
                    </div>

                    <div class="info-item">
                        <label>CPF</label>
                        <input type="text" name="cpf" value="<?= htmlspecialchars($usuario['cpf']) ?>" <?= $bloqueio ?>>
                    </div>
                </div>

                <?php if (empty($bloqueio)): ?>
                    <div class="form-actions">
                        <button type="submit" class="btn-save">Salvar Alterações</button>
                    </div>
                <?php endif; ?>
            </form>
        </div>
    </div>
</main>

<?php loadPartial('footer'); ?>