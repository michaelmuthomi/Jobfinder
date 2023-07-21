<?php
session_start();
if (isset($_POST['getstarted'])) {
   include 'dbcon.php';
   $email = $_POST['email'];
   $_SESSION['email'] = $email;

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
      header("Location: signup");
   }
}
?>
<!doctype html>
<html>

<head>
   <meta charset="utf-8">
   <title>Job Finder I Home</title>
   <link href="j.Logo.png" rel="icon" sizes="72x72" type="image/png">
   <link href="css/base/jquery-ui.min.css" rel="stylesheet">
   <link href="css/jobfinder.css?v=7" rel="stylesheet">
   <link href="css/index.css?v=7" rel="stylesheet">
   <script src="js/jquery-3.6.0.min.js"></script>
   <script src="js/wb.stickylayer.min.js"></script>
   <script src="js/jquery-ui.min.js"></script>
   <script src="js/wb.droplist.min.js"></script>
   <script src="js/wb.rotate.min.js"></script>
   <script src="js/wwb18.min.js"></script>
   <script src="js/index.js?v=7"></script>
   <style>
      body {
         overflow-y: visible;
      }
   </style>
   <script src="https://accounts.google.com/gsi/client" async defer></script>
   <script>
      function onSignIn(googleUser) {
         // Retrieve the user's profile information
         var profile = googleUser.getBasicProfile();
         var idToken = googleUser.getAuthResponse().id_token;

         // Send the idToken and other profile information to your PHP backend for verification
         var xhr = new XMLHttpRequest();
         xhr.open('POST', 'verify_google_login.php');
         xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
         xhr.onload = function () {
            if (xhr.status === 200) {
               // Redirect the user to the appropriate page based on the PHP response
               var response = JSON.parse(xhr.responseText);
               if (response.success) {
                  window.location.href = 'dashboard.php';
               } else {
                  window.location.href = 'signup.php';
               }
            }
         };
         xhr.send('id_token=' + idToken + '&email=' + profile.getEmail());
      }

      // Initialize the Google Sign-In
      google.accounts.id.initialize({
         client_id: 'AIzaSyBtySkstsT0ErobhYa9OntzK79eHHeR-hI',
         callback: onSignIn,
      });
   </script>

</head>

