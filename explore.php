<?php
   include 'dbcon.php';
   include 'alert.php';
   session_start();

   if(!isset($_SESSION['id'])){
      header("Location: login");
   }

   $connect = "SELECT email, user, password FROM credentials WHERE id=".$_SESSION['id']."";
   $query = mysqli_query($dbconn, $connect);

   while ($row = mysqli_fetch_assoc($query)) {
      if($row['user'] == "jobseaker"){
         header("Location: error");
      }
   }
?>
<!doctype html>
<html>

<head>
   <meta charset="utf-8">
   <title>Job Finder I Explore - Find Skill</title>
   <link href="j.Logo.png" rel="icon" sizes="72x72" type="image/png">
   <link href="css/jobfinder.css?v=6" rel="stylesheet">
   <link href="css/explore.css?v=6" rel="stylesheet">
   <script src="js/jquery-3.6.0.min.js"></script>
   <script src="js/popper.min.js"></script>
   <script src="js/bootstrap.min.js"></script>
   <script src="js/bootstrap.dropdown.min.js" defer></script>
   <script src="js/affix.min.js"></script>
   <script src="js/scrollspy.min.js"></script>
   <script src="js/explore.js?v=6"></script>
</head>

<body data-bs-spy="scroll">
   <div id="container">
      <div id="wb_Text6">
         <span id="wb_uid0">Explore The Uploaded Skills</span>
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
                        <a href="./explore" class="nav-link active" itemprop="url">Find skill</a>
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
      <div id="wb_Text8">
         <span id="wb_uid4">Feel free to contact Individual if Intrested</span>
      </div>
   </div>
   <div id="Layer1">
      <div id="wb_Text25">
         <a href="index"><span id="wb_uid5">Job Finder</span><span id="wb_uid6">.</span></a>
      </div>

      <form action="explore" method="post">
         <div id="wb_RadioButton1">
            <input type="radio" id="RadioButton1" name="Name" value="all"><label for="RadioButton1"></label>
         </div>
         <div id="wb_Text2">
            <span id="wb_uid7">All</span>
         </div>
         <div id="wb_Text3">
            <span id="wb_uid8">Tech</span>
         </div>
         <div id="wb_RadioButton2">
            <input type="radio" id="RadioButton2" name="Name" value="tech"><label for="RadioButton2"></label>
         </div>
         <div id="wb_Text4">
            <span id="wb_uid9">Life Style</span>
         </div>
         <div id="wb_RadioButton3">
            <input type="radio" id="RadioButton3" name="Name" value="lifestyle"><label for="RadioButton3"></label>
         </div>
         <div id="wb_Text5">
            <span id="wb_uid10">Fashion</span>
         </div>
         <div id="wb_RadioButton4">
            <input type="radio" id="RadioButton4" name="Name" value="fashion"><label for="RadioButton4"></label>
         </div>
         <div id="wb_Text7">
            <span id="wb_uid11">Mechanics</span>
         </div>
         <div id="wb_RadioButton5">
            <input type="radio" id="RadioButton5" name="Name" value="mechanics"><label for="RadioButton5"></label>
         </div>
         <button type="submit" id="results" name="results" value="Show Results" class="ui-button ui-corner-all">Show
            Results</button>

      </form>

      <?php
   include 'dbcon.php';
   if(isset($_POST['results'])){
      $filter = $_POST['Name'];
      
      echo '<div id="wb_Text9">
      <span id="wb_uid12" style="font-size: 15px;">Category: <span style="color: white; font-size: 20px; text-transform: capitalize;">'.$filter.'</span></span>
   </div>';

      if($filter == "all"){
         $sql = "SELECT * FROM skills";
      }elseif($filter == ""){
         $sql = "SELECT * FROM skills";
      }
      else{
         $sql = "SELECT * FROM skills WHERE category='".$filter."'";
      }
   }elseif(isset($_GET['Name'])){
      $filter = $_GET['Name'];
      
      echo '<div id="wb_Text9">
      <span id="wb_uid12" style="font-size: 15px;">Category: <span style="color: white; font-size: 20px; text-transform: capitalize;">'.$filter.'</span></span>
   </div>';

      if($filter == "all"){
         $sql = "SELECT * FROM skills";
      }elseif($filter == ""){
         $sql = "SELECT * FROM skills";
      }
      else{
         $sql = "SELECT * FROM skills WHERE category='".$filter."'";
      }
   }
   else{
      $sql = "SELECT * FROM skills";
      
      echo '<div id="wb_Text9">
      <span id="wb_uid12">Filter</span>
   </div>';
   }
   
   ?>
   </div>
   <?php

   // Execute the query and store the results in a variable
   $result = $dbconn->query($sql);

   // Output the data in the cards
   if ($result->num_rows > 0) {
      // Loop through the results and output them in the cards
      $i = 1;

      echo '<div id="Blog1">';
      while ($row = $result->fetch_assoc()) {
         $description = $row['description'];
         $words = explode(' ', $description);
         if (count($words) > 7) {
            $description = implode(' ', array_slice($words, 0, 7)) . '...';
         }
         echo '
                     <div class="blogrow">
                        <div class="blogcolumn">
                        <a style="text-decoration: none; color: white;" href="./learnmore?title=' . $row["title"] . '&description=' . $row["description"] . '&video=' . $row["video"] . '&image=' . $row["image"] . '">   
                        <div class="blogitem">
                           <div class="blogthumb"><video alt="Skill" onmouseover="this.play()" onmouseleave="this.pause()" src="videos/' . $row['video'] . '" loading="lazy"></div>
                              <div class="bloginfo">
                                 <span class="blogsubject" style="color:white;">' . $row['category'] . '</span>
                                 <p><span id="wb_uid" style="font-family: Jost;">' . $row['title'] . ': ' . $description . '</span></p>
                                 <a class="blogbutton" href="./learnmore?title=' . $row["title"] . '&description=' . $row["description"] . '&video=' . $row["video"] . '&image=' . $row["image"] . '">Learn more</a>
                              </div>
                              </div></a></div>';
      }
      echo '</div>';
      }
   ?>
</body>

</html>