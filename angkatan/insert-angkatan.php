<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="../css/style.css" rel="stylesheet">
  <link href="../css/button.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
  <link href="../css/navbar.css" rel="stylesheet">
</head>
<body>

<?php
    require_once "menu.php";
?>

<div class="container-fluid mt-3">
<a href="view-angkatan.php" class="button mt-3 mb-3">Kembali</a>
  <h3>Input Tahun Angkatan</h3>
    <tbody>
        <form action="simpan-insert-angkatan.php" method="POST">
            <div class="mb-3 mt-3">
                <label for="tahun" class="form-label">Tahun:</label>
                <input type="tahun" class="form-control" id="tahun" placeholder="Input Tahun" name="tahun">
            </div>
            <button type="submit" class="btn">simpan</button>
        </form>
    </tbody>
</div>

</body>
</html>