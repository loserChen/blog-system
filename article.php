
<html>
<head>
	<meta charset="utf-8">
	<title>欢迎来到博客</title>
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<link rel="stylesheet" type="text/css" href="css/aboutme.css">
	<link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/lyb.css">
</head>
<body>
 	 <?                  session_start();
                            $username=$_SESSION["username"];
                            require('conn.php');
                            $sqlQuerySignature="select * from admin where user='$username'";
                            $resultSignature=$db->query($sqlQuerySignature);
                            $rowSignature=$resultSignature->fetch(1);
        ?>
	<div class="head">
		<a class="site-name" href="src/sig.php">
			<?=$username?>
		</a>
		<p class="user-desc">
			<?=$rowSignature['signature']?>
		</p>
		<div class="nav-menu">
			<div class="disabled"><a href="home.php"><i class="fa fa-rocket"></i>主页</a></div>
			<div class="nav-menu-current"><a href="#"><i class="fa fa-bars"></i>发表博客</a></div>
			<div  class="disabled"><a href="src/lyb.php"><i class="fa fa-user-o"></i>留言</a></div>
			<div  class="disabled"><a href="src/logout.php"><i class="fa fa-sign-out"></i>退出</a></div>
		</div>
	</div>
	<div class="layout">
		<div class="cnt-container">
            <form action="issueArticle.php" method="post">
			<table width=100%>
                            <tr> 
                                <td>主题</td>
                                <td><input type="text" name="title" class="text"></td>  
                            </tr>
                            <tr> 
                                <td>内容</td>
                                <td><textarea name="content" cols="80" rows="10" style="overflow-y:scroll;" class="textarea"></textarea></td>  
                            </tr>
                             <tr>
                                <td colspan="2" align="right"><input type="submit" name="submit" value="提交" class="but"></td>
                            </tr>
            </table>
            </form>
		</div>
		<div class="sidebar-container">
			<div class="widget">
				<div class="widget-title"><i class="fa fa-folder-o"></i>博主</div>
                                     <?
                                         $sqlQueryUser="select * from admin";
                                         $resultQueryUser=$db->query($sqlQueryUser); 
                                         $row1=$resultQueryUser->fetch();
                                         $row2=$resultQueryUser->fetch();
                                       ?>
				<ul class="category-list">
					<li class="category-list-item"><a href="visit.php?username=<?=$row1['user']?>"><?=$row1['user']?></a></li>
					<li class="category-list-item">
						<a href="visit.php?username=<?=$row2['user']?>"><?=$row2['user']?></a>
					</li>
				</ul>
			</div>
			<div class="widget">
				<div class="widget-title"><i class="fa fa-external-link"></i>链接</div>
				<ul class="category-list">
					<li class="category-list-item"><a href="https://github.com/" target="_blank">Github</a></li>
					<li class="category-list-item"><a href="http://www.jianshu.com/" target="_blank">简书</a></li>
				</ul>
			</div>
		</div>
		<div class="foot">
        陈泽远 潘凯达 软工1503
        <p>手撸的仿Hexo主题主页，附上链接：</p>
        <p><a href="http://alwaysthink.cn/" target="_blank">http://alwaysthink.cn/</a></p>
      </div>
	</div>
</body>
</html>