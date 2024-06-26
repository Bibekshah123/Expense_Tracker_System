<?php
   include('config.php');
   include('functions.php');
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

      <title>Dashboard</title>

      <link href="css/font-face.css" rel="stylesheet" media="all">
      <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
      <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
      <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

      <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

      <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
      <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
      <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
      <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">

      <link href="css/theme.css" rel="stylesheet" media="all">
      <script>
         function setTitle(title){
         	document.title=title;
         }
         function selectLink(id){
         	document.getElementById(id).classList.add('active');
         }
      </script>
   </head>
   <body class="animsition">
      <div class="page-wrapper">

      <header class="header-mobile d-block d-lg-none">
         <div class="header-mobile__bar">
            <div class="container-fluid">
               <div class="header-mobile-inner">

                  <button class="hamburger hamburger--slider" type="button">
                  <span class="hamburger-box">
                  <span class="hamburger-inner"></span>
                  </span>
                  </button>
               </div>
            </div>
         </div>
         <nav class="navbar-mobile">
            <div class="container-fluid">
               <ul class="navbar-mobile__list list-unstyled">
                  <li class="has-sub">
                     <a class="js-arrow" href="#">
                     <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                  </li>
               </ul>
            </div>
         </nav>
      </header>

      <aside class="menu-sidebar d-none d-lg-block">
         <div class="logo">
            <h1>ETS</h1>
         </div>
         <div class="menu-sidebar__content js-scrollbar1">
            <nav class="navbar-sidebar">
               <ul class="list-unstyled navbar__list">
                  <?php
                     if($_SESSION['UROLE']=='User'){
                     ?>
                  <li id="dashboard_link">
                     <a class="js-arrow" href="dashboard.php">
                     <i class=""></i>Dashboard</a>
                  </li>
                  <li id="expense_link">
                     <a href="expense.php">
                     <i class=""></i>Expense</a>
                  </li>
                  <li id="reports_link">
                     <a href="reports.php">
                     <i class=""></i>Reports</a>
                  </li>
                  <?php } else {?>
                  <li id="category_link">
                     <a href="category.php">
                     <i class=""></i>Category</a>
                  </li>
                  <li id="users_link">
                     <a href="users.php">
                     <i class=""></i>Users</a>
                  </li>
                  <?php } ?>
                  <li>
                     <a href="logout.php">
                     <i class=""></i>Logout</a>
                  </li>
               </ul>
            </nav>
         </div>
      </aside>
  
      <div class="page-container">

      <header class="header-desktop">
         <div class="section__content section__content--p30">
         </div>
      </header>
