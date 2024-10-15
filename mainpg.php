
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main_pg.css">
    <link rel="stylesheet" href="css/downloadBtn.css">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&display=swap');
    </style>    
    <!-- <link rel="stylesheet" href="removeButton.css"> -->
    <!-- <script src="js/editor.js"> </script> -->
    <title></title>
</head>
<body >
    <div class="sidebar">
        <div class="logo">
            <ul class="menu">
                <li class="menu-item active" data-target="Basics">
                     <img src="images/Basics_icon.png" alt="Basics Icon" class="icon"/> </li>
                <li class="menu-item" data-target="Text">
                    <img src="images/text_icon.png" alt="Text Icon" class="icon"/></li>
                <li class="menu-item" data-target="Filters">
                    <img src="images/Filters_icon.png" alt="Filters Icon" class="icon"/></li>
                <li class="menu-item" data-target="Drawing">
                    <img src="images/Drawing_icon.png" alt="Drawing Icon" class="icon"/></li>
                <li class="menu-item" data-target="Shapes">Shapes</li>
                <li class="menu-item" data-target="backgrounds">Backgrounds</li>
            </ul>
        </div>
    </div> 

    <div id="content">
        <div id="Basics" class="content-section active">
            <h1 >Basics</h1>
            
            <div class="icons_filter">
                 <h3>rotate & flip</h3>
                <div class="icons_room1">
                    <div class="iconItems" id="rotate_left">
                        <button title="rotate_left" ><img src="images/Rotate_Left_Icon.png" alt="" /></button>
                        <h4> Rotate Left</h4>
                    </div> 
                    <div class="iconItems" id="rotate_right">
                        <button title="rotate_right" ><img src="images/Rotate_Right_Icon.png" alt="" /></button>
                        <h4> Rotate Right </h4>
                    </div>
                    <div class="iconItems" id="flip_x">
                        <button title="flip_x"><img src="images/flip_x_icon.png" alt="" /></button>
                        <h4> Flip_x</h4>
                    </div>
                    <div class="iconItems" id="flip_y">
                        <button title="flip_y" ><img src="images/flip_y_icon.png" alt="" /></button>
                        <h4> Flip_y</h4>
                    </div>
                </div>
            </div>
        </div>
    
        <div id="Text" class="content-section">
            <h1>Templates</h1>
            <p>Your templates content goes here.</p>
        </div>
        <div id="Filters" class="content-section">
            <h1>Filters</h1>
            <div class="icons_filter">
            <h3>Filters</h3>
                <div class="icons_room">
                <div class="iconItems" id="brightness">
                    <button title="Brightness">
                    <img src="images/Brightness_icon.png" alt="Brightness icon" />
                    </button>
                    <h4>Brightness</h4>
                </div>
                <div class="iconItems" id="contrast">
                    <button title="contrast">
                    <img src="images/contrast_icon.png" alt="contrast icon" />
                    </button>
                    <h4>Contrast</h4>
                </div>
                <div class="iconItems" id="saturate">
                    <button title="saturate">
                    <img src="images/Saturation_icon.png" alt="" />
                    </button>
                    <h4>Saturate</h4>
                </div>
                <div class="iconItems" id="invert">
                    <button title="invert">
                    <img src="images/Invert_icon.png" alt="" />
                    </button>
                    <h4>Invert</h4>
                </div>
                <div class="iconItems" id="blur">
                    <button title="blur">
                    <img src="images/Blur_icon.png" alt="" />
                    </button>
                    <h4>Blur</h4>
                </div>
            </div>
         </div>  
        </div>
        <div id="Drawing" class="content-section">
            <h1>Elements</h1>
            <p>Your elements content goes here.</p>
        </div>
        <div id="Shapes" class="content-section">
            <h1>Text</h1>
            <p>Your text content goes here.</p>
        </div>
        <div id="backgrounds" class="content-section">
            <h1>Backgrounds</h1>
            <p>Your backgrounds content goes here.</p>
        </div>
    </div>
    <script src="js/sidebar_script.js"></script>
    <div class="slider">
                <div class="filter_info">
                    <span class="name"> Brightness</span>
                    <input type="range" name="" id="" max="200" min="0" class="slideInput"/>
                    <span class="value"> 100%</span>
                </div>
                
                <div class="resbtn_div">
                    <button id="reset_filters" >Remove Filters</button>
                </div>
    </div>

    <div class="wrapper">
        <!-- <canvas id="myCanvas"> -->
        <img src="images/canvasDefault.jpg" class="imgCanvas" id="image1">
        <!-- </canvas> -->
        
    </div>

    <div class="editor">
            <div class="choose_img">
                <form method="POST" enctype="multipart/form-data">
                    <div class="folder">
                        <div class="front-side">
                            <div class="tip"></div>
                            <div class="cover"></div>
                        </div>
                        <div class="back-side cover"></div>
                    </div>
                    <label class="custom-file-upload">
                    <input class="title" id="imageInput" type="file" />Choose a file</label>
                    <div id="message"> </div>
                    </div>
        <script>
            document.getElementById('imageInput').addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                const formData = new FormData();
                formData.append('image', file);

                fetch('uploadFun.php', {
                    method: 'POST',
                    body: formData,
                })
                .then(response => response.json())
                .then(data => {
                    // console.log(data.message);
                    // document.querySelector(".wrapper").innerHTML = data;
                    let img = document.querySelector(".imgCanvas");
                    img.src = data.message;
                    let removeButton = document.querySelector(".removeButtonContainer");
                    // removeButton.setAttribute("data-image")=data.message;
                    let chooseFileInput = document.querySelector(".editor");
                    chooseFileInput.style.display = "none";
                    let canvas = document.querySelector(".wrapper");

                    canvas.style.backgroundColor="transparent";
                    // console.log(chooseFileInput)
                    // chooseFileInput.style.display:"none;"
                    // document.getElementById('message').innerHTML = data;
                })
                .catch(error => {
                    console.error('Error:', error);
                });
            }
        });
    </script>
  </form>
        
