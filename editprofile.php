<?php
   include 'dbcon.php';
   include 'alert.php';
   session_start();


   if(!isset($_SESSION['id'])){
      header("Location: login");
   }

   $id_number = $_SESSION['id'];
   $connect = "SELECT * FROM credentials WHERE id = $id_number";
   $query = mysqli_query($dbconn, $connect);
   $row = mysqli_fetch_assoc($query);

   if (isset($_POST['save'])) {
      $id_location = $_SESSION['id'];
      $update_values = array();

      // Check each field individually and add to the update query if not empty
      if (!empty($_POST['firstname'])) {
         $firstname = $_POST['firstname'];
         $update_values[] = "firstname = '$firstname'";
      }
      if (!empty($_POST['lastname'])) {
         $lastname = $_POST['lastname'];
         $update_values[] = "lastname = '$lastname'";
      }
      if (!empty($_POST['contact'])) {
         $contact = $_POST['contact'];
         $update_values[] = "contact = '$contact'";
      }
      if (!empty($_POST['email'])) {
         $email = $_POST['email'];
         $update_values[] = "email = '$email'";
      }
      if (!empty($_POST['password'])) {
         $password = sha1($_POST['password']);
         $update_values[] = "password = '$password'";
      }
      if (!empty($_FILES["profilepic"]["name"])) {
         $image_name = $_FILES["profilepic"]["name"];
         $image_tmp_name = $_FILES["profilepic"]["tmp_name"];
         $image_path = "user_images/" . $image_name;
         move_uploaded_file($image_tmp_name, $image_path);
         $update_values[] = "image = '$image_name'";
         // Update the image in the "skills" table
         
         $update_skills_query = "UPDATE skills SET image = '$image_name' WHERE email = '".$row['email']."'";
         $skills_query = mysqli_query($dbconn, $update_skills_query);
      }

      // Construct the update query with the collected values
      if (!empty($update_values)) {
         $update_query = "UPDATE credentials SET " . implode(', ', $update_values) . " WHERE id = $id_location";
         $query = mysqli_query($dbconn, $update_query);

         if ($query) {
            header("Location: editprofile");
         }else{
            update_failed();
         }
      } else {
         // No fields were provided for update
         update_failed();
      }
   }
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Job Finder I Edit Profile</title>
<link href="j.Logo.png" rel="icon" sizes="72x72" type="image/png">
<link href="css/jobfinder.css?v=7" rel="stylesheet">
<link href="css/editprofile.css?v=7" rel="stylesheet">
<script src="js/jquery-3.6.0.min.js"></script>
<script src="js/jquery-ui.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap.dropdown.min.js" defer></script>
<script src="js/affix.min.js"></script>
<script src="js/scrollspy.min.js"></script>
<script src="js/wwb18.min.js"></script>
<script src="js/editprofile.js?v=7"></script>
</head>
<body data-bs-spy="scroll">
   <form action="editprofile" method="post" enctype="multipart/form-data">
   <div id="container">
      
      <?php
         echo '<div id="wb_Image1" style="z-index: -1;">
         <img src="user_images/'.$row['image'].'" id="Image1" alt="" width="1360" height="2040">
      </div>';
      ?>
      <div id="wb_contact">
         <input type="text" id="contact" name="contact" value="" spellcheck="false" placeholder="Contact">
         <label id="contact-label" for="contact">Contact</label>
      </div>
      <div id="wb_email">
         <input type="text" id="email" name="email" value="" spellcheck="false" placeholder="Email">
         <label id="email-label" for="email">Email</label>
      </div>
      <div id="wb_password">
         <input type="password" id="password" name="password" value="" spellcheck="false" placeholder="Password">
         <label id="password-label" for="password">Password</label>
      </div>
      <div id="wb_lastname">
         <input type="text" id="lastname" name="lastname" value="" spellcheck="false" placeholder="Last Name">
         <label id="lastname-label" for="lastname">Last Name</label>
      </div>
      <div id="wb_firstname">
         <input type="text" id="firstname" name="firstname" value="" spellcheck="false" placeholder="First Name">
         <label id="firstname-label" for="firstname">First Name</label>
      </div>
      <div id="wb_Text10">
         <p>Edit Profile</p>
      </div>
<div id="_profilepic" class="input-group">
         <input class="form-control" type="text" readonly id="_profilepic-input" placeholder="Profile Pic">
         <label class="input-group-btn">
            <input type="file" accept=".gif,.jpeg,.jpg,.png" name="profilepic" id="_profilepic-file"><span class="btn">Browse...</span>
         </label>
      </div>
      <button type="submit" id="save" name="save" value="Save" class="ui-button ui-corner-all">Save</button>
      
      <?php
         echo '<div id="wb_Text1" class="h3">
         <h3>'.$row['firstname'].' '.$row['lastname'].'</h3>
      </div>';
      ?>
      <?php
         echo '<div id="wb_profile">
         <img src="user_images/'.$row['image'].'" id="profile" alt="" width="150" height="225">
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
      
      <?php
         echo '<div id="wb_Text3">
         <span id="wb_uid2">📧</span><span id="wb_uid3"> </span><span id="wb_uid4">'.$row['email'].'</span>
      </div>';
      ?>
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
         echo '<div id="wb_Text2">
         <span id="wb_uid5">📞</span><span id="wb_uid6"> </span><span id="wb_uid7">'.$row['contact'].'</span>
      </div>';
      ?>
   </div>
   </form>
</body>
</html>