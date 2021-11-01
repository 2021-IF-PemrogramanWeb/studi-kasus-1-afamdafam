<?php
    include ('config.php');
    $search = $_POST['search'] ?? '';
    $query = mysqli_query($dbConnect,"SELECT * FROM akashadb  WHERE name LIKE '%$search%' ORDER BY 'id' AND 'role'");
?>

<!DOCTYPE html>
<html lang="en"><link type="text/css" rel="stylesheet" id="dark-mode-general-link"><link type="text/css" rel="stylesheet" id="dark-mode-custom-link"><style type="text/css" id="dark-mode-custom-style"></style><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>User List</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
</head>
  <body class="text-center">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark text-white">
        <a class="navbar-brand">Akasha</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
             <span class="navbar-toggler-icon"></span>
            </button>

         <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="home.php">Home</a>
                </li>
            </ul>
        </div>
        </nav>
        <div class="card-body">
            <br>
            <form method="post" action="user_list.php">
                <table >
                    <tr>
                        <td><input class="form-control border border-dark"  type="text" name="search"></td>
                        <td><button class='btn btn-primary border border-dark' type="submit">Search</button></td>
                    </tr>
                </table>			
            </form>
            <br>
            <table id="example2" class="table table-bordered table-hover">
         <thead>
             <tr>
                <th class ='border border-dark' scope="col">No.</th>
                <th class ='border border-dark' scope="col">id</th>
                <th class ='border border-dark' scope="col">Name</th>
                <th class ='border border-dark' scope="col">Password</th>
                <th class ='border border-dark' scope="col">Email</th>
                <th class ='border border-dark' scope="col">Role</th>
                <th class ='border border-dark'scope="col"></th>
              </tr>
         </thead>
         <tbody>
                <?php  
                 $count='1';
                    while($user = mysqli_fetch_array($query)) {         
                    echo "<tr>";
                    echo "<td class ='border border-dark' scope='row'>".$count.".</td>";
                    echo "<td class ='border border-dark'>".$user['id']."</td>";
                    echo "<td class ='border border-dark'>".$user['name']."</td>";
                    echo "<td class ='border border-dark'>".$user['password']."</td>";
                    echo "<td class ='border border-dark'>".$user['email']."</td>";    
                    echo "<td class ='border border-dark'>".$user['role']."</td>";
                    echo "<td class ='border border-dark'><a class='btn btn-warning border border-dark' href='edit_form.php?id=$user[id]'>Edit</a> <a class='btn btn-danger border border-dark' href='delete.php?id=$user[id]'>Delete</a></td></tr>"; 
                    $count++;       
                    }
                ?>
         </tbody>   
     </table>  
    </div>  
       
    <!-- jQuery -->
    <script src="../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="../plugins/jszip/jszip.min.js"></script>
    <script src="../plugins/pdfmake/pdfmake.min.js"></script>
    <script src="../plugins/pdfmake/vfs_fonts.js"></script>
    <script src="../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="../plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../dist/js/demo.js"></script>
    <!-- Page specific script -->
    <script>
    $(function () {
        $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
        });
    });
    </script>
    </body>
    </html>