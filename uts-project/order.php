   
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
   ?>
   
   
   <?php
        include_once 'template/header.php';
    ?>

    <div class="container my-4">
      <div class="row">
        <div class="col-md-8">
          <h3>Order <?=  $row['nama']   ?></h3>
          <hr>
        <form method="post" action="sukses.php">
            <div class="form-group">
              <label for="nama">Nama:</label>
              <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan Nama">
            </div>
            <div class="form-group">
              <label for="alamat">Alamat:</label>
              <textarea class="form-control" id="alamat" rows="3" name="alamat" placeholder="Masukan Alamat"></textarea>
            </div>
            <div class="form-group">
              <label for="no_hp">NO HP:</label>
              <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="Masukan Nomor HP">
            </div>
            <div class="form-group">
              <label for="email">Email:</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="Masukan Email">
            </div>
            <div class="form-group">
              <label for="jumlah">Quantity:</label>
              <input type="number" class="form-control" id="jumlah" name="jumlah" placeholder="Masukan Jumlah Pesanan">
            </div>
            <div class="form-group">
              <label for="catatan">Catatan:</label>
              <textarea class="form-control" id="catatan" rows="3" name="des" placeholder="Masukan Catatan"></textarea>
            </div>
            <input type="hidden" name="p_id" value="<?=  $row['kategori_produk_id']   ?>">

            <button type="submit" name="submit" class="btn btn-primary">Submit</button>

        </form>
           
