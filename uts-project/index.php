<?php
    require_once 'dbkonek.php' ;

    $sql = " SELECT * FROM produk";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

?>

	<?php
        include_once 'template/header.php';
    ?>
	<div class="row">
		<div class="col-md-12">
		<div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
        <img src="https://images.unsplash.com/photo-1600950207944-0d63e8edbc3f?ixlib=rb-4.0.3&auto=format&fit=crop&w=1600&h=500&q=60" class="d-block w-100" alt="...">
    </div>
  </div>
</div>
		</div>
	</div>
	<div class="row">

		<?php
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)) :
        ?>

		<div class="col-md-3 text-center mt-5 ">
			<div class="card mb-5 py-4" >
 				<img src="https://icon-library.com/images/icon-product/icon-product-5.jpg" class="card-img-top" alt="...">
  				<div class="card-body mt-5">
    				<h5 class="card-title"> <?=  $row['nama']   ?> </h5>
					<h5 class="card-title"> Rp. <?=  number_format($row['harga_jual'], 0, ',', '.')    ?> </h5>
    				<p class="card-text"> <?=  $row['deskripsi']   ?> </p>
					<p class="card-text"> Stok : <?=  $row['stok']   ?> </p>
    				<a href="order.php?id=<?= $row['id'] ?>" class="btn btn-info">BUY NOW!</a>
  				</div>
			</div>
		</div>

		<?php    
            endwhile;
        ?>
		
	</div>
	</div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
  </body>
</html>