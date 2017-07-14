<html>
<head>
<meta charset="utf-8">
</head>
<? require('conn.php');
	session_start();
$date=$_GET['date'];
$username=$_SESSION['username'];
$sql="delete from article where date='$date' and author='$username'";
if($db->exec($sql)==1){
	echo"<script>alert('删除成功');location.href='../home.php'</script>";
}else{
	echo"<script>alert('删除失败');location.href='../home.php'</script>";
}?>
</html>
