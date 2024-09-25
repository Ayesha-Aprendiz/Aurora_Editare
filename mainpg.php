<?php
    include('dbconn.php');
    if(isset($_POST['submit']))
    {
        if($_FILES["image"]["error"] == 4)
        {
            echo "Image not exist";
        }
        else
        {
            $file_name = $_FILES['image']["name"];
            $file_size = $_FILES['image']['size'];
            $tempname = $_FILES['image']['tmp_name'];
        
            $validimage_Extension = array('jpg', 'jpeg', 'png');
            $imageExtension = explode('.',$file_name);
            $imageExtension = strtolower(end($imageExtension));

            if(!in_array($imageExtension,$validimage_Extension))
            {
                echo "Ivalid image extension";
            }
            else{
                $newimageName = uniqid();
                $newimageName .= '.'.$imageExtension;

                move_uploaded_file($tempname, 'Pictures/'.$file_name);
                $query ="Insert into Images Values('$file_name')";
                mysqli_query($conn,$query);
                echo "<script> alert('Successfully added')</script>";

            }
            $img_name = $_FILES['image']['name'];
            $folder = 'Pictures/'.$file_name; 

        }
        
        /*$query= mysqli_query($conn,"Insert into Images (file) values ('$file_name')");
        
        if(move_uploaded_file($tempname,$folder))
        {
            echo "File uploaded";
        }
        else{
            echo "file not uploaded";
        }*/
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="homestyle.css">
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
                <li class="menu-item" data-target="Brightness">
                    <img src="images/Brightness_icon.png" alt="Brightness Icon" class="icon"/></li>
                <li class="menu-item" data-target="Filters">
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
            <h3>Filters</h3>
                <div class="icons_room">
                    <button title="contrast" id="contrast">
                    <img src="images/contrast_icon.png" alt="contrast icon" />
                    </button>
                    <button title="saturate" id="saturate">
                    <img src="images/Saturation_icon.png" alt="" />
                    </button>
                    <button title="invert" id="invert">
                    <img src="images/Invert_icon.png" alt="" />
                    </button>
                    <button title="blur" id="blur">
                    <img src="images/Blur_icon.png" alt="" />
                    </button>
            </div>
            </div>
        </div>
        <div id="Text" class="content-section">
            <h1>Templates</h1>
            <p>Your templates content goes here.</p>
        </div>
        <div id="Brightness" class="content-section">
            <h1>Brightness</h1>
            <div class="slider">
                <div class="filter_info">
                    <span class="name"> Brightness</span>
                    <span class="value"> 100%</span>
                </div>
                <input type="range" name="" id="" max="200" min="0"/>
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
    <div class="wrapper">
        <div class="editor">
           
<!--
<div class="choose_img">
<form method="POST" enctype="multipart/form-data">
<input type="file" accept=".jpg , .jpeg , .png" name="image"></input>
<label class="custom-file-upload" name+="submit" for="image">Choose a file</label>
  <div class="folder">
    <div class="front-side">
      <div class="tip"></div>
      <div class="cover"></div>
    </div>
    <div class="back-side cover"></div>
  </div>
-->
<!-- <button type="submit" name="submit" class="custom-file-upload">Choose a File</button> -->
  
  <!-- <label class="custom-file-upload" name+="submit">
  
  <input class="title" type="file"/> -->
   <!-- <input type="submit">Choose a file</input> -->
  
<!-- </label> -->
  </form>
  
  <!-- <?php 
            $res = mysqli_query($conn, "Select * from Images");
            while($row = mysqli_fetch_assoc($res))
            {
        ?>
            <img src="Pictures/<?php echo $row['file'] ?>"/>
            <?php } ?> -->

            <img src="Pictures/img3.jpeg" alt="img"/>
        
</div>

        </div>
    </div>
</body>
</html>