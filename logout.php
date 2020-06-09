<?php
 $l=mysqli_connect("localhost","root","","accounts");
 $z="UPDATE userinfo SET login_status='0' WHERE login_status='1'";
$za=mysqli_query($l,$z);
echo "<script>window.alert('Logout successfully');window.location.assign('home.html');</script>";
?> 