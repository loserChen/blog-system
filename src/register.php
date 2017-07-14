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
   <form method="post" action="registerCheck.php">
   <table>
   <tr><td class="h1" colspan="2" align="center">欢迎注册博客</td></tr>
   <tr><td colspan="3" align="center"><div class="login">
        <div class="disabled"><a href="login.php"><i class="fa fa-user"></i>登录</a></div>
        <div class="nav-menu-current"><a href="register.php"><i class="fa fa-cog fa-spin"></i><font>注册</font></a></div>
        <div class="disabled"><a href="changePassword.php"><i class="fa fa-terminal" aria-hidden="true"></i>修改密码</a></div>
</div></td></tr>
   <tr><td><input type="text" name="custName" id="custName" placeholder="用户名" class="text"></td><td>*&nbsp;6-12个字符(数字字母下划线)</td></tr>
   <tr><td><input type="password" name="passWord" id="passWord" placeholder="用户密码" class="text"></td><td>*&nbsp;6-16个字符(数字字母下划线)</td></tr>
   <tr><td><input type="password" name="passWordCheck" id="passWordCheck" placeholder="确认密码" class="text"></td><td>*&nbsp;必须和密码一致</td></tr>
   <tr><td><input type="text" name="trueName" id="trueName" placeholder="真实姓名" class="text"></td><td>*&nbsp;请输入你的真实姓名</td></tr>
   <tr><td><input type="text" name="sign" id="sign" placeholder="个性签名" class="text"></td><td>*&nbsp;请输入你的个性签名</td></tr>
   <tr><td>验证码: <img id="captcha_img" border='1' src='./captcha.php?r=echo rand(); ?>' style="width:100px; height:30px" />
    <a href="javascript:void(0)" onclick="document.getElementById('captcha_img').src='./captcha.php?r='+Math.random()">换一个?</a></td>
        <td>请输入验证码:<input type="text" name='authcode' class="yan" ></td></tr>
   <tr><td><button type="submit" class="btn btn-success btn-block">注册</button></td><td><button type="reset" class="btn btn-success btn-block">取消</button></td></tr>
</table>
</form>
</div>
</div>
<script src="../particles.js"></script>
  <script src="../app.js"></script>
  </body>
</html>