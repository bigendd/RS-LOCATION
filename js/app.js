const btn = document.querySelector('.chevron');
window.addEventListener("scroll", () => {
   if ( window.pageYOffset>100) {
    btn.classList.add("active")
   } else {
    btn.classList.remove("active")
   }

})
