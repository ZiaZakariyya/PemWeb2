<?php
    require_once 'dbkonek.php';

    if(isset($_POST['submit'])){

        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $no_hp = $_POST['no_hp'];
        $email = $_POST['email'];
        $jumlah = $_POST['jumlah'];
        $des = $_POST['des'];
        $p_id = $_POST['p_id'];

    $sql = "INSERT INTO pesanan (tanggal, nama_pemesan, alamat_pemesan, no_hp, email, jumlah_pesanan, deskripsi, produk_id) VALUES (now(),?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$nama, $alamat, $no_hp, $email, $jumlah, $des, $p_id]);

    header("Location: sukses.php");
    }

?>



<!DOCTYPE html>
<html>
<head>
	<title>Pesanan Berhasil</title>
	<!-- Include the Bootstrap stylesheet -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
	<div class="container my-5">
		<div class="card">
			<div class="card-header">
				<h4>Pesanan Berhasil</h4>
			</div>
			<div class="card-body">
				<p>Terima kasih, pesanan Anda telah berhasil diproses.</p>
				<p>Silakan tunggu konfirmasi dari kami untuk pengiriman barang.</p>
			</div>
			<div class="card-footer">
				<a href="index.php" class="btn btn-primary">Kembali ke Beranda</a>
			</div>
		</div>
	</div>

	<!-- Include the jQuery library -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<!-- Include the Bootstrap JavaScript -->
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
