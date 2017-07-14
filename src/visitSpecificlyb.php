
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/index.css">
        <link rel="stylesheet" type="text/css" href="../css/aboutme.css">
	<link rel="stylesheet" type="text/css" href="../font-awesome-4.7.0/css/font-awesome.min.css">
	
</head>
<body>
        <?         
                            $username=$_GET["username"];
                            $date=$_GET["date"];
                            require('conn.php');
                            $sqlQuerySignature="select * from admin where user='$username'";
                            $resultSignature=$db->query($sqlQuerySignature);
                            $rowSignature=$resultSignature->fetch(1);
        ?>
	<div class="head">
		<a class="site-name" href="../visit.php?username=<?=$username?>">
			<?=$username?>
		</a>
		<p class="user-desc">
			<?=$rowSignature['signature']?>
		</p>
		<div class="nav-menu">
			<div class="disabled"><a href="../visit.php?username=<?=$username?>" style="color:#DA70D6"><i class="fa fa-rocket"></i>主页</a></div>
			<div class="nav-menu-current"><a href="../visitlyb.php?username=<?=$username?>" style="color:#DA70D6"><i class="fa fa-bars"></i>留言</a></div>
			<div class="disabled"><a href="../home.php" style="color:#DA70D6"><i class="fa fa-user-o"></i>返回</a></div>     
		</div>
	</div>
	<div class="layout">
		<div class="cnt-container">
                     <?
                            $result=$db->query("select * from lyb where date='$date' ");
                            while($row=$result->fetch(1)){
                       ?>
                          <span><?=$row["date"]?></span>
                         <h3 align="center"><?=$row["title"]?></h3>
                          <br/>
                          <p><?=str_replace("\r","<br/>",str_replace(" ","&nbsp;",$row["content"]))?></p>
                          <hr/>
                          <?}?>
                          
		</div>
		<div class="sidebar-container">
			<div class="widget">
				<div class="widget-title"><i class="fa fa-folder-o"></i>关注</div>
				<ul class="category-list">
					<li class="category-list-item"><a href="http://geek.csdn.net/cloud">云计算</a></li>
					<li class="category-list-item">
						<a href="http://geek.csdn.net/bigdata">大数据</a>
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