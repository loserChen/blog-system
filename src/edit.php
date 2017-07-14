<html>
<head>
<meta charset="utf-8">
</head>
<? require('conn.php');
   $date=$_GET['date'];
   $title=$_POST['title'];
   $content=$_POST['content'];
   $sql="update article set title='$title',content='$content' where date='$date'";
   if($db->exec($sql)==1){
	echo"<script>alert('更新成功');location.href='../home.php'</script>";
}else{
	echo"<script>alert('更新失败');history.go(-1)</script>";
}?>
</html>