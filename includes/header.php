  <?php
  
    session_start();
    define("APPURL" , "http://localhost/SwiftConnect");


    ?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>SwiftConnect – Your Gateway to Seamless Shipping.</title>
      <!-- <link rel="stylesheet" href="../includes/header.css"> -->
      <link rel="stylesheet" href="../includes/header.css?v=1.0">
      <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
      <link href="../assets/fonts/font-awesome/font-awesome.css" rel="stylesheet" type="text/css">
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Afacad+Flux:wght@100..1000&display=swap" rel="stylesheet">
      <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
      <script src="https://kit.fontawesome.com/a295b70770.js" crossorigin="anonymous"></script>



  </head>

  <body>

      <div class="main-section">
          <header>
              <div class="overlay">
                  <nav>
                      <div class="logo-content">

                          <h1><i class="fa-brands fa-nfc-symbol"></i>
                              Swift<span>Connect</span></h1>
                      </div>
                      <ul>
                          <li><a href="#">Home</a></li>
                          <li><a href="#">About</a></li>
                          <li><a href="#">Service</a></li>
                          <li><a href="#">Contact</a></li>
                           

                      </ul>
                      <ul class="sidebar">
                          <li onclick="closesidebar()"><i class='bx bx-x'></i></li>
                          <li><a href="#">Home</a></li>
                          <li><a href="#">About</a></li>
                          <li><a href="#">Service</a></li>
                          <li><a href="#">Contact</a></li>
                        

                          <?php if(!isset($_SESSION['username'])) : ?>

                          <li class="item">
                              <a href="<?php echo APPURL;?>/auth/register.php" class="link">Register</a>
                          </li>
                          <li class="item">
                              <a href="<?php echo APPURL;?>/auth/login1.php" class="link">Login</a>
                          </li>
                    
                          <?php else: ?>        

                          <li class="item dropdown">
                              <a class="link dropdown-toggle" href="javascript:void(0)" id="userDropdown" role="button"
                                  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  <div class="avatar"><img
                                          src="<?php echo APPURL;?>/auth/HTML/user_images/<?php echo $_SESSION['image']; ?>">
                                  </div><?php echo $_SESSION['username']; ?>
                              </a>
                              <div class="dropdown-menu" aria-labelledby="userDropdown">
                                  <a class="dropdown-link"
                                      href="<?php echo APPURL;?>/users/transaction.php?id=<?php echo $_SESSION['user_id']; ?>">Transaction
                                      History</a>
                                  <a class="dropdown-link"
                                      href="<?php echo APPURL;?>/users/setting.php?id=<?php echo $_SESSION['user_id']; ?>">Settings</a>
                                  <a class="dropdown-link" href="<?php echo APPURL;?>/auth/logout.php">Log Out</a>
                              </div>
                          </li>

                          <?php endif; ?>

                      </ul>
                      <div class="hamburger"><i onclick="showsidebar()" class='bx bx-menu'></i></div>
                      <div class="log-btn">
                          <button>Login</button>
                      </div>
                  </nav>

              </div>
          </header>
      </div>

      <script>
      function showsidebar() {
          const sidebar = document.querySelector(".sidebar")
          sidebar.style.display = 'flex';

      }

      function closesidebar() {
          const sidebar = document.querySelector(".sidebar")
          sidebar.style.display = 'none'
      }
      </script>
  </body>

  </html>