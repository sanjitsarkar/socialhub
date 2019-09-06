

<?php
require 'posts.php';
require 'db.php';
$usr = $_GET["user"];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/profile.css">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
	<link rel="icon" href="favicon.ico" type="image/x-icon">
    <style>
        body {
            background: rgba(209, 204, 204, 0.281) !important;

        }
    </style>
</head>

<body>
<?php
include_once 'header.php';
    ?>
    <section class="main">
      
      <div class="profile_left">
<div class="edit_bar"><div class="img"></div></div> 
                <!-- <div class="profile_circle"></div> -->
                <div class="edit_bar"><h1 class="profile_name">
                    <?php

                $user = $db->query("SELECT * FROM `users` WHERE `username` ='$usr' ");
        
                $row_user = $user->fetchAll(PDO::FETCH_OBJ);
                // print_r($row_user);
                $fname = $row_user[0]->{"fname"};
                $lname = $row_user[0]->{"lname"};
echo $fname.' '.$lname;
                    ?>
                </h1></div>
                <div class="edit_bar tabs">
                        <h3 class="friends">Friends<i class="fa fa-users" style="color:white"></i></h3>
                        <h3 class="friends">Photos<i class="fa fa-image" style="color:white"></i></h3>
                        <h3 class="friends">Messages<i class="fa fa-comment" style="color:white"></i></h3>
                        </div> 
                <div class="edit_bar">  <h3>About</h3> </div> 
             <div class="edit_bar">      <p>Android Developer | Web Developer | UI/UX Designer
                   
                </p> </div>
                <hr>
                <div class="edit_bar">  <h4>Barpeta</h4></div> 
            
               <div class="friends_section" style="">

               <?php
               $true = "1";
               $query_frn = $db->query("SELECT * FROM `friends` WHERE `username` ='$usr' and `accepted` = '$true'");
             
               if($query_frn->rowCount()>0)
               {
                   $frnd_row = $query_frn->fetchAll(PDO::FETCH_OBJ);

               
               $l = 0;
               for($l=0;$l<=$query_frn->rowCount()-1;$l++)
               {
               echo'<div class="sects">';
 
 
               echo'<div class="sect 1">
                    <div class="img_prof"></div>
                    <a href="message.php?user_to='.$frnd_row[$l]->{"friends_array"}.'" class="friends_name">'.$frnd_row[$l]->{"friends_array"}.'</a>
                    <a href="user_profile.php?user='.$frnd_row[$l]->{"friends_array"}.'" class="freinds">Friends</a>
                </div>';


          
                echo'</div>';
            }
           

        }
        else{
            echo '<h3 style="text-align:center; color:gray">No Friends Available</h3>';
        }
            ?>
               </div>
       
      </div>

       

<div class="post-section">
        
        <?php
        $user_page = 'user_profile.php?user='.$usr;
   
        $u = $_GET["user"];
       
        post_display('$u',$user_page);
        ?>
        
    </div>
  
    </section>
</body>

</html>