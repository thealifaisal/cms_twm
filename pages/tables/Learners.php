<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>The WebMasters Society | CMS</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <!-- <li class="nav-item d-none d-sm-inline-block">
        <a href="../../index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li> -->
    </ul>

    <!-- SEARCH FORM -->
    <!-- <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form> -->

    <!-- Right navbar links -->

  </nav>
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../index.html" class="brand-link">
      <!-- <img src="../../dist/img/AdminLTELogo.png"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8"> -->
           <center>
            <span class="brand-text font-weight-light text-center">The WebMasters Society</span>
           </center>

    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <a href="#" class="d-block">Hi, Mustufa Qadri</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="../../index.html" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="../charts/Statistics.html" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Statistics
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Society Registration
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../forms/Insert Record.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Insert Record</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../forms/Update Record.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Update Record</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../forms/Delete Record.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Delete Record</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Sociey Records
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../tables/Faculty Heads.html" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Faculty Heads</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../tables/Executive Committee.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Executive Committee</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../tables/Heads.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Heads</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../tables/Co Heads.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Co-Heads</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../tables/Project Managers.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Project Managers</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../tables/Members.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Members</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../tables/Learners.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Learners</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="../forms/Manage Dashboard.html" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Manage Dashboard
              </p>
            </a>
          </li>
          <li class="nav-header">Events</li>
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Tech Cup
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../tables/Competition Heads.php" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Competition Heads</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../tables/All Teams.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Teams</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../tables/All Results.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Results</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../forms/Insert Team.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Register Team</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../forms/Update Team.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Update Team</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../forms/Delete Team.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Delete Team</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../forms/Manage Results.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Results</p>
                </a>
              </li>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Society Management System</h1>
          </div>
          <!-- <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div> -->
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">All Learners</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>NU ID</th>
                  <th>Full Name</th>
                  <th>Gender</th>
                  <th>NU Email</th>
                  <th>Role</th>
                  <th>Year</th>
                  <th>Comm Skills</th>
                  <th>Tech Skills</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                    $servername = "localhost";
                    $username = "alifaisal";
                    $password = "7789";
                    $dbname = "cms_twm";

                    // Create connection
                    $conn = new mysqli($servername, $username, $password, $dbname);
                    // Check connection
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }
                    $q =
                    "SELECT member.nu_id AS nu_id, full_name, gender , nu_email , role_name, year_join, comm_skill, tech_skill
                    FROM member, skill, role
                    WHERE member.nu_id = skill.nu_id AND member.role_id = role.role_id
                    AND
                    team_id IS NULL AND
                    (
                      member.role_id BETWEEN 123 AND 125
                    )
                    ";
                    $res = $conn->query($q) or die("Error: " . $conn->error);
                        while($row = $res->fetch_assoc()){?>
                          <tr>
                          <td><?php echo $row["nu_id"]; ?></td>
                          <td><?php echo $row["full_name"]; ?> </td>
                          <td><?php echo $row["gender"]; ?></td>
                          <td><?php echo  $row["nu_email"]; ?></td>
                          <td><?php echo $row["role_name"];?></td>
                          <td><?php echo $row["year_join"];?></td>
                          <td><?php echo $row["comm_skill"];?></td>
                          <td> <?php echo $row["tech_skill"];?></td>
                        </tr>
                        <?php
                      }
                    $conn->close();
                    ?>
                </tbody>
                <!-- <tfoot>
                <tr>
                  <th>NU ID</th>
                  <th>Full Name</th>
                  <th>Gender</th>
                  <th>NU Email</th>
                  <th>Role</th>
                  <th>Year</th>
                  <th>Communication Skills</th>
                  <th>Technical Skills</th>
                </tr>
                </tfoot> -->
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 1.0
    </div>
    <strong>Developed by The WebMasters Society 2019 - 2020</strong>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="../../plugins/datatables/jquery.dataTables.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>
</body>
</html>
