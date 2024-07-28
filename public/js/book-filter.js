let filterdiv = document.querySelector(".filter-option");
let iconbtn = document.querySelector(".rightbtn");

iconbtn.addEventListener("click", () => {
  filterdiv.classList.toggle("active-div");
  iconbtn.classList.toggle("active-btn");
})





let editorpick = document.getElementsByClassName("select-box");
let icon = document.querySelectorAll(".select-box .opt-title i");
let answer = document.querySelectorAll(".select-box .option");
for (let i = 0; i < editorpick.length; i++) {
  editorpick[i].addEventListener("click", () => {
    if (icon[i].classList.contains("active")) {
      icon[i].classList.remove("active");
      answer[i].style.maxHeight = null;
      answer[i].style.marginTop = "0rem";
      answer[i].style.padding = "0px";
    } else {
      icon[i].classList.add("active");
      answer[i].style.maxHeight = answer[i].scrollHeight + "px";
      answer[i].style.padding = "0px 20px 20px 20px";
    }
  });
}

let selectdate = document.querySelector(".select-date .opt-title");
let downarrow = document.querySelector(".select-date .opt-title i");
let option = document.querySelector(".select-date .option");
selectdate.addEventListener("click",() => {
  if(downarrow.classList.contains("active")){
    downarrow.classList.remove("active");
    option.style.display = "none";
    option.style.padding = "0px";
  }else{
    downarrow.classList.add("active");
    option.style.display = "block";
    option.style.maxHeight = option.scrollHeight+"px";
    option.style.padding = "0px 20px 20px 20px";
  }
})

let likebtn = document.getElementsByClassName("like");
for (let i = 0; i < likebtn.length; i++) {
  likebtn[i].addEventListener("click", () => {
    likebtn[i].classList.toggle("liked");
  });
}

const rangeInput = document.querySelectorAll(".range-input input"),
priceInput = document.querySelectorAll(".price-input input"),
range = document.querySelector(".slider .progress");
let priceGap = 1000;

priceInput.forEach(input =>{
input.addEventListener("input", e =>{
  let minPrice = parseInt(priceInput[0].value),
  maxPrice = parseInt(priceInput[1].value);
  
  if((maxPrice - minPrice >= priceGap) && maxPrice <= rangeInput[1].max){
      if(e.target.className === "input-min"){
          rangeInput[0].value = minPrice;
          range.style.left = ((minPrice / rangeInput[0].max) * 100) + "%";
      }else{
          rangeInput[1].value = maxPrice;
          range.style.right = 100 - (maxPrice / rangeInput[1].max) * 100 + "%";
      }
  }
});
});

rangeInput.forEach(input =>{
input.addEventListener("input", e =>{
  let minVal = parseInt(rangeInput[0].value),
  maxVal = parseInt(rangeInput[1].value);

  if((maxVal - minVal) < priceGap){
      if(e.target.className === "range-min"){
          rangeInput[0].value = maxVal - priceGap
      }else{
          rangeInput[1].value = minVal + priceGap;
      }
  }else{
      priceInput[0].value = minVal;
      priceInput[1].value = maxVal;
      range.style.left = ((minVal / rangeInput[0].max) * 100) + "%";
      range.style.right = 100 - (maxVal / rangeInput[1].max) * 100 + "%";
  }
});
});