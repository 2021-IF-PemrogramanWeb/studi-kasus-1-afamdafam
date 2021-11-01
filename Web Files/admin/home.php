<?php
  include ('config.php');
  $query = mysqli_query($dbConnect,"SELECT DISTINCT(role) as user_role, COUNT(role) as user_total FROM akashadb GROUP BY role");
  $count_admin = mysqli_query($dbConnect,"SELECT COUNT(role) as total FROM akashadb WHERE role = 'Admin'");
  $count_user = mysqli_query($dbConnect,"SELECT COUNT(role) as total FROM akashadb WHERE role = 'User'");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Page</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
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
			<a class="nav-link" href="user_list.php">List</a>
		</li>

		</ul>
	</div>
	</nav>
	<?php 
		session_start();
		if($_SESSION['status']!="login"){
			header("location:../login.php?check=not_logged");
		}
	?>
    <div class="jumbotron">

      <div class="starter-template">
        <h1>Welcome <?php echo $_SESSION['name']; ?>,</h1>
        
        <p class="lead">you can view user list from the navigation tab.</p>
		
      </div>
    </div>

  <!-- Content Wrapper. Contains page content -->
  <div class="container-fluid">
  <div class="row">
    <div class="col"></div>
    <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Bar Chart</h3>
              </div>
              <div class="card-body">
                <div class="chart">
                  <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
      <div class="col"></div>
      </div>
    <div class="row">
      <div class="col"></div>
    <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Pie Chart</h3>
              </div>
              <div class="card-body">
                <div class="chart">
                  <canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
      <div class="col"></div>
      </div>
</div>
<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="../plugins/chart.js/Chart.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    <?php

    $user = [];
    while ($user_row = mysqli_fetch_assoc($query)) {
        $user[$user_row['user_role']] = $user_row['user_total']; 
    }
    ?>
    var barChartCanvas = $('#barChart').get(0).getContext('2d')

    var barChartData = {
      labels  : [<?php foreach($user as $key => $value)
                                        echo "'$key',";
                                ?>],
      datasets: [
        {
          label               : 'Count',
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [<?php foreach($user as $key => $value)
                                        echo "$value,";
                                ?>]
        },
      ]
    }

    var barChartOptions = {
      maintainAspectRatio : false,
      responsive : true,
      legend: {
        display: false
      },
      scales: {
        xAxes: [{
          gridLines : {
            display : false,
          }
        }],
        yAxes: [{
          gridLines : {
            display : false,
          }
        }]
      }
    }
    new Chart(barChartCanvas, {
      type: 'bar',
      data: barChartData,
      options: barChartOptions
    })
    var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
    var pieData        = {
      labels: [
         'Admin',
         'User'
      ],
      datasets: [
        {
          data: [
            <?php
              $admin = mysqli_fetch_assoc($count_admin);
              $user = mysqli_fetch_assoc($count_user);
              echo $admin['total'].",".$user['total'];
             ?>
          ],
          backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
        }
      ]
    }
    var pieOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(pieChartCanvas, {
      type: 'pie',
      data: pieData,
      options: pieOptions
    })
  })
</script>
</body>
</html>
