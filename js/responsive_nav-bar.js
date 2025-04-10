const navToggle = document.querySelector("._nav-toggle"),
_navMenu = document.querySelector("._nav-menu"),
_carousel = document.querySelector(".contain-carousel"),
_headfix = document.querySelector("body"),
_articles = document.querySelector("._contain-articles");

navToggle.addEventListener("click", () => {
    _navMenu.classList.toggle("_nav-menu_visible");
    _carousel.classList.toggle("carousel_visible");
    _headfix.classList.toggle("no_scroll");
    _articles.classList.toggle("carousel_visible");


  if (_navMenu.classList.contains("_nav-menu_visible")) {
    navToggle.setAttribute("aria-label", "Cerrar menú");
  } else {
    navToggle.setAttribute("aria-label", "Abrir menú");
  }
});
