
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="homestyle.css">
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
                    <span class="value"> 100%</span>
                </div>
                <input type="range" name="" id="" max="200" min="0" class="slideInput"/>
            </div>
    <div class="wrapper">
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
    <input class="title" id="imageInput" type="file" />
    Choose a file
  </label>
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
                .then(response => response.text())
                .then(data => {
                    document.getElementById('message').innerHTML = data;
                })
                .catch(error => {
                    console.error('Error:', error);
                });
            }
        });
    </script>
  </form>
  
  <h1>Display uploaded Image:</h1> 
<?php 
 if (isset($_FILES["image"]) && $uploadOk == 1) : echo "Hii";?>
    <img src="<?php echo $targetFile; ?>" alt="Uploaded Image">
<?php endif; ?>

            
        
</div>

     </div>
    </div>


    <script src="js/editor.js"> </script>
</body>
</html>