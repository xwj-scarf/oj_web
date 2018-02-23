<?php
/* Smarty version 3.1.32-dev-38, created on 2018-02-23 11:08:53
  from '/home/oj_web/templates/register.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32-dev-38',
  'unifunc' => 'content_5a8f85c5dbcf04_49400368',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bfc1953bc71e4cfc6a1a1a87724f792197cf49e2' => 
    array (
      0 => '/home/oj_web/templates/register.html',
      1 => 1519354618,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a8f85c5dbcf04_49400368 (Smarty_Internal_Template $_smarty_tpl) {
?><html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>OJ_WEB</title>
    <?php echo '<script'; ?>
 src="bootstrap/jquery-3.2.1.min.js"><?php echo '</script'; ?>
>

    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="bootstrap/css/bootstrap-theme.css" rel="stylesheet">
    <?php echo '<script'; ?>
 src="bootstrap/js/bootstrap.min.js"><?php echo '</script'; ?>
>

</head>

<body>

<!-- dao hang lan -->
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="fals
e">
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
        <li><a href="problem/index.php">Problem</a></li>
        <li><a href="status/index.php">Status</a></li>
        <li class="dropdown">
        
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Add <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="./problem/add_problem.php">Add Problem</a></li>
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
        <li><a href="#">{$name}</a></li>
        <li>
        {if $is_login == 1}
            <a href="logout.php">退出</a>
        {else}
            <a href="login.php"> 注册/登录</a>
        {/if}
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<div class="container ">
<div class="row">
<div class="col-md-4 col-md-offset-4" role="main"> 


<form action="/oj_web/register.php" method="post">
  <div class="form-group">
    <label>UserName</label>
    <input class="form-control" name="user_name" placeholder="UserName">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" name="password"  placeholder="Password">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">请确认密码</label>
    <input type="password" class="form-control" name="sec_password"  placeholder="Password">
  </div>

  <button type="submit" class="btn btn-default">注册</button>
</form>

</div>
</div>
</div>

</body

</html>
<?php }
}
