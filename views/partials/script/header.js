class sidebarMobile {
    constructor(mobileMenu, sidebarNav, sidebarNavLi) {
        this.mobileMenu = document.querySelector('.sidebar-nav__burguer');
        this.navList = document.querySelector('.sidebar-nav');
        this.navLinks = document.querySelectorAll('.sidebar-nav li');
        this.activeClass = 'active';
        this.handleClick = this.handleClick.bind();
    }

    animateLinks() {
        this.navLinks.forEach((link) => {
            link.style.animation
                ? (link.style.animation = '')
                : (link.style.animation = `navLinkFade 0.5s ease 
                    forwards 0.3s`);
        });
    }

    handleClick() {
        this.sidebarNav.classList.toggle(this.activeClass);
        this.animateLinks();
    }

    addClickEvent() {
        this.mobileMenu.addEventListener('click', this.handleClick);
    }
}

/* const menuButton = document.querySelector('.sidebar-nav__burguer');
const sidebar = document.querySelector('.sidebar-nav');

function showSidebar() {
    sidebar.classList.add('isOpen');
    menuButton.setAttribute('aria-expanded', 'true');
}

function hideSidebar() {
    sidebar.classList.remove('isOpen');
    menuButton.setAttribute('aria-expanded', 'false');
}

function menuClick() {
    if (sidebar.classList.contains('is-open')) {
        hideSidebar();
    } else {
        showSidebar();
    }
}

if (menuButton && sidebar) {
  menuButton.addEventListener('click', menuClick);
} */
