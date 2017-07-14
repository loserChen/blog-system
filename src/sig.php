<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="../css/lyb.css">
</head>
<body>
	<? require('conn.php');
		session_start();
		$username=$_SESSION["username"];
		$sql="select signature from admin where user='$username'";
		$result=$db->query($sql);
	while($row=$result->fetch(1)){?>
	<h2 align="center">更换个性签名</h2>
	<form method="post" action="sigChange.php">
	 <table width="400px" align="center">
	 <tr><td>个性签名:</td><td><input type="text" name="signature" value="<?=$row['signature']?>"></td>
	 <td colspan="2" align="right"><input type="submit" name="submit" value="提交" class="but"></td></tr>
	</table></form>
	<?}?>
</body>
</html>