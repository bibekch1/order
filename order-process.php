    <?php
        include('config/constants.php');

        //check whether submit button is clicked or not
        if(isset($_POST['submit']))
        {
            
            //get the details from the form
            $food1= $_POST['food_name1'];
            $price1= $_POST['price1'];
            $quantity1= $_POST['quantity1'];
            $food2= $_POST['food_name2'];
            $price2= $_POST['price2'];
            $quantity2= $_POST['quantity2'];

            $total = ($price1*$quantity1) + ($price2*$quantity2);//total price

            $order_date= date("Y-m-d h:i:sa");//order date

            $status= "ordered"; //ordered, on delivery, delivered, cancelled

            $customer_name= mysqli_real_escape_string($conn, $_POST['customer_name']);
            $customer_number= mysqli_real_escape_string($conn, $_POST['customer_number']);
            $customer_email= mysqli_real_escape_string($conn, $_POST['customer_email']);
            $customer_address= mysqli_real_escape_string($conn, $_POST['customer_address']);
            $message= mysqli_real_escape_string($conn, $_POST['message']);


            //save the order in database
            //create sql to save the data
            $sql3 = "INSERT INTO tbl_order SET
                food1 = '$food1',
                price1 = $price1,
                quantity1 = $quantity1,
                food2 = '$food2',
                price2 = $price2,
                quantity2 = $quantity2,
                total = $total,
                order_date = '$order_date',
                status = '$status',
                customer_name = '$customer_name',
                customer_number = '$customer_number',
                customer_email = '$customer_email',
                customer_address = '$customer_address',
                message = '$message'
            
            ";

            //execute querry
            $res3 = mysqli_query($conn, $sql3);

            //check if query executed or not
            if($res3==true)
            {
                //order saved
                $_SESSION['order']= "<div class='success'>Food ordered successfully.</div>";
                header('location:'.SITEURL);
            }
            else
            {
                //failed to save order
                $_SESSION['order']= "<div class='error'>Failed to order Food.</div>";
                header('location:'.SITEURL);
            }


        }
    ?>