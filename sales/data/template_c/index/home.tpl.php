<?php  if (!defined("IS_INITPHP")) exit("Access Denied!");  /* INITPHP Version 1.0 ,Create on 2017-04-14 16:27:17, compiled from ./web/template/index/home.htm */ ?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title>销售管理系统</title>
	<base href="<?php echo InitPHP::getConfig('url');?>"/>
    <link rel="stylesheet" href="/static/css/base.css">
    <link rel="stylesheet" href="/static/css/css.css">
    <script src="/static/js/jquery.js"></script>
    <script src="/static/js/jquery.qrcode.min.js"></script>
    <style type="text/css">
        .xinContent{margin:0 auto;font-family: "Microsoft YaHei", \5fae\8f6f\96c5\9ed1, arial, \5b8b\4f53;font-size: 14px;}
        .xinContent .blueTit{width:320px;height:38px;line-height: 38px;text-align: center;font-weight: bold;background-color: #f3f9fd;}
        .xinContent .line{border-top: 1px solid #808080;padding-top: 12px;}
        .xinContent p{line-height: 38px;  padding-left: 20px;}
        .xinContent .line .add{width:200px;height:28px;line-height:28px;text-align:center;color:#fff;background-color: #717171;margin-bottom: 14px;display: inline-block;}
        .codePar{position:relative;}
        .scanCodeY{position:absolute;top:56px;right:120px;}
        .codeText{width:100px;height:30px;line-height:30px;text-align:center;background-color: #717171;margin-top: 14px;color:#fff;}
        .codeImg{width:90px;height:90px;}
		.codeImg img{width:90px;height:90px;}
        .xinContent .line p span{display:inline-block;width: 250px;}
		.codeText{background-color:#fff;}
		.frifbut{margin:25px -15px 0;}
		a{color:#fff;}
		a:hover{color:#fff;}
    </style>
</head>
<body>
    <div class="xinContent">
        <div class="blueTit">
		欢迎使用百合贷直销业务管理系统
        </div>
        <div class="line codePar">
        <p>最近公告：        • 集团下发的最新政策调整通知              2017.01.01                                                                                 更多></p>
            <p>您所在的部门：<?php echo $departmentName;?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;您目前的职级：<?php echo $position;?></p>
            <p></p>
        </div>
        
        <div class="blueTit">
            个人管理
        </div>
        <div class="line">
                <p><span>累计客户数:<?php echo $UidNumber;?>人</span><span>上月入金规模:<?php echo $getlastMonthzonge;?>元</span></p>
                <p><span>本月新增客户数:<?php echo $montnumber;?>人 </span><span>上月折标业绩:<?php echo $getlastMonthnianhuan;?>元</span></p>
        </div>
        <div class="blueTit">
            团队管理
        </div>
        <div class="line">
            <p><span>累计客户数：    35 人</span><span>团队上月入金规模：    2483737.12元</span></p>
            <p><span>本月新增客户数：    35 人</span><span>团队上月折标业绩：    245444.00元</span></p>
        </div>
        
        
<div class="blueTit">
    <?php echo $YearsMonth;?>月份公司销售业绩TOP 5
</div>
<div class="line">

<table class="table table-hover text-center">
<?php if ($checkAmount) { ?>
	<tr>
	<th>姓名</th> 
	<th>部门</th>
	<th>入金规模 </th>
	<th>折标业绩（万元）</th>
	</tr>
<?php } ?>
<?php if ($checkAmount) { ?>
         <?php foreach ($output as $key=>$vo) { ?>
		<tr>
		<td><?php echo $vo['UsrName'];?></td>
		<td><?php echo $vo['gname'];?>-<?php echo $vo['department_name'];?></td>
		<td><?php echo $vo['zonge'];?> </td>
		<td><?php echo $vo['nianhuan'];?>(万元)</td>
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
    <script src="/static/js/ZeroClipboard.js" type="text/javascript"></script>
    <script type="text/javascript">
	$(function(){
		copyLink();
		var phone = $("#phone").val(); 
 		$("#code").qrcode({
		    render: "canvas", //table方式 
		    width: 100, //宽度 
		    height:100, //高度 
		    text: "http://m.baihedai.com/user/register/code/<?php echo $user['phone'];?>" //任意内容
		}); 
	})
	
	/* 邀请好友 - 复制链接 */
	function copyLink(){
	
		var clip = new ZeroClipboard.Client();
		var path = "/static/js/ZeroClipboard.swf";
		ZeroClipboard.setMoviePath(path);
		clip.setHandCursor(true);
		clip.addEventListener('mouseOver', my_mouse_over);
		clip.addEventListener('complete', msgshow);
		clip.glue( 'copy-button' );

		function my_mouse_over(client) {
			clip.setText( $('#inviteLinkCopy').val() );
		}
		function msgshow(){
			alert('邀请链接复制成功！');
		}
	}
	</script>
</body>

</html>