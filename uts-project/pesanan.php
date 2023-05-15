    <?php
      require_once 'dbkonek.php' ;

      $sql = " SELECT * FROM pesanan";
      $stmt = $conn->prepare($sql);
      $stmt->execute();
    
    ?>
    
    <?php
        include_once 'template/admin.php';
    ?>


<div class="row">
  <div class="col-md-12">
  <h3>KELOLA PESANAN</h3>
  <table class="table">
  <thead>
    <tr>
      <th scope="col">NO</th>
      <th scope="col">Tanggal</th>
      <th scope="col">Customer</th>
      <th scope="col">Alamat</th>
      <th scope="col">NO HP</th>
      <th scope="col">Email</th>
      <th scope="col">Kuantitas</th>
      <th scope="col">Deskripsi</th>
      <th scope="col">ID Produk</th>
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
      <td>  <?=  $row['tanggal']      ?>    </td>
      <td> <?=  $row['nama_pemesan']      ?> </td>
      <td><?=  $row['alamat_pemesan']      ?></td>
      <td> <?=  $row['no_hp']      ?></td>
      <td> <?=  $row['email']      ?></td>
      <td> <?=  $row['jumlah_pesanan']      ?></td>
      <td> <?=  $row['deskripsi']      ?></td>
      <td> <?=  $row['produk_id']      ?></td>
      <td>
                    <a href="edit_pesanan.php?id=<?= $row['id'] ?>">EDIT</a>
                    <a href="delete_pesanan.php?id=<?= $row['id'] ?>"  
                        onclick="if(!confirm('Anda Yakin Hapus Pesanan <?=$row['nama_pemesan']?>?')) {return false}"
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


