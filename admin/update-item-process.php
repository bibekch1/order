
        <?php

            include('../config/constants.php');

            
            if(isset($_POST['submit']))
            {
                //1. get all the value from form
                $id=$_POST['id'];
                $name=mysqli_real_escape_string($conn, $_POST['name']);
                $description=mysqli_real_escape_string($conn, $_POST['description']);
                $price=mysqli_real_escape_string($conn, $_POST['price']);
                $current_image=$_POST['current_image'];
                $active=$_POST['active'];

                //2. updating new image if selected

                //check if image is selected or not
                if(isset($_FILES['image']['name']))
                {
                    //get the image name
                    $image_name=$_FILES['image']['name'];

                    //check if image is available or not
                    if($image_name !="")
                    {
                        //image available
                        //A. upload the new image
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
                            header('location:'.SITEURL.'admin/add-food.php'); // redirect to add food page
                            die();
                        }
                        //B. remove current image
                        if($current_image != "")
                        {
                            $remove_path= "../image/menu/".$current_image;

                            $remove = unlink($remove_path);

                            //check if image is removed or not 
                            // if faild to remove display message and stoop process
                            if($remove==false)
                            {
                                //failed to remove image
                                $_SESSION['failed-remove']="<div class='error'>Failed to remove current image.</div>";
                                header('location:'.SITEURL.'admin/manage-menu.php');//redirect to manage menu page
                                die(); // stop process
                            }
                        }
                    
                    }
                    else
                    {
                        $image_name=$current_image;
                    }
                }
                else
                {
                    $image_name=$current_image;
                }

                //3. update the database
                $sql2="UPDATE tbl_menu SET
                        name='$name',
                        description='$description',
                        price=$price,
                        image_name='$image_name',
                        active='$active'
                        WHERE id=$id
                        ";
                //execute query
                $res2= mysqli_query($conn, $sql2);


                //4. redirect to manage menu page with message
                //check if query wxecuted or not
                if($res2==true)
                {
                    //item updated
                    $_SESSION['update']="<div class='success'>Item updated succesfully.</div>";
                    header('location:'.SITEURL.'admin/manage-menu.php');
                }
                else
                {
                    //failed to update menu
                    $_SESSION['update']="<div class='error'>Failed to updated item.</div>";
                    header('location:'.SITEURL.'admin/manage-menu.php');
                }
            }
        ?>
