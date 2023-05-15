<?php

require_once 'dbkonek.php';

if(isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM produk WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);
}


if(isset($_POST['submit'])) {
    $id = $_POST['id'];
    $kode = $_POST['kode'];
    $nama = $_POST['nama'];
    $harga_jual = $_POST['harga_jual'];
    $harga_beli = $_POST['harga_beli'];
    $stok = $_POST['stok'];
    $min_stok = $_POST['min_stok'];
    $deskripsi = $_POST['deskripsi'];
    $kpi = $_POST['kpi'];

    $sql = "UPDATE produk SET kode = :kode, nama = :nama, harga_jual = :harga_jual, harga_beli = :harga_beli,
                    stok = :stok, min_stok = :min_stok, deskripsi = :deskripsi, kategori_produk_id = :kpi WHERE id = :id";

    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':kode', $kode);
    $stmt->bindParam(':nama', $nama);
    $stmt->bindParam(':harga_jual', $harga_jual);
    $stmt->bindParam(':harga_beli', $harga_beli);
    $stmt->bindParam(':stok', $stok);
    $stmt->bindParam(':min_stok', $min_stok);
    $stmt->bindParam(':deskripsi', $deskripsi);
    $stmt->bindParam(':kpi', $kpi);

    $stmt->execute();

    header('Location: produk.php');


}
?>


<?php
        include_once 'template/admin.php';
        $sqljenis = "SELECT * FROM kategori_produk";
        $rowjenis = $conn->prepare($sqljenis);
        $rowjenis->execute();
    ?>

<div class="container my-4">
      <div class="row">
        <div class="col-md-8">
          <h3>Edit Produk</h3>
          <hr>
        <form method="post" >
        <input type="hidden" name="id" value="<?=  $row['id']   ?>">
            <div class="form-group">
              <label for="kode">Kode:</label>
              <input type="text" class="form-control" id="kode" name="kode" value="<?=  $row['kode']   ?>">
            </div>
            <div class="form-group">
              <label for="nama">Nama Produk:</label>
              <input type="text" class="form-control" id="nama" name="nama" value="<?=  $row['nama']   ?>">
            </div>
            <div class="form-group">
              <label for="harga_jual"> Harga Jual:</label>
              <input type="number" class="form-control" id="harga_jual" name="harga_jual" value="<?=  $row['harga_jual']   ?>">
            </div>
            <div class="form-group">
              <label for="harga_beli">Harga Beli:</label>
              <input type="number" class="form-control" id="harga_beli" name="harga_beli" value="<?=  $row['harga_beli']   ?>">
            </div>
            <div class="form-group">
              <label for="stok">Stok:</label>
              <input type="text" class="form-control" id="stok" name="stok" value=" <?=  $row['stok']   ?> ">
            </div>
            <div class="form-group">
              <label for="min_stok">Min Stok:</label>
              <input type="text" class="form-control" id="min_stok" name="min_stok" value="<?=  $row['min_stok']   ?> ">
            </div>
            <div class="form-group">
              <label for="deskripsi">Deskripsi:</label>
              <input type="text" class="form-control" id="deskripsi" name="deskripsi" value="<?=  $row['deskripsi']   ?>">
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Kategori Produk</label>
                <select class="form-control" id="exampleFormControlSelect1" name="kpi">
                    <option value="">Pilih</option>
                <?php
                    while($jenis = $rowjenis->fetch(PDO::FETCH_ASSOC)){              
                ?>  
                    <option value="<?= $jenis['id'] ?>">  <?= $jenis['nama']  ?>     </option>
                <?php
                    }
                ?>
                </select>
            </div>

          

            <button type="submit" name="submit" class="btn btn-primary">Submit</button>

        </form>
       