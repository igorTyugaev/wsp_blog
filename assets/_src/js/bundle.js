initDropDownMenu();
initNavBar();

function initDropDownMenu() {
  const dropdownMenus = document.querySelectorAll('.dropdown-menu');

  dropdownMenus.forEach((dropdownMenu) => {
    const dropdownMenuBtn = dropdownMenu.querySelector('.dropdown-menu__btn');
    const dropdownMenuContent = dropdownMenu.querySelector('.dropdown-menu__content');

    dropdownMenuBtn.addEventListener('click', () => {
      dropdownMenuContent.classList.toggle('dropdown-menu__content-active');
    });
  });


  // Close the dropdown menu if the user clicks outside of it
  window.onclick = function(event) {
    if (!event.target.matches('.dropdown-menu__btn .doter .doter__dot')) {
      const dropdownMenuContentList = document.querySelectorAll('.dropdown-menu__content');
      dropdownMenuContentList.forEach((dropdownMenuContent) => {
        if (dropdownMenuContent.classList.contains('dropdown-menu__content-active')) {
          dropdownMenuContent.classList.remove('dropdown-menu__content-active');
        }
      });
    }
  };
}

function initNavBar() {
  const _navBarBtn = document.getElementById('navbar-btn');
  const _navBar = document.getElementById('navbar');
  const toggleMenu = function() {
    _navBar.classList.toggle('show');
  };

  _navBarBtn.addEventListener('click', () => {
    toggleMenu();
  });

  _navBar.addEventListener('click', (e) => {
    const currentElement = e.target;
    const isOverlay = currentElement.getAttribute('class') === 'navbar show';
    isOverlay && toggleMenu();
  });
}
