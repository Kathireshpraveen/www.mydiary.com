<?php
$a=$_POST["dat"];
$b=$_POST["act"];
if($a==""||$b=="") {
	echo "<script>window.alert('some fields are empty');window.location.assign('add.html');</script>";
exit();
}
$l=mysqli_connect("localhost","root","","accounts");
$c="SELECT `name` FROM `userinfo` WHERE login_status=1;";
$d=mysqli_query($l,$c);
$e=mysqli_fetch_array($d);
$us=$e["name"];
$s="INSERT INTO ".$us." (date,activities)
VALUES('$a','$b')";
mysqli_query($l,$s);
echo "<script>window.alert('Activities added successfully');window.location.assign('main2.html');</script>";
?>