</div>

     </div>


     <div class="removeButtonContainer">
        <button class="button">
            <svg xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 69 14"
                class="svgIcon bin-top" >
                <g clip-path="url(#clip0_35_24)">
                <path
                    fill="black"
                    d="M20.8232 2.62734L19.9948 4.21304C19.8224 4.54309 19.4808 4.75 19.1085 4.75H4.92857C2.20246 4.75 0 6.87266 0 9.5C0 12.1273 2.20246 14.25 4.92857 14.25H64.0714C66.7975 14.25 69 12.1273 69 9.5C69 6.87266 66.7975 4.75 64.0714 4.75H49.8915C49.5192 4.75 49.1776 4.54309 49.0052 4.21305L48.1768 2.62734C47.3451 1.00938 45.6355 0 43.7719 0H25.2281C23.3645 0 21.6549 1.00938 20.8232 2.62734ZM64.0023 20.0648C64.0397 19.4882 63.5822 19 63.0044 19H5.99556C5.4178 19 4.96025 19.4882 4.99766 20.0648L8.19375 69.3203C8.44018 73.0758 11.6746 76 15.5712 76H53.4288C57.3254 76 60.5598 73.0758 60.8062 69.3203L64.0023 20.0648Z">
                </path>
                </g>
            <defs>
                <clipPath id="clip0_35_24">
                <rect fill="white" height="14" width="69"></rect>
                </clipPath>
             </defs>
            </svg>
            <svg
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 69 57"
                class="svgIcon bin-bottom" >
                <g clip-path="url(#clip0_35_22)">
                <path
                    fill="black"
                    d="M20.8232 -16.3727L19.9948 -14.787C19.8224 -14.4569 19.4808 -14.25 19.1085 -14.25H4.92857C2.20246 -14.25 0 -12.1273 0 -9.5C0 -6.8727 2.20246 -4.75 4.92857 -4.75H64.0714C66.7975 -4.75 69 -6.8727 69 -9.5C69 -12.1273 66.7975 -14.25 64.0714 -14.25H49.8915C49.5192 -14.25 49.1776 -14.4569 49.0052 -14.787L48.1768 -16.3727C47.3451 -17.9906 45.6355 -19 43.7719 -19H25.2281C23.3645 -19 21.6549 -17.9906 20.8232 -16.3727ZM64.0023 1.0648C64.0397 0.4882 63.5822 0 63.0044 0H5.99556C5.4178 0 4.96025 0.4882 4.99766 1.0648L8.19375 50.3203C8.44018 54.0758 11.6746 57 15.5712 57H53.4288C57.3254 57 60.5598 54.0758 60.8062 50.3203L64.0023 1.0648Z">
                </path>
                </g>
            <defs>
                <clipPath id="clip0_35_22">
                <rect fill="white" height="57" width="69"></rect>
                </clipPath>
            </defs>
            </svg>
        </button>
     </div>
    <!-- <div class="down_btn" data-tooltip="">
        <div class="button-wrapper">
        <div class="text">Download</div>
            <span class="icon">
            <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="img" width="2em" height="2em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
                <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15V3m0 12l-4-4m4 4l4-4M2 17l.621 2.485A2 2 0 0 0 4.561 21h14.878a2 2 0 0 0 1.94-1.515L22 17"></path>
            </svg>
            </span>
        </div>
    </div> -->
    <!-- <button id="downloadBtn"> Download</button> -->


    <div class="container" id="downloadBtn">
  <label class="label">
    <input type="checkbox" class="input" />
    <span class="circle"
      ><svg
        class="icon"
        aria-hidden="true"
        xmlns="http://www.w3.org/2000/svg"
        fill="none"
        viewBox="0 0 24 24"
      >
        <path
          stroke="currentColor"
          stroke-linecap="round"
          stroke-linejoin="round"
          stroke-width="1.5"
          d="M12 19V5m0 14-4-4m4 4 4-4"
        ></path>
      </svg>
      <div class="square"></div>
    </span>
    <p class="title">Download</p>
    <p class="title downloadedMessage">Downloaded</p>
  </label>
</div>




    <script src="js/editor.js"></script>
</body>
</html>