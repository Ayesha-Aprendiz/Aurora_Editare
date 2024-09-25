<?php
    include('dbconn.php');
    if(isset($_POST['submit']))
    {
        echo "<script> alert('running php')</script>";
        if($_FILES["image"]["error"] == 4)
        {
            echo "Image not exist";
        }
        else
        {
            $file_name = $_FILES['image']["name"];
            $file_size = $_FILES['image']['size'];
            $tempname = $_FILES['image']['tmp_name'];
            $folder= 'Pictures/'. $file_name;
        
            // $validimage_Extension = array('jpg', 'jpeg', 'png');
            // $imageExtension = explode('.',$file_name);
            // $imageExtension = strtolower(end($imageExtension));

            
            // if(!in_array($imageExtension,$validimage_Extension))
            // {
            //     echo "Ivalid image extension";
            // }
            // else{
                // $newimageName = uniqid();
                // $newimageName .= '.'.$imageExtension;

                //move_uploaded_file($tempname,$folder);
                if(move_uploaded_file($tempname,$folder))
        {
            echo "File uploaded";
        }
        else{
            echo "file not uploaded";
        }
                $query ="Insert into Images Values('','$file_name')";
                mysqli_query($conn,$query);
                if ($conn->query($query) === TRUE) 
                {
                    echo "New record created successfully";
                } else 
                {
                echo "Error: " . $sql . "<br>" . $conn->error;
                }
            }
            // $img_name = $_FILES['image']['name'];
            // $folder = 'Pictures/'.$img_name; 

        
        
        /*$query= mysqli_query($conn,"Insert into Images (file) values ('$file_name')");
        
        */
    }
?>