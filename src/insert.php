<html>
<head>
<meta charset="utf-8">
</head>
<? require('conn.php');
   session_start();
   $title=$_POST['title'];
   $content=$_POST['content'];
    if(!isset($_SESSION['username'])){
      echo"<script>alert('请先登录帐号');location.href='login.php';</script>";
   }
   else{
   $author=$_SESSION['username'];
   $owner=$_GET['username'];
   if($title==null||$content==null){
   	echo"<script>alert('请保证内容不为空');history.go(-1)</script>";
   }
   else{
   $sql="insert into lyb(title,content,author,owner,date) values('$title','$content','$author','$owner',NULL)";
   $db->query($sql);
   echo"<script>alert('提交成功');location.href='../visitlyb.php?username=$owner'</script>";
   }
   }?>
 </html>