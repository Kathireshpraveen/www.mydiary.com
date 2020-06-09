<?php
$us=$_POST["una"];
$b=$_POST["pwd"];
$cp=$_POST["cap"];
if(strcmp($cp,'33XRP')!=0){
	echo "<script>window.alert('Invalid captcha');window.location.assign('login.html');</script>";
	exit();
}
elseif ($us==""||$b=="") {
	echo "<script>window.alert('some fields are empty');window.location.assign('inlogin.html');</script>";
	exit();
}
$l=mysqli_connect("localhost","root","","accounts");
if($l==false)
{
die("error:false".mysqli_connect_error());
}
 $cl="UPDATE userinfo SET login_status='0' WHERE login_status='1'";
$clq=mysqli_query($l,$cl);
$s="SELECT name FROM userinfo";
$r=mysqli_query($l,$s);
$n=array();
$i=0;
while($a=mysqli_fetch_array($r)) {
$n[$i]=$a["name"];
$i+=1;
}
$t=1;
foreach($n as $i) {
$t=strcmp($i,$us);
if ($t==0) {
break;
}
}
$e=1;
if ($t==0) {
  $pass="SELECT `password` FROM `userinfo` WHERE name='".$us."';";
  $passq=mysqli_query($l,$pass);
  $parray=mysqli_fetch_array($passq);
  if(strcmp($parray['password'],$b)==0){
  	$e=0;
  }
  }
if($t==0 && $e==0)
{
	$z="UPDATE userinfo SET login_status='1' WHERE name='".$us."'";
	if($za=mysqli_query($l,$z)) {
			echo "<script>window.alert('Login successfully');window.location.assign('main.php?un=$us');</script>";
}
else {
echo "not";
}	
}
else {
header("location:inlogin.html");
}
?>