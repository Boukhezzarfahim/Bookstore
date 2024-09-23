let hamburgerbtn = document.querySelector(".hamburger");
let nav_list = document.querySelector(".nav-list");
let closebtn = document.querySelector(".close");
hamburgerbtn.addEventListener("click", () => {
  nav_list.classList.add("active");
});
closebtn.addEventListener("click", () => {
  nav_list.classList.remove("active");
});


// Counter section logic
$(document).ready(function () {
  $(".count").counterUp({
    delay: 10,
    time: 1200,
  });
});

const tabbtn = document.querySelectorAll(".tablink");
for (let i = 0; i < tabbtn.length; i++) {
  tabbtn[i].addEventListener('click',() => {
    let tabName = tabbtn[i].dataset.btn;
    let tabContent = document.getElementById(tabName);
    let AllTabContent = document.querySelectorAll(".tabcontent");
    let tabbtns = document.querySelectorAll(".tablink");
    for (let j = 0; j < AllTabContent.length; j++) {
      AllTabContent[j].style.display = "none";
    }
    tabContent.style.display = "block";
    
  })
  
}



