<html>
<head>
<meta charset="utf-8">
</head>
<body>
<?	require("conn.php");
	 session_start();
     $username=$_SESSION["username"];
     $signature=$_POST['signature'];
     $sql="update admin set signature='$signature' where user='$username'";
     if($db->exec($sql)==1){
	echo"<script>alert('更新成功');location.href='../home.php'</script>";
	}else{
	echo"<script>alert('更新失败');history.go(-1)</script>";
	}
	?>
</body>
</html>