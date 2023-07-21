<?php
session_start();
if (isset($_POST['signup'])) {
   include 'dbcon.php';
   $email = $_POST['email'];
   $firstname = $_POST['firstname'];
   $lastname = $_POST['lastname'];
   $password = $_POST['password'];

   $_SESSION['email'] = $email;
   $_SESSION['firstname'] = $firstname ;
   $_SESSION['lastname'] = $lastname ;
   $_SESSION['password'] = $password;

   $connect = "SELECT email FROM credentials";
   $query = mysqli_query($dbconn, $connect);

   $matchFound = false; // Flag variable to track if a matching email was found

   while ($row = mysqli_fetch_assoc($query)) {
      if ($row['email'] == $email) {
         $matchFound = true;
         break; // Exit the loop since a match is found
      }
   }

   if ($matchFound) {
      header("Location: login");
   } else {
      header("Location: finishprofile");
   }

}

?>
<!doctype html>
<html>

<head>
   <meta charset="utf-8">
   <title>Job Finder I Sign Up</title>
   <link href="j.Logo.png" rel="icon" sizes="72x72" type="image/png">
   <link href="css/jobfinder.css?v=7" rel="stylesheet">
   <link href="css/signup.css?v=7" rel="stylesheet">
   <script src="js/jquery-3.6.0.min.js"></script>
   <script src="js/popper.min.js"></script>
   <script src="js/bootstrap.min.js"></script>
   <script src="js/bootstrap.dropdown.min.js" defer></script>
   <script src="js/affix.min.js"></script>
   <script src="js/scrollspy.min.js"></script>
   <script src="js/signup.js?v=7"></script>
</head>

<body data-bs-spy="scroll">
   <div id="container">
      <div id="wb_Image1" style="z-index: -1;">
         <img src="images/pexels-mart-production-9558601.jpg" id="Image1" alt="" width="1360" height="2040">
      </div>

      <form action="signup" method="post">
         <button type="submit" id="signUp" name="signup" value="Sign Up" class="ui-button ui-corner-all">Sign
            Up</button>
         <div id="wb_Text2">
            <span id="wb_uid2">Lets get Started</span>
         </div>
         <div id="wb_Text3">
            <span id="wb_uid3">Already Have An Account?</span>
         </div>
         <div id="wb_Text4">
            <a href="login"><span id="wb_uid4">Login its Free</span></a>
         </div>
         <?php
         if (isset($_SESSION['email'])) {
            echo '<div id="wb_email">
         <input type="email" id="email" name="email" value="' . $_SESSION['email'] . '" maxlength="50" spellcheck="false" placeholder="Email">
         <label id="email-label" for="email">Email</label>
      </div>';
            echo '<div id="wb_Text1">
         <span id="wb_uid0">Create an Account</span><span id="wb_uid1">.</span>
      </div>';
         } else {
            echo '<div id="wb_email">
         <input type="email" id="email" name="email" value="" maxlength="50" spellcheck="false" placeholder="Email" required>
         <label id="email-label" for="email-address">Email</label>
      </div>';
            echo '<div id="wb_Text1">
      <span id="wb_uid0">Create an Account</span><span id="wb_uid1">.</span>
   </div>';
         }
         ?>
         <div id="wb_password">
            <input type="password" id="password" name="password" value="" spellcheck="false" placeholder="Password" required>
            <label id="password-label" for="password">Password</label>
         </div>
         <div id="wb_firstname">
            <input type="text" id="firstname" name="firstname" value="" spellcheck="false" placeholder="First Name" required>
            <label id="firstname-label" for="firstname">First Name</label>
         </div>
         <div id="wb_lastname">
            <input type="text" id="lastname" name="lastname" value="" spellcheck="false" placeholder="Last Name" required>
            <label id="lastname-label" for="lastname">Last Name</label>
         </div>
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
         <a href="index"><span id="wb_uid5">Job Finder</span><span id="wb_uid6">.</span></a>
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
                              <a href="./admin" class="nav-link" itemprop="url">Admin</a>
                           </li>
                           <li itemprop="name" class="nav-item dropdown-item">
                              <a href="./login" class="nav-link" itemprop="url">Login</a>
                           </li>
                           <li itemprop="name" class="nav-item dropdown-item">
                              <a href="./signup" class="nav-link active" itemprop="url">Sign Up</a>
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