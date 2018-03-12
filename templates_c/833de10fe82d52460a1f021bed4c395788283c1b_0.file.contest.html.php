<?php
/* Smarty version 3.1.32-dev-38, created on 2018-03-12 14:45:17
  from '/home/oj_web/templates/contest.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32-dev-38',
  'unifunc' => 'content_5aa621fdbb63f8_22907840',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '833de10fe82d52460a1f021bed4c395788283c1b' => 
    array (
      0 => '/home/oj_web/templates/contest.html',
      1 => 1520836957,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5aa621fdbb63f8_22907840 (Smarty_Internal_Template $_smarty_tpl) {
?><html>
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>OJ_WEB</title>
	<?php echo '<script'; ?>
 src="../bootstrap/jquery-3.2.1.min.js"><?php echo '</script'; ?>
>

    <!-- Bootstrap -->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../bootstrap/css/bootstrap-theme.css" rel="stylesheet">
    <?php echo '<script'; ?>
 src="../bootstrap/js/bootstrap.min.js"><?php echo '</script'; ?>
>
</head>

<body>

<!-- 导航栏 -->
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/oj_web/">OJ</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Head<span class="sr-only">(current)</span></a></li>
        <li><a href="../problem/index.php">Problem</a></li>
		<li><a href="../status/index.php">Status</a></li>
		<li><a href="../contest/index.php">Contest</a></li>
        <li><a href="../statistics/index.php">Statistics</a></li>
        <li class="dropdown">
	
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Add <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="../problem/add_problem.php">Add Problem</a></li>
            <li><a href="../contest/add_contest.php">Add Context</a></li>
            <!-- <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">One more separated link</a></li> -->
          </ul>
		</li>
      </ul>
      <form class="navbar-form navbar-left">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><?php echo $_smarty_tpl->tpl_vars['name']->value;?>
</a></li>
        <li>
        <?php if ($_smarty_tpl->tpl_vars['is_login']->value == 1) {?>
            <a href="../logout.php">退出</a>
        <?php } else { ?>
            <a href="../login.php"> 注册/登录</a>
        <?php }?>
        </li>
      </ul>


    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<!-- 比赛列表-->
<div class="container ">
<div class="row">
<div class="col-md9" role="main"> 

<p class="lead text-center">
<h1 class="text-center">Contest</h1>
</p>


<table class="table table-striped">
	<thead>
		<tr>
			<th class="text-center">比赛编号</th>	
			<th class="text-center">比赛名称</th>	
			<th class="text-center">开始时间</th>
			<th class="text-center">结束时间</th>
			<th class="text-center">类型</th>
			<th class="text-center">状态</th>	
		</tr>
	</thead>

	<tbody>
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value, 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
        <tr>
	  	  <td class="text-center"><?php echo $_smarty_tpl->tpl_vars['item']->value['contest_id'];?>
</td>
          <td class="text-center"><a href="detail.php?cid=<?php echo $_smarty_tpl->tpl_vars['item']->value['contest_id'];?>
&cname=<?php echo $_smarty_tpl->tpl_vars['item']->value['contest_name'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['contest_name'];?>
</a></td>
		  <td class="text-center"><?php echo $_smarty_tpl->tpl_vars['item']->value['start_time'];?>
</td>
		  <td class="text-center"><?php echo $_smarty_tpl->tpl_vars['item']->value['end_time'];?>
</td>
		  <td class="text-center"><?php echo $_smarty_tpl->tpl_vars['item']->value['type'];?>
</td>
		  <td class="text-center"><?php echo $_smarty_tpl->tpl_vars['item']->value['status'];?>
</td>

        </tr>
		<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
     </tbody>

</table>
</div>
</div>
</div>
</body>

</html>
<?php }
}
