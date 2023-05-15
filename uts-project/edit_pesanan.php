<?php

require_once 'dbkonek.php';

if(isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM pesanan WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);
}


if(isset($_POST['submit'])) {
    $id = $_POST['id'];
    $tanggal = $_POST['tanggal'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $no_hp = $_POST['no_hp'];
    $email = $_POST['email'];
    $jumlah = $_POST['jumlah'];
    $deskripsi = $_POST['deskripsi'];
    $p_id = $_POST['p_id'];

    $sql = "UPDATE pesanan SET tanggal = :tanggal, nama_pemesan = :nama, alamat_pemesan = :alamat, no_hp = :no_hp,
                    email = :email, jumlah_pesanan = :jumlah, deskripsi = :deskripsi, produk_id = :p_id WHERE id = :id";

    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':tanggal', $tanggal);
    $stmt->bindParam(':nama', $nama);
    $stmt->bindParam(':alamat', $alamat);
    $stmt->bindParam(':no_hp', $no_hp);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':jumlah', $jumlah);
    $stmt->bindParam(':deskripsi', $deskripsi);
    $stmt->bindParam(':p_id', $p_id);

    $stmt->execute();

    header('Location: pesanan.php');


}
?>


<?php
        include_once 'template/admin.php';
    ?>

    <div class="container my-4">
      <div class="row">
        <div class="col-md-8">
          <h3>EDIT PESANAN</h3>
          <hr>
        <form method="post">
        <input type="hidden" name="id" value="<?=  $row['id']   ?>">
        <div class="form-group">
              <label for="Tanggal">Tanggal:</label>
              <input type="date" class="form-control" id="Tanggal" name="tanggal" value="<?php echo $row['tanggal']; ?>">
            </div>
            <div class="form-group">
              <label for="nama">Nama:</label>
              <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $row['nama_pemesan']; ?>">
            </div>
            <div class="form-group">
              <label for="alamat">Alamat:</label>
              <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $row['alamat_pemesan']; ?>">
            </div>
            <div class="form-group">
              <label for="no_hp">NO HP:</label>
              <input type="text" class="form-control" id="no_hp" name="no_hp" value="<?php echo $row['no_hp']; ?>">
            </div>
            <div class="form-group">
              <label for="email">Email:</label>
              <input type="email" class="form-control" id="email" name="email" value="<?php echo $row['email']; ?>">
            </div>
            <div class="form-group">
              <label for="jumlah">Quantity:</label>
              <input type="number" class="form-control" id="jumlah" name="jumlah" value="<?php echo $row['jumlah_pesanan']; ?>">
            </div>
            <div class="form-group">
              <label for="catatan">Catatan:</label>
              <input type="text" class="form-control" id="catatan" name="deskripsi" value="<?php echo $row['deskripsi']; ?>">
            </div>
            <div class="form-group">
              <label for="p_id">ID Produk:</label>
              <input type="text" class="form-control" id="p_id" name="p_id" value="<?php echo $row['produk_id']; ?>">
            </div>

            <button type="submit" name="submit" class="btn btn-primary">Submit</button>

        </form>