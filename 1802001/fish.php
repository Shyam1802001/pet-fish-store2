<?php include('partials-front/menu.php'); ?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="fish-search text-center">
        <div class="container">
            
            <form action="fish-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Fish.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="fish-menu">
        <div class="container">
            <h2 class="text-center">Kind of fish</h2>



            <?php
            $sql = "SELECT * FROM tbl_fish WHERE active='YES'";

            $res = mysqli_query($conn,$sql);
            $count=mysqli_num_rows($res);

            if($count>0){


                while($row=mysqli_fetch_assoc($res)){
                    $id=$row['id']; 
                    $title=$row['title'];
                    $price=$row['price']; 
                    $description =$row['description']; 

                    $image_name=$row['image_name'];

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