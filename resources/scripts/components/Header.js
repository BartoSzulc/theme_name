import Component from "./Component";

export default class Header extends Component {
  constructor() {
    super();
    this.header = document.querySelector(".header");
    this.hamburger = document.querySelector(".js-hamburger");
    this.hamburgerClose = document.querySelector(".js-hamburger--close");
    this.asideMobile = document.querySelector(".js-menu-mobile");
    this.dropdownMenu = document.querySelector(".menu-item__dropdown-menu");

  }

  init() {
    if (!this.header && !this.hamburger) {
      return false;
    }
    this.hamburger.addEventListener("click", () => {
      this.toggleMenu();
    });
    this.hamburgerClose.addEventListener("click", () => {
      this.closeMenu();
    });
    // Get all menu items with links
    const menuItemsWithLinks = document.querySelectorAll(".menu-item a[href]:not([href*='/oferta/']), .menu-item a[href^='/oferta/#']");    // Add event listeners to each menu item with a link
    menuItemsWithLinks.forEach((menuItem) => {
      menuItem.addEventListener("click", () => {
        this.closeMenu();
      });
    });
  }

  toggleMenu() {
    this.asideMobile.classList.toggle("active");
  }

  closeMenu() {
    if (this.asideMobile.classList.contains("active")) {
      this.asideMobile.classList.remove("active");
  
      // Find the active dropdown menu and remove the "active" class from it
      const activeDropdownMenu = document.querySelector(".menu-item__dropdown-menu.active");
      if (activeDropdownMenu) {
        activeDropdownMenu.classList.remove("active");
      }
    }
  }
  
}

