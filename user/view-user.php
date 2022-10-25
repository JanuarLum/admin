<!DOCTYPE html>
<html lang="en">
<head>
  <title>View Angkatan</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css" rel="stylesheet">
  <link href="../css/style.css" rel="stylesheet">
  <link href="../css/navbar.css" rel="stylesheet">
</head>
<body>

<?php 
    require_once "menu.php";
    include "../koneksi.php";
?>

<div class="container-fluid mt-3">
  <h3>List Data User</h3>
  <a href="insert-user.php" class="btn btn-primary mt-3 mb-5">Input Data</a>
  <?php
    if (isset($_GET['hapus']))
    {
      if ($_GET['hapus'] == 1) {
        echo "
        <div class=\"alert alert-danger alert-dismissible mt-2\">
            <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button>
            <strong>Sukses!</strong> Data berhasil dihapus.
        </div>";
      }
      else {
        echo "
        <div class=\"alert alert-success alert-dismissible mt-2\">
            <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button>
            <strong>Data tidak berhasil</strong> dihapus.
        </div>";
      }
      echo "
      <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js'>
      </script>
      <script>
        $(document).ready(function(){
          $('.alert').delay(4000).fadeOut(200,function(){
              $(this).alert('close');
          });
        });
      </script>
      ";
    }
    if (isset($_GET['insert']))
    {
      if ($_GET['insert'] == 1) {
        echo "
        <div class=\"alert alert-success alert-dismissible mt-2\">
            <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button>
            <strong>Sukses!</strong> Data berhasil diinsert.
        </div>";
      }
      else {
        echo "
        <div class=\"alert alert-danger alert-dismissible mt-2\">
            <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button>
            <strong>Data tidak berhasil</strong> diinsert.
        </div>";
      }
      echo "
      <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js'>
      </script>
      <script>
        $(document).ready(function(){
          $('.alert').delay(4000).fadeOut(200,function(){
              $(this).alert('close');
          });
        });
      </script>
      ";
    }
    if (isset($_GET['edit']))
    {
      if ($_GET['edit'] == 1) {
        echo "
        <div class=\"alert alert-success alert-dismissible mt-2\">
            <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button>
            <strong>Sukses!</strong> Data berhasil diedit.
        </div>";
      }
      else {
        echo "
        <div class=\"alert alert-danger alert-dismissible mt-2\">
            <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button>
            <strong>Data tidak berhasil</strong> diedit.
        </div>";
      }
      echo "
      <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js'>
      </script>
      <script>
        $(document).ready(function(){
          $('.alert').delay(4000).fadeOut(200,function(){
              $(this).alert('close');
          });
        });
      </script>
      ";
    }
  ?>
  <table class="table table-hover" id="listtabel">
    <thead>
      <tr>
        <th>ID</th>
        <th>User</th>      
        <th>Aksi</th> 
      </tr>
    </thead>
    <tbody>
    <?php
    $QuerySQL = "SELECT * from user";
    $execSQL = mysqli_query($koneksi,$QuerySQL);

    //cek ada datanya ngga?
    if (mysqli_num_rows($execSQL) > 0) {
      while ($row = mysqli_fetch_assoc($execSQL)) {
        //ambil data
        $id = $row["id"];
        $user = $row["user"];      
    ?>
      <tr>
        <td>
          <a href="view-detail-user.php?id=<?php echo $id; ?>">
            <?php echo $id; ?>
          </a>
        </td>
        <td><?php echo $user; ?></td>
        <td>
          <a href="edit-user.php?id=<?php echo $id; ?>" class="btn btn-success">Edit Data</a>
          <a href="hapus-user.php?id=<?php echo $id; ?>" class="btn btn-danger">Hapus Data</a>
        </td>
      </tr> 
    <?php 
      }
    }
    ?>    
    </tbody>
  </table>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
<script>
  $(document).ready(function () {
    $('#listtabel').DataTable();
  });
</script>
</body>
</html>