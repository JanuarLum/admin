<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="../css/style.css" rel="stylesheet">
  <link href="../css/button.css" rel="stylesheet">
  <link href="../css/navbar.css" rel="stylesheet"> 
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<?php
    require_once "menu.php";
    include "../koneksi.php";
    $disableTahun = "";
    if (isset($_POST['id'])) {
        $id = $_POST['id'];
        $nama = $_POST['nama'];
        $queryUpdateSQL = "UPDATE mahasiswa SET nama='$nama' WHERE id=$id";
        $execUpdateSQL = mysqli_query($koneksi,$queryUpdateSQL);

        if($execUpdateSQL) {
            echo "<div class=\"alert alert-success alert-dismissible\">
                <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button>
              <strong>Success!</strong> This alert box could indicate a successful or positive action.
            </div>";
            $disableNama = "ReadOnly";
        }
        else {
            echo "Data tidak berhasil di update";
        }
    }
    else {
        $id = $_GET['id'];
    }
    $querySQL = "SELECT * FROM mahasiswa WHERE id=".$id;
    $execSQL = mysqli_query($koneksi,$querySQL);
?>

<div class="container-fluid mt-3">
    <a href="view-mahasiswa.php" class="btn">Kembali</a>
  <h3>Input User</h3>
    <tbody>
        <form action="edit-mahasiswa.php?id=<?= $id ?>" method="POST">
            <?php 
                if(mysqli_num_rows($execSQL) > 0) {
                    while($row = mysqli_fetch_assoc($execSQL)) { 
                        $id = $row["id"];
                        $nama = $row["nama"];
            ?>
            <input type="hidden" name="id" value="<?= $id ?>">
            <div class="form-floating mb-3 mt-3">
                <input type="text" class="form-control" id="nama" placeholder="Input Nama Mahasiswa" name="nama" value="<?php echo $nama ?>">
                <label for="nama" class="form-label">Nama</label>
            </div>
            <?php
                }
            }
            ?>
            <button type="submit" class="btn" >simpan</button>
        </form>
    </tbody>
</div>

</body>
</html>