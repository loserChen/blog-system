<html>
<head>
<meta charset="utf-8">
</head>
<body>
<? session_start();
if(isset($_COOKIE["username"])&&isset($_COOKIE["password"])){
			$_SESSION["username"]=$_COOKIE["username"];
			echo"<script>location.href='../index.php'</script>";
		}
else{
  require('conn.php');
   $username=$_POST["username"];
  $password=$_POST["password"];
  $sql="select *from admin where user='$username' and password='$password'";
  $sql1="select *from admin where user='$username'";
   $result=$db->query($sql);
   $result1=$db->query($sql1);
	if($result->rowcount()!=0){
			$_SESSION["username"]=$username;
		echo"<script>alert('登录成功');location.href='../home.php'</script>";
	}
	else if($result1->rowcount()!=0){
			echo"<script>alert('密码错误');history.go(-1)</script>";
	}
	else{
		echo"<script>alert('用户名不存在');history.go(-1)</script>";
	}
}
?>
</body>
</html>