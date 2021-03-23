<?php include_once("includes/basic_includes.php");?>
<?php include_once("functions.php"); ?>

<?php 
if(isloggedin()){
 //do nothing stay here
} else{
   header("location:login.php");
}


?>

<!DOCTYPE HTML>
<html>
<head>
<title>Find Your Perfect Partner - Matrimony
 | User Home :: Matrimony
</title>

<meta name="viewport" content="width=device-width, initial-scale=1">

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


<script type="application/x-javascript">
 addEventListener("load", function() {
 setTimeout(hideURLbar, 0); }, false);
 function hideURLbar(){ window.scrollTo(0,1); } </script>

<link href="css/bootstrap-3.1.1.min.css" rel='stylesheet' type='text/css' />

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<!-- Custom Theme files -->

<link href="css/style.css" rel='stylesheet' type='text/css' />

<link href='//fonts.googleapis.com/css?family=Oswald:300,400,700' rel='stylesheet' type='text/css'>

<link href='//fonts.googleapis.com/css?family=Ubuntu:300,400,500,700' rel='stylesheet' type='text/css'>

<!--font-Awesome-->

<link href="css/font-awesome.css" rel="stylesheet"> 

<!--font-Awesome-->
<script>
$(document).ready(function(){

    $(".dropdown").hover(
        function() {

            $('.dropdown-menu', this).stop( true, true ).slideDown("fast");

            $(this).toggleClass('open');        
        },

        function() {

            $('.dropdown-menu', this).stop( true, true ).slideUp("fast");

            $(this).toggleClass('open');       
        }
    );
});
</script>
</head>

<body>
<!-- ============================  Navigation Start =========================== -->
 
<?php include_once("includes/navigation.php");?>

<!-- ============================  Navigation End ============================ -->

<?php
$result=mysqlexec("SELECT * FROM customer ORDER BY profilecreationdate DESC");
$c_count = '1';

while ($row = mysqli_fetch_assoc($result))
  {
    
    $profid=$row['cust_id'];
    //getting photo for display
    $sql="SELECT * FROM photos WHERE cust_id=$profid";
    $result2=mysqlexec($sql);
    $photo=mysqli_fetch_assoc($result2);
    $pic=$photo['pic1'];
  // printing left side profile
  echo "<div class=\"row_1\">"; //starting row  
  if ($c_count == '1')
    {
    
    echo "<div class=\"col-sm-6 paid_people-left\">"; //left statrted
    echo "<ul class=\"profile_item\">";
    echo "<a href=\"view_profile.php?id=$profid\">";
    echo "<li class=\"profile_item-img\"><img src=\"profile/". $profid."/".$pic ."\"" . "class=\"img-responsive\" alt=\"\"/></li>";
    echo "<li class=\"profile_item-desc\">";
    echo "<h4>" . $row['firstname'] . " " . $row['lastname'] . "</h4>";
    echo "<p>" . $row['age']. "Yrs," . $row['religion'] . "</p>";
    echo "<h5>" . "View Full Profile" . "</h5>"; 
    echo "</li>";
    echo "</a>";
    echo "<input type=\"submit\" value=\"Delete\" onclick=\"delete()\"/>";
    echo "</ul>";
    echo "</div>"; //left end
    $c_count++;
    }
    else
    {
    echo "<div class=\"col-sm-6\">"; //right statrted
    echo "<ul class=\"profile_item\">";
    echo "<a href=\"view_profile.php?id=$profid\">";
    echo "<li class=\"profile_item-img\"><img src=\"profile/". $profid."/".$pic ."\"" . "class=\"img-responsive\"" ;
    echo "alt=\"\"/></li>";
    echo "<li class=\"profile_item-desc\">";
    echo "<h4>" . $row['firstname'] . " " . $row['lastname'] . "</h4>";
    echo "<p>" . $row['age']. "Yrs," . $row['religion'] . "</p>";
    echo "<h5>" . "View Full Profile" . "</h5>";
    echo "</li>";
    echo "</a>";
    echo "<input type=\"submit\" value=\"Delete\" onclick=\"delete()\"/>";
    echo "</ul>";
    echo "</div class=\"test\">"; //right end

    // end of right side

    
    $c_count = '1';
    }
    echo "</div>"; //row end
  } //loop end
  

?>