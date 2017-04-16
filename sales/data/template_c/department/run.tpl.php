<?php  if (!defined("IS_INITPHP")) exit("Access Denied!");  /* INITPHP Version 1.0 ,Create on 2017-04-16 14:07:05, compiled from ./web/template/department/run.htm */ ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>百合贷直销系统-组织结构</title>
  <link rel="stylesheet" href="/static/css/normalize.css">
  <link rel="stylesheet" href="/static/css/public.css">
  <link rel="stylesheet" href="/static/css/structure.css">
  <script type="text/javascript" src="/static/js/jquery-3.1.1.js"></script>
</head>
<body>
<div class="wrapper">
<?php include('./data/template_c/top.tpl.php'); ?>

<article class="content">
  <?php include('./data/template_c/left_corp_nav.tpl.php'); ?>

  <!-- 右侧信息列表 -->
  <div class="right st_right">
     <div class="rigth_title">
       <h2>部门管理</h2>
       <!-- <div class="rigth_t_btn">
         <span id="setdep"><i></i>新增部门</span>
         <span>编辑部门</span>
       </div> -->
     </div>
       <div class="right_list">
         <div class="right_bg"><div class="rootBtn"></div></div>
         <div class="right_list_box" id="listbox"></div>
       </div>
  </div>
</article>
</div>
<!-- 弹出框 -->
<div class="setModle">
  <div class="title"><data class="tb_titles">新建部门</data><span id="closeBtn">关闭</span></div>
  <table>
    <tr>
      <td><i>*</i><span class="depname">部门名称:</span></td>
      <td ><input type="text" name="" value="" id="depname"></td>
    </tr>
    <tr>
      <td><i>*</i><span class="subdep">上级部门名称:</span></td>
      <td class="selectlist"><input type="text" name="" value="" id="subdep"><div id="selectlist"></div></td>
    </tr>
    <tr>
      <td><i>*</i><span class="subdep">上级部门ID:</span></td>
      <td><input type="text" name="" value="" class="subdepnum" id="p_dpt_id"></td>
    </tr>
    <tr>
      <td colspan="2"><button class="add_btn">新增部门</button></td>
    </tr>
  </table>
</div>
	
<div id="d_list" style="display:none"><?php echo $list_json;?></div>

<script type="text/javascript" src="/static/js/public.js"></script>
<script type="text/javascript" src="/static/js/structure.js"></script>
</body>
</html>
