<?php
session_start();
if (isset($_POST['done'])) {
   include 'dbcon.php';

   $contact = $_POST['contact'];
   $skill = $_POST['skill'];
   $user = $_POST['Name'];
   $image_name = $_FILES["profile"]["name"];
   $image_tmp_name = $_FILES["profile"]["tmp_name"];
   echo $image_name;

   $email = $_SESSION['email'];
   $firstname = $_SESSION['firstname'];
   $lastname = $_SESSION['lastname'];
   $password = sha1($_SESSION['password']);
   
   $connect = "INSERT into credentials(firstname, lastname, contact, email, password, image, user, skill) VALUES ('$firstname','$lastname','$contact','$email','$password','$image_name','$user', '$skill')";
   $query = mysqli_query($dbconn, $connect);

   $image_path = "user_images/" . $image_name;
   if (move_uploaded_file($image_tmp_name, $image_path)) {
      $connecting = "SELECT id FROM credentials WHERE email = '".$email."'";
      $querying = mysqli_query($dbconn, $connecting);
      $rowing = mysqli_fetch_assoc($querying);
      $_SESSION['id'] = $rowing['id'];
      $_SESSION['loggedIn'] = true;
      if($user == "jobseaker"){
         header("Location: myprofile");
      }else{
         header("Location: explore");
      }
   }
}

?>
<!doctype html>
<html>

<head>
   <meta charset="utf-8">
   <title>Job Finder I Finish Profile</title>
   <link href="j.Logo.png" rel="icon" sizes="72x72" type="image/png">
   <link href="css/jobfinder.css?v=7" rel="stylesheet">
   <link href="css/finishprofile.css?v=7" rel="stylesheet">
   <script src="js/jquery-3.6.0.min.js"></script>
   <script src="js/popper.min.js"></script>
   <script src="js/bootstrap.min.js"></script>
   <script src="js/bootstrap.dropdown.min.js" defer></script>
   <script src="js/affix.min.js"></script>
   <script src="js/scrollspy.min.js"></script>
   <script src="js/finishprofile.js?v=7"></script>
</head>

<body data-bs-spy="scroll">
   <form action="finishprofile" method="post" enctype="multipart/form-data">
      <div id="container">
         <div id="wb_Image1" style="z-index: -1;">
            <img src="images/pexels-mart-production-9558601.jpg" id="Image1" alt="" width="1360" height="2040">
         </div>
         <div id="wb_Text1">
            <span id="wb_uid0">Finish Profile </span><span id="wb_uid1">.</span>
         </div>
         <button type="submit" id="done" name="done" value="Done" class="ui-button ui-corner-all">Done</button>
         <div id="wb_Text2">
            <span id="wb_uid2">Almost There</span>
         </div>
         <div id="profile" class="input-group">
            <input class="form-control" type="text" readonly id="profile-input" placeholder="Profile Picture" required>
            <label class="input-group-btn">
               <input type="file" accept="image/*" name="profile" id="profile-file"><span class="btn">Browse...</span>
            </label>
         </div>
         <div id="wb_Text3">
            <span id="wb_uid3">Job Seaker</span>
         </div>
         <div id="wb_Text4">
            <span id="wb_uid4">Employer</span>
         </div>
         <div id="wb_RadioButton1">
            <input type="radio" id="RadioButton1" name="Name" value="jobseaker"><label for="RadioButton1"></label>
         </div>
         <div id="wb_RadioButton2">
            <input type="radio" id="RadioButton2" name="Name" value="employer"><label for="RadioButton2"></label>
         </div>
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
                     <ul class="nav navbar-nav" itemscope="itemscope"
                        itemtype="https://schema.org/SiteNavigationElement">
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
                                 <a href="./signup" class="nav-link" itemprop="url">Sign Up</a>
                              </li>
                           </ul>
                        </li>
                     </ul>
                  </div>
               </div>
            </div>
         </nav>
         <div id="wb_contact">
            <input type="text" id="contact" name="contact" value="" spellcheck="false" placeholder="Contact" required>
            <label id="contact-label" for="contact">Contact</label>
         </div>
         <div id="wb_skill">
            <input type="text" id="skill" name="skill" value="" spellcheck="false" placeholder="Skilled In" required>
            <label id="skill-label" for="skill">Skilled In</label>
         </div>
      </div>
   </form>
</body>

</html>