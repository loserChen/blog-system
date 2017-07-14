<html>
<head>
<meta charset="utf-8">
</head>
<body>
<?	require("conn.php");
	$username=$_POST['custName'];
	$password=$_POST['passWord'];
	$passWordCheck=$_POST['passWordCheck'];
	$len1=strlen($passWordCheck);
	$sql="select * from admin where user='$username' and password='$password'";
	$result=$db->query($sql);
	if($result->rowCount()==0){
		echo "<script>alert('你用户名或密码不正确');history.go(-1)</script>";
	}
	else{
		if($len1<6||$len1>16||!preg_match('/^[a-zA-Z0-9\_]+$/',$passWordCheck)){
			echo "<script>alert('修改的密码格式不正确');history.go(-1)</script>";
		}
		else{
		$sql="update admin set password='$passWordCheck' where user='$username'";
		$db->query($sql);
		echo "<script>alert('修改成功');location.href='login.php'</script>";
	}
	}
	?>
</body>
</html>