<?php
require 'connection.php';




?>






<!-- header section starts  -->

<?php
require 'header.php';
?>

<!-- header section ends -->




<section class="product" id="product">

    <h1 class="heading">Milk</h1>

    <div class="box-container">
    <?php 
      
      $sql = "SELECT * FROM `products` WHERE category  = '3' ";
      $result = mysqli_query($conn, $sql);
      while ($row = mysqli_fetch_assoc($result)){
          ?>
        <div class="box">
        
            <span class="discount">-<?=  $row['price']; ?>%</span>
            <div class="icons">
                <a href="#" class="fas fa-heart"></a>
                <a href="#" class="fas fa-share"></a>
                <a href="#" class="fas fa-eye"></a>
            </div>

            

            <?php echo '<img src="data:image/jpeg;base64,' . base64_encode($row['img']) . '" alt="User Image" width="200" height="150">' ?>
            <h3><?=  $row['name']; ?></h3>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
            <div class="price"> $10.50 <span> $13.20 </span> </div>
            <div class="quantity">
                <span>quantity : </span>
                <input type="number" min="1" max="1000" value="1">
                <span> /kg </span>
            </div>
            <a href="#" class="btn">add to cart</a>

        </div>
<?php
                ?>
                <?php
            }
            ?>
       

    </div>

</section>

<?php
require('footer.php');
?>