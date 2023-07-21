<?php
   session_start();
   if(!isset($_GET['title'])){
      header("Location: explore");
      exit;
   }

   include 'dbcon.php';
   $title = $_GET['title'];
   $description = $_GET['description'];
   $video = $_GET['video'];

   

   $connect = "SELECT * FROM skills WHERE title='".$title."'";
   $query = mysqli_query($dbconn, $connect);
   $row = mysqli_fetch_assoc($query);
   $_SESSION['contact_user_email'] = $row['email'];
   $_SESSION['contact_user_image'] = $row['image'];

   $connect1 = "SELECT * FROM credentials where email='".$row['email']."'";
   $query1 = mysqli_query($dbconn, $connect1);
   $row1 = mysqli_fetch_assoc($query1);

   $_SESSION['contact_user_firstname'] = $row1['firstname'];
   $_SESSION['contact_user_lastname'] = $row1['lastname'];
   $_SESSION['contact_user_contact'] = $row1['contact'];
   $_SESSION['contact_user_skill'] = $row1['skill'];

   

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Job Finder I Learn More</title>
<link href="j.Logo.png" rel="icon" sizes="72x72" type="image/png">
<link href="css/jobfinder.css?v=7" rel="stylesheet">
<link href="css/learnmore.css?v=7" rel="stylesheet">
<script src="js/jquery-3.6.0.min.js"></script>
<script src="js/jquery-ui.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap.dropdown.min.js" defer></script>
<script src="js/affix.min.js"></script>
<script src="js/scrollspy.min.js"></script>
<script src="js/wwb18.min.js"></script>
<script src="js/learnmore.js?v=7"></script>
</head>
<body data-bs-spy="scroll">
   <div id="container">
   <?php
         echo '<div id="wb_MediaPlayer1" style="z-index: -1;">
         <video id="MediaPlayer1" autoplay controls loop>
               <source src="videos/'.$video.'" type="video/mp4">
            </video>
         </div>';
      ?>
      <?php
         echo '<div id="wb_Text1" style="left: 328; top: 589;">
         <p style="width: 1000px;">'.$title.'</p>
      </div>';
      ?>
      <?php
         echo '<div id="wb_Text2">
         <p>'.$description.'</p>
      </div>';
      
      ?>
      <div id="wb_hireme">
<a class="ui-button ui-corner-all" id="hireme" href="./hireme">Hire Me</a>
      </div>
      <?php
         echo '<div id="wb_profile">
         <a href="./viewprofile"><img src="user_images/'.$row['image'].'" id="profile" alt="" width="50" height="75"></a>
      </div>';
      
      ?>
      
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
      <div id="wb_viewprofile">
<a class="ui-button ui-corner-all" id="viewprofile" href="./viewprofile">View Profile</a>
      </div>
   </div>
</body>
</html>