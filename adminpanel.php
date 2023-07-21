<?php
session_start();

if (!isset($_SESSION["adminloggedin"])) {
   header("Location: admin");
}


?>
<!doctype html>
<html>

<head>
   <meta charset="utf-8">
   <title>Job Finder I Admin Panel</title>
   <link href="j.Logo.png" rel="icon" sizes="72x72" type="image/png">
   <link href="css/base/jquery-ui.min.css" rel="stylesheet">
   <link href="css/jobfinder.css?v=7" rel="stylesheet">
   <link href="css/adminpanel.css?v=7" rel="stylesheet">
   <script src="js/jquery-3.6.0.min.js"></script>
   <script src="js/jquery-ui.min.js"></script>
   <script src="js/adminpanel.js?v=7"></script>
   <script>

      function alert_msg() {
         alert("Deleted Succesfully.")
      }
   </script>
</head>

<body>
   <div id="container">
      <div id="Tabs1">
         <ul>
            <li role="presentation"><a href="#tabs1-page-1"><span>Skills</span></a></li>
            <li role="presentation"><a href="#tabs1-page-2"><span>Credentials</span></a></li>
            <li role="presentation"><a href="#tabs1-page-3"><span>Messages</span></a></li>
            <li role="presentation"><a href="#tabs1-page-4"><span>Admin</span></a></li>
         </ul>
         <div id="tabs1-page-1">
            <table id="Table1">
               <tr>
                  <td class="cell0">
                     <p>&nbsp;<span id="wb_uid0">Title</span></p>
                  </td>
                  <td class="cell1">
                     <p id="wb_uid1"><span id="wb_uid2">&nbsp;</span><span id="wb_uid3">Description</span></p>
                  </td>
                  <td class="cell2">
                     <p id="wb_uid4">&nbsp;<span id="wb_uid5">&nbsp;</span><span id="wb_uid6">Email</span></p>
                  </td>
                  <td class="cell3">
                     <p id="wb_uid7">&nbsp;<span id="wb_uid8">&nbsp;</span><span id="wb_uid9">Video</span></p>
                  </td>
                  <td class="cell4">
                     <p id="wb_uid10">&nbsp;<span id="wb_uid11">&nbsp;</span><span id="wb_uid12">Delete</span></p>
                  </td>
               </tr>
               <?php
               include 'dbcon.php';
               $sql = "SELECT * FROM skills";
               $result = mysqli_query($dbconn, $sql);
               while ($row = $result->fetch_assoc()) {
                  echo '<tr style="text-align: center;">
                  <td class="cell5" style="border: 1px solid black;"><p style="color: white; font-family: Jost; font-size: 16px;">' . $row['title'] . '</p></td>
                  <td class="cell6"  style="border: 1px solid black;"><p style="color: white; font-family: Jost; font-size: 16px;">' . $row['description'] . '</p></td>
                  <td class="cell7" style="border: 1px solid black;"><p style="color: white; font-family: Jost; font-size: 16px;">' . $row['email'] . '</p></td>
                  <td class="cell8" style="border: 1px solid black;"><p style="color: white; font-family: Jost; font-size: 16px;">' . $row['video'] . '</p></td>
                  <td class="cell9" style="border: 1px solid black;"><p style="color: white; font-family: Jost; font-size: 16px;">
                  <a href="./edit?id=' . $row['id'] . '&skill=skill"><button onclick="alert_msg()" style="font-family: Jost;">Delete</button></a>
                  </p></td>
               </tr>';
               }
               ?>
            </table>
         </div>
         <div id="tabs1-page-2">
            <table id="Table2">
               <tr>
                  <td class="cell0">
                     <p>&nbsp;<span id="wb_uid13">First Name</span></p>
                  </td>
                  <td class="cell1">
                     <p id="wb_uid14"><span id="wb_uid15">Last </span><span id="wb_uid16">Name</span></p>
                  </td>
                  <td class="cell2">
                     <p id="wb_uid17">&nbsp;<span id="wb_uid18">&nbsp;</span><span id="wb_uid19">Contact</span></p>
                  </td>
                  <td class="cell3">
                     <p id="wb_uid20">&nbsp;<span id="wb_uid21">&nbsp;</span><span id="wb_uid22">Email</span></p>
                  </td>
                  <td class="cell3">
                     <p id="wb_uid20">&nbsp;<span id="wb_uid21">&nbsp;</span><span id="wb_uid22">Category</span></p>
                  </td>
                  <td class="cell4">
                     <p id="wb_uid23"><span id="wb_uid24">&nbsp;</span><span id="wb_uid25">Image</span></p>
                  </td>
                  <td class="cell5">
                     <p id="wb_uid26">&nbsp;<span id="wb_uid27">&nbsp;</span><span id="wb_uid28">Delete</span></p>
                  </td>
               </tr>
               <?php
               include 'dbcon.php';
               $sql = "SELECT * FROM credentials";
               $result = mysqli_query($dbconn, $sql);
               while ($row = $result->fetch_assoc()) {
                  echo '<tr style="font-family: Jost; text-align: center;">
               <td class="cell6" style="border: 1px solid black;"><p style="color: white; font-family: Jost; font-size: 16px;">' . $row['firstname'] . '</p></td>
               <td class="cell7" style="border: 1px solid black;"><p style="color: white; font-family: Jost; font-size: 16px;">' . $row['lastname'] . '</p></td>
               <td class="cell8" style="border: 1px solid black;"><p style="color: white; font-family: Jost; font-size: 16px;">' . $row['contact'] . '</p></td>
               <td class="cell9" style="border: 1px solid black;"><p style="color: white; font-family: Jost; font-size: 16px;">' . $row['email'] . '</p></td>
               <td class="cell9" style="border: 1px solid black;"><p style="color: white; font-family: Jost; font-size: 16px;">' . $row['user'] . '</p></td>
               <td class="cell10" style="border: 1px solid black;"><p style="color: white; font-family: Jost; font-size: 16px;"><img style="width: 40px; height: 40px; border-radius: 50%; object-fit: cover;" src="user_images/' . $row['image'] . '"></p></td>
               
               <td class="cell11"><p>
               <a href="./edit?id=' . $row['id'] . '&credentials=credentials"><button onclick="alert_msg()" style="font-family: Jost;">Delete</button></a>
               </p></td>
            </tr>';
               }
               ?>
            </table>
         </div>
         <div id="tabs1-page-3">
            <table id="Table4">
               <tr>
                  <td class="cell0">
                     <p id="wb_uid34">&nbsp;<span id="wb_uid35">&nbsp;</span><span id="wb_uid36">Email</span></p>
                  </td>
                  <td class="cell1">
                     <p id="wb_uid37">&nbsp;<span id="wb_uid38">&nbsp;</span><span id="wb_uid39">Message</span></p>
                  </td>
                  <td class="cell2">
                     <p id="wb_uid40">&nbsp;<span id="wb_uid41">&nbsp;</span><span id="wb_uid42">Delete</span></p>
                  </td>
               </tr>
               <?php
               include 'dbcon.php';
               $sql = "SELECT * FROM messages";
               $result = mysqli_query($dbconn, $sql);
               while ($row = $result->fetch_assoc()) {

                  echo '<tr style="text-align: center;">
               <td class="cell4"><p style="color: white; font-family: Jost; font-size: 16px;">' . $row['email'] . '</p></td>
               <td class="cell5"><p style="color: white; font-family: Jost; font-size: 16px;">' . $row['message'] . '</p></td>
               <td class="cell6"><p>
               
               <a href="./edit?id=' . $row['id'] . '&message=message" name="delete_message"><button onclick="alert_msg()" type="submit"  style="font-family: Jost;" name="delete_message">Delete</button></a>
               </p></td>
               
            </tr>';

               }
               ?>
            </table>
         </div>
         <div id="tabs1-page-4">
            <table id="Table3">
               <tr>
                  <td class="cell0">
                     <p id="wb_uid43">&nbsp;<span id="wb_uid44">&nbsp;</span><span id="wb_uid45">Email</span></p>
                  </td>
                  <td class="cell1">
                     <p id="wb_uid46">&nbsp;<span id="wb_uid47">&nbsp;</span><span id="wb_uid48">Password</span></p>
                  </td>
                  <td class="cell2">
                     <p id="wb_uid49">&nbsp;<span id="wb_uid50">&nbsp;</span><span id="wb_uid51">Delete</span></p>
                  </td>
               </tr>
               <?php
               include 'dbcon.php';
               $sql = "SELECT * FROM admin";
               $result = mysqli_query($dbconn, $sql);
               while ($row = $result->fetch_assoc()) {

                  echo '<tr style="font-family: Jost; text-align: center;">
               <td class="cell4" style="border: 1px solid black;"><p style="color: white; font-family: Jost; font-size: 16px;">' . $row['email'] . '</p></td>
               <td class="cell5" style="border: 1px solid black;"><p style="color: white; font-family: Jost; font-size: 16px;">' . $row['password'] . '</p></td>
               <td class="cell6" style="border: 1px solid black;"><p>
               <a href="./edit?id=' . $row['id'] . '&admin=admin"><button style="font-family: Jost;" onclick="alert_msg()" name="delete">Delete</button></p></td></a>
               
            </tr>';


               }
               ?>
            </table>
         </div>
      </div>
      <div id="wb_Text25">
         <a href="index"><span id="wb_uid52">Job Finder</span><span id="wb_uid53">. </span><span id="wb_uid54">| Admin
               Panel</span></a>
      </div>
      <div id="wb_Icon1">
         <a href="./index">
            <div id="Icon1"><i class="Icon1"></i></div>
         </a>
      </div>
   </div>
</body>

</html>