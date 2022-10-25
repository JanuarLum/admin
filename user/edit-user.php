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
        $user = $_POST['user'];
        $queryUpdateSQL = "UPDATE user SET user='$user' WHERE id=$id";
        $execUpdateSQL = mysqli_query($koneksi,$queryUpdateSQL);
        if ($execSQL) {
            header('Location: view-user.php?edit=0');
        }
        else {
            header('Location: view-user.php?edit=1');
        }
    }
    else {
        $id = $_GET['id'];
    }
    $querySQL = "SELECT * FROM user WHERE id=".$id;
    $execSQL = mysqli_query($koneksi,$querySQL);
?>

<div class="container-fluid mt-3">
    <a href="view-user.php" class="btn">Kembali</a>
  <h3>Input User</h3>
    <tbody>
        <form action="edit-user.php?id=<?= $id ?>" method="POST">
            <?php 
                if(mysqli_num_rows($execSQL) > 0) {
                    while($row = mysqli_fetch_assoc($execSQL)) { 
                        $id = $row["id"];
                        $user = $row["user"];
            ?>
            <input type="hidden" name="id" value="<?= $id ?>">
            <div class="form-floating mb-3 mt-3">
                <input type="user" class="form-control" id="user" placeholder="Input user" name="user" value="<?php echo $user ?>">
                <label for="user" class="form-label">user</label>
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