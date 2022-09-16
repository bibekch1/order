<?php include('partials/header.php'); ?>

<section class="main-content">
    <div class="wrapper">
        <h1 class="heading">update offer</h1>


        <?php
            //1. Get the id of selected offer
            $id=$_GET['id'];

            //2. create SQL query to Get the details
            $sql="SELECT * FROM tbl_offer WHERE id=$id";

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

                    $title=$rows['title'];
                    $description=$rows['description'];
                    $active=$rows['active'];

                }
                else
                {
                    $_SESSION['no-offer-found']="<div class='error'>No offer found.</div>";
                    //redirects to manage offer page
                    header('location:'.SITEURL.'admin/manage-offer.php');
                }
            }
        ?>

        <form action="" method="POST">
            
                <div class="input-box">
                    <div class="input">title</div>
                    <div class="input"><input type="text" name="title" value="<?php echo $title; ?>" required></div>
                </div>

                <div class="input-box">
                    <div class="input">description</div>
                    <div class="input"><textarea type="text" name="description" required ><?php echo $description; ?></textarea></div>
                </div>

                <div class="input-box">
                    <div class="input">active</div>
                    <div class="input"><input <?php if($active=="yes"){echo "checked";}?> type="radio" name="active" value="yes">yes</div>
                    <div class="input"><input <?php if($active=="no"){echo "checked";}?> type="radio" name="active" value="no">no</div>
                </div>

                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <input type="submit" name="submit" value="update offer" class="btn">

        </form>


        <?php
            //check whether the submit button is clicked or not
            if(isset($_POST['submit']))
            {
                //Get all the value from form update
                $id= $_POST['id'];
                $title=mysqli_real_escape_string($conn, $_POST['title']);
                $description=mysqli_real_escape_string($conn, $_POST['description']);
                $active=$_POST['active'];

                //creat SQL querry to update offer
                $sql = "UPDATE tbl_offer SET 
                title='$title',
                description='$description',
                active='$active'

                WHERE id= '$id'
                ";

                //Execute the query
                $res = mysqli_query($conn, $sql);

                //Check whether the query execute succesfully or not
                if($res==true)
                {
                    //querry executed and offer updated
                    $_SESSION['update'] = "<div class='success'>Offer Updated Succesfully.</div>";
                    //Redirect page to Manage offer page
                    header('location:'.SITEURL.'admin/manage-offers.php');
                }
                else
                {
                    //faile to update offer
                    $_SESSION['update'] = "<div class='error'>Failed to Update Offer.</div>";
                    //Redirect page to Manage offer page
                    header('location:'.SITEURL.'admin/manage-offers.php');
                }

            }
        ?>

        
    </div>
</section>


<?php include('partials/footer.php'); ?>


