<?php include('partials-front/header.php'); ?>






<!-- <?php
    //check if food id is set or not
    if(isset($_GET['food_id']))
    {
        //get the food d and details of the selected food
         $food_id = $_GET['food_id'];
    }
    else
    {
        $food_id = "";
    }

    //check if selectid1 is set or not
    if(isset($_GET['selectedId1']))
    {
        $selectedId1 = $_GET['selectedId1'];
    }
    else
    {
        $selectedId1 = "";
    }

    //check if selectid1 is set or not
    if(isset($_GET['selectedId2']))
    {
        $selectedId2 = $_GET['selectedId2'];
    }
    else
    {
        $selectedId2 = "";
    }
    
    
?> -->

<section class="order" id="order" style="margin-top:6rem;">
    <h3 class="sub-heading">order now</h3>
    <h1 class="heading">free and fast</h1>


<!-- order section starts here -->


    <form action="order-process.php" method="POST">

        <div class="inputbox">

            <div class="input">
                <div class="food">
                    
                    <div class="details">
                        <span>order</span>
                        <select name="food1" id="food1" onchange="selectId1();" required >

                            <option value="">select food</option>
                            
                            <?php
                                //create query to display food list
                                //1. create sql query to get data
                                $sql = "SELECT * FROM tbl_menu WHERE active='yes'";

                                //execute query
                                $res = mysqli_query($conn, $sql);

                                //count rows if we have items or not
                                $count= mysqli_num_rows($res);

                                if($count>0)
                                {
                                    //we have food item in database
                                    while($row = mysqli_fetch_assoc($res))
                                    {
                                        //get the details of categories
                                        $id= $row['id'];
                                        $name = $row['name'];
                                        $price = $row['price'];
                                        $image_name = $row['image_name'];
                                        
                                        //for id from menu page
                                        if($id==$food_id)
                                        {
                                            ?>
                                            <option value="<?php echo $id; ?>" selected><?php echo $name; ?></option>

                                            <?php

                                        }
                                        if ($id==$selectedId1) //for id from order
                                        {
                                            ?>
                                                <option value="<?php echo $id; ?>" selected><?php echo $name; ?></option>

                                            <?php
                                        }
                                         else //if nothing isselected
                                        {
                                            ?>
                                                <option value="<?php echo $id; ?>"><?php echo $name; ?></option>
                                            <?php
                                        }
                                    }
                                    
                               }
                                else
                                {
                                    //we donot have food
                                    ?>
                                        <option value="0">No item found</option>
                                    <?php
                                }

                            ?>
                            
                        </select>
                        
                        <?php
                            //if food is selected from menu page
                            if($food_id != "")
                            {
                                 //get data of selected id
                                 //create sql querry to select data from database of selected id
                                 $sql1="SELECT * FROM tbl_menu WHERE id=$food_id";
                                //execute query
                                 $res1=mysqli_query($conn, $sql1);
                                //count rows
                                 $count1= mysqli_num_rows($res1);
 
                                 if($count1==1)
                                 {
                                     $row1= mysqli_fetch_assoc($res1);
                                     $name1=$row1['name'];
                                     $price1=$row1['price'];
                                     $image_name1=$row1['image_name'];
                                     ?>
                                        <input type="hidden" name="food_name1" value="<?php echo $name1; ?>">
                                         <p>Rs.<?php echo $price1; ?></p>
                                         <input type="hidden" name="price1" value="<?php echo $price1; ?>">
                                         <span>quantity</span>
                                         <input type="number" name="quantity1" value="1" required>
                                     </div>
                                     <div class="image">
                                         <img src="<?php echo SITEURL; ?>image/menu/<?php echo $image_name1; ?>" alt="">
                                     </div>
 
                                     <?php
                                 }
                            }
                            else
                            {
                                //check if food is selected or not
                                if($selectedId1 != "")
                                {
                                    
                                    //get data of selected id
                                    //create sql querry to select data from database of selected id
                                    $sql1="SELECT * FROM tbl_menu WHERE id=$selectedId1";
                                    //execute sql query
                                    $res1=mysqli_query($conn, $sql1);
                                    //cout row
                                    $count1= mysqli_num_rows($res1);

                                    if($count1==1)
                                    {
                                        $row1= mysqli_fetch_assoc($res1);
                                        $name1=$row1['name'];
                                        $price1=$row1['price'];
                                        $image_name1=$row1['image_name'];
                                        ?>
                                            <input type="hidden" name="food_name1" value="<?php echo $name1; ?>">
                                            <p>Rs.<?php echo $price1; ?></p>
                                            <input type="hidden" name="price1" value="<?php echo $price1; ?>">
                                            <span>quantity</span>
                                            <input type="number" name="quantity1" value="1" required>
                                        </div>
                                        <div class="image">
                                            <img src="<?php echo SITEURL; ?>image/menu/<?php echo $image_name1; ?>" alt="">
                                        </div>

                                        <?php
                                    }
                                }
                                else
                                {
                                    //show default data
                                    ?>
                                        <input type="hidden" name="food_name1" value="">
                                        <p>Rs.0</p>
                                        <input type="hidden" name="price1" value="0">
                                        <span>quantity</span>
                                        <input type="number" name="quantity1" value="1" required>
                                    </div>
                                        <div class="image">
                                        <span>photo of selected item</span>
                                        <!-- <img src="" alt=""> -->
                                    </div>
                                    <?php
                                }
                            }
                            
                        ?>
                        
                </div>    
            </div>

            <div class="input">
                <div class="food">
                    
                    <div class="details">
                        <span>additional order</span>

                        <select name="food2" id="food2" onchange="selectId2();" >
                            
                            <option value="">select food</option>
                            <?php

                                //create query to display second food list
                                //1. create sql query to get data
                        

                                //execute query
                                $res2 = mysqli_query($conn, $sql);

                                //count rows if we have items or not
                                $count2= mysqli_num_rows($res2);


                                if($count2>0)
                                    {
                                        //we have food item in database
                                        while($row2 = mysqli_fetch_assoc($res2))
                                        {
                                            //get the details of categories
                                            $id2= $row2['id'];
                                            $name2 = $row2['name'];
                                            $price2 = $row2['price'];
                                            $image_name2 = $row2['image_name'];
                                            
                                            //check if second food is selected or not
                                            if($id2==$selectedId2)
                                            {
                                                //if food is selected
                                                ?>
                                                <option value="<?php echo $id2; ?>" selected><?php echo $name2; ?></option>
                                                <?php
                                            }
                                            else
                                            {
                                                //if food is not selected
                                                ?>
                                                <option value="<?php echo $id2; ?>"><?php echo $name2; ?></option>
                                                <?php
                                            }
                                            
                                        }
                                        
                                    }
                                    else
                                    {
                                        //wed donot have food
                                        ?>
                                            <option value="0">No item found</option>
                                        <?php
                                    }
                                ?>
                        </select>
                        
                        <?php
                        //check if second foood is selected or not
                        if($selectedId2 != "")
                        {
                            
                            //get data of selected id
                            $sql2="SELECT * FROM tbl_menu WHERE id=$selectedId2";
                            //execute query
                            $res2=mysqli_query($conn, $sql2);
                            //count the row
                            $count2= mysqli_num_rows($res2);

                            if($count2==1)
                            {
                                //get data of selected food
                                $row2= mysqli_fetch_assoc($res2);
                                $name3 =$row2['name'];
                                $price2=$row2['price'];
                                $image_name2=$row2['image_name'];
                                ?>
                                    <input type="hidden" name="food_name2" value="<?php echo $name3; ?>">
                                    <p>Rs.<?php echo $price2; ?></p>
                                    <input type="hidden" name="price2" value="<?php echo $price2; ?>">
                                    <span>quantity</span>
                                    <input type="number" name="quantity2" value="1" required>
                                </div>
                                <div class="image">
                                    <img src="<?php echo SITEURL; ?>image/menu/<?php echo $image_name2; ?>" alt="">
                                </div>

                                <?php
                            }
                        }
                        else
                        {
                            //show default data
                            ?>
                                <input type="hidden" name="food_name2" value="">
                                <p>Rs.000</p>
                                <input type="hidden" name="price2" value="0">
                                <span>quantity</span>
                                <input type="number" name="quantity2" value="1" >
                            </div>
                                <div class="image">
                                <span>photo of selected item</span>
                                <!-- <img src="" alt=""> -->
                            </div>
                            <?php
                        }
                             
                        ?>

                        
                </div>
                
                
            </div>

        </div>


        <div class="inputbox">

            <div class="input">
                <span>name</span>
                <input type="text" name="customer_name" placeholder="enter your name" required>
            </div>
            <div class="input">
                <span>number</span>
                <input type="tel" name="customer_number" pattern="{0-9}{10}" placeholder="eg. 9842******" required>
            </div>

        </div>


        <div class="inputbox">

            <div class="input">
                <span>email</span>
                <input type="email" name="customer_email" placeholder="eg. abc123@realtest.com" required>
            </div>
            <div class="input">
                <span>date and time</span>
                <input type="datetime-local" name="order_date" required>
            </div>

        </div>

        <div class="inputbox">

            <div class="input">
                <span>address</span>
                <textarea name="customer_address" placeholder="enter your address" name="address"  id="" cols="30" rows="10" required></textarea>
            </div>
            <div class="input">
                <span>your message</span>
                <textarea name="message" placeholder="enter your address" name="message" id="" cols="30" rows="10"></textarea>
            </div>

        </div>
        <input type="submit" name="submit" value="conform order" class="btn">

    </form>

    

    
</section>
<!-- order section ends here -->

<?php include('partials-front/footer.php'); ?>

<!-- javascript to show data of selected food -->
<script >
    function selectId1()
    {
        var selectedId1 = document.getElementById('food1').value;
        var selectedId2 = document.getElementById('food2').value;
        window.location="<?php echo SITEURL; ?>order.php?selectedId1="+selectedId1+"&selectedId2="+selectedId2;
    }

    function selectId2()
    {
        var selectedId1 = document.getElementById('food1').value;
        var selectedId2 = document.getElementById('food2').value;
        window.location="<?php echo SITEURL; ?>order.php?selectedId1="+selectedId1+"&selectedId2="+selectedId2;
                                   
    }
                                                            
</script>