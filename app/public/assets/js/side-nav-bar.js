document.addEventListener("DOMContentLoaded", function () {
  function verticalSlider() {
    function closeOpenSubMenus() {
      let openSubMenus = document.querySelectorAll(
        '.sub-menu:not([style*="max-height: 0"])'
      );
      openSubMenus.forEach(function (menu) {
        menu.style.maxHeight = "0px";
        menu.previousElementSibling
          .querySelector(".drop")
          ;
      });
    }

    function verticalMenuAnimation() {
      let menuBtn = document.querySelectorAll(".sub-btn");
      menuBtn.forEach(function (btn) {
        btn.addEventListener("click", function () {
          let subMenu = this.nextElementSibling;
          let isHidden = window.getComputedStyle(subMenu).maxHeight === "0px";
          closeOpenSubMenus();
          if (isHidden) {
            subMenu.style.maxHeight = subMenu.scrollHeight + "px";
          } else {
            subMenu.style.maxHeight = "0px";
            
          }
        });
      });
    }

    function activeClasse() {
      let selectedMenu = document.querySelectorAll(".item a:not(.sub-btn)");

      selectedMenu.forEach((item) => {
        item.addEventListener("click", function () {
          // Supprimer la classe "active" de tous les éléments
          selectedMenu.forEach((otherItem) => {
            otherItem.classList.remove("active");
          });

          // Ajouter la classe "active" à l'élément cliqué
          item.classList.add("active");
        });
      });
    }

    function closeSubMenusOnClick() {
      let menuItems = document.querySelectorAll(".item a:not(.sub-item)");
      menuItems.forEach(function (item) {
        item.addEventListener("click", function () {
          closeOpenSubMenus();
        });
      });
    }

    closeSubMenusOnClick();
    verticalMenuAnimation();
    activeClasse();

    navRoute();
    
  }

  verticalSlider();
});

function navRoute()  {
  var url = window.location.href; // Récupère l'URL actuelle
  var menuItems = document.querySelectorAll('.item a'); // Sélectionne tous les liens dans le menu

  menuItems.forEach(function(item) {
    var href = item.getAttribute('href');
    // Vérifie si l'URL correspond au href de cet élément
    if (url.includes(href)) {
      // Ajoute la classe 'active' à l'élément si l'URL correspond
      item.classList.add('active');
    } else {
      // Sinon, supprime la classe 'active' (si elle existe)
      item.classList.remove('active');
    }
  });
};