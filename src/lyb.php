<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>欢迎来到博客</title>
	<link rel="stylesheet" type="text/css" href="../css/index.css">
	<link rel="stylesheet" type="text/css" href="../font-awesome-4.7.0/css/font-awesome.min.css">
</head>
<body>
	<div class="head">
		<a class="site-name" href="sig.php">
			<?session_start();
				 echo $_SESSION["username"];?>
		</a>
		<p class="user-desc">
			<?require('conn.php');
				  $username=$_SESSION["username"];
				  $sql="select * from admin where user='$username'";
				  $result=$db->query($sql);
				  $row=$result->fetch();
				  echo $row["signature"];?>
		</p>
		<div class="nav-menu">
			<div class="disabled"><a href="../home.php"><i class="fa fa-rocket"></i>主页</a></div>
			<div class="disabled"><a href="../article.php"><i class="fa fa-bars"></i>发表博客</a></div>
			<div  class="nav-menu-current"><a href=""><i class="fa fa-user-o"></i>留言</a></div>
			<div  class="disabled"><a href="logout.php"><i class="fa fa-sign-out"></i>退出</a></div>
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
					<th>标题</th><th>内容</th><th>作者</th><th>日期</th><th>删除</th>
				</tr>
				<? 
				if(isset($_GET['page'])&&(int)$_GET['page']>0){
					$page=$_GET['page'];
				}
				else{
					$page=1;
				}
				$pagesize=10;
				$sql1="select * from lyb where owner='$username'";
				$result=$db->query($sql1);
				$count=$result->rowCount();
				$pagecount=ceil($count/$pagesize);
				$sql="select * from lyb  where owner='$username' limit ".($page-1)*$pagesize.",".$pagesize;
				$result=$db->query($sql);
				while($row=$result->fetch()){?>
				<tr align="center"><td><?=$row['title']?></td>
					<td><a href="specificlyb.php?date=<?=$row['date']?>" style="color:#888"><?=substr($row["content"],0,30)?>......</a></td>
					<td><?=$row['author']?></td>
					<td><?=$row['date']?></td>
					<td><a href="delete.php?id=<?=$row['id']?>" onclick="return confirm('你确定要删除？')"><i class="fa fa-times" aria-hidden="true"></i></a></td>
				</tr>
				<?}?>
			</table>
			<ul class="pagination"><?
			if($result->rowCount()!=0){
			if($page==1){
				echo"首页   上一页";}
			else{
				echo"<a href='?page=1'>首页</a>   <a href='?page=".($page-1)."'>上一页</a>";
			}
			for($i=1;$i<=$pagecount;$i++){
				if($i==$page){
					echo"$i  ";
				}
				else{
					echo"<a href='?page=$i'>$i</a>  ";
				}
			}
			if($page==$pagecount){
				echo"下一页   末页";
				echo" &nbsp共".$count."条记录 &nbsp";
				echo" $page/$pagecount 页";
			}
			else{
				echo"<a href='?page=".($page+1)."'>下一页</a>   <a href='?page=".$pagecount."'>末页</a>";
				echo" &nbsp共".$count."条记录 &nbsp";
				echo" $page/$pagecount 页";
			}
		}
			?></p>
			</div>
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
					<li class="category-list-item"><a href="../visit.php?username=<?=$row1['user']?>"><?=$row1['user']?></a></li>
					<li class="category-list-item">
						<a href="../visit.php?username=<?=$row2['user']?>"><?=$row2['user']?></a>
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