   
   <?php
        require_once 'dbkonek.php';

        if(isset($_POST['submit'])){

            $kode = $_POST['nama'];
    
        $sql = "INSERT INTO kategori_produk (nama) VALUES (?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$nama]);
    
        header("Location: k-produk.php");
        }
   ?>
   
   
   <?php
        include_once 'template/admin.php';
    ?>

    <div class="container my-4">
      <div class="row">
        <div class="col-md-8">
          <h3>Tambah Kategori Produk</h3>
          <hr>
        <form method="post" >
            <div class="form-group">
              <label for="nama">Nama Produk:</label>
              <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan Nama Produk">
            </div>


            <button type="submit" name="submit" class="btn btn-primary">Submit</button>

        </form>
        </div>
        </div>
        </div>
