let choose_img_Btn = document.querySelector(".choose_img button");
let choose_Input = document.querySelector(".choose_img input");
let imgSrc = document.querySelector("#image1");
// let filter_buttons = document.querySelectorAll(".icons_room button");
let filter_buttons = document.querySelectorAll(".icons_room .iconItems");
// let _buttons = document.querySelectorAll(".icons_room .iconItems");
let slider = document.querySelector(".slideInput");
let filter_name = document.querySelector(".filter_info .name");
let slider_value = document.querySelector(".filter_info .value");
let slider_name = document.querySelector(".filter_info .name");
let rotate_btns = document.querySelectorAll(".icons_room1 .iconItems");
let reset = document.querySelector("#reset_filters");
let save = document.querySelector(".save");

let removeButton = document.querySelector(".removeButtonContainer");


let brightness = 100,
  contrast = 100,
  saturate = 100,
  invert = 0,
  blur = 0,
  rotate = 0,
  flip_x = 1,
  flip_y = 1;


  // console.log(abc);

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



removeButton.addEventListener("click",()=>{
  imgSrc.src = "";
  let chooseFileInput = document.querySelector(".editor");
  chooseFileInput.style.display = "block";
  let canvas = document.querySelector(".wrapper");
  canvas.style.backgroundColor="white";

  // const imageName = this.getAttribute('data-image');

  // fetch('delete_image.php', {
  //     method: 'POST',
  //     headers: {
  //         'Content-Type': 'application/json'
  //     },
  //     body: JSON.stringify({ image_name: imageName })
  // })
  // .then(response => response.json())
  // .then(data => {
  //     alert(data.message); // Show success or error message
  // })
  // .catch(error => {
  //     console.error('Error:', error);
  // });
})
reset.addEventListener("click",() => {
  brightness = "100";
  saturate = "100";
  contrast = "100";
  invert = "0";
  blur = "0";
  rotate = 0;
  flip_x = 1;
  flip_y = 1;
  imgSrc.style.transform = `rotate(${rotate}deg) scale(${flip_x}, ${flip_y})`;
  imgSrc.style.filter = `brightness(${brightness}%) contrast(${contrast}%) saturate(${saturate}%) invert(${invert}%) blur(${blur}px)`;
});

// document.getElementById('downloadBtn').addEventListener('click', function() {
//   const image = document.getElementById('image1');
//   const link = document.createElement('a');
//   link.download = 'edited-image.jpg'; // Desired file name
//   link.href = image.src; // Get image source URL
//   link.click(); // Simulate click to download
// });

// const canvas = document.getElementById('myCanvas');
// const ctx = canvas.getContext('2d');

// document.getElementById('downloadBtn').addEventListener('click', function() {
//   // Convert the canvas content to a data URL
//   const link = document.createElement('a');
//   link.download = 'edited-image.png'; // Desired file name
//   link.href = canvas.toDataURL(); // Get image data as a PNG
//   link.click(); // Simulate click to download
// });


document.getElementById("downloadBtn").addEventListener("click", function () {
  // Convert the canvas content to a data URL

  const canvas = document.createElement("canvas");
  const ctx = canvas.getContext("2d");
  canvas.width = imgSrc.naturalWidth;
  canvas.height = imgSrc.naturalHeight;

  ctx.filter = `brightness(${brightness}%) contrast(${contrast}%) saturate(${saturate}%) invert(${invert}%) blur(${blur}px)`;
  ctx.translate(canvas.width / 2, canvas.height / 2);

  ctx.scale(flip_x, flip_y);

  if (rotate != 0) {
    ctx.rotate((rotate * Math.PI) / 180);
  }

  ctx.drawImage(
    imgSrc,
    -canvas.width / 2,
    -canvas.height / 2,
    canvas.width,
    canvas.height
  );
  // document.body.appendChild(canvas);

  const link = document.createElement("a");
  link.download = "image.png";
  link.href = canvas.toDataURL();
  link.click();
});

