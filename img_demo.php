  
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>aurora</title>
    <link rel="icon" type="image/x-icon" href="weblogo.png">

</head>
<body>
    <form method="POST" enctype="multipart/form-data" class="uploadForm">
        
        <input type="file" accept=".jpg , .jpeg , .png" name="image" class="uploadButton"/>
        <br/> 
        <noscript><button type="submit" name="submit"> Submit</button></noscript>
       
    </form>
    <div>
        
        <?php 
            $res = mysqli_query($conn, "Select * from Images");
            while($row = mysqli_fetch_assoc($res))
            {
        ?>
            <img src="Pictures/<?php echo $row['file_name'] ?>"/>
            <?php 
        break;      
        } ?>
        
    </div> 
   
        <script src="imgdemo.js">
            
        </script>

</body>
</html>
