<?php include ('partials/header.php');
?>

<section class="main-content">
    <div class="wrapper">
        <h1 class="heading">update item</h1>

        <?php

            //check whether the id is set or not
            if(isset($_GET['id']))
            {
                //get the id and other details 
                $id=$_GET['id'];

                //create sql query to get all the details
                $sql="SELECT * FROM tbl_menu WHERE id=$id";

                //execute querry
                $res= mysqli_query($conn, $sql);

                //count the rows to check if id is valid or not
                $count=mysqli_num_rows($res);

                if($count==1)
                {
                    //get all data
                    $row =mysqli_fetch_assoc($res);

                    $name=$row['name'];
                    $description=$row['description'];
                    $price=$row['price'];
                    $current_image=$row['image_name'];
                    $active=$row['active'];
                }
                else
                {
                    //redirect to manage menu with message
                    $_SESSION['no-item-found']="<div class='error'>Item not found</div>";
                    header('location:'.SITEURL.'admin/manage-menu.php');
                }
            }
            else
            {

                header('location:'.SITEURL.'admin/manage-menu');//redirect to manage menu
            }

        ?>


        <form action="update-item-process.php" method="POST" enctype="multipart/form-data">
           
                <div class="input-box">
                    <div class="input">name</div>
                    <div class="input"><input type="text" name="name" value="<?php echo $name; ?>" required></div>
                </div>

                <div class="input-box">
                    <div class="input">description</div>
                    <div class="input"><textarea type="text" name="description" value="" required><?php echo $description; ?></textarea></div>
                </div>

                <div class="input-box">
                    <div class="input">price</div>
                    <div class="input"><input type="number" name="price" value="<?php echo $price; ?>" required></div>
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
                                <img src="<?php echo SITEURL; ?>image/menu/<?php echo $current_image; ?>" width="50px">
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

                <div class="input-box">
                    <div class="input">new image</div>
                    <div class="input"><input type="file" class="image" name="image"></div>
                </div>

                <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <input type="submit" name='submit' value="update item" class="btn">

                
            </table>
        </form>



        
    </div>
</section>





<?php include('partials/footer.php'); ?>

        

