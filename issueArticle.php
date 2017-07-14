<html>
<head>
<meta charset="utf-8">
</head>
<? session_start();
   require('conn.php');
   $title=$_POST['title'];
   $content=$_POST['content'];
   $username=$_SESSION['username'];
   if($title!=null&&$content!=null){
   $sql="insert into article values(null,'$title','$content','$username',null)";
   $count=$db->exec($sql);
   if($count=1)
   {
   	echo "<script>alert('发表成功');location.href='home.php'</script>";
   }
}
   else{
      echo"<script>alert('发表失败');history.go(-1)</script>";
   }
 ?>
 </html>