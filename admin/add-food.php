<?php include('partials/header.php'); ?>

<section class="main-content">

    <div class="wrapper">

        <h1 class="heading">add food</h1>

        <?php
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }
            if(isset($_SESSION['upload']))
            {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }
        ?>

        <form action="" method="POST" enctype="multipart/form-data">
            
            <div  class="input-box">
                <div class="input">name</div>
                <div class="input"><input type="text" name="name" placeholder="enter food name" required></div>
            </div>

            <div  class="input-box">
                <div class="input">description</div>
                <div class="input"><textarea type="text" name="description" placeholder="write description" required></textarea></div>
            </div>

            <div  class="input-box">
                <div class="input">price</div>
                <div class="input"><input type="number" name="price" placeholder="enter price" required></div>
            </div>

            <div  class="input-box">
                <div class="input">active</div>
                <div class="input"><input type="radio" name="active" value="yes">yes</div>
                <div class="input"><input type="radio" name="active" value="no">no</div>
            </div>

            <div  class="input-box">
                <div class="input">image</div>
                <div class="input"><input type="file" class="image" name="image"></div>
            </div>

            <input type="submit" name='submit' value="add food" class="btn">
   
        </form>

        <?php
            if(isset($_POST['submit']))
            {
                //1. get the value from add food form
                $name=mysqli_real_escape_string($conn, $_POST['name']);
                $description=mysqli_real_escape_string($conn, $_POST['description']);
                $price=mysqli_real_escape_string($conn, $_POST['price']);

                //for radio input, check whether the button is selected or not
                if(isset($_POST['active']))
                {
                    $active=$_POST['active'];
                }
                else
                {
                    $active="no";
                }
                //check whether image is selected or not and set the value for image name accordingly
                // print_r($_FILES['image']);
                // die();
                if(isset($_FILES['image']['name']))
                {
                    //upload the image
                    //to upload image we need image image name, source path and destination path
                    $image_name=$_FILES['image']['name'];

                    //upload the image only if image is selected
                    if($image_name != "")
                    {

                        //Auto rename image
                        //get the extention of our image(.jpg, .pgn, .gif, etc) eg. spefood1.jpg
                        $ext = end(explode('.', $image_name));

                        //rename image
                        $image_name = "menu_food_".rand(000,999).'.'.$ext; //eg. menu_food_345.jpg

                        $source_path =$_FILES['image']['tmp_name'];

                        $destination_path="../image/menu/".$image_name;

                        //finally upload image
                        $upload = move_uploaded_file($source_path, $destination_path);

                        //check whether the mage is uploaded or not
                        //And if the image is not uplosded then stop the process and redirect with error message
                        if($upload==false)
                        {
                            $_SESSION['upload']="<div class='error'> Failed to upload Image.</div>";
                            header('location:'.SITEURL.'admin/add-menu.php'); // redirect to add admin page
                            die();
                        }
                    }
                }
                else
                {
                    //don't upload the image and set the imahe_name value as blank
                    $image_name="";
                }

                //2.create a query to insert  food into database
                $sql = "INSERT INTO tbl_menu SET
                name='$name',
                description='$description',
                price=$price,
                image_name='$image_name',
                active='$active'   
                ";

                //3.execute the querry and save the database
                $res=mysqli_query($conn, $sql);

                //4. check whether the query executd or not and data added or not
                if($res==true)
                {
                    //query executed and food added
                    $_SESSION['add']="<div class='success'>Food added successfully.</div>";
                    header('location:'.SITEURL.'admin/manage-menu.php');//redirect to manage menu page
                }
                else
                {
                    //fail to add food
                    $_SESSION['add']="<div class='error'>Failed to add Food.</div>";
                    header('location:'.SITEURL.'admin/add-food.php');//redirect to add food page
                }

            }
        ?>

    </div>
</section>

<?php include('partials/footer.php'); ?>



