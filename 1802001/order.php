<?php include('partials-front/menu.php'); ?>


 <?php
 if(isset($_GET['fish_id'])){

    $fish_id= $_GET['fish_id'];

 

 $sql = "SELECT * FROM tbl_fish WHERE id=$fish_id";

 $res = mysqli_query($conn,$sql);
 $count=mysqli_num_rows($res);

 if($count==1){

    $row= mysqli_fetch_assoc($res);
    $title=$row['title'];
    $price=$row['price'];  

    $image_name=$row['image_name'];

 }
 else{
    header('location:'.SITEURL);

 }
}

 else{
    header('location:'.SITEURL);

 }

 ?>


    <!-- fOOD sEARCH Section Starts Here -->
    <section class="fish-search">
        <div class="container">
            
            <h2 class="text-center text-white">Fill this form to confirm your order.</h2>

            <form action="" method="POST" class="order">
                <fieldset>
                    <legend>Selected Fish</legend>

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
                        <h3><?php echo $title; ?></h3>
                        <input type="hidden" name="fish" value="<?php echo $title; ?>">
                        <p class="fish-price">BDT<?php echo $price; ?></p>
                        <input type="hidden" name="price" value="<?php echo $price; ?>">

                        <div class="order-label">Quantity</div>
                        <input type="number" name="qty" class="input-responsive" value="1" required>
                        
                    </div>

                </fieldset>
                
                <fieldset>
                    <legend>Delivery Details</legend>
                    <div class="order-label">Full Name</div>
                    <input type="text" name="full-name" placeholder="E.g. Shyam " class="input-responsive" required>

                    <div class="order-label">Phone Number</div>
                    <input type="tel" name="contact" placeholder="E.g. 9843xxxxxx" class="input-responsive" required>

                    <div class="order-label">Email</div>
                    <input type="email" name="email" placeholder="E.g.a@gmail.com.com" class="input-responsive" required>

                    <div class="order-label">Address</div>
                    <textarea name="address" rows="10" placeholder="E.g. Street, City, Country" class="input-responsive" required></textarea>

                    <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
                
                    <button onClick="window.print()">Print</button>
                </fieldset>

            </form>

            <?php
            if(isset($_POST['submit'])){

                $fish= $_POST['fish'];
                $price= $_POST['price'];
                $qty= $_POST['qty'];

                $total= $price * $qty;

                $order_date= date("Y-m-d h:i:sa");
                $status="ordered";
                $customer_name = $_POST['full-name'];
                $customer_contact = $_POST['contact'];
                $customer_email=$_POST['email'];
                $customer_address=$_POST['address'];

                //save order in database
                $sql2= "INSERT INTO tbl_order SET
                fish='$fish',
                price='$price',
                qty='$qty',
                total='$total',
                order_date='$order_date',
                status='$status',
                customer_name='$customer_name',
                customer_contact='$customer_contact',
                customer_email='$customer_email',
                customer_address='$customer_address'

                ";

       $res2=mysqli_query($conn,$sql2);

       if($res2 == true)
   {
    //Data inserted Successfullly
    $_SESSION['order'] = "<div class='success text-center'>Fish Ordered Successfully.</div>";
    header('location:'.SITEURL);
}
else
{
    //FAiled to Insert Data
    $_SESSION['add'] = "<div class='error text-center'>Failed to Order Fish.</div>";
  
    header('location:'.SITEURL);
}
            }
            ?>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->
    <?php include('partials-front/footer.php'); ?>