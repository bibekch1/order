<?php include('partials/header.php'); ?>
    <!-- main content section starts here -->
    <section class="main-content" >
        <div class="wrapper">
            <h1 class="heading">dashboard</h1>

            <?php
                if(isset($_SESSION['login']))
                {
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }
            ?>

            <div class="col-4">

                <?php
                    //sql query
                    $sql = "SELECT * FROM tbl_menu";
                    //execute query
                    $res = mysqli_query($conn, $sql);
                    //count rows
                    $count = mysqli_num_rows($res);
                ?>
                <h3><?php echo $count; ?></h3>
                foods
            </div>

            <div class="col-4">

                <?php
                    //sql query
                    $sql2 = "SELECT * FROM tbl_offer";
                    //execute query
                    $res2 = mysqli_query($conn, $sql2);
                    //count rows
                    $count2 = mysqli_num_rows($res2);
                ?>
                <h3><?php echo $count2; ?></h3>
                offers
            </div>
            
            <div class="col-4">

                <?php
                    //sql query
                    $sql3 = "SELECT * FROM tbl_review";
                    //execute query
                    $res3 = mysqli_query($conn, $sql3);
                    //count rows
                    $count3 = mysqli_num_rows($res3);
                ?>
                <h3><?php echo $count3; ?></h3>
                reviews
            </div>
            <div class="clearfix"></div>
        </div>

        <div class="wrapper">
            
            <div class="col-4">

                <?php
                    //sql query
                    $sql4 = "SELECT * FROM tbl_reservation";
                    //execute query
                    $res4 = mysqli_query($conn, $sql4);
                    //count rows
                    $count4 = mysqli_num_rows($res4);
                ?>
                <h3><?php echo $count4; ?></h3>
                total reservation
            </div>

            <div class="col-4">

                <?php
                    //sql query
                    $sql5 = "SELECT * FROM tbl_order";
                    //execute query
                    $res5 = mysqli_query($conn, $sql5);
                    //count rows
                    $count5 = mysqli_num_rows($res5);
                ?>
                <h3><?php echo $count5; ?></h3>
                total orders
            </div>

            <div class="col-4">

                <?php
                    //create sql query to get total revenue generated
                    //aggregate function in sql
                    $sql6 = "SELECT SUM(total) AS Total FROM tbl_order WHERE status='delivered'";

                    //execute the query
                    $res6 = mysqli_query($conn, $sql6);

                    //get the value
                    $row6 = mysqli_fetch_assoc($res6);

                    //get the total revenue
                    $total_revenue = $row6['Total'];
                ?>
                <h3>Rs.<?php echo $total_revenue; ?></h3>
                revenue generated
            </div>

            <div class="clearfix"></div>
        </div>
        

    </section>

    <!-- main content section ends here -->
    
    <?php include('partials/footer.php'); ?>