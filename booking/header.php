<?php
/*if(!$_SESSION['admin_in']) 
{
  header("location:index.php");
  exit();
}*/
 include'config.php'; ?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SwipeCell | Booking</title>
    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">
<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/themes/base/jquery-ui.css" type="text/css" media="all">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>

  <body id="page-top">

    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

      <a class="navbar-brand mr-1" href="dashboard.php">SwipeCell</a>

      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
      </button>

      <!-- Navbar Search -->
      <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        <div class="input-group">
         <!--  <input type="text" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
          <div class="input-group-append">
            <button class="btn btn-primary" type="button">
              <i class="fas fa-search"></i>
            </button>
          </div> -->
        </div>
      </form>

      <!-- Navbar -->
      <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item dropdown no-arrow mx-1">
          <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-bell fa-fw"></i>
            <span class="badge badge-danger">9+</span>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </li>
        <li class="nav-item dropdown no-arrow mx-1">
          <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-envelope fa-fw"></i>
            <span class="badge badge-danger">7</span>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="messagesDropdown">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </li>
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user-circle fa-fw"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="#">Settings</a>
            <a class="dropdown-item" href="#">Activity Log</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="lib/logout.php">Logout</a>
          </div>
        </li>
      </ul>

    </nav>

    <div id="wrapper">

      <!-- Sidebar -->
      <ul class="sidebar navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="dashboard.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="users-list.php">
            <i class="fas fa fa-users"></i>
            <span>User List</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="banner.php">
            <i class="far fa-image"></i>
            <span>Banner List</span></a>
        </li>
        
        <li class="nav-item">
        	<a class="nav-link" href="#">
	            <i class="fas fa fa-table"></i>
	            <span>Category</span></a>
        	<ul>
	          <li><a class="nav-link" href="resort-category.php">
	            <i class=""></i>
	            <span>Resort Category</span></a>
	          </li>
            <li><a class="nav-link" href="flight-category.php">
              <i class=""></i>
              <span>Flight Category</span></a>
           </li>
           <li><a class="nav-link" href="hotel-category.php">
              <i class=""></i>
              <span>Hotel Category</span></a>
             </li>
             <li><a class="nav-link" href="package.php">
              <i class=""></i>
              <span>Package Category</span></a>
             </li>
           </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="booking-list.php">
            <i class="fa fa-ship small-icon"></i>
            <span>Resort List</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="flight-list.php">
            <i class="fas fa fa-plane"></i>
            <span>Flight List</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="hotel-list.php">
            <i class="fas fa fa-hotel"></i>
            <span>Hotel List</span></a>
        </li>
         <li class="nav-item">
          <a class="nav-link" href="bus-list.php">
            <i class="fas fa fa-bus"></i>
            <span>Bus List</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="tour-list.php">
            <i class="fas fa-fw fa-mobile"></i>
            <span>Tour List</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="car-list.php">
            <i class="fas fa fa-car"></i>
            <span>Car List</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="mobile-recharge.php">
            <i class="fas fa-fw fa-mobile"></i>
            <span>Mobile Recharge</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
              <i class="fas fa fa-table"></i>
              <span>User Booking Seat</span></a>
          <ul>
           
           <li><a class="nav-link" href="bus-seat-book.php">
              <i class=""></i>
              <span>Bus Booking</span></a>
             </li>
           </ul>
        </li>
      </ul>

      <div id="content-wrapper">