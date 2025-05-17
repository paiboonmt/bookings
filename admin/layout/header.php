<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?> | Booking Lab</title>
    <!-- Icon -->
    <link rel="icon" type="image/x-icon" href="../images/logo.png">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="../public/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../public/dist/css/adminlte.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="../public/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../public/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../public/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index.php" class="brand-link">
                <img src="../images/logo.png"
                    class="brand-image img-circle elevation-3"
                    style="opacity: .8">
                <span class="brand-text font-weight-light">Booking Coures</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-1 pb-1 d-block">
                    <div class="text-center">
                        <a href="" class="d-block">Administrator</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                   

                        <li class="nav-item">
                            <a href="index.php" class="nav-link <?php echo in_array(basename($_SERVER['PHP_SELF']), ['index.php']) ? 'active' : ''; ?>">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    หน้าสรุป
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="couses.php" class="nav-link <?php echo in_array(basename($_SERVER['PHP_SELF']), ['couses.php','add-course.php','edit-course.php']) ? 'active' : ''; ?>">
                                <i class="nav-icon fas fa-book"></i>
                                <p>
                                    คอร์สเรียน
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="users.php" class="nav-link <?php echo in_array(basename($_SERVER['PHP_SELF']), ['users.php']) ? 'active' : ''; ?>">
                                <i class="nav-icon fas fa-user-friends"></i>
                                <p>
                                    ผู้ดูแลระบบ
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="customers.php" class="nav-link <?php echo in_array(basename($_SERVER['PHP_SELF']), ['customers.php']) ? 'active' : ''; ?>">
                                <i class="nav-icon fas fa-user-friends"></i>
                                <p>
                                    ข้อมูลลูกค้า
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="bookings.php" class="nav-link <?php echo in_array(basename($_SERVER['PHP_SELF']), ['bookings.php','view-booking.php']) ? 'active' : ''; ?>">
                                <i class="nav-icon fas fa-calendar-alt"></i>
                                <p>
                                    การจอง
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="logout.php" class="nav-link">
                                <i class="nav-icon fas fa-sign-out-alt"></i>
                                <p>
                                    ออกจากระบบ
                                </p>
                            </a>
                        </li>


                    </ul>
                </nav>
                <!-- /.sidebar-menu -->

            </div>
            <!-- /.sidebar -->
        </aside>