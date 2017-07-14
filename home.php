
<html>
<head>
	<meta charset="utf-8">
  <title>欢迎来到博客</title>
	<link rel="stylesheet" type="text/css" href="css/index.css">
  <link rel="stylesheet" type="text/css" href="css/aboutme.css">
	<link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.min.css">
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
			<div class="nav-menu-current"><a href=#"><i class="fa fa-rocket"></i>主页</a></div>
			<div class="disabled"><a href="article.php"><i class="fa fa-bars"></i>发表博客</a></div>
			<div  class="disabled"><a href="src/lyb.php"><i class="fa fa-user-o"></i>留言</a></div>
      <div  class="disabled"><a href="src/logout.php"><i class="fa fa-sign-out"></i>退出</a></div>
		</div>
	</div>
	<div class="layout">
		<div class="cnt-container">
                      <?
                            if(isset($_GET['page'])&&(int)$_GET['page']>0)
                            {
                             $Page=$_GET['page'];
                       
                             }
                             else
                             $Page=1;
                            $PageSize=6;
                            $sqlQuerySize="select * from article where author ='$username'";
                            
                            $result=$db->query($sqlQuerySize);
                            $RecordCount=$result->rowCount();
                            $PageCount=ceil($RecordCount/$PageSize);
                            
                            $result=$db->query("select * from article where author ='$username' limit ".($Page-1)*$PageSize.",".$PageSize);
                        
                            while($row=$result->fetch(1)){
                       ?> 
                          <div><font size="5"><a href="specificArticle.php?date=<?=$row['date']?>"><?=$row["title"]?></a></font>
                          <span><a href="src/editform.php?date=<?=$row['date']?>"><i class="fa fa-file"></i>edit</a>
                          <a href="src/deleteArticle.php?date=<?=$row['date']?>" onclick="return confirm('你确定要删除？')"><i class="fa fa-times" aria-hidden="true">
                          </i>delete</a></span></div>
                          <p>  </p>
                          <?$t=$row["date"]?>
                          <p style="color:#666;font-size:18px"><?=substr($row["content"],0,50)?>......</p>
                          <p>   </p>
                          <span style="color:#999;font-size:3px"><?=$row["date"]?></span>
                          <hr/>
                          <?}?>
                          <p><?
                          if($result->rowCount()!=0){
                             if($Page==1){
                                echo "第一页 上一页";
                              }
                                else {
                                  echo "<a href='?page=1'>第一页</a> <a href='?page=".($Page-1)."'>上一页</a> ";
                                }
                                for($i=1;$i<=$PageCount;$i++){
                                 if($i==$Page) echo "$i &nbsp";
                                 else echo "<a href='?page=$i' style="."color:#DA70D6".">$i</a> &nbsp";
                                  }
                          if($Page==$PageCount){
                               echo "下一页 末页";
                             }
                               else{
                              echo "<a href='?page=".($Page+1)."'>下一页</a> <a href ='?page=".$PageCount."'>末页</a>";
                            }
                              echo "&nbsp 共".$RecordCount."条记录&nbsp";
                              echo "$Page/$PageCount 页";
                            }
                           ?></p>
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
					<li class="category-list-item"><a href="visit.php?username=<?=$row2['user']?>"><?=$row2['user']?></a></li>
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
