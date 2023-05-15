<?php
      require_once 'dbkonek.php' ;

      $sql = " SELECT * FROM produk";
      $stmt = $conn->prepare($sql);
      $stmt->execute();
    
    ?>
    
    <?php
        include_once 'template/admin.php';
    ?>


<div class="row">
  <div class="col-md-12">
  <h3>KELOLA PRODUK</h3>
  <a class="btn btn-primary" href="form_produk.php" role="button">Tambah Produk</a>
  <table class="table mt-3">
  <thead>
    <tr>
      <th scope="col">NO</th>
      <th scope="col">Kode</th>
      <th scope="col">Nama</th>
      <th scope="col">Harga Jual</th>
      <th scope="col">Harga Beli</th>
      <th scope="col">Stok</th>
      <th scope="col">Min Stok</th>
      <th scope="col">Deskripsi</th>
      <th scope="col">ID Kategori Produk</th>
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
      <td>  <?=  $row['kode']      ?>    </td>
      <td> <?=  $row['nama']      ?> </td>
      <td><?=  $row['harga_jual']      ?></td>
      <td> <?=  $row['harga_beli']      ?></td>
      <td> <?=  $row['stok']      ?></td>
      <td> <?=  $row['min_stok']      ?></td>
      <td> <?=  $row['deskripsi']      ?></td>
      <td> <?=  $row['kategori_produk_id']      ?></td>
      <td>
                    <a href="edit_produk.php?id=<?= $row['id'] ?>">EDIT</a>
                    <a href="delete_produk.php?id=<?= $row['id'] ?>"  
                        onclick="if(!confirm('Anda Yakin Hapus Produk Dengan Kode <?=$row['kode']?>?')) {return false}"
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


