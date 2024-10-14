  <?php
  
    session_start();
    define("APPURL" , "http://localhost/SwiftConnect");

    ?>

  <!DOCTYPE html>
  <html>

  <head>
      <title>SwiftConnect – Your Gateway to Seamless Shipping.</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
      <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet"
          type="text/css">
      <link href="<?php echo APPURL;?>/assets/fonts/sb-bistro/sb-bistro.css" rel="stylesheet" type="text/css">
      <link href="<?php echo APPURL;?>/assets/fonts/font-awesome/font-awesome.css" rel="stylesheet" type="text/css">
      <link rel="stylesheet" href="includes/footer.css">
      <link rel="stylesheet" href="header.css">
  </head>

  <body>
      <div class="page-header">
          <!--=============== Navbar ===============-->
          <nav class="navbar" id="page-navigation">
              <div class="container">
                  <!-- Navbar Brand -->
                  <a href="<?php echo APPURL;?>/" class="navbar-brand">
                      <img src="<?php echo APPURL;?>/assets/logos/SwiftConnect.svg" alt="">
                  </a>

                  <!-- Toggle Button -->
                  <button class="navbar-toggler" type="button" id="toggle-button">
                      <span class="navbar-toggler-icon"></span>
                  </button>

                  <div class="navbar-collapse" id="navbarcollapse">
                      <!-- Navbar Menu -->
                      <ul class="navbar-nav">

                          <li class="nav-item">
                              <a href="" class="nav-link">Shop</a>
                          </li>

                          <li class="nav-item">
                              <a href="" class="nav-link">FAQ</a>
                          </li>

                          <li class="nav-item">
                              <a href="" class="nav-link">Contact</a>
                          </li>

                          <?php if(!isset($_SESSION['username'])) : ?>

                          <li class="nav-item">
                              <a href="<?php echo APPURL;?>/auth/HTML/register.php" class="nav-link">Register</a>
                          </li>
                          <li class="nav-item">
                              <a href="<?php echo APPURL;?>/auth/HTML/login.php" class="nav-link">Login</a>
                          </li>

                          <?php else: ?>

                          <li class="nav-item dropdown">
                              <a class="nav-link dropdown-toggle" href="javascript:void(0)" id="navbarDropdown">
                                  <div class="avatar-header">
                                      <img src="<?php echo APPURL;?>/assets/img/<?php echo $_SESSION['image']; ?>">
                                  </div>
                                  <?php echo $_SESSION['username']; ?>
                              </a>
                              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                  <a class="dropdown-item"
                                      href="<?php echo APPURL;?>/users/transaction.php?id=<?php echo $_SESSION['user_id']; ?>">Transactions
                                      History</a>
                                  <a class="dropdown-item"
                                      href="<?php echo APPURL;?>/users/setting.php?id=<?php echo $_SESSION['user_id']; ?>">Settings</a>
                                  <a class="dropdown-item" href="<?php echo APPURL;?>/auth/logout.php">Log Out</a>
                              </div>
                          </li>
                          <li class="nav-item">
                              <a href="" class="nav-link">
                                  <i class="fa fa-shopping-basket"></i>
                                  <span class="badge badge-primary">1</span>
                              </a>
                          </li>

                          <?php endif ; ?>

                      </ul>
                  </div>

              </div>
          </nav>
      </div>
      <script>
      document.getElementById('toggle-button').addEventListener('click', function() {
          document.getElementById('navbarcollapse').classList.toggle('active');
          this.classList.toggle('active');
      });
      </script>
  </body>

  </html>