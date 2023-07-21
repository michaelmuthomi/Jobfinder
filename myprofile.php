<?php
include 'dbcon.php';
   include 'alert.php';
   session_start();

   if(!isset($_SESSION['id'])){
      header("Location: login");
   }
include 'dbcon.php';
   $connect = "SELECT email, user, password FROM credentials WHERE id=".$_SESSION['id']."";
   $query = mysqli_query($dbconn, $connect);

   while ($row = mysqli_fetch_assoc($query)) {
      if($row['user'] == "employer"){
         header("Location: error");
      }
   }
?>
<?php
   $_SESSION['myprofile'] = true;

   if(!isset($_SESSION['loggedIn'])){
      header("Location: login");
   }
   include 'dbcon.php';
   $id_number = $_SESSION['id'];
   $connecting = "SELECT * FROM credentials WHERE id = $id_number";
   $querying = mysqli_query($dbconn, $connecting);
   $row = mysqli_fetch_assoc($querying);   

   

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Job Finder I Find Work - Jobfinder</title>
<link href="j.Logo.png" rel="icon" sizes="72x72" type="image/png">
<link href="css/jobfinder.css?v=7" rel="stylesheet">
<link href="css/myprofile.css?v=7" rel="stylesheet">
<script src="js/jquery-3.6.0.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap.dropdown.min.js" defer></script>
<script src="js/affix.min.js"></script>
<script src="js/scrollspy.min.js"></script>
<script src="js/myprofile.js?v=7"></script>
</head>
<body data-bs-spy="scroll">
   <div id="container">
      
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
      <div id="wb_Text2" class="h2">
         <h2>My Uploads</h2>
      </div>
      <div id="wb_uploadmore">
<a class="ui-button ui-corner-all" id="uploadmore" href="./upload">Upload More</a>
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
         <a href="index"><span id="wb_uid0">Job Finder</span><span id="wb_uid1">.</span></a>
      </div>
      
      <?php
         echo '<div id="wb_Text3">
         <span id="wb_uid2">'.$row['email'].'</span>
      </div>';
      ?>
      
      <div id="wb_edit">
<a class="ui-button ui-corner-all" id="edit" href="./editprofile">Edit Profile</a>
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
                        <a href="./myprofile" class="nav-link active" itemprop="url">Find work</a>
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
      include 'dbcon.php';

      $user_email = $row['email'];

      $connect = "SELECT * FROM skills WHERE email='$user_email'";
      $query = mysqli_query($dbconn, $connect);
      
      $sql = "SELECT * FROM skills WHERE email='$user_email'";

      // Execute the query and store the results in a variable
      $result = $dbconn->query($sql);

      // Output the data in the cards
      if ($result->num_rows > 0) {
         // Loop through the results and output them in the cards
         $i = 1;
         
      echo'<div id="Blog1">';
      while($row = $result->fetch_assoc()) {
         $description = $row['description'];
            $words = explode(' ', $description);
            if (count($words) > 7) {
               $description = implode(' ', array_slice($words, 0, 7)) . '...';
            }
                  echo'
                  <div class="blogrow">
                     <div class="blogcolumn">
                     <a style="text-decoration: none; color: white;" href="./learnmore?title='.$row["title"].'&description='.$row["description"].'&video='.$row["video"].'&image='.$row["image"].'">   
                     <div class="blogitem">
                        <div class="blogthumb"><video alt="Michael" onmouseover="this.play()" onmouseleave="this.pause()" src="videos/'.$row['video'].'" loading="lazy"></div>
                           <div class="bloginfo">
                              <span class="blogsubject" style="color:white;">'.$row['category'].'</span>
                              <p><span id="wb_uid" style="font-family: Jost;">'.$row['title'].': '.$description.'</span></p>
                              <a class="blogbutton" href="./learnmore?title='.$row["title"].'&description='.$row["description"].'&video='.$row["video"].'&image='.$row["image"].'">Learn more</a>
                              <a href="./delete_row?delete='.$row['id'].'" >
                              <button class="blogsubject" style="cursor: pointer; margin-top: -20px; color: white; font-family: Jost; background-color: #001017; width: 73px; height: 30px; border: 2px #FFFFFF solid; border-radius: 5px;">Delete</button>
                              </a>
                           </div>
                           
                           
                           </div></a></div>';
      }
      echo '</div>';

   }
   ?>
   </div>
</body>
</html>