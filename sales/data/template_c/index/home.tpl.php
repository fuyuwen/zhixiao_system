<?php  if (!defined("IS_INITPHP")) exit("Access Denied!");  /* INITPHP Version 1.0 ,Create on 2017-02-27 14:36:59, compiled from ./web/template/index/home.htm */ ?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title>业务管理系统</title>
	<base href="<?php echo InitPHP::getConfig('url');?>"/>
    <link rel="stylesheet" href="/static/css/base.css">
    <link rel="stylesheet" href="/static/css/css.css">
    <script src="/static/js/jquery.js"></script>
    <script src="/static/js/jquery.qrcode.min.js"></script>
    <style type="text/css">
        .xinContent{margin:0 auto;font-family: "Microsoft YaHei", \5fae\8f6f\96c5\9ed1, arial, \5b8b\4f53;font-size: 14px;}
        .xinContent .blueTit{width:120px;height:38px;line-height: 38px;text-align: center;font-weight: bold;background-color: #f3f9fd;}
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
            个人信息
        </div>
        <div class="line codePar">
            <p>当前财富角色：<?php echo $list['user'];?> (<?php echo $list['gname'];?>)</p>
            <p>专属推荐码ID：<?php echo $list['phone'];?></p>
            <p>上次登录时间：
            <?php echo date("Y-m-d H:i:s",$list['logintime']);?>
			</p>
            <div class="add"><a href="http://www.baihedai.com"  target="_blank">去百合贷投资</a></div>
            <?php if ($list['gid']<3) { ?>
			<div class="add"><a href="/friends/zongjian_add">推荐总监</a></div>
			<?php } ?>
			<div class="add"><a href="/friends/jingjiren_add">推荐经纪人</a></div>
			<div class="add"><a href="/agent/addshow">推荐客户</a></div>
            <div class="scanCodeY">
                <div class="codeImg"><div id="code"></div></div>
                
                <div class="codeImg" >
				<p class="frimb5 frifrom">
                <input type="hidden" class="friftext" id="inviteLinkCopy" value="https://m.baihedai.com/user/register/code/<?php echo $list['phone'];?>">
                <input type="button" value="复制链接" class="frifbut" id="copy-button">
                <input type="hidden" id="phone" value="<?php echo $list['phone'];?>" />
                </p>
			</div>
            </div>
        </div>
        <div class="blueTit">
            今日统计
        </div>
        <div class="line">
                <p><span>今日投资（元）：<?php echo $touzizongCout;?></span><span>今日年化投资（元）：<?php echo $znhjye;?></span> </p>
                <p><span>今日新增经纪人：<?php echo $jingjirenzongshu;?> </span><span>今日新增投资人：<?php echo $renshu;?></span></p>
        </div>
        <div class="blueTit">
            昨日统计
        </div>
        <div class="line">
            <p><span>昨日投资（元）：<?php echo $ztouzizongCout;?></span><span>昨日年化投资（元）：<?php echo $zznhjye;?></span></p>
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