<body>
   <div id="container">
      <div id="wb_Image7">
         <img src="images/pexels-cottonbro-studio-7872811.jpg" id="Image7" alt="" width="342" height="228">
      </div>
      <div id="wb_Shape2">
         <div id="Shape2"></div>
      </div>
      <div id="wb_Shape3">
         <div id="Shape3"></div>
      </div>
      <div id="wb_Line4">
         <img src="images/img0006.png" id="Line4" alt="" width="-1360" height="-613">
      </div>
      <div id="wb_Line3">
         <img src="images/img0005.png" id="Line3" alt="" width="1190" height="-491">
      </div>
      <div id="wb_Image1">
         <img src="images/pexels-lara-jameson-9363130.jpg" id="Image1" alt="" width="350" height="525">
      </div>
      <div id="wb_Image2">
         <img src="images/pexels-hải-anh-10031587.jpg" id="Image2" alt="" width="350" height="517">
      </div>
      <div id="wb_Image3">
         <img src="images/pexels-anastasia-shuraeva-5704413.jpg" id="Image3" alt="" width="342" height="513">
      </div>
      <div id="wb_Image4">
         <img src="images/pexels-mart-production-9558601.jpg" id="Image4" alt="" width="324" height="486">
      </div>
      <div id="wb_Image5" style="z-index: -1;">
         <img src="images/pexels-mart-production-9558725.jpg" id="Image5" alt="" width="320" height="480">
      </div>
      <div id="wb_Image6">
         <img src="images/pexels-mart-production-9558712.jpg" id="Image6" alt="" width="320" height="213">
      </div>
      <div id="wb_Image8">
         <img src="images/pexels-mart-production-9558603.jpg" id="Image8" alt="" width="324" height="216">
      </div>
      <div id="wb_Shape1">
         <div id="Shape1"></div>
      </div>
      <div id="wb_Text1">
         <span id="wb_uid0">Explore Milions of Skills<br>Uploaded Every Second</span>
      </div>

      <form action="index" method="post">
         <div id="wb_email">
            <input type="email" id="email" name="email" value="" spellcheck="false" placeholder="Email Address">
            <label id="email-label" for="email">Email Address</label>
         </div>
         <button type="submit" id="getstarted" name="getstarted" value="Get Started Now"
            class="ui-button ui-corner-all">Get Started Now</button>
      </form>

      <div id="wb_Text2">
         <span id="wb_uid1">Get a Job<br>With <br>Job Finder</span>
      </div>
      <div id="wb_Text3">
         <span id="wb_uid2">Get a Job Instantly</span>
      </div>
      <div id="wb_Text4">
         <span id="wb_uid3">No certificates Required</span>
      </div>
      <div id="wb_Text5">
         <span id="wb_uid4">No Waitlisting</span>
      </div>
      <div id="wb_Card1" class="card">
         <div id="Card1-card-body">
            <div id="Card1-card-item0">34K+</div>
            <div id="Card1-card-item1">SKILLS</div>
         </div>
      </div>
      <div id="wb_Card2" class="card">
         <div id="Card2-card-body">
            <div id="Card2-card-item0">800K+</div>
            <div id="Card2-card-item1">MEMEBERS</div>
         </div>
      </div>
      <div id="wb_Card3" class="card">
         <div id="Card3-card-body">
            <div id="Card3-card-item0">11K+</div>
            <div id="Card3-card-item1">EMPLOYERS</div>
         </div>
      </div>
      <div id="wb_Card4" class="card">
         <div id="Card4-card-body">
            <div id="Card4-card-item0">4.8⭐⭐⭐⭐</div>
            <div id="Card4-card-item1">RATING</div>
         </div>
      </div>
      <div id="wb_Text6">
         <span id="wb_uid5">Explore The Uploaded Skills</span>
      </div>

      <?php
      include 'dbcon.php';
      $connect = "SELECT * FROM skills LIMIT 4"; // Add LIMIT 4 to fetch only four rows
      $query = mysqli_query($dbconn, $connect);

      $num = 5;

      while ($row = $query->fetch_assoc()) {
         $description = $row['description'];
         $words = explode(' ', $description);
         if (count($words) > 10) {
            $description = implode(' ', array_slice($words, 0, 10)) . '...';
         }
         echo '<a style="text-decoration: none; color: white;" href="./learnmore?title=' . $row["title"] . '&description=' . $row["description"] . '&video=' . $row["video"] . '&image=' . $row["image"] . '">
        <div id="wb_Card' . $num . '" class="card">
        <div id="Card' . $num . '-card-body">
            <video id="Card' . $num . '-card-item0" style="height: 160px; object-fit: cover;" src="videos/' . $row['video'] . '" width="900" height="601" alt="" title=""></video>
            <div id="Card' . $num . '-card-item1">' . $row['category'] . '</div>
            <div id="Card' . $num . '-card-item2">' . $row['title'] . ': ' . $description . '</div>
        </div>
        </div></a>';

         $num++;
      }
      ?>



      <div id="wb_Text7">
         <span id="wb_uid6">Learn From Creative Experts</span>
      </div>
      <div id="wb_Text8">
         <span id="wb_uid7">Skill Uploaded are High Quality<br>and Showcase Each user in a special way</span>
      </div>

      <?php

      ?>

      <?php
      include 'dbcon.php';
      $connect = "SELECT * FROM credentials LIMIT 4";
      $query = mysqli_query($dbconn, $connect);

      $image = 9;
      $spanId = 8;
      $text = 10;
      $userImg = 9;

      while ($row = $query->fetch_assoc()) {
         echo "<div id='wb_Image" . $userImg . "'>
               <a href='./set?firstname=" . $row['firstname'] . "&lastname=" . $row['lastname'] . "&contact=" . $row['contact'] . "&email=" . $row['email'] . "&skill=" . $row['skill'] . "&image=" . $row['image'] . "' onmouseover='Animate('wb_Image" . $userImg . "', '', '', '', '', '90', 500, '');return false;' onmouseout='Animate('wb_Image" . $userImg . "', '', '', '', '', '100', 500, '');return false;'><img style='object-fit: cover; height: 339px;' src='user_images/" . $row['image'] . "' id='Image" . $userImg . "'  width='555' height='371'></a>
            </div>";
         echo '<div id="wb_Text' . $image . '">
                        <span id="wb_uid' . $spanId . '">' . $row['firstname'] . '</span>
                     </div>';
         echo '<div id="wb_Text' . $text . '">
                        <span id="wb_uid' . $image . '">' . $row['skill'] . '</span>
                     </div>';


         $image += 2;
         $spanId += 2;
         $text += 2;
         $userImg += 1;
      }


      ?>

      

      <div id="wb_Text17">
         <span id="wb_uid16">Why People Love Job Finder</span>
      </div>
      <div id="wb_Text18">
         <span id="wb_uid17">Whether its Looking for a job or looking for employees <br>Job finder has got you
            covered</span>
      </div>
      <div id="wb_Text19">
         <span id="wb_uid18">&quot;</span><span id="wb_uid19">I came across Job finder as i was looking for a job in
            software engeneering &quot;</span>
      </div>
      <div id="wb_Text20">
         <span id="wb_uid20">-- Michael Gikunda</span>
      </div>
      <div id="wb_Text21">
         <span id="wb_uid21">Job Finder for Employers</span>
      </div>
      <div id="wb_Text22">
         <span id="wb_uid22">Dont risk hiring a graduate who might not <br>have the skill that will help achieve your
            objective <br><br>As job finder we help you get the most <br>skilled individual for your team.</span>
      </div>
      <a href="explore"><button type="submit" id="ThemeableButton2" name="" value="Get Started"
            class="ui-button ui-corner-all">Get Started</button></a>
      <div id="wb_Image13">
         <img src="images/pexels-cottonbro-studio-5989927 (1).jpg" id="Image13" alt="" width="537" height="358">
      </div>
      <div id="wb_Text23">
         <span id="wb_uid23">Frequently Asked Questions</span>
      </div>
      <form action="exlore" method="post">
         <nav id="wb_CssMenu1">
            <ul id="CssMenu1" role="menubar" class="nav" itemscope="itemscope"
               itemtype="https://schema.org/SiteNavigationElement">
               <li role="menuitem" class="nav-item firstmain" itemprop="name"><a class="nav-link"
                     href="./explore?Name=all" target="_self" itemprop="url">All</a>
               </li>
               <li role="menuitem" class="nav-item" itemprop="name"><a class="nav-link" href="./explore?Name=tech"
                     target="_self" itemprop="url">Tech</a>
               </li>
               <li role="menuitem" class="nav-item" itemprop="name"><a class="nav-link" href="./explore?Name=lifestyle"
                     target="_self" itemprop="url">Lifestyle</a>
               </li>
               <li role="menuitem" class="nav-item" itemprop="name"><a class="nav-link" href="./explore?Name=fashion"
                     target="_self" itemprop="url">Fashion</a>
               </li>
               <li role="menuitem" class="nav-item" itemprop="name"><a class="nav-link" href="./explore?Name=mechanics"
                     target="_self" itemprop="url">Mechanics</a>
               </li>
            </ul>
         </nav>
      </form>
      <a href="signup" onmouseover="changeText('ThemeableButton3', 'Signup')"
         onmouseout="changeText('ThemeableButton3', 'Free')">
         <button type="submit" id="ThemeableButton3" name="" value="Facebook" class="ui-button ui-corner-all"
            style="background-color: #FFCE58;">Free</button>
      </a>
      <a href="signup" onmouseover="changeText('ThemeableButton4', 'Signup')"
         onmouseout="changeText('ThemeableButton4', 'Fast')">
         <button type="submit" id="ThemeableButton4" name="" value="Google" style="background-color: #FF9736;"
            class="ui-button ui-corner-all">Fast</button>
      </a>
      <a href="signup" onmouseover="changeText('ThemeableButton5', 'Signup')"
         onmouseout="changeText('ThemeableButton5', 'Secure')">
         <button type="submit" id="ThemeableButton5" name="" value="Twitter" class="ui-button ui-corner-all"
            style="background-color: #F55A4B;">Secure</button>
      </a>

      <script>
         function changeText(buttonId, newText) {
            var button = document.getElementById(buttonId);
            button.innerHTML = newText;
         }
      </script>


      <hr id="Line1">
      <hr id="Line2">
      <div id="wb_Text24">
         <span id="wb_uid24">or</span>
      </div>
      <div id="wb_Text26">
         <span id="wb_uid25">All Users Are entitled to their Privacy. All Videos Uploaded are strictily Confidential and
            Are not sold to third party companies</span>
      </div>
      <div id="wb_Text27">
         <span id="wb_uid26">© Job Finder 2023</span>
      </div>
      <div id="wb_Shape4">
         <div id="Shape4"></div>
      </div>
      <div id="wb_Text28">
         <span id="wb_uid27"><strong>Employers</strong></span>
      </div>
      <div id="wb_Text29">
         <a href="login"><span id="wb_uid28">Login</span></a>
      </div>
      <div id="wb_Text30">
         <a href="signup"><span id="wb_uid29">Sign Up</span></a>
      </div>
      <div id="wb_Text31">
         <a href="explore"><span id="wb_uid30">Explore Skills</span></a>
      </div>
      <div id="wb_Text32">
         <a href="profile"><span id="wb_uid31">Profile</span></a>
      </div>
      <div id="wb_Text33">
         <span id="wb_uid32"><strong>Users</strong></span>
      </div>
      <div id="wb_Text36">
         <a href="upload"><span id="wb_uid33">Upload Skill</span></a>
      </div>

      <div id="wb_Text38">
         <span id="wb_uid34" style="margin-left: 300px;"><strong>Other</strong></span>
      </div>
      <div id="wb_Text39">
         <a href="contact" style="margin-left: 300px;"><span id="wb_uid35">Contact.Us</span></a>
      </div>
      <div id="wb_Text40">
         <a href="about" style="margin-left: 300px;"><span id="wb_uid36">About</span></a>
      </div>

      <div id="wb_Text38">
         <span id="wb_uid34"><strong>Admin</strong></span>
      </div>
      <div id="wb_Text39">
         <a href="admin"><span id="wb_uid35">Login</span></a>
      </div>
      <div id="wb_Text40">
         <a href="adminpanel"><span id="wb_uid36">Admin Panel</span></a>
      </div>
      <div id="wb_Text41">
         <span id="wb_uid37">© Job Finder 2023</span>
      </div>
      <a href="myprofile"><button type="submit" id="ThemeableButton8" name="" value="Get Started"
            class="ui-button ui-corner-all">Get Started</button></a>
      <?php

      if (isset($_SESSION['id'])) {
         include 'dbcon.php';

         $id_number = $_SESSION['id'];

         $connecting = "SELECT image FROM credentials WHERE id=$id_number";
         $querying = mysqli_query($dbconn, $connecting);
         $rowing = mysqli_fetch_assoc($querying);

         $_SESSION['image'] = $rowing['image'];

         if ($querying && $querying->num_rows > 0) {
            echo '<a href="profile"><img style="box-shadow: 0px 0px 10px black; border: 2px #FFFFFF solid; cursor: pointer; width: 40px; height: 40px; margin-left: 1221px; margin-top: 30px; border-radius: 50%; object-fit: cover;" src="user_images/' . $_SESSION['image'] . '"></a>';
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
         <a href="index"><span id="wb_uid38">Job Finder</span><span id="wb_uid39">.</span></a>
      </div>
      <div id="wb_DropList1">
         <select id="DropList1">
            <option value="What is Job Finder?" data-caption="Job finder is a skill based job Search platform
&lt;br&gt;">What is Job Finder?</option>
         </select>
      </div>
      <div id="wb_DropList2">
         <select id="DropList2">
            <option value="How do i upload my skill?" data-caption="Go to the upload my skill page and do your thing">
               How do i upload my skill?</option>
         </select>
      </div>
      <div id="wb_DropList3">
         <select id="DropList3">
            <option value="How do i find an employee?"
               data-caption="Go to the explore page and go through the diverse skills">How do i find an employee?
            </option>
         </select>
      </div>
      <div id="wb_Text34">
         <a href="login"><span id="wb_uid40">Login</span></a>
      </div>
      <div id="wb_Text35">
         <a href="signup"><span id="wb_uid41">Sign Up</span></a>
      </div>
      <div id="wb_Text37">
         <a href="profile"><span id="wb_uid42">Profile</span></a>
      </div>
   </div>
   <div id="Layer1">
      <div id="wb_top">
         <a class="ui-button ui-corner-all" id="top" href="#">Get Started</a>
      </div>
   </div>
</body>

</html>