<?php if (isset($_SESSION['success_message'])): ?>
    <p class="success"><?= htmlspecialchars($_SESSION['success_message']) ?></p>
    <?php unset($_SESSION['success_message']); ?>
<?php endif; ?>

<?php if (isset($_SESSION['error_message'])): ?>
    <p class="error"><?= htmlspecialchars($_SESSION['error_message']) ?></p>
    <?php unset($_SESSION['error_message']); ?>
<?php endif; ?>
