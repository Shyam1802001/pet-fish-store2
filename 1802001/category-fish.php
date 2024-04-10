<?php include('partials-front/menu.php'); ?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="fish-search text-center">
        <div class="container">
            
            <h2>Fish on <a href="#" class="text-white">"Category"</a></h2>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="fish-menu">
        <div class="container">
            <h2 class="text-center">Kind of fish</h2>

            <?php
            $sql2 = "SELECT * FROM tbl_fish WHERE active='YES'";

            $res2 = mysqli_query($conn,$sql2);
            $count2=mysqli_num_rows($res2);

            if($count2>0){


                while($row2=mysqli_fetch_assoc($res2)){
                    $id=$row2['id']; 
                    $title=$row2['title'];
                    $price=$row2['price']; 
                    $description =$row2['description']; 

                    $image_name=$row2['image_name'];

                    ?>


                 <div class="fish-menu-box">
                <div class="fish-menu-img">

                <?php

         if($image_name==""){
            echo "<div class='error'>Image not Available.</div>";
         } 

         else{

         
            ?>

                    <img src="<?php echo SITEURL; ?>images/fish/<?php echo $image_name; ?>" class="img-responsive img-curve">
                 <?php
         }
         ?>
               
                </div>

                <div class="fish-menu-desc">
                    <h4><?php echo $title; ?></h4>
                    <p class="fish-price">BDT<?php echo $price;?></p>
                    <p class="fish-detail">
                        <?php echo $description; ?>

                    </p>
                    <br>
 
                    <a href="<?php echo SITEURL; ?>order.php?fish_id=<?php echo $id; ?>" class="btn btn-primary">Order Now</a>
                </div>
            </div>



                    <?php

                }

            }
            

            else{
                   echo"<div class='error'>Fish not available.</div>";

            }
            ?>


            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

    <?php include('partials-front/footer.php'); ?>