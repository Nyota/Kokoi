const hamburger = document.querySelector("#navigation .koko-nav-menu-button");
const navigation = document.querySelector("#navigation nav");
const navClasses = navigation.classList;

hamburger.addEventListener("click", () => {
  navClasses.toggle("active");
});
