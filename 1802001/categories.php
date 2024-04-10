<?php include('partials-front/menu.php'); ?>



    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Fish</h2>




            <?php
            $sql = "SELECT * FROM tbl_catagory WHERE active='YES'";

            $res = mysqli_query($conn,$sql);
            $count=mysqli_num_rows($res);

            if($count>0){


                while($row=mysqli_fetch_assoc($res)){
                    $id=$row['id']; 


                    $title=$row['title'];
                    $image_name=$row['image_name'];

                    ?>


            <a href="category-fish.html">
            <div class="box-3 float-container">

            <?php

         if($image_name==""){
            echo "<div class='error'>Category not Found.</div>";
         } 

         else{

         
            ?>
                <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>" alt="Blue bettle" class="img-responsive img-curve">

                <?php

        }
        ?>
                <h3 class="float-text text-white"><?php echo $title; ?></h3>
            </div>
            </a>

                    <?php

                }

            }

            else{
                   echo"<div class='error'>Category not Added.</div>";

            }
            ?>



            <a href="category-fish.html">
            <div class="box-3 float-container">
                <img src="images/blue bettle fish.jpg" alt="Blue bettle" class="img-responsive img-curve">

                <h3 class="float-text text-white">Blue bettle</h3>
            </div>
            </a>

            

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->

    <?php include('partials-front/footer.php'); ?>