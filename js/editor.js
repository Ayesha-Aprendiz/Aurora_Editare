let choose_img_Btn = document.querySelector(".choose_img button");
let choose_Input = document.querySelector(".choose_img input");
let imgSrc = document.querySelector("#user_img");
// let filter_buttons = document.querySelectorAll(".icons_room button");
let filter_buttons = document.querySelectorAll(".icons_room .iconItems");
// let _buttons = document.querySelectorAll(".icons_room .iconItems");
let slider = document.querySelector(".slideInput");
let filter_name = document.querySelector(".filter_info .name");
let slider_value = document.querySelector(".filter_info .value");
let slider_name = document.querySelector(".filter_info .name");
let rotate_btns = document.querySelectorAll(".icons_room1 .iconItems");
let reset = document.querySelector(".reset");
let save = document.querySelector(".save");
let brightness = 100,
  contrast = 100,
  saturate = 100,
  invert = 0,
  blur = 0,
  rotate = 0,
  flip_x = 1,
  flip_y = 1;


  // slider.value = 150;

  document.addEventListener("load",()=>{
    let slider = document.querySelector(".slideInput");
  })

/*choose_img_Btn.addEventListener("click", () => choose_Input.click());
choose_Input.addEventListener("change", () => {
  let file = choose_Input.files[0];
  if (!file) return;
  imgSrc.src = URL.createObjectURL(file);
  imgSrc.addEventListener("load", () => {
    document.querySelector(".container").classList.remove("disabled");
  });
});*/

filter_buttons.forEach((element) => {
  element.addEventListener("click", () => {
    // document.querySelector(".active").classList.remove("active");

    filter_buttons.forEach((ele)=>{
      ele.classList.remove("active");
    })

    rotate_btns.forEach((ele)=>{
      ele.classList.remove("active");
    })

    element.classList.add("active");
    filter_name.innerText = element.id;
    if (element.id === "brightness") {
      slider.max = "200";
      slider.value = brightness;
      slider_name.innerText = "Brightness";
      slider_value.innerText = `${brightness}`;
    } else if (element.id === "contrast") {
      slider.max = "200";
      slider.value = contrast;
      slider_name.innerText = "Contrast";
      slider_value.innerText = `${contrast}`;
    } else if (element.id === "saturate") {
      slider.max = "200";
      slider.value = saturate;
      slider_name.innerText = "Saturate";
      slider_value.innerText = `${saturate}`;
    } else if (element.id === "invert") {
      slider.max = "100";
      slider.value = invert;
      slider_name.innerText = "Invert";
      slider_value.innerText = `${invert}`;
    } else if (element.id === "blur") {
      slider.max = "100";
      slider.value = blur;
      slider_name.innerText = "Blur";
      slider_value.innerText = `${blur}`;
    }
  });
});

slider.addEventListener("input", () => {
  slider_value.innerText = `${slider.value}%`;
  let sliderState = document.querySelector(".icons_room .active");
  if (sliderState.id === "brightness") {
    brightness = slider.value;
  } else if (sliderState.id === "contrast") {
    contrast = slider.value;
  } else if (sliderState.id === "saturate") {
    saturate = slider.value;
  } else if (sliderState.id === "invert") {
    invert = slider.value;
  } else if (sliderState.id === "blur") {
    blur = slider.value;
  }
  imgSrc.style.filter = `brightness(${brightness}%) contrast(${contrast}%) saturate(${saturate}%) invert(${invert}%) blur(${blur}px)`;
});

rotate_btns.forEach((element) => {
  element.addEventListener("click", () => {

    filter_buttons.forEach((ele)=>{
      ele.classList.remove("active");
    })

    rotate_btns.forEach((ele)=>{
      ele.classList.remove("active");
    })
    element.classList.add("active");

    if (element.id === "rotate_left") {
      rotate -= 90;
    } else if (element.id === "rotate_right") {
      rotate += 90;
    } else if (element.id === "flip_x") {
      flip_x = flip_x === 1 ? -1 : 1;
    } else if (element.id === "flip_y") {
      flip_y = flip_y === 1 ? -1 : 1;
    }

    imgSrc.style.transform = `rotate(${rotate}deg) scale(${flip_x}, ${flip_y})`;
  });
});