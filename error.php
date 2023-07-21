<?php
   session_start();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Job Finder I Error</title>
<link href="j.Logo.png" rel="icon" sizes="72x72" type="image/png">
<link href="css/jobfinder.css?v=8" rel="stylesheet">
<link href="css/error.css?v=8" rel="stylesheet">
<script src="js/jquery-3.6.0.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap.dropdown.min.js" defer></script>
<script src="js/affix.min.js"></script>
<script src="js/scrollspy.min.js"></script>
<script src="js/error.js?v=8"></script>
</head>
<body data-bs-spy="scroll">
   <div id="container">
   <?php
      
      if (isset($_SESSION['id'])) {
         include 'dbcon.php';

         $id_number = $_SESSION['id'];

         $connecting = "SELECT image FROM credentials WHERE id=$id_number";
         $querying = mysqli_query($dbconn, $connecting);
         $rowing = mysqli_fetch_assoc($querying);

         $_SESSION['image'] = $rowing['image'];

         if ($querying && $querying->num_rows > 0) {
            echo '<a href="profile"><img style="border: 2px #FFFFFF solid; cursor: pointer; width: 40px; height: 40px; margin-left: 1221px; margin-top: 30px; border-radius: 50%; object-fit: cover;" src="user_images/' . $_SESSION['image'] . '"></a>';
         }
      } else {
         echo '<div id="wb_signup">
         <a class="ui-button ui-corner-all" id="signup" href="./signup">Sign Up</a>
      </div>
      <div id="wb_signin">
         <a class="ui-button ui-corner-all" id="signin" href="./login">Sign In</a>
      </div>';
      }
      ?>
      <div id="wb_Text25">
         <a href="index"><span id="wb_uid0">Job Finder</span><span id="wb_uid1">.</span></a>
      </div>
      <nav id="wb_DropdownMenu1">
         <div id="DropdownMenu1" class="DropdownMenu1" style="width:100%;height:auto !important;">
            <div class="container">
               <div class="navbar-header">
                  <button title="Dropdown Menu" type="button" class="navbar-toggle" data-bs-toggle="collapse" data-bs-target=".DropdownMenu1-navbar-collapse">
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                  </button>
               </div>
               <div class="DropdownMenu1-navbar-collapse collapse">
                  <ul class="nav navbar-nav" itemscope="itemscope" itemtype="https://schema.org/SiteNavigationElement">
                     <li itemprop="name" class="nav-item">
                        <a href="./index" class="nav-link" itemprop="url">Home</a>
                     </li>
                     <li itemprop="name" class="nav-item">
                        <a href="./myprofile" class="nav-link" itemprop="url">Find work</a>
                     </li>
                     <li itemprop="name" class="nav-item">
                        <a href="./explore" class="nav-link" itemprop="url">Find skill</a>
                     </li>
                     <li itemprop="name" class="nav-item">
                        <a href="./contact" class="nav-link" itemprop="url">Contact us</a>
                     </li>
                     <li itemprop="name" class="nav-item">
                        <a href="./about" class="nav-link" itemprop="url">About</a>
                     </li>
                     <li itemprop="name" class="nav-item dropdown-hover dropdown">
                        <a href="#" class="dropdown-toggle" data-bs-offset="0,1" data-bs-placement="bottom-start" data-bs-toggle="dropdown"> <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                           <li itemprop="name" class="nav-item dropdown-item">
                              <a href="./admin" class="nav-link" itemprop="url">Admin</a>
                           </li>
                           <li itemprop="name" class="nav-item dropdown-item">
                              <a href="./login" class="nav-link" itemprop="url">Login</a>
                           </li>
                           <li itemprop="name" class="nav-item dropdown-item">
                              <a href="./signup" class="nav-link" itemprop="url">Sign Up</a>
                           </li>
                        </ul>
                     </li>
                  </ul>
               </div>
            </div>
         </div>
      </nav>
      <div id="wb_Text1">
         <span id="wb_uid2">Sorry You Cannot Access That</span>
      </div>
      <div id="wb_Image1">
         <img src="images/b2f4fe438c71b46865c16f63fbf1aa6b.gif" id="Image1" alt="" width="400" height="400">
      </div>
      <a href="javascript:history.back()"><button type="submit" id="back" name="back" value="Head Back" class="ui-button ui-corner-all"><span class="ui-button-icon ui-icon ui-primary"></span><span class="ui-button-icon-space"> </span>Head Back</button></a>
   </div>
</body>
</html>