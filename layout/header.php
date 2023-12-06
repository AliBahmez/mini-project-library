<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="<?php echo ROOT_PATH; ?>assets/css/bootstrap.css" />

   <link href="<?php echo ROOT_PATH; ?>assets/css/style.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo ROOT_PATH; ?>assets/css/main.css">  
  <title>Document</title>
    <style>
    </style>
</head>
<body>
   <!-- ************************************* -->
      <header class="header_section bg-black text-center m-0 p-0 ">
        <div class="container-fluid">
          <nav class="navbar navbar-expand-lg custom_nav-container m-0 p-0">
            <a class="navbar-brand" href="<?php echo ROOT_PATH; ?>home">
              <img class="img-nav" src="<?php echo ROOT_PATH; ?>assets/images/OIP-removebg-preview.png1.png" alt="">
            </a>
           
  
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <div class="d-flex ml-auto flex-column flex-lg-row align-items-center">
                <ul class="navbar-nav list-unstyled " style="list-style: none !important">
                  <li class="nav-item active">
                    <a class="nav-link" href="<?php echo ROOT_PATH; ?>home">Home </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#About"> About</a>
                  </li>
                </li>
                <?php  if(myAppIsUserSignedIn()){?>
                  <li class="nav-item">
                  <a class="nav-link" href="<?php echo ROOT_PATH; ?>admin/addcategory"> Add category </a>
                </li>
                <?php } else{?>
                  <li class="nav-item">
                  <a class="nav-link" href="#About">Contact us</a>
                </li>
                <?php } ?> 
                
                
                 
                
                <?php
                if(myAppIsUserSignedIn()){?>
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo ROOT_PATH; ?>admin/addbook"> Add Book </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo ROOT_PATH; ?>admin/books"> management Books </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo ROOT_PATH; ?>admin/categories"> management Categories </a>
                </li>
                <?php }
                ?>
                
                <?php 
                if(!myAppIsUserSignedIn()){?>
                  <li class="nav-item">
                    <a id="openModalBtn" class="nav-link" href="#"> Login </a>
                  </li>
                <?php } else {?>
                  <li class="nav-item">
                    <a id="" class="nav-link" href="<?php echo ROOT_PATH; ?>signout"> sign out </a>
                  </li>
                <?php }
                ?>
                  
                </ul>
                <div id="loginModal" class="modal">
                  <div class="modal-content">
                      <span class="close text-end">&times;</span>
                      <h2 class="text-start">Login</h2>
                      <form class="login-form" action="" method="post">
                          <input type="hidden" name="form" value="login">
                          <input name="username" type="text" placeholder="Username" required>
                          <input name="password" type="password" placeholder="Password" required>
                          <button type="submit">Log In</button>
                      </form>
                  </div>
              </div>
              </div>
            </div>
          </nav>
        </div>
      </header>