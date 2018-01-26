<?php
  // memanggil file koneksi.php untuk membuat koneksi
  include 'koneksi.php';

  // mengecek apakah di url ada nilai GET id
  if (isset($_GET['id'])) {
    // ambil nilai id dari url dan disimpan dalam variabel $id
    $id = ($_GET["id"]);

    // menampilkan data mahasiswa dari database yang mempunyai id=$id
    $query = "SELECT * FROM mahasiswa WHERE id='$id'";
    $result = mysqli_query($link, $query);
    // mengecek apakah query gagal
    if(!$result){
      die ("Query Error: ".mysqli_errno($link).
         " - ".mysqli_error($link));
    }
    // mengambil data dari database dan membuat variabel" utk menampung data
    // variabel ini nantinya akan ditampilkan pada form
    $data = mysqli_fetch_assoc($result);
    $nim = $data["nim"];
    $nama = $data["nama"];
    $jurusan = $data["jurusan"];
    $ipk = $data["ipk"];

  } else {
    // apabila tidak ada data GET id pada akan di redirect ke index.php
    header("location:index.php");
  }

?>
<!DOCTYPE html>
<html>
  <head>
    <style>
      h1{
        text-align: center;
      }
      .container{
        width: 400px;
        margin: auto;
      }
    </style>
  </head>
  <body>
    <h1>Edit Data</h1>
    <div class="container">
      <form id="form_mahasiswa" action="edit_proses.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <fieldset>
        <legend>Edit Data Mahasiswa</legend>
          <p>
            <label for="nim">NIM : </label>
            <input type="text" name="nim" id="nim" value="<?php echo $nim ?>">
          </p>
          <p>
            <label for="nama">Nama : </label>
            <input type="text" name="nama" id="nama" value="<?php echo $nama ?>">
          </p>
          <p>
            <label for="jurusan" >Jurusan : </label>
              <select name="jurusan" id="fakultas">
                <option value="ti" <?php if($data['jurusan'] == 'ti'){ echo 'selected'; } ?>>
                Teknik Informatika </option>
                <option value="ti" <?php if($data['jurusan'] == 'ti'){ echo 'selected'; } ?>>
                
				Sistem Informasi</option>
                <option value="si" <?php if($data['jurusan'] == 'si'){ echo 'selected'; } ?>>
                
				Ekonomi</option>
                <option value="Teknik" <?php if($data['jurusan'] == 'Teknik'){ echo 'selected'; } ?>>
                
				Teknik Komputer</option>
                <option value="tk" <?php if($data['jurusan'] == 'tk'){ echo 'selected'; } ?>>
                
				Manajemen Informatika</option>
                <option value="mi" <?php if($data['jurusan'] == 'mi'){ echo 'selected'; } ?>>
                
				Komputerisasi Akuntansi</option>
                <option value="ka" <?php if($data['jurusan'] == 'ka'){ echo 'selected'; } ?>>
                
				</option>
              </select>
          </p>
          <p>
            <label for="jurusan">Jurusan : </label>
            <input type="text" name="jurusan" id="jurusan" value="<?php echo $jurusan ?>">
          </p>
          <p >
            <label for="ipk">IPK : </label>
            <input type="text" name="ipk" id="ipk" value="<?php echo $ipk ?>">
          </p>
        </fieldset>
        <p>
          <input type="submit" name="edit" value="Update Data">
        </p>
      </form>
  </div>
  </body>
</html>
