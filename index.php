<?php 
include "function.php";
$barangs = query("SELECT * FROM barang")
?>


<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CRUD Sederhana</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<!-- Langkah Membuaf Fungsi Cretae, Update Dan Delete -->
<!-- 1. Membuat Tombol : Untuk Masuk Ke Form (Modal) -->
<!-- 2. Membuat Form : Untuk Mengirim Data (Harus Beratribut Method Dan Action) -->
<!-- 3. Mengecek Apakah Tombol Sudah Ditekan Atau Belum -->
<!-- 4. Menangkap Data Yang Dikirim Dari Form -->
<!-- 5. Membuat Query Database -->
<!-- ^. Redirek Ke Halaman Itu Sendiri Agar Terlihat Perubahannya -->

<body>
  <h1>Daftar Barang</h1>
  <div class="container">
    <table class="table table-striped">
      <!-- tambah data -->
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahdata">
        Tambah Data
      </button>

      <div class="modal fade" id="tambahdata" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Barang Baru</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form action="" method="post">
                <div class="mb-3">
                  <label for="nama" class="form-label">nama barang</label>
                  <input type="text" name="nama" class="form-control" id="nama">
                </div>
                <div class="mb-3">
                  <label for="harga" class="form-label">harga</label>
                  <input type="text" name="harga" class="form-control" id="harga">
                </div>
                <div class="mb-3">
                  <label for="stok" class="form-label">stok</label>
                  <input type="text" name="stok" class="form-control" id="stok">
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary" name="btntambahbarang">Save changes</button>
            </div>
            </form>
          </div>
        </div>
      </div>
      <!-- tambah data -->
      <thead>
        <tr>
          <th>No</th>
          <th>Nama Barang</th>
          <th>Harga</th>
          <th>Stok</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php $i = 1; ?>
        <?php foreach($barangs as $barang) : ?>
        <tr>
          <td><?= $i; ?></td>
          <td><?= $barang["nama"] ?></td>
          <td><?= $barang["harga"] ?></td>
          <td><?= $barang["stok"] ?></td>
          <td>
            <button type="button" class="btn btn-warning" data-bs-toggle="modal"
              data-bs-target="#ubah<?= $barang["id"] ?>">
              Ubah
            </button>
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
              Hapus
            </button>
          </td>
        </tr>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                Yakin untuk menghapus?
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <!-- <a href="index.php?id=<?= $barang["id"]; ?>" class="btn btn-danger">Hapus</a> -->
                <form action="" method="POST">
                  <input name="id" type="hidden" value="<?= $barang["id"];?>">
                  <button class="btn btn-danger" type="submit" name="btnHapus">Hapus saja</button>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- Modal Ubah -->
        <div class="modal fade" id="ubah<?= $barang["id"] ?>" data-bs-backdrop="static" data-bs-keyboard="false"
          tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Ubah data Barang</h1>
              </div>
              <form action="" method="post">
                <input type="hidden" name="id_barang" value="<?= $barang["id"] ?>">
                <div class="modal-body">
                  <div class="mb-3">
                    <label for="nama" class="form-label">Nama Barang :</label>
                    <input type="text" name="nama" class="form-control" id="nama" value="<?= $barang["nama"] ?>">
                  </div>
                  <div class="mb-3">
                    <label for="harga" class="form-label">Harga :</label>
                    <input type="text" name="harga" class="form-control" id="harga" value="<?= $barang["harga"] ?>">
                  </div>
                  <div class="mb-3">
                    <label for="stok" class="form-label">Stok Barang :</label>
                    <input type="text" name="stok" class="form-control" id="stok" value="<?= $barang["stok"] ?>">
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                  <button type="submit" name="btnUbahBarang" class="btn btn-primary">Simpan</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <!-- Akhir Modal Ubah -->
        <?php ++$i; ?>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
  </script>
</body>

</html>

<?php 

if(isset($_POST["btnHapus"])){
  $id = $_POST["id"];
  mysqli_query($con, "DELETE FROM barang WHERE id =$id");
  echo"<script>document.location.href='index.php'</script>";

};
if (isset($_POST["btntambahbarang"])){
  $nama = $_POST["nama"];
  $harga = $_POST["harga"];
  $stok = $_POST["stok"];

  mysqli_query($con,"INSERT INTO `barang` (`id`, `nama`, `harga`, `stok`) VALUES (NULL, '$nama', '$harga', '$stok');
  ");

  echo"<script>document.location.href='index.php'</script>";
}

if(isset($_POST["btnUbahBarang"])){
  $id = $_POST["id_barang"];
  $nama = $_POST["nama"];
  $harga = $_POST["harga"];
  $stok = $_POST["stok"];

  mysqli_query($con,"UPDATE `barang` SET `nama` = '$nama', `harga` = '$harga', `stok` = '$stok' WHERE `barang`.`id` = $id;");
  
  if(mysqli_affected_rows($con)>0){
      echo "
      <script>
      alert('Berhasil mengubah data!');
      document.location.href = 'index.php';
      </script>
  ";
  }else{
  echo "
      <script>
          alert('Gagal mengubah data!');
          document.location.href = 'index.php';
      </script>
  ";
}
}

?>