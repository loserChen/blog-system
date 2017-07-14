
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
		<a class="site-name" href="#">
			<?=$username?>
		</a>
		<p class="user-desc">
			<?=$rowSignature['signature']?>
		</p>
		<div class="nav-menu">
			<div class="nav-menu-current"><a href="#" style="color:#DA70D6"><i class="fa fa-rocket"></i>主页</a></div>
			<div class="disabled"><a href="visitlyb.php?username=<?=$username?>" style="color:#DA70D6"><i class="fa fa-bars"></i>留言</a></div>  
			<div class="disabled"><a href="home.php" style="color:#DA70D6"><i class="fa fa-user-o"></i>返回</a></div>   
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
                          <font size="5"><a href="visitSpecific.php?date=<?=$row['date']?>&&username=<?=$username?> "><?=$row["title"]?></a></font>
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
                                  echo "<a href='?page=1&&username=".$username."'>第一页</a> <a href='?page=".($Page-1)."&&username=".$username."'>上一页</a> ";
                              }
                                for($i=1;$i<=$PageCount;$i++){
                                 if($i==$Page) echo "$i &nbsp";
                                 else echo "<a href='?page=$i&&username=".$username."' style="."color:#DA70D6".">$i</a> &nbsp";
                                  }
                          if($Page==$PageCount){
                               echo "下一页 末页";
                             }
                               else{
                              echo "<a href='?page=".($Page+1)."&&username=".$username."'>下一页</a> <a href ='?page=".$PageCount."&&username=".$username."'>末页</a>";
                          }
                              echo "&nbsp 共".$RecordCount."条记录&nbsp";
                              echo "$Page/$PageCount 页";
                            
                          }
                           ?></p>
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