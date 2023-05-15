<?php

require_once 'dbkonek.php';

if(isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM kategori_produk WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);
}


if(isset($_POST['submit'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];


    $sql = "UPDATE kategori_produk SET nama = :nama WHERE id = :id";

    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':nama', $nama);


    $stmt->execute();

    header('Location: k-produk.php');


}
?>


<?php
        include_once 'template/admin.php';
    ?>

    <div class="container my-4">
      <div class="row">
        <div class="col-md-8">
          <h3>EDIT KATEGORI PRODUK</h3>
          <hr>
        <form method="post">
        <input type="hidden" name="id" value="<?=  $row['id']   ?>">
            <div class="form-group">
              <label for="nama">Nama:</label>
              <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $row['nama']; ?>">
            </div>
    

            <button type="submit" name="submit" class="btn btn-primary">Submit</button>

        </form>