<?php
/* Smarty version 3.1.32-dev-38, created on 2018-02-27 13:55:09
  from '/home/oj_web/templates/add_problem.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32-dev-38',
  'unifunc' => 'content_5a94f2bdb000c8_87776798',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '18a6ba07bba35d5095ce0b9ff48c469384d0592e' => 
    array (
      0 => '/home/oj_web/templates/add_problem.html',
      1 => 1519710831,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a94f2bdb000c8_87776798 (Smarty_Internal_Template $_smarty_tpl) {
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

<h1 class="text-center">Add Problem</h1>

<form action="/oj_web/problem/add_problem.php" method="post" enctype="multipart/form-data">
	<div class="panel panel-primary">
  		<div class="panel-heading">
    		<h3 class="panel-title">请输入题目</h3>
  		</div>
  		<div class="panel-body">
    	<textarea class="form-control" name="title"><?php echo $_smarty_tpl->tpl_vars['request']->value['title'];?>
</textarea>
  		</div>
	</div>

	<div class="panel panel-success">
  		<div class="panel-heading">
    		<h3 class="panel-title">描述</h3>
  		</div>
  		<div class="panel-body">
  		        <textarea class="form-control" rows="8" name="description"></textarea>
		</div>
	</div>

	<div class="panel panel-success">
  		<div class="panel-heading">
    		<h3 class="panel-title">time_limit (单位MS)</h3>
  		</div>
  		<div class="panel-body">
  		        <textarea class="form-control" name="time_limit"></textarea>
		</div>
	</div>

	<div class="panel panel-success">
  		<div class="panel-heading">
    		<h3 class="panel-title">memory_limit (单位KB)</h3>
  		</div>
  		<div class="panel-body">
  		        <textarea class="form-control" name="memory_limit"></textarea>
		</div>
	</div>

	<div class="panel panel-info">
  		<div class="panel-heading">
    		<h3 class="panel-title">Input</h3>
  		</div>
  		<div class="panel-body">
    	        <textarea class="form-control" rows="6" name="input"></textarea>
  		</div>
	</div>

	<div class="panel panel-info">
  		<div class="panel-heading">
    		<h3 class="panel-title">Output</h3>
  		</div>
  		<div class="panel-body">
    	        <textarea class="form-control" rows="6" name="output"></textarea>
  		</div>
	</div>

	<div class="panel panel-info">
  		<div class="panel-heading">
    		<h3 class="panel-title">Sample Input</h3>
  		</div>
  		<div class="panel-body">
    	        <textarea class="form-control" rows="6" name="sample_input"></textarea>
  		</div>
	</div>


	<div class="panel panel-warning">
  		<div class="panel-heading">
    		<h3 class="panel-title">Sample Output</h3>
  		</div>
  		<div class="panel-body">
    	        <textarea class="form-control" rows="6" name="sample_output"></textarea>
  		</div>
	</div>

	<div class="panel panel-info">
  		<div class="panel-heading">
    		<h3 class="panel-title">Judge Input</h3>
  		</div>
  		<div class="panel-body">
			<input type="file" name="judge_input" value="上传文件"/>
  		</div>
	</div>

	<div class="panel panel-info">
  		<div class="panel-heading">
    		<h3 class="panel-title">Judge Output</h3>
  		</div>
  		<div class="panel-body">
			<input type="file" name="judge_output" value="上传文件"/>
  		</div>
	</div>

	
  	<button type="submit" class="btn btn-default">Submit</button>
</form>

</div>
</div>
</div>
</body>

</html>
<?php }
}
