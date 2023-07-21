<?php
session_start();
include 'dbcon.php';

if(!isset($_SESSION['id'])){
   header("Location: login");
}
   
?>
<?php
   if(isset($_POST["upload"])){
      include 'alert.php';
      include 'dbcon.php';
   
      $title = $_POST["title"];
      $description = $_POST["description"];
      $category = $_POST["category"];
      $video_name = $_FILES["video"]["name"];
      $video_tmp_name = $_FILES["video"]["tmp_name"];

      $id_number = $_SESSION['id'];
      $request = "SELECT * FROM credentials WHERE id=$id_number" ;
      $querying = mysqli_query($dbconn, $request);
      $final = mysqli_fetch_assoc($querying);

      $id_number = $_SESSION['id'];
      $requesters = "SELECT * FROM credentials WHERE id=$id_number" ;
      $queryin = mysqli_query($dbconn, $requesters);
      $finaly = mysqli_fetch_assoc($queryin);

   
      // Move the uploaded video to the videos folder
      $video_path = "videos/" . $video_name;
      if (move_uploaded_file($video_tmp_name, $video_path)) {
         $email_address = $final['email'];
         $image_name_user = $finaly['image'];
   
          // Insert the video details into the database
          $connect = "INSERT INTO skills(email, title, description, video,category, image) VALUES ('$email_address','$title','$description','$video_name','$category','$image_name_user')";
   
          $query = mysqli_query($dbconn, $connect);
   
          if($query){
            $connect = "SELECT email, user, password FROM credentials WHERE id=".$_SESSION['id']."";
            $query = mysqli_query($dbconn, $connect);
         
            while ($row = mysqli_fetch_assoc($query)) {
               if($row['user'] == "employer"){
                  header("Location: error");
               }elseif($row['user'] == "jobseaker"){
                  header("Location: myprofile");
               }
            }
          }else{
              upload_failed();
          }
      } else {
          echo "Failed to move uploaded file.";
      }    
   }
?>
<!doctype html>
<html>

<head>
   <meta charset="utf-8">
   <title>Job Finder I Upload</title>
   <link href="j.Logo.png" rel="icon" sizes="72x72" type="image/png">
   <link href="css/jobfinder.css?v=7" rel="stylesheet">
   <link href="css/upload.css?v=7" rel="stylesheet">
   <script src="js/jquery-3.6.0.min.js"></script>
   <script src="js/jquery-ui.min.js"></script>
   <script src="js/popper.min.js"></script>
   <script src="js/bootstrap.min.js"></script>
   <script src="js/bootstrap.dropdown.min.js" defer></script>
   <script src="js/affix.min.js"></script>
   <script src="js/scrollspy.min.js"></script>
   <script src="js/wwb18.min.js"></script>
   <script src="js/upload.js?v=7"></script>
</head>

<body data-bs-spy="scroll">
   <div id="container">
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
   <?php
         echo '<div id="wb_Image1">
            <img src="user_images/'.$row['image'].'" id="Image1" alt="" width="1359" height="1359">
         </div>';
      ?>
      <div id="wb_Text1" class="h2">
         <h2>Upload Your Skill</h2>
      </div>
      <form action="upload" method="post" enctype="multipart/form-data">
         <div id="wb_title">
            <input type="text" id="title" name="title" value="" spellcheck="false" placeholder="Skill Title" required>
            <label id="title-label" for="title">Skill Title</label>
         </div>
         <button type="submit" id="upload" name="upload" value="Upload" class="ui-button ui-corner-all">Upload</button>
         <div id="video" class="input-group">
            <input class="form-control" type="text" readonly id="video-input" placeholder="Choose Your Skill Video">
            <label class="input-group-btn">
               <input type="file" accept=".mp4" name="video" id="video-file" required><span class="btn">Browse...</span>
            </label>
         </div>
         <div id="wb_description">
            <textarea name="description" id="description" rows="3" cols="32" spellcheck="false"
               placeholder="Skill Description" required></textarea>
            <label id="description-label" for="description">Skill Description</label>
         </div>
         <select name="category" size="1" id="category" style="padding: 0px 20px 0px 20px;">
            <option value="Tech">Tech</option>
            <option>Fashion</option>
            <option>Lifestyle</option>
            <option>Mechanics</option>
         </select>
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
         <a href="index"><span id="wb_uid0">Job Finder</span><span id="wb_uid1">.</span></a>
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