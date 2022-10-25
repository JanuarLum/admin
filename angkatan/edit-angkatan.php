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
        $tahun = $_POST['tahun'];
        $queryUpdateSQL = "UPDATE angkatan SET tahun=$tahun WHERE id=$id";
        $execUpdateSQL = mysqli_query($koneksi,$queryUpdateSQL);

        if($execUpdateSQL) {
            echo "<div class=\"alert alert-success alert-dismissible\">
                <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button>
              <strong>Success!</strong> This alert box could indicate a successful or positive action.
            </div>";
            $disableTahun = "ReadOnly";
        }
        else {
            echo "Data tidak berhasil di update";
        }
    }
    else {
        $id = $_GET['id'];
    }
    $querySQL = "SELECT * FROM angkatan WHERE id=".$id;
    $execSQL = mysqli_query($koneksi,$querySQL);
?>

<div class="container-fluid mt-3">
    <a href="view-angkatan.php" class="btn">Kembali</a>
  <h3>Input Tahun Angkatan</h3>
    <tbody>
        <form action="edit-angkatan.php?id=<?= $id ?>" method="POST">
            <?php 
                if(mysqli_num_rows($execSQL) > 0) {
                    while($row = mysqli_fetch_assoc($execSQL)) { 
                        $id = $row["id"];
                        $tahun = $row["tahun"];
            ?>
            <input type="hidden" name="id" value="<?= $id ?>">
            <div class="form-floating mb-3 mt-3">
                <input type="tahun" class="form-control" id="tahun" placeholder="Input Tahun" name="tahun" value="<?php echo $tahun ?>" <?= $disableTahun ?>>
                <label for="tahun" class="form-label">Tahun</label>
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