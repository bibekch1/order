<?php include('partials-front/header.php'); ?>


    <!-- about section starts -->    
    <section class="about" id="about" style="margin-top:6rem;">

        <h3 class="sub-heading">About Us</h3>
        <h1 class="heading">why choose us</h1>

        <?php
            if(isset($_SESSION['upload']))
            {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }
        ?>

        <div class="row">

            <div class="image">
                <img src="image/menu-2.png" alt="">
            </div>

            <div class="content">
                <h3>best food in the country</h3>
                <div id="content" >
                    <p>Real Taste is a Nepali restaurant tucked away in a quiet part of Gaighat with no traffic. Our guests call us “the most peaceful Restaurant in Gaighat … with the best breakfasts … filling lunches … delicious dinners”.  We believe that our food is a reflection of our pride. We wanted to bring the freshest of ingredients made into the best dishes for our guests to enjoy in a quiet environment.</p>
                    <p>We’ve been working in the hospitality industry for over 8 years and opened Real Taste Restaurant knowing what tourists from around the world wanted. Guests come here to enjoy a place where the food is freshly made for every dish in our dedicated kitchen. We treat all our guests with honesty and respect.  Every effort has been placed to create a delicious and inventive menu in our clean neat kitchen. Our cultural influences come around the world and are celebrated at Real Taste Restaurant as we continually evolve to bring you the best.  We hope you agree and enjoy dining with us.</p>
                    <p>Real Taste Restaurant<p>
                    

                </div>

                <div class="icons-container">
                    <div class="icons">
                        <i class="fas fa-shipping-fast"></i>
                        <span>free delievery</span>
                    </div>
                
                    <div class="icons">
                        <i class="fas fa-rupee-sign"></i>
                        <span>easy payment</span>
                    </div>
                
                    <div class="icons">
                        <i class="fas fa-hands-wash"></i>
                        <span>hygenic food</span>
                    </div>
                </div>

                <a  class="btn" id="learn-more">learn more</a>
            </div>
            

        </div>

        

    </section>
    <!-- about section ends -->


<?php include('partials-front/review.php'); ?>




<!-- write review section starts here -->
<section class="write-review" id="write-review">
    <h3 class="sub-heading">write what you want to say</h3>
    <h1 class="heading">what do you think?</h1>

    

    <form action="write-review-process.php" method="POST" enctype="multipart/form-data">

        <div class="inputbox">
            <div class="input">
                <span>name</span>
                <input type="text" name="customer_name" placeholder="write your name" required>
            </div>
            <div class="input">
                <span>choos your photo</span>
                <input type="file" class="image" name="image">
            </div>
        </div>

        <div class="inputbox">
            <div class="input" style="width:100%;">
                <span>your words</span>
                <textarea name="review" id="" cols="30" rows="10" required></textarea>
            </div>
        </div>

        <input type="submit" name="submit" value="submit" class="btn">
    </form>

    

    </section>

<!-- write review section ends here -->

<?php include('partials-front/footer.php'); ?>