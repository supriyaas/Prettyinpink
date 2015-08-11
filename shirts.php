<?php include('inc/products.php');
?>

<?php 

$pageTitle = "Pretty in Pink Tops";
$section = "shirts";
include('inc/header.php'); 




?>

<div class="section shirts page">
    <div class="wrapper">
    
    <h1>Pretty in Pink Tops</h1>
        <ul class="products">
            <?php foreach($products as $product_id => $product)
{
    echo "<li>";       
            
    echo '<a href="shirtd.php?id=' . $product_id . '">';
     echo '<img src="' . $product["img"] . '" alt="' . $product["name"] . '">';           
                ?>
            
              <?php
    echo "<p>view details</p>";
        
    echo "</a>";  
             
    echo "</li>";
           
             } 
                ?>     
           
           
        
        </ul>

    </div>
    





</div>




<?php include('inc/footer.php'); ?>
