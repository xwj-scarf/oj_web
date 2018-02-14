<?php
/* Smarty version 3.1.32-dev-38, created on 2018-02-14 15:43:57
  from '/home/oj_web/templates/problem_detail.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32-dev-38',
  'unifunc' => 'content_5a83e8bdf27892_77968609',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '66d9f09f2d3ec14c2ff43c987418aa473618471f' => 
    array (
      0 => '/home/oj_web/templates/problem_detail.html',
      1 => 1518594173,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a83e8bdf27892_77968609 (Smarty_Internal_Template $_smarty_tpl) {
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
      <a class="navbar-brand" href="#">OJ</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Head<span class="sr-only">(current)</span></a></li>
        <li><a href="../problem/index.php">Problem</a></li>
		<li><a href="../status/index.php">Status</a></li> 
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">About <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">my submit status</a></li>
            <li><a href="#">my info</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">One more separated link</a></li>
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
        <li><a href="#">Link</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<!-- 题目描述-->
<div class="container ">
<div class="row">
<div class="col-md9" role="main">

	<div class="panel panel-primary">
  		<div class="panel-heading">
    		<h3 class="panel-title">题目</h3>
  		</div>
  		<div class="panel-body">
    	<?php echo $_smarty_tpl->tpl_vars['data']->value['problem_name'];?>

  		</div>
	</div>

	<div class="panel panel-success">
  		<div class="panel-heading">
    		<h3 class="panel-title">描述</h3>
  		</div>
  		<div class="panel-body">
    	<?php echo $_smarty_tpl->tpl_vars['data']->value['description'];?>

  		</div>
	</div>

	<div class="panel panel-info">
  		<div class="panel-heading">
    		<h3 class="panel-title">input</h3>
  		</div>
  		<div class="panel-body">
    	<?php echo $_smarty_tpl->tpl_vars['data']->value['problem_input'];?>

  		</div>
	</div>


	<div class="panel panel-warning">
  		<div class="panel-heading">
    		<h3 class="panel-title">output</h3>
  		</div>
  		<div class="panel-body">
    	<?php echo $_smarty_tpl->tpl_vars['data']->value['problem_output'];?>

  		</div>
	</div>
	
	<h3>提交代码</h3>
	<form action="/oj_web/problem/submit.php" method="post">
  		<div class="form-group">
			<textarea class="form-control" rows="10" name="submit_code"></textarea>
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
