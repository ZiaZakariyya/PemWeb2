   
   <?php
        require_once 'dbkonek.php';

        $sqljenis = "SELECT * FROM kategori_produk";
        $rowjenis = $conn->prepare($sqljenis);
        $rowjenis->execute();

        if(isset($_POST['submit'])){

            $kode = $_POST['kode'];
            $nama = $_POST['nama'];
            $harga_jual = $_POST['harga_jual'];
            $harga_beli = $_POST['harga_beli'];
            $stok = $_POST['stok'];
            $min_stok = $_POST['min_stok'];
            $deskripsi = $_POST['deskripsi'];
            $kpi = $_POST['kpi'];
    
        $sql = "INSERT INTO produk (kode, nama, harga_jual, harga_beli, stok, min_stok, deskripsi, kategori_produk_id) VALUES (? ,?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$kode, $nama, $harga_jual, $harga_beli, $stok, $min_stok, $deskripsi, $kpi]);
    
        header("Location: produk.php");
        }
   ?>
   
   
   <?php
        include_once 'template/admin.php';
    ?>

    <div class="container my-4">
      <div class="row">
        <div class="col-md-8">
          <h3>Tambah Produk</h3>
          <hr>
        <form method="post" >
            <div class="form-group">
              <label for="kode">Kode:</label>
              <input type="text" class="form-control" id="kode" name="kode" placeholder="Masukan Kode">
            </div>
            <div class="form-group">
              <label for="nama">Nama Produk:</label>
              <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan Nama Produk">
            </div>
            <div class="form-group">
              <label for="harga_jual"> Harga Jual:</label>
              <input type="number" class="form-control" id="harga_jual" name="harga_jual" placeholder="Masukan Harga Jual">
            </div>
            <div class="form-group">
              <label for="harga_beli">Harga Beli:</label>
              <input type="number" class="form-control" id="harga_beli" name="harga_beli" placeholder="Masukan Harga Beli">
            </div>
            <div class="form-group">
              <label for="stok">Stok:</label>
              <input type="number" class="form-control" id="stok" name="stok" placeholder="Masukan Stok ">
            </div>
            <div class="form-group">
              <label for="min_stok">Min Stok:</label>
              <input type="number" class="form-control" id="min_stok" name="min_stok" placeholder="Masukan Min Stok ">
            </div>
            <div class="form-group">
              <label for="deskripsi">Deskripsi:</label>
              <textarea class="form-control" id="deskripsi" rows="3" name="deskripsi" placeholder="Masukan Deskripsi"></textarea>
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
        </div>
        </div>
        </div>
