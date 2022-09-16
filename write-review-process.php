

   <?php

        include('config/constants.php');

        //check if submit button clicked or not
        if(isset($_POST['submit']))
        {
            //collect data from form 
            $customer_name = mysqli_real_escape_string($conn, $_POST['customer_name']);
            $review = mysqli_real_escape_string($conn, $_POST['review']);
            $active = "no";

            //check if image is set or not
            if(isset($_FILES['image']['name']))
            {
                $image_name = $_FILES['image']['name'];

                //upload image if and only if image is selected
                if($image_name !="")
                {
                    //auto rename image
                    //get extention of image
                    $ext = end(explode('.',$image_name));

                    //rename image name
                    $image_name = "customer_".rand(000,999).'.'.$ext;

                    $source_path =$_FILES['image']['tmp_name'];

                    $destination_path="image/customer/".$image_name;

                    //finally upload image
                    $upload = move_uploaded_file($source_path, $destination_path);

                    //check whether the mage is uploaded or not
                    //And if the image is not uplosded then stop the process and redirect with error message
                    if($upload==false)
                    {
                        $_SESSION['upload']="<div class='error'> Failed to upload Image.</div>";
                        header('location:'.SITEURL.'about.php'); // redirect to add about page
                        die();
                    }
                }
                else
                {
                    //don't upload the image and set the image_name value as customer-avatar.png
                     $image_name="avatar.png";
                }
            }
            else
            {
                //don't upload the image and set the image_name value as customer-avatar.png
                 $image_name="avatar.png";
            }

            //create a query to add data into the database
            $sql = "INSERT INTO tbl_review SET
                customer_name = '$customer_name',
                review = '$review',
                image_name = '$image_name',
                active = '$active'
            "; 
            
            //execute query
            $res = mysqli_query($conn, $sql);

            //check if query executed or not
            if($res==true)
            {
                //data is stored in database
                $_SESSION['submit'] = "<div class='success'>Review submitted succesfully.</div>";
                header('location:'.SITEURL);//redirect to home page
            }
            else
            {
                //not executed failed to add data into database
                $_SESSION['submit'] = "<div class='error'>Failed to submit review.</div>";
                header('location:'.SITEURL);//redirect to home page
            }

        }
    ?>
