<html>
<head>
<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="../font-awesome-4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="../css/login.css">
		<link rel="stylesheet" type="text/css" href="../bootstrap-3.3.7-dist/css/bootstrap.min.css">
		<link rel="stylesheet" media="screen" href="../css/style.css">
</head>
<? if(isset($_COOKIE["username"])&&isset($_COOKIE["password"])){
	echo"<script>location.href='loginCheck.php'</script>";
}?>
<body>
<div id="particles-js">
<div class="a"> 
<form action="loginCheck.php" method="post">
<table>
<tr><td class="h1" colspan="2" align="center">欢迎来到博客</td></tr>
<tr><td colspan="2" align="center"><div class="login">
				<div class="nav-menu-current"><a href="login.php"><i class="fa fa-user"></i><font>登录</font></a></div>
				<div class="disabled"><a href="register.php"><i class="fa fa-cog fa-spin"></i>注册</a></div>
				<div class="disabled"><a href="changePassword.php"><i class="fa fa-terminal" aria-hidden="true"></i>修改密码</a></div>
</div></td></tr>
<tr><td><input type="text" name="username" placeholder="用户名" class="text"></td></tr>
<tr><td><input type="password" name="password" placeholder="密码" class="text"></td></tr>
<tr><td ><button type="submit" class="btn btn-success btn-block">登录</button></td></tr>
<tr><td><button type="reset" class="btn btn-success btn-block">取消</button></td></tr>
</table>
</form>
</div>
</div>
<script src="../particles.js"></script>
  <script src="../app.js"></script>
</body>
</html>
