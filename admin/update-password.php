<?php include('partials/header.php'); ?>

<section class="main-content">
    <div class="wrapper">
        <h1 class="heading">Change password</h1>
        
        <?php 
            if(isset($_GET['id']))
            {
                $id=$_GET['id'];
            }
        ?>

        <form action="" method="POST">
            <table class="tbl-30">
                <div class="input-box">
                    <div class="input">current password</div>
                    <div class="input"><input type="password" name="current_password" placeholder="current password" required></div>
                </div>

                <div class="input-box">
                    <div class="input">new password</div>
                    <div class="input"><input type="password" name="new_password" placeholder="new password" required></div>
                </div>

                <div class="input-box">
                    <div class="input">conform password</div>
                    <div class="input"><input type="password" name="conform_password" placeholder="conform password" required></div>
                </div>

               
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <input type="submit" name="submit" value="change password" class="btn">
            </table>      
        </form>

        <?php
            //1. check whether the submit button worked or not 
            if(isset($_POST['submit']))
            {
                //button clicked
                
                //1. get data from form
                $id=$_POST['id'];
                $current_password=md5($_POST['current_password']);
                $new_password=md5($_POST['new_password']);
                $conform_password=md5($_POST['conform_password']);

                //2. check whether the user with current password and id exist or not
                $sql= "SELECT * FROM tbl_admin WHERE id=$id AND password='$current_password'";
                //execute query
                $res = mysqli_query($conn, $sql);

                if($res==true)
                {
                    //check whether data is available or not
                    $count= mysqli_num_rows($res);

                    if($count==1)
                    {
                        //user exist and password can be changed
                        // echo "user found";
                        if($new_password==$conform_password)
                        {
                            //update password
                            $sql2 = "UPDATE tbl_admin SET
                            password= '$new_password'
                            WHERE id=$id
                            ";

                            //Execute the query
                            $res2 = mysqli_query($conn, $sql2);

                            //check whether querry executed or not
                            if($res2==true)
                            {
                                //Dislpay successs message
                                $_SESSION['change-pwd']="<div class='success'>Password change succesfully.</div>";
                                header("location:".SITEURL.'admin/manage-admin.php'); //redirect
                            }
                            else
                            {
                                //Display Error message
                                $_SESSION['change-pwd']="<div class='error'>Failed to  change password.</div>";
                                header("location:".SITEURL.'admin/manage-admin.php'); //redirect
                            }
                        }
                        else
                        {
                            //redirect to manage admin page with error message
                            $_SESSION['password-not-match']="<div class='error'>password not match.</div>";
                            header("location:".SITEURL.'admin/manage-admin.php'); //redirect
                        }
                    }
                    else
                    {
                        //user does not exist set message and redirect
                        $_SESSION['user-not-found']="<div class='error'>user not found.</div>";
                        header("location:".SITEURL.'admin/manage-admin.php'); //redirect
                    }
                }
                else
                {
                    echo "error";
                }

                //3. check whether current , new password and conform password is match or not 

                //4. change if all of the above is true
            }
        ?>

        
    </div>
</section>


<?php include('partials/footer.php'); ?>

