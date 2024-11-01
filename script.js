// document.addEventListener("DOMContentLoaded", () => {
    const menuToggle = document.querySelector(".menu-toggle input");
    const nav = document.querySelector("nav ul");
  
    menuToggle.addEventListener("click", function() {
      nav.classList.toggle("slide");
    });
//   });

// document.addEventListener("DOMContentLoaded", () => {
//     const menuToggle = document.querySelector(".menu-toggle input");
//     const navLinks = document.querySelector(".nav-links");
  
//     menuToggle.addEventListener("click", () => {
//       navLinks.classList.toggle("active");
//     });
//   });