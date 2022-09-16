<?php include('partials/header.php'); ?>



<section class="main-content">

    <div class="wrapper">

        <h1 class="heading">add offer</h1>

        <?php

            if(isset($_SESSION['offer']))
            {
                echo $_SESSION['offer'];
                unset($_SESSION['offer']);
            }
        ?>


        <form action="" method="POST">
            
                <div  class="input-box">
                    <div class="input">tile</div>
                    <div class="input"><input type="text" name="title" placeholder="enter offer title" required></div>
                </div>

                <div  class="input-box">
                    <div class="input">description</div>
                    <div class="input"><textarea type="text" name="description" placeholder="write description" required></textarea></div>
                </div>

              
                <div  class="input-box">
                    <div class="input">active</div>
                    <div class="input"><input type="radio" name="active" value="yes">yes</div>
                    <div class="input"><input type="radio" name="active" value="no">no</div>
                </div>

                <input type="submit" name="submit" value="add offer" class="btn">
                   
        </form>

        <?php

            //process the value from form and add into database

            //check if submit button click or not
            if(isset($_POST['submit']))
            {
                //1. get data from form
                $title=mysqli_real_escape_string($conn, $_POST['title']);
                $description=mysqli_real_escape_string($conn, $_POST['description']);

                //for radio input, check if radio button is selected or not
               
                if(isset($_POST['active']))
                {
                    $active=$_POST['active'];
                }
                else
                {
                    $active="no";
                }

                //2. create query to add data into database
                $sql="INSERT INTO tbl_offer SET
                title='$title',
                description='$description',
                active='$active'
                ";

                //3. execute query to add data into database
                $res=mysqli_query($conn, $sql);

                //4. check if query executed or not and display message
                if($res==true)
                {
                    //data added into database
                    $_SESSION['offer']="<div class='success'>Offer added succesfully.</div>";
                    header('location:'.SITEURL.'admin/manage-offers.php');//redirect to manage offer page
                }
                else
                {
                    //failed to add data
                    $_SESSION['offer']="<div class='error'>Failed to add offer.</div>";
                    header('location:'.SITEURL.'admin/add-offers.php');//redirect to addd offer page
                }
            }
        ?>

    </div>
</section>





<?php include('partials/footer.php'); ?>

