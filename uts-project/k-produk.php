   
   <?php
        require_once 'dbkonek.php' ;

        $sql = " SELECT * FROM kategori_produk";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
      
   ?>
   
   
   <?php
        include_once 'template/admin.php';
    ?>


<div class="row">
  <div class="col-md-12">
  <h3>KELOLA KATEGORI PRODUK</h3>
  <a class="btn btn-primary" href="form_kproduk.php" role="button">Tambah Kategori Produk</a>
  <table class="table mt-3">
  <thead>
    <tr>
      <th scope="col">NO</th>
      <th scope="col">Nama</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>

    <?php
      $number = 1;
      while($row = $stmt->fetch(PDO::FETCH_ASSOC)) :
    ?>

    <tr>
      <th scope="row"><?=  $number      ?></th>
      <td>  <?=  $row['nama']      ?>    </td>
      <td>
                    <a href="edit_kproduk.php?id=<?= $row['id'] ?>">EDIT</a>
                    <a href="delete_kproduk.php?id=<?= $row['id'] ?>"  
                        onclick="if(!confirm('Anda Yakin Hapus Kategori Produk  <?=$row['nama']?>?')) {return false}"
                    >
                        HAPUS
                    </a>
                </td>
  
    </tr>

    <?php   
      $number++;
      endwhile;
    ?>
    
  </tbody>
</table>
  </div>
</div>