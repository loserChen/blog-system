<html>
<body>
<head>
<meta charset="utf-8">
</head>
<? 
session_start();
$custName=$_POST["custName"];
$passWord=$_POST["passWord"];
$passWordCheck=$_POST["passWordCheck"];
$len=strlen($custName);
$len1=strlen($passWord);
$sign=$_POST["sign"];
$trueName=$_POST["trueName"];
	if($len<6||$len>12||!preg_match('/^[a-zA-Z0-9\_]+$/',$custName)){
	echo"<script>alert('你的用户名格式不正确');history.go(-1)</script>";}
	else if($len1<6||$len1>16||!preg_match('/^[a-zA-Z0-9\_]+$/',$passWord)){
	echo"<script>alert('你的密码格式不正确');history.go(-1)</script>";}
	else if($passWord!=$passWordCheck){
	echo"<script>alert('请确认两次输入的密码一样');history.go(-1)</script>";}
	else if ($trueName==null){
	echo"<script>alert('你的真实姓名不能为空');history.go(-1)</script>";}
	else if($sign==null){
	echo"<script>alert('你的个性签名不能为空');history.go(-1)</script>";}
	else if(strtolower($_POST['authcode'])!= $_SESSION['authcode']){
	echo"<script>alert('你的验证码不正确');history.go(-1)</script>";}
	else{
	require('conn.php');
	$sql1="select *from admin where user='$custName'";
	$result=$db->query($sql1);
	if($result->rowcount()!=0){
	echo"<script>alert('用户名已经存在');history.go(-1)</script>";
	}
	else{
	$sql="insert into admin (user,truename,password,signature) values('$custName','$trueName','$passWord','$sign')";//ID在数据库中自动生成
	$db->exec($sql);
	echo"<script>alert('注册成功');location.href='../home.php'</script>";
	setcookie('username',$custName,time()+120);
	setcookie('password',$passWord,time()+120);
	}
	}
	?>
</body>
</html>