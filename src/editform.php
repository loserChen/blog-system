<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="../css/lyb.css">
</head>
<body>
	<? require('conn.php');
	$date=$_GET['date'];
	$sql="select *from article where date='$date'";
	$result=$db->query($sql);
	while($row=$result->fetch(1)){?>
	<h2 align="center">更新文章</h2>
	<form method="post" action="edit.php?date=<?=$row['date']?>">
	 <table width="400px" align="center">
	 <tr><td>文章标题</td>
	 	<td><input type="text" name="title" value="<?=$row['title']?>" class="text"></td>
	 </tr>
	 <tr><td>文章内容:</td><td><textarea name="content" cols="80" rows="10"  style="overflow-y:scroll;" class="textarea"><?=$row['content']?></textarea></td></tr>
	 <tr><td colspan="2" align="right"><input type="submit" name="submit" value="提交" class="but"></td></tr>
	</table></form>
	<?}?>
</body>
</html>