<?php 
   include_once 'includes/form.php';
   $curPage = basename($_SERVER['PHP_SELF']); 
   ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--CSS File-->
    <link rel="stylesheet" type="text/css" href="css/main.css" />
    <link rel="stylesheet" type="text/css" href="css/flickity.css" />

   <!--Font--> 
   <link href="https://fonts.googleapis.com/css?family=Bentham|Playfair+Display|Raleway:400,500|Suranna|Trocchi" rel="stylesheet">

    <!-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"> -->

    <!--Fontawesome-->
    <script src="https://kit.fontawesome.com/86641d4077.js" crossorigin="anonymous"></script>

    <title>Rip & Roar</title>
</head>
<body>
   
   <div class="top-nav">
      <!-- <p class="" style="color:white;font-size:.8rem;"><i class="fas fa-phone-alt"></i> 9844723612 </p> -->
      <?php if (!isset($_SESSION['user']) ||(trim ($_SESSION['user']) == '')){ ?>
      <a href="login.php" class="logout <?php echo ($curPage == "register.php" ? "active" : "");?>"><i class="fas fa-user-plus"></i> SignUp/SignIn</a>
      <?php } else {

            
         //fetch user data
         $userDetailsRow = $crud->fetch_data_with_id('users', 'user_id', $_SESSION['user']);
         ?>
         <a href="profile.php" class="<?php echo ($curPage == "account.php" ? "active" : "");?>"style="margin-right:auto;z-index:999;"><i class="fas fa-user-circle"></i> <?php echo ucfirst($userDetailsRow['name']); ?></a>
         <?php
            if($userDetailsRow['role'] == 3) {
               ?>
               <a href="dashboard.php" class="logout <?php echo ($curPage == "dashboard.php" ? "active" : "");?>"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
               <?php
               
            }
         ?>

         <a href="index.php?logout='1'" class="logout"><i class="fas fa-sign-out-alt"></i> Logout</a>

      <?php }?>
   </div>

   <div class="nav " >
      <input type="checkbox" id="nav-check">
      <div class="nav-header">
         <div class="nav-title">
            <!-- RIP & ROAR -->
            <a href="index.php"><img src="assets/logo-riproar.PNG" alt="Logo" ></a>
         </div>
      </div>
      <div class="nav-btn">
         <label for="nav-check">
         <span></span>
         <span></span>
         <span></span>
         </label>
      </div>
         
      

      <div class="nav-links" style="padding-right:1.2rem">
         <a href="index.php" class="<?php echo ($curPage == "index.php" ? "active" : "");?>" >Home</a>
         <a href="explore.php" class="<?php echo ($curPage == "explore.php" ? "active" : "");?>">Sports</a>
         <a href="gallery.php" class="<?php echo ($curPage == "gallery.php" ? "active" : "");?>"> Gallery</a>
         <a href="about.php" class="<?php echo ($curPage == "about.php" ? "active" : "");?>">About Us</a>
         <!-- <a href="contact.php" class="<?php //echo ($curPage == "contact.php" ? "active" : "");?>"> Contact Us</a> -->
      </div>

      
   </div>
