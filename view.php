<html>
<head>
	<style>
		body{
	background-image:url('img11.jpg');	
	background-repeat:no-repeat;
	background-size:cover;
	background-attachment:fixed;
	backface-visibility:transparent;
		}
	</style>
</head>
<body>
<fieldset>
<h1 style="text-align:center;">Diary</h1>
            </fieldset>
<fieldset>
 <?php
        echo "<i>welcome ";
        $l=mysqli_connect("localhost","root","","accounts");
$c="SELECT `name` FROM `userinfo` WHERE login_status=1;";
$d=mysqli_query($l,$c);
$e=mysqli_fetch_array($d);
$us=$e["name"];
echo $us; 
echo "<br>Your activities are:<br>";
echo "<table border=1>";
echo "<tr><th>Date</th>";
echo "<th>activities</th></tr>";
$f="SELECT * FROM `".$us."`;";
$g=mysqli_query($l,$f);
while($x=mysqli_fetch_array($g)){
echo "<tr>";
echo "<td>".$x['date']."</td>";
echo "<td>".$x['activities']."</td>";
echo "</tr>";
}
echo "</table></i>";
?>
</fieldset>
<br>
<a href="logout.php">Logout|</a><a href="main2.html">Home</a>
</body>
</html>


        