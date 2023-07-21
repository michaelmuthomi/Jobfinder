<?php
session_start();

if(isset($_SESSION["adminloggedin"])){
   header("Location: adminpanel");
}

if (isset($_POST['login'])) {

   include 'dbcon.php';
   include 'alert.php';

   $email = $_POST["email"];
   $password = $_POST["password"];

   $connect = "SELECT * FROM admin";
   $query = mysqli_query($dbconn, $connect);

   while ($row = mysqli_fetch_assoc($query)) {
      if ($row['email'] == $email && $row['password'] == sha1($password)) {
         $_SESSION["adminloggedin"] = TRUE;
         header("Location: adminpanel");
         exit();
      }
   }

   invalid_credentials();
}

?>
<!doctype html>
<html>

<head>
   <meta charset="utf-8">
   <title>Job Finder I Admin Login</title>
   <link href="j.Logo.png" rel="icon" sizes="72x72" type="image/png">
   <link href="css/jobfinder.css?v=7" rel="stylesheet">
   <link href="css/admin.css?v=7" rel="stylesheet">
   <script src="js/jquery-3.6.0.min.js"></script>
   <script src="js/popper.min.js"></script>
   <script src="js/bootstrap.min.js"></script>
   <script src="js/bootstrap.dropdown.min.js" defer></script>
   <script src="js/affix.min.js"></script>
   <script src="js/scrollspy.min.js"></script>
   <script src="js/admin.js?v=7"></script>
</head>

<body data-bs-spy="scroll">
   <div id="container" >
   <?php
      include 'dbcon.php';
      if(!isset($_SESSION['loggedIn'])){
         echo '<div id="wb_Image1" style="z-index: -1;">
            <img src="images/pexels-mart-production-9558601.jpg" id="Image1" alt="" width="1359" height="1359">
         </div>';
      }else{
         $id_number = $_SESSION['id'];
      $connecting = "SELECT * FROM credentials WHERE id = $id_number";
      $querying = mysqli_query($dbconn, $connecting);
      $row = mysqli_fetch_assoc($querying);

      echo '<div id="wb_Image1" style="z-index: -1;">
            <img src="user_images/' . $row['image'] . '" id="Image1" alt="" width="1359" height="1359">
         </div>';
      }
      ?>
      
      
      <div id="wb_Text1">
         <span id="wb_uid0">Hey, Admin</span><span id="wb_uid1">👋</span>
      </div>
      <div id="wb_Text2">
         <span id="wb_uid2">Enter your details to access The Admin panel</span>
      </div>
      <form action="admin" method="post">
         <div id="wb_email">
            <input type="text" id="email" name="email" value="" spellcheck="false" placeholder="Email" required>
            <label id="email-label" for="email">Email</label>
         </div>
         <div id="wb_password">
            <input type="password" id="password" name="password" value="" spellcheck="false" placeholder="Password" required>
            <label id="password-label" for="password" >Password</label>
         </div>
         <button type="submit" id="login" name="login" value="Login" class="ui-button ui-corner-all">Login</button>
      </form>
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
                  <button title="Dropdown Menu" type="button" class="navbar-toggle" data-bs-toggle="collapse"
                     data-bs-target=".DropdownMenu1-navbar-collapse">
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
                        <a href="#" class="dropdown-toggle" data-bs-offset="0,1" data-bs-placement="bottom-start"
                           data-bs-toggle="dropdown"> <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                           <li itemprop="name" class="nav-item dropdown-item">
                              <a href="./admin" class="nav-link active" itemprop="url">Admin</a>
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
   </div>
</body>

</html>