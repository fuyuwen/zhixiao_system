<?php  if (!defined("IS_INITPHP")) exit("Access Denied!");  /* INITPHP Version 1.0 ,Create on 2017-04-16 17:25:11, compiled from ./web/template/index/run.htm */ ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title><?php echo $title;?></title>
  <link rel="stylesheet" href="/static/css/normalize.css">
  <link rel="stylesheet" href="/static/css/public.css">
  <link rel="stylesheet" href="/static/css/index.css">
  <script type="text/javascript" src="/static/js/jquery-3.1.1.js"></script>
</head>
<body>
<div class="wrapper">
<?php include('./data/template_c/top.tpl.php'); ?>
<!-- 主体内容 -->
<div class="content">
  <!-- 左侧导航列表 -->
  <div class="left">
    <!-- 头像用户名 -->
    <div class="user">
          <div class="portrait"><img src="/static/images/user.png" alt=""></div>
          <div class="name"><span>您好！<?php echo $list['UsrName'];?></span></div>
    </div>
    <!-- 位置职级 -->
    <div class="pospro">
       <div class="pos">
         <p><i class="iconstyel"></i><span>您所在的部门:</span></p>
			<p><?php echo $departmentName;?></p>
       </div>
       <div class="pro">
         <p><i class="iconstyel"></i><span>您目前的角色:</span></p>
         <p><?php echo $list['gnname'];?></p>
       </div>
    </div>
  </div>
  <!-- 右侧信息列表 -->
  <div class="right">
    <!-- 公告 -->
    <div class="cement">
       <div class="cenmet_left">
         <i class="iconstyel"></i>
         <p>最新公告</p><span>|</span><p><?php echo $notice[0]['title'];?></p>
       </div>
       <div class="cenmet_right">
         <p><?php echo date("Y-m-d H:i:s",$notice[0]['create_time']); ?></p><span>|</span><a href="/notice/run">更多>></a>
       </div>
    </div>
  <!-- 管理 -->
  <div class="magBox">
    <!-- 个人管理 -->
     <div class="magement">
         <div class="magement_title"><h1>个人管理</h1></div>
          <div class="magement_body">
            <ul>
              <li class="mag_box">
                <div class="mag_l"></div>
                  <div class="mag_r">
                    <p><?php echo $UidNumber;?>人</p>
                    <span>累计客户数</span>
                </div>
              </li>
              <li class="mag_box">
                <div class="mag_l mag_l_2"></div>
                  <div class="mag_r">
                    <p><?php echo $getlastMonthzonge;?></p>
                    <span>上月入金规模(元)</span>
                </div>
              </li>
              <li class="mag_box">
                <div class="mag_l mag_l_3"></div>
                  <div class="mag_r">
                    <p><?php echo $montnumber;?>人</p>
                    <span>本月新增客户数</span>
                </div>
              </li>
              <li class="mag_box">
                <div class="mag_l mag_l_4"></div>
                  <div class="mag_r">
                    <p><?php echo $getlastMonthnianhuan;?></p>
                    <span>上月折标业绩(元)</span>
                </div>
              </li>
            </ul>
          </div>
       </div>
       <!-- 团队管理 -->
       <div class="magement magement_r">
           <div class="magement_title"><h1>团队管理</h1></div>
            <div class="magement_body">
              <ul>
                <li class="mag_box">
                  <div class="mag_l"></div>
                    <div class="mag_r">
                      <p><?php echo $customersCount;?>人</p>
                      <span>累计客户数</span>
                  </div>
                </li>
                <li class="mag_box">
                  <div class="mag_l mag_l_2"></div>
                    <div class="mag_r">
                      <p><?php echo $shangYueStat['ruJinGuiMo'];?></p>
                      <span>上月入金规模(元)</span>
                  </div>
                </li>
                <li class="mag_box">
                  <div class="mag_l mag_l_3"></div>
                    <div class="mag_r">
                      <p><?php echo $curClientCount;?>人</p>
                      <span>本月新增客户数</span>
                  </div>
                </li>
                <li class="mag_box">
                  <div class="mag_l mag_l_4"></div>
                    <div class="mag_r">
                      <p><?php echo $shangYueStat['zheBiaoJinE'];?></p>
                      <span>上月折标业绩(元)</span>
                  </div>
                </li>
              </ul>
            </div>
         </div>
     </div>
     <!-- 销售之星 -->
     <div class="magBox sales_box">
       <!-- 销售之星左 -->
       <div class="magement magement_r sales_box_1">
           <div class="magement_title sales"><span><?php echo $YearsMonth;?>月</span><h1>销售之星</h1></div>
            <div class="magement_body">
            <?php if ($checkAmount) { ?>
                <table>
                  <tr class="one_tb">
                    <th></th>
                    <th>姓名</th>
                    <th>职务</th>
                    <th>入金规模(万元)</th>
                    <th>折标业绩(万元)</th>
                  </tr>
                  <?php foreach ($output as $key=>$vo) { ?>
	                  <tr>
	                    <td>
	                    <?php $k++;?>
	                    	<img src="/static/images/top_<?php echo $k;?>.png" alt="">
	                    </td>
	                    <td><?php echo $vo['UsrName'];?></td>
	                    <td><?php echo $vo['gname'];?>-<?php echo $vo['department_name'];?></td>
	                    <td><?php echo $vo['zonge'];?></td>
	                    <td><?php echo $vo['nianhuan'];?>(万元)</td>
	                  </tr>
                  <?php } ?>
                </table>
                <?php } else { ?>
                <table>
                 <tr>
				    <td colspan="4">暂无排行数据</td>
				 </tr>
	  			</table>
              <?php } ?>
            </div>
         </div>
         
         <!-- 销售之星右 -->
         <div class="magement sales_box_1 sales_box_2">
             <div class="magement_title sales"><span><?php echo $YearsMonth;?>月</span><h1>团队精英</h1></div>
              <div class="magement_body">
                <table>
                  <tr class="one_tb">
                    <th></th>
                    <th>部门</th>
                    <th>入金规模(万元)</th>
                    <th>折标业绩(万元)</th>
                  </tr>
                  <?php if ($TeamTopList) { ?>
                  <?php foreach ($TeamTopList as $k=>$v) { ?>
                  <tr>
                     <td>
                     <?php $k++;?>
                    	<img src="/static/images/top_<?php echo $k;?>.png" alt="">
                     </td>
                     <td><?php echo $v['departmentName'];?></td>
                     <td><?php echo $v['rujin'];?></td>
                     <td><?php echo $v['zhebiao'];?></td>
                   </tr>
                  <?php } ?>
                  <?php } else { ?>
                  <tr>
					<td colspan="4">暂无排行数据</td>
				  </tr>
	              <?php } ?>
                </table>
              </div>
           </div>
           
				
      </div>
  </div>
</div>
<script type="text/javascript" src="/static/js/public.js"></script>
</body>
</html>
