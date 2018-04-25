<?php
/* Smarty version 3.1.32-dev-38, created on 2018-04-25 10:44:34
  from '/home/oj_web/templates/problem/problem_edit.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32-dev-38',
  'unifunc' => 'content_5adfeb92b79609_20867399',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0af04c828c5efbe49ced71fbd3ea867c5cb45bb7' => 
    array (
      0 => '/home/oj_web/templates/problem/problem_edit.html',
      1 => 1524624263,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5adfeb92b79609_20867399 (Smarty_Internal_Template $_smarty_tpl) {
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

<!-- 题目描述-->
<div class="container ">
<div class="row">
<div class="col-md9" role="main">

<form action="/oj_web/problem/edit_problem.php?problem_id=<?php echo $_smarty_tpl->tpl_vars['problem_id']->value;?>
&op=edit" method="post">

<div class="form-group">
	<div class="panel panel-primary">
  		<div class="panel-heading">
    		<h3 class="panel-title">题目</h3>
  		</div>
		<div class="panel-body">
    	<textarea class="form-control" name="problem_name"><?php echo $_smarty_tpl->tpl_vars['data']->value['problem_name'];?>
</textarea>
  		</div>
	</div>

    <div class="alert alert-danger" role="alert">Time Limit <textarea class="form-control" name="time"><?php echo $_smarty_tpl->tpl_vars['data']->value['time_limit'];?>
</textarea>MS</div>
    <div class="alert alert-warning" role="alert">Memory Limit <textarea class="form-control" name="memory"><?php echo $_smarty_tpl->tpl_vars['data']->value['memory_limit'];?>
</textarea> KB</div>

	<div class="panel panel-success">
  		<div class="panel-heading">
    		<h3 class="panel-title">描述</h3>
  		</div>
  		<div class="panel-body">
    	<textarea class="form-control" name="description"><?php echo $_smarty_tpl->tpl_vars['data']->value['description'];?>
</textarea>
  		</div>
	</div>

	<div class="panel panel-info">
  		<div class="panel-heading">
    		<h3 class="panel-title">Input</h3>
  		</div>
  		<div class="panel-body">
    	<textarea class="form-control" name="input"><?php echo $_smarty_tpl->tpl_vars['data']->value['input'];?>
</textarea>
  		</div>
	</div>

	<div class="panel panel-info">
  		<div class="panel-heading">
    		<h3 class="panel-title">Output</h3>
  		</div>
  		<div class="panel-body">
    	<textarea class="form-control" name="output"><?php echo $_smarty_tpl->tpl_vars['data']->value['output'];?>
</textarea>
  		</div>
	</div>

	<div class="panel panel-info">
  		<div class="panel-heading">
    		<h3 class="panel-title">Sample Input</h3>
  		</div>
  		<div class="panel-body">
    	<textarea class="form-control" name="sample_input"><?php echo $_smarty_tpl->tpl_vars['data']->value['problem_input'];?>
</textarea>
  		</div>
	</div>


	<div class="panel panel-warning">
  		<div class="panel-heading">
    		<h3 class="panel-title">Sample Output</h3>
  		</div>
  		<div class="panel-body">
    	<textarea class="form-control" name="sample_output"><?php echo $_smarty_tpl->tpl_vars['data']->value['problem_output'];?>
</textarea>
  		</div>
	</div>

	<div class="panel panel-info">
  		<div class="panel-heading">
    		<h3 class="panel-title">备注</h3>
  		</div>
  		<div class="panel-body">
    	<textarea class="form-control" name="remark"><?php echo $_smarty_tpl->tpl_vars['data']->value['remark'];?>
</textarea>
  		</div>
	</div>

	<div class="radio">
	  <label>
		<input type="radio" name="is_show" id="optionsRadios1" value="1" checked>
			显示该题目
	  </label>
	</div>
	<div class="radio">
	<label>
		<input type="radio" name="is_show" id="optionsRadios2" value="0">
			隐藏该题目
	</label>
	</div>

	<button type="submit" class="btn btn-default">Submit</button>
</div>

</form>

</div>
</div>
</div>
</body>

</html>
<?php }
}
