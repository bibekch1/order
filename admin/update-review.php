<?php include('partials/header.php'); ?>

<section class="main-content">
    <div class="wrapper">
        <h1 class="heading">update review</h1>

        <?php
            //1. Get the id of selected offer
            $id=$_GET['id'];

            //2. create SQL query to Get the details
            $sql="SELECT * FROM tbl_review WHERE id=$id";

            //Execute Query
            $res=mysqli_query($conn, $sql);

            //check whether the querry executed or not
            if($res==true)
            {
                //check whether the data is available or not 
                $count = mysqli_num_rows($res);
                //check whether we have offer data or not
                if($count==1)
                {
                    //get details
                    $rows=mysqli_fetch_assoc($res);

                    $customer_name=$rows['customer_name'];
                    $review=$rows['review'];
                    $current_image=$rows['image_name'];
                    $active=$rows['active'];
                }
                else
                {
                    $_SESSION['no-review-found']="<div class='error'>No review found.</div>";
                    //redirects to manage offer page
                    header('location:'.SITEURL.'admin/manage-review.php');
                }
            }
        ?>

        <form action="" method="POST">
            
                <div class="input-box">
                    <div class="input">customer name</div>
                    <div class="input"><input type="text" name="customer_name" value="<?php echo $customer_name; ?>" readonly></div>
                </div>

                <div class="input-box">
                    <div class="input">review</div>
                    <div class="input"><textarea type="text" name="review" readonly><?php echo $review; ?></textarea></div>
                </div>

                <div class="input-box">
                    <div class="input">active</div>
                    <div class="input"><input <?php if($active=="yes"){echo "checked";}?> type="radio" name="active" value="yes">yes</div>
                    <div class="input"><input <?php if($active=="no"){echo "checked";}?> type="radio" name="active" value="no">no</div>
                </div>

                <div class="input-box">
                    <div class="input">current image</div>
                    <div class="input">
                        <?php

                            if($current_image != "")
                            {
                                //display image
                                ?>
                                <img src="<?php echo SITEURL; ?>image/customer/<?php echo $current_image; ?>" width="50px">
                                <?php
                            }
                            else
                            {
                                //display message
                                echo "<div class='error'>Image not added.</div>";
                            }
                        ?>
                    </div>
                </div>

                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <input type="submit" name="submit" value="update review" class="btn">

        </form>

        <?php
            //check whether the submit button is clicked or not
            if(isset($_POST['submit']))
            {
                //Get all the value from form update
                $id= $_POST['id'];
                $customer_name=mysqli_real_escape_string($conn, $_POST['customer_name']);
                $review=mysqli_real_escape_string($conn, $_POST['review']);
                $active=$_POST['active'];

                //creat SQL querry to update offer
                $sql = "UPDATE tbl_review SET 
                customer_name='$customer_name',
                review='$review',
                active='$active'

                WHERE id= '$id'
                ";

                //Execute the query
                $res = mysqli_query($conn, $sql);

                //Check whether the query execute succesfully or not
                if($res==true)
                {
                    //querry executed and offer updated
                    $_SESSION['update'] = "<div class='success'>review Updated Succesfully.</div>";
                    //Redirect page to Manage review page
                    header('location:'.SITEURL.'admin/manage-review.php');
                }
                else
                {
                    //faile to update offer
                    $_SESSION['update'] = "<div class='error'>Failed to Update review.</div>";
                    //Redirect page to Manage review page
                    header('location:'.SITEURL.'admin/manage-review.php');
                }

            }
        ?>
        
    </div>
</section>

<?php include('partials/footer.php'); ?>