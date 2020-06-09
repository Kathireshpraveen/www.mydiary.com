<?php
$a=$_POST["un"];
$b=$_POST["pwd"];
$c=$_POST["cpwd"];
$d=$_POST["cp"];
$l=mysqli_connect("localhost","root","","accounts");
if($l==false)
{
die("error:false".mysqli_connect_error());
}
$p="SELECT name FROM userinfo;";
$q=mysqli_query($l,$p);
$cs=0;
while($r=mysqli_fetch_array($q)) {
	if($r['name']==$a){
		$cs=1;
		break;
	}
}
if ($a==""||$b==""||$c==""||$d=="") {
	echo "<script>window.alert('some fields are empty');window.location.assign('account.html');</script>"; 
	exit(); 	
}
elseif(strlen($b)<8){
	echo "<script>window.alert('Password less than 8');window.location.assign('account.html');</script>"; 
	exit(); 	
}
else if ($b!=$c){
	echo "<script>window.alert('New and confirm are not same');window.location.assign('account.html');</script>";	
	exit(); 	
}
else if (strcmp($d,"V4XBG")!=0) {
	echo "<script>window.alert('Invalid captcha');window.location.assign('account.html');</script>";
	exit(); 	
}
else if($cs==1){
	echo "<script>window.alert('User name already exist try anoter user name');window.location.assign('account.html');</script>";
	exit(); 	
}
$s="INSERT INTO userinfo (name,password)
VALUES('$a','$b')";
if(mysqli_query($l,$s)) {
	$ct="CREATE TABLE ".$a."(date DATE,activities VARCHAR(500));";
	mysqli_query($l,$ct);
	echo "<script>window.alert('Account created successfully Redirecting to login page');window.location.assign('login.html');</script>";
}
 else{
echo "fail ".mysqli_error($l);
}
mysqli_close($l);
?>