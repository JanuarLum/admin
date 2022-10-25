<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="../css/style.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
  <link href="../css/navbar.css" rel="stylesheet">
</head>
<body>

<?php
    require_once "menu.php";
    include "../koneksi.php";
    $id = $_GET['id'];
    $QuerySQL = "SELECT * from angkatan WHERE id=$id";
    $execSQL = mysqli_query($koneksi,$QuerySQL);

    //cek data
    $tahun = "-";
    if (mysqli_num_rows($execSQL) > 0) {
      while ($row = mysqli_fetch_assoc($execSQL)) {
        //ambil daata
        $tahun = $row["tahun"];
      }
    }
?>

<div class="container-fluid mt-3">
  <h3>Navbar With Dropdown</h3>
  <table class="table table-hover">
    <thread>
        <tr>
            <th>ID</th>
            <td><?php echo $id; ?></td>
        </tr>
    </thread>
    <tbody>
        <tr>
        <tr>
            <th>Tahun</th>
            <td><?php echo $tahun; ?></td>
        </tr>
        </tr>
    </tbody>
  </table>
</div>

</body>
</html>