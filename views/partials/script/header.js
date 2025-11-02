function toggleNav() {
    const sidebar = document.querySelector('.sidebar');
    const overlay = document.querySelector('.overlay');
    const body = document.body;

    sidebar.classList.toggle('active');
    overlay.classList.toggle('active');

    // Prevenir scroll quando sidebar aberta
    if (sidebar.classList.contains('active')) {
        body.style.overflow = 'hidden';
    } else {
        body.style.overflow = '';
    }
}

function toggleDropdown(button) {
    const dropdown = button.parentElement;
    dropdown.classList.toggle('active');
}

// Fechar sidebar ao clicar no overlay
document.querySelector('.overlay')?.addEventListener('click', toggleNav);
