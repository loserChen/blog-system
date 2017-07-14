<html>
<head>
<meta charset="utf-8">
</head>
<? require('conn.php');
$id=intval($_GET['id']);
$sql="delete from lyb where id=$id";
if($db->exec($sql)==1){
	echo"<script>alert('删除成功');location.href='lyb.php'</script>";
}else{
	echo"<script>alert('删除失败');location.href='lyb.php'</script>";
}?>
</html>
