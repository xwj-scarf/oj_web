<?php
/* Smarty version 3.1.32-dev-38, created on 2018-02-26 16:58:34
  from '/home/oj_web/templates/contest_status.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32-dev-38',
  'unifunc' => 'content_5a93cc3a634097_49791770',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ae9fc828225913bdb9650c910bae57c1b6a6e484' => 
    array (
      0 => '/home/oj_web/templates/contest_status.html',
      1 => 1519635512,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a93cc3a634097_49791770 (Smarty_Internal_Template $_smarty_tpl) {
?><html>
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="refresh" content="2">
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

<!-- dao hang lan -->
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
        <li><a href="#">Contest Status</a></li>
        <li><a href="../contest/index.php">Contest</a></li>
        <li><a href="../contest/rank.php?cid=<?php echo $_smarty_tpl->tpl_vars['cid']->value;?>
">Rank</a></li>
        <li class="dropdown">

          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Add <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="../problem/add_problem.php">Add Problem</a></li>
            <li><a href="#">Add Context</a></li>
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

<div class="container ">
<div class="row">
<div class="col-md9" role="main">
<p class="lead text-center">
<h1 class="text-center">Status</h1>
</p>

<table class="table table-striped">
    <thead>
        <tr>
            <th class="text-center">提交编号</th>
			<th class="text-center">用户名</th>
            <th class="text-center">problem_name</th>
			<th class="text-center">time_use</th>
			<th class="text-center">memory_use</th>
			<th class="text-center">status</th>
			<th class="text-center">提交时间</th>
        </tr>
    </thead>
	
      <tbody>
	    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value, 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>

        <tr>
      	  <td><h5 class="text-center"><?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
</h5></td>
		  <td><h5 class="text-center"><?php echo $_smarty_tpl->tpl_vars['item']->value['user_name'];?>
</h5></td>
		  <td><a href="/oj_web/contest/contest_problem_detail.php?pid=<?php echo $_smarty_tpl->tpl_vars['item']->value['pid'];?>
&cid=<?php echo $_smarty_tpl->tpl_vars['cid']->value;?>
"><h5 class="text-center"><?php echo $_smarty_tpl->tpl_vars['item']->value['problem_name'];?>
</h5></a></td>
		  <td><h5 class="text-center"><?php echo $_smarty_tpl->tpl_vars['item']->value['time_use'];?>
 MS</h5></td>
		  <td><h5 class="text-center"><?php echo $_smarty_tpl->tpl_vars['item']->value['memory_use'];?>
 KB</h5></td>

	  	  <?php if ($_smarty_tpl->tpl_vars['item']->value['status'] == 0) {?>
			  <td><h5 class="text-center"><span class="label label-default">Judging...</span></h5></td>	
		  <?php }?>

		  <?php if ($_smarty_tpl->tpl_vars['item']->value['status'] == 1) {?>
			  <td><h5 class="text-center"><span class="label label-info">Complie Error</span></h5></td>	
		  <?php }?>

		  <?php if ($_smarty_tpl->tpl_vars['item']->value['status'] == 2) {?>
			  <td><h5 class="text-center"><span class="label label-danger">Wrong Answer</span></h5></td>	
		  <?php }?>

          <?php if ($_smarty_tpl->tpl_vars['item']->value['status'] == 3) {?>
              <td><h5 class="text-center"><span class="label label-danger">Time Limit</span></h5></td>  
          <?php }?>

          <?php if ($_smarty_tpl->tpl_vars['item']->value['status'] == 4) {?>
              <td><h5 class="text-center"><span class="label label-danger">Memory Limit</span></h5></td>
          <?php }?>

		  <?php if ($_smarty_tpl->tpl_vars['item']->value['status'] == 6) {?>
			  <td><h5 class="text-center"><span class="label label-success">Accept</span></h5></td>	
		  <?php }?>

	  	  <?php if ($_smarty_tpl->tpl_vars['item']->value['status'] == 404) {?>
			  <td><h5 class="text-center"><span class="label label-danger">Submit Failed</span></h5></td>	
		  <?php }?>

		  <td><h5 class="text-center"><?php echo $_smarty_tpl->tpl_vars['item']->value['add_time'];?>
</h5></td>
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
