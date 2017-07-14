
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/lyb.css">
</head>
<body>
        <?         
                            $username=$_GET["username"];
                            require('conn.php');
                            $sqlQuerySignature="select * from admin where user='$username'";
                            $resultSignature=$db->query($sqlQuerySignature);
                            $rowSignature=$resultSignature->fetch(1);
        ?>
	<div class="head">
		<a class="site-name" href="visit.php?username=<?=$username?>">
			<?=$username?>
		</a>
		<p class="user-desc">
			<?=$rowSignature['signature']?>
		</p>
		<div class="nav-menu">
			<div class="disabled"><a href="visit.php?username=<?=$username?>" style="color:#DA70D6"><i class="fa fa-rocket"></i>主页</a></div>
			<div class="nav-menu-current"><a href="#" style="color:#DA70D6"><i class="fa fa-bars"></i>留言</a></div>
			<div class="disabled"><a href="home.php" style="color:#DA70D6"><i class="fa fa-user-o"></i>返回</a></div>  
		</div>
	</div>
	<div class="layout">
		<div class="cnt-container">
			<div class="post">
				<h1 class="title">留言</h1>
			</div>
			<div class="ly">
			<table width="100%">
				<tr>
					<th>标题</th><th>内容</th><th>作者</th><th>日期</th>
				</tr>
				<? 
				if(isset($_GET['page'])&&(int)$_GET['page']>0){
					$page=$_GET['page'];
				}
				else{
					$page=1;
				}
				$pagesize=10;
				$result=$db->query("select * from lyb where owner='$username'");
				$count=$result->rowCount();
				$pagecount=ceil($count/$pagesize);
				$sql="select * from lyb where owner='$username' limit ".($page-1)*$pagesize.",".$pagesize;
				$result=$db->query($sql);
				while($row=$result->fetch()){?>
				<tr align="center"><td><?=$row['title']?></td>
					<td><a href="src/visitSpecificlyb.php?date=<?=$row['date']?>&&username=<?=$username?>" style="color:#888"><?=substr($row["content"],0,30)?>......</a></td>
					<td><?=$row['author']?></td>
					<td><?=$row['date']?></td>
				</tr>
				<?}?>
			</table>
			<p><?
			if($result->rowCount()!=0){
			if($page==1){
				echo"首页   上一页";}
			else{
				echo"<a href='?page=1&&username=".$username."'>首页</a>   <a href='?page=".($page-1)."&&username=".$username."'>上一页</a>";
			}
			for($i=1;$i<=$pagecount;$i++){
				if($i==$page){
					echo"$i  ";
				}
				else{
					echo"<a href='?page=$i&&username=".$username."'>$i</a>  ";
				}
			}
			if($page==$pagecount){
				echo"下一页   末页";
				echo" &nbsp共".$count."条记录 &nbsp";
				echo" $page/$pagecount 页";
				}
			else{
				echo"<a href='?page=".($page+1)."&&username=".$username."'>下一页</a>   <a href='?page=".$pagecount."&&username=".$username."'>末页</a>";
				echo" &nbsp共".$count."条记录 &nbsp";
				echo" $page/$pagecount 页";
			}
			}
			?></p>
			</div>
               <form method="post" action="src/insert.php?username=<?=$username?>">
			<table width="100%">
				<tr><td>留言标题:</td><td><input type="text" name="title" class="text"></td></tr>
				<tr><td>留言内容:</td></tr>
				<tr><td colspan="2"><textarea name="content" cols="80" rows="10"  style="overflow-y:scroll;" class="textarea"></textarea></td></tr>
				<tr><td colspan="2" align="right"><input type="submit" name="submit" value="提交" class="but"></td></tr>
				</table>
				</form>           
		</div>
		<div class="sidebar-container">
			<div class="widget">
				<div class="widget-title"><i class="fa fa-folder-o"></i>关注</div>
                                      <?
                                         $sqlQueryUser="select * from admin";
                                         $resultQueryUser=$db->query($sqlQueryUser); 
                                         $row1=$resultQueryUser->fetch(0);
                                         $row2=$resultQueryUser->fetch(1);
                                       ?>
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