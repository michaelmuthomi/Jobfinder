<?php
   include 'dbcon.php';
   include 'alert.php';
   session_start();

   if(!isset($_SESSION['id'])){
      header("Location: login");
   }

   $id_number = $_SESSION['id'];
   $connecting = "SELECT * FROM credentials WHERE id = $id_number";
   $querying = mysqli_query($dbconn, $connecting);
   $row = mysqli_fetch_assoc($querying);   

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Job Finder I Profile</title>
<link href="j.Logo.png" rel="icon" sizes="72x72" type="image/png">
<link href="css/jobfinder.css?v=7" rel="stylesheet">
<link href="css/profile.css?v=7" rel="stylesheet">
<script src="js/jquery-3.6.0.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap.dropdown.min.js" defer></script>
<script src="js/affix.min.js"></script>
<script src="js/scrollspy.min.js"></script>
<script src="js/profile.js?v=7"></script>
</head>
<body data-bs-spy="scroll">
   <div id="container">
      
   <?php
         echo '<div id="wb_Image2" style="z-index: -1;">
         <img src="user_images/'.$row['image'].'" id="Image2" alt="" width="1360" height="1842">
      </div>';
      ?>
      <?php
         echo '<div id="wb_Text1">
         <span id="wb_uid0">Hey,There '.$row['firstname'].'</span><span id="wb_uid1">.</span>
      </div>';
      ?>
      
      <?php
         echo '<div id="wb_Text2">
         <span id="wb_uid2" style="text-transform: capitalize;">Category: '.$row['user'].'</span>
      </div>';
      ?>
      <div id="wb_editprofile">
         <a class="ui-button ui-corner-all" id="editprofile" href="./editprofile">Edit Profile</a>
      </div>
      
      <?php
      include 'dbcon.php';
         $connecting = "SELECT email, user, password FROM credentials WHERE id=".$_SESSION['id']."";
         $querying = mysqli_query($dbconn, $connecting);

         while ($rowing = mysqli_fetch_assoc($querying)) {
            if($rowing['user'] == "jobseaker"){
               echo '<div id="wb_myskills">
               <a class="ui-button ui-corner-all" id="myskills" href="./myprofile">My Skills</a>
            </div>';
            }
         }
      ?>
      <button type="submit" id="signout" name="signout" value="Sign Out" class="ui-button ui-corner-all">Log Out</button>
      
      <?php
         echo '<div id="wb_Image1">
         <img src="user_images/'.$row['image'].'" id="Image1" alt="" width="50" height="68">
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
         <a href="index"><span id="wb_uid3">Job Finder</span><span id="wb_uid4">.</span></a>
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
      
      <?php
         echo '<div id="wb_firstname">
         <input type="text" id="firstname" name="firstname" value="'.$row['firstname'].'" spellcheck="false" placeholder="First Name" disabled>
         <label id="firstname-label" for="firstname">First Name</label>
      </div>';
      ?>
      
      <?php
         echo '<div id="wb_lastname">
         <input type="text" id="lastname" name="lastname" value="'.$row['lastname'].'" spellcheck="false" placeholder="Last Name" disabled>
         <label id="lastname-label" for="lastname">Last Name</label>
      </div>';
      ?>
      <?php
         echo '<div id="wb_email">
         <input type="text" id="email" name="email" value="'.$row['email'].'" spellcheck="false" placeholder="Email" disabled>
         <label id="email-label" for="email">Email</label>
      </div>';
      ?>
      <?php
         echo '<div id="wb_password">
         <input type="password" id="password" name="password" value="'.$row['password'].'" spellcheck="false" placeholder="Password" disabled>
         <label id="password-label" for="password">Password - Encrypted</label>
      </div>';
      ?>
   </div>
   <script>
$(document).ready(function() {
  // When the "Log Out" button is clicked
  $('#signout').click(function() {
    // Perform logout actions here

    // Redirect the user to the logout page
    window.location.href = 'logout';
  });
});
</script>
</body>
</html>