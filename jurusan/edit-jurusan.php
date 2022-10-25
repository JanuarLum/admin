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
        $prodi = $_POST['prodi'];
        $queryUpdateSQL = "UPDATE jurusan SET prodi='$prodi' WHERE id=$id";
        $execUpdateSQL = mysqli_query($koneksi,$queryUpdateSQL);

        if($execUpdateSQL) {
            echo "<div class=\"alert alert-success alert-dismissible\">
                <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button>
              <strong>Success!</strong> This alert box could indicate a successful or positive action.
            </div>";
            $disableProdi = "ReadOnly";
        }
        else {
            echo "Data tidak berhasil di update";
        }
    }
    else {
        $id = $_GET['id'];
    }
    $querySQL = "SELECT * FROM jurusan WHERE id=".$id;
    $execSQL = mysqli_query($koneksi,$querySQL);
?>

<div class="container-fluid mt-3">
    <a href="view-jurusan.php" class="btn">Kembali</a>
  <h3>Input User</h3>
    <tbody>
        <form action="edit-jurusan.php?id=<?= $id ?>" method="POST">
            <?php 
                if(mysqli_num_rows($execSQL) > 0) {
                    while($row = mysqli_fetch_assoc($execSQL)) { 
                        $id = $row["id"];
                        $prodi = $row["prodi"];
            ?>
            <input type="hidden" name="id" value="<?= $id ?>">
            <label for="prodi" class="form-label">Prodi:</label>
            <!-- <input type="prodi" class="form-control disabled" name="prodi" value="<?php echo $prodi ?>"> -->
            <div class="form-floating mb-3 mt-3">
                <select name="prodi" value="<?php echo $prodi ?>">
                    <option>S1 - Akuntansi</option>
                    <option>S1 - Arsitektur</option>
                    <option>S1 - Desain Komunikasi Visual</option>
                    <option>S1 - Desain Produk</option>
                    <option>S1 - Ilmu Komunikasi</option>
                    <option>S1 - Informatika</option>
                    <option>S1 - Manajemen</option>
                    <option>S1 - Psikologi</option>
                    <option>S1 - Sistem Informasi</option>
                    <option>S1 - Teknik Sipil</option>
                </select><br>
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