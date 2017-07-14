<html>
  <head>
  <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../css/login.css">
    <link rel="stylesheet" type="text/css" href="../bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <link rel="stylesheet" media="screen" href="../css/style.css">
  </head>
  <body>
  <div id="particles-js">
  <div class="a"> 
   <form method="post" action="changeCheck.php">
   <table>
   <tr><td colspan="3" align="center"><div class="login">
        <div class="disabled"><a href="login.php"><i class="fa fa-user"></i>登录</a></div>
        <div class="disabled"><a href="register.php"><i class="fa fa-cog fa-spin"></i><font>注册</font></a></div>
        <div class="nav-menu-current"><a href="register.php"><i class="fa fa-terminal" aria-hidden="true"></i>修改密码</a></div>
</div></td></tr>
   <tr><td><input type="text" name="custName" id="custName" placeholder="用户名" class="text"></td><td>请输入用户名</td></tr>
   <tr><td><input type="password" name="passWord" id="passWord" placeholder="原密码" class="text"></td><td>请输入原密码</td></tr>
   <tr><td><input type="password" name="passWordCheck" id="passWordCheck" placeholder="修改密码" class="text"></td><td>请输入新密码</td></tr>
   <tr><td><button type="submit" class="btn btn-success btn-block">提交</button></td><td><button type="reset" class="btn btn-success btn-block">取消</button></td></tr>
</table>
</form>
</div>
</div>
<script src="../particles.js"></script>
  <script src="../app.js"></script>
  </body>
</html>