<!-- offer section starts here -->
<section class="offer" id="offer" >
    <h3 class="sub-heading">offers</h3>
    <h1 class="heading">our offline offers</h1>

    
    <div class="box-container">


    <?php
                //create querry to display menu items from database
                $sql = "SELECT * FROM tbl_offer WHERE active='yes' ";
                //execute the query
                $res = mysqli_query($conn, $sql);
                //count rows to check if menu item is available or not
                $count = mysqli_num_rows($res);

                if($count>0)
                {
                    //item available
                    while($row=mysqli_fetch_assoc($res))
                    {
                        //set the value like id, name, image_name
                        $id = $row['id'];
                        $title = $row['title'];
                        $description = $row['description'];
                        
                        ?>

                        <div class="box">
                            <h3><?php echo $title; ?></h3>
                            <p><?php echo $description; ?></p>
                        </div>


                        <?php
                    }
                }
                else
                {
                    //item not available
                    echo "<div class='error'>Offer not added.</div>";
                }
            ?>

        

    

       
    </div>
</section>
<!-- offer section ends here -->
