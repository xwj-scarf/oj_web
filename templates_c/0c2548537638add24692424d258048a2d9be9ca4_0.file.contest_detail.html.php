<?php
/* Smarty version 3.1.32-dev-38, created on 2018-03-21 11:20:45
  from '/home/oj_web/templates/contest/contest_detail.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32-dev-38',
  'unifunc' => 'content_5ab1cf8ddea1e6_99517873',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0c2548537638add24692424d258048a2d9be9ca4' => 
    array (
      0 => '/home/oj_web/templates/contest/contest_detail.html',
      1 => 1521602442,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ab1cf8ddea1e6_99517873 (Smarty_Internal_Template $_smarty_tpl) {
?><html>
<head> <meta http-equiv="Content-Type" content="text/html;charset=utf-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>OJ_WEB</title>
	<?php echo '<script'; ?>
 src="../bootstrap/jquery-3.2.1.min.js"><?php echo '</script'; ?>
>
    <meta http-equiv="refresh" content="60">
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
        <li><a href="#">Problem</a></li>
		<li><a href="../contest/status.php?cid=<?php echo $_smarty_tpl->tpl_vars['cid']->value;?>
">Contest Status</a></li>
		<li><a href="../contest/index.php">Contest</a></li>
		<li><a href="../contest/rank.php?cid=<?php echo $_smarty_tpl->tpl_vars['cid']->value;?>
">Rank</a></li>
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

<?php if ($_smarty_tpl->tpl_vars['is_securt']->value == 1) {?>
<form method="post" action="" class="form-horizontal" role="form" id="form_data" onsubmit="return check_form()" style="margin: 20px;">
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">请输入密码</h4>
                </div>
                <div class="modal-body">
					<form class="form-horizontal" role="form">
						<div class="form-group">
							<input type="text" name="password" class="form-control" id="contest_password" placeholder="密码">
						</div>
					</form>
                </div>
				<div class="modal-footer">
                    <button type="submit" class="btn btn-primary">
                        提交
                    </button><span id="tip"> </span>
                </div>
            </div>
        </div>
    </div>
</form>
	<?php echo '<script'; ?>
>$('#myModal').modal();<?php echo '</script'; ?>
>
<?php }?>

<!-- 题目-->
<div class="container ">
<div class="row">
<div class="col-md9" role="main"> 

<p>
<h1 class="text-center"><?php echo $_smarty_tpl->tpl_vars['contest_name']->value;?>

<?php if ($_smarty_tpl->tpl_vars['time_rate']->value == 100) {?>(已结束)
<?php }?>
</h1>
</p>

<div class="row">
<div class="col-md-6">
<h4>开始时间: <?php echo $_smarty_tpl->tpl_vars['start_time']->value;?>
</h4></div>
<div class=" pull-right">
<h4>结束时间: <?php echo $_smarty_tpl->tpl_vars['end_time']->value;?>
</h4></div>
</div>

<div class="progress">
  <div class="progress-bar progress-bar-striped progress-bar-success active" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $_smarty_tpl->tpl_vars['time_rate']->value;?>
%">
    <span class="sr-only"></span>
  </div>
</div>

<table class="table table-striped">
	<thead>
		<tr>
			<th class="text-center">题目编号</th>	
			<th class="text-center">题目名称</th>	
			<th class="text-center">通过率</th>	
		</tr>
	</thead>

	<tbody>
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value, 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
        <tr>
	  	  <td class="text-center"><?php echo $_smarty_tpl->tpl_vars['item']->value['pid'];?>
</td>
          <td class="text-center"><a href="contest_problem_detail.php?pid=<?php echo $_smarty_tpl->tpl_vars['item']->value['pid'];?>
&cid=<?php echo $_smarty_tpl->tpl_vars['cid']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['problem_name'];?>
</a></td>
          <td class="text-center"><?php echo $_smarty_tpl->tpl_vars['item']->value['ac_num'];?>
/<?php echo $_smarty_tpl->tpl_vars['item']->value['total_num'];?>
 (<?php echo $_smarty_tpl->tpl_vars['item']->value['pass_percent'];?>
%)</td>
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
