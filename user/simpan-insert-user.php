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
    if(isset($_POST['user'])) {
        $user = $_POST['user'];
        $querySQL = "INSERT INTO user (user) VALUES ('$user')";
        $execSQL = mysqli_query($koneksi,$querySQL);
        if ($execSQL) {
            header('Location: view-user.php?insert=1');
        }
        else {
            header('Location: view-user.php?insert=0');
        }
    }
?>

</body>
</html>