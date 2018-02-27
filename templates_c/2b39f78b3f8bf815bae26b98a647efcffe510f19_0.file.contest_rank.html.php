<?php
/* Smarty version 3.1.32-dev-38, created on 2018-02-27 17:51:42
  from '/home/oj_web/templates/contest_rank.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32-dev-38',
  'unifunc' => 'content_5a952a2e6bbdd3_19713201',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2b39f78b3f8bf815bae26b98a647efcffe510f19' => 
    array (
      0 => '/home/oj_web/templates/contest_rank.html',
      1 => 1519710757,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a952a2e6bbdd3_19713201 (Smarty_Internal_Template $_smarty_tpl) {
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
        <li><a href="../contest/status.php?cid=<?php echo $_smarty_tpl->tpl_vars['cid']->value;?>
">Contest Status</a></li>
        <li><a href="../contest/index.php">Contest</a></li>
        <li><a href="#">Rank</a></li>
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

<div class="container ">
<div class="row">
<div class="col-md9" role="main">
<p class="lead text-center">
<h1 class="text-center">Contest Ranklist</h1>
</p>

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th class="text-center">Rank</th>
			<th class="text-center">Team</th>
            <th class="text-center">Solved</th>
			<th class="text-center">Penalty</th>
			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['problem_list']->value, 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
				<th class="text-center"><?php echo $_smarty_tpl->tpl_vars['item']->value['show_pid'];?>
</th> 
			<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </tr>
    </thead>
	
      <tbody>
	    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rank']->value, 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>

        <tr>
      	  <td><h5 class="text-center"><?php echo $_smarty_tpl->tpl_vars['item']->value['rank'];?>
</h5></td>
		  <td><h5 class="text-center"><?php echo $_smarty_tpl->tpl_vars['item']->value['user_name'];?>
</h5></td>
		  <td><h5 class="text-center"><?php if (!isset($_smarty_tpl->tpl_vars['item']->value['ac_num'])) {
$_tmp_array = isset($_smarty_tpl->tpl_vars['item']) ? $_smarty_tpl->tpl_vars['item']->value : array();
if (!is_array($_tmp_array) || $_tmp_array instanceof ArrayAccess) {
settype($_tmp_array, 'array');
}
$_tmp_array['ac_num'] = 0;
$_smarty_tpl->_assignInScope('item', $_tmp_array);
}
echo $_smarty_tpl->tpl_vars['item']->value['ac_num'];?>
</h5></td>
		  <td><h5 class="text-center"><?php if (!isset($_smarty_tpl->tpl_vars['item']->value['time'])) {
$_tmp_array = isset($_smarty_tpl->tpl_vars['item']) ? $_smarty_tpl->tpl_vars['item']->value : array();
if (!is_array($_tmp_array) || $_tmp_array instanceof ArrayAccess) {
settype($_tmp_array, 'array');
}
$_tmp_array['time'] = 0;
$_smarty_tpl->_assignInScope('item', $_tmp_array);
}
echo $_smarty_tpl->tpl_vars['item']->value['time'];?>
</h5></td>
		
		  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['problem_list']->value, 'item1', false, 'key1');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key1']->value => $_smarty_tpl->tpl_vars['item1']->value) {
?>
			  <?php if (in_array($_smarty_tpl->tpl_vars['item1']->value['show_pid'],$_smarty_tpl->tpl_vars['pass']->value[$_smarty_tpl->tpl_vars['key']->value])) {?>
					<td><h4 class="text-center">
						<span class="label label-success"><?php echo $_smarty_tpl->tpl_vars['pass_time']->value[$_smarty_tpl->tpl_vars['key']->value][$_smarty_tpl->tpl_vars['item1']->value['show_pid']];?>

							<?php if (isset($_smarty_tpl->tpl_vars['item']->value[$_smarty_tpl->tpl_vars['item1']->value['show_pid']])) {?>
								(+<?php echo $_smarty_tpl->tpl_vars['item']->value[$_smarty_tpl->tpl_vars['item1']->value['show_pid']];?>
)
							<?php }?>
						</span>
					</h4></td>
				<?php } elseif (in_array($_smarty_tpl->tpl_vars['item1']->value['show_pid'],$_smarty_tpl->tpl_vars['submit']->value[$_smarty_tpl->tpl_vars['key']->value])) {?>
					<td>
						<h4 class="text-center">
							<span class="label label-danger">(-<?php echo $_smarty_tpl->tpl_vars['item']->value[$_smarty_tpl->tpl_vars['item1']->value['show_pid']];?>
)</span>
						</h4>
					</td>
				<?php } else { ?><td></td> 
			 <?php }?>
		  <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
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
