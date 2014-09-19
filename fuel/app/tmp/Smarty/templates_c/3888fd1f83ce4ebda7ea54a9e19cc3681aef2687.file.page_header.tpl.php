<?php /* Smarty version Smarty-3.1.19-dev, created on 2014-09-20 01:34:29
         compiled from "/var/www/html/sukima/fuel/app/views/sukima/page_header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:35564655541ba3654144b0-67742388%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3888fd1f83ce4ebda7ea54a9e19cc3681aef2687' => 
    array (
      0 => '/var/www/html/sukima/fuel/app/views/sukima/page_header.tpl',
      1 => 1411143806,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '35564655541ba3654144b0-67742388',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19-dev',
  'unifunc' => 'content_541ba36541a805_40480186',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_541ba36541a805_40480186')) {function content_541ba36541a805_40480186($_smarty_tpl) {?><!-- Static navbar -->
<div class="navbar navbar-default navbar-static-top" role="navigation">
<div class="container">
<div class="navbar-header">
  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
    <span class="sr-only">Toggle navigation</span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
  </button>
  <a class="navbar-brand" href="#"><?php echo Asset::img('sukimaHackwithoutSub.png',array('width'=>'100%','alt'=>"すきまハック"));?>
</a>
</div>
<div class="navbar-collapse collapse">
  <ul class="nav navbar-nav">
    <li class="active"><a href="#">Home</a></li>
    <li><a href="#about">About</a></li>
    <li><a href="#contact">Contact</a></li>
    <li class="dropdown">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
      <ul class="dropdown-menu" role="menu">
        <li><a href="#">Action</a></li>
        <li><a href="#">Another action</a></li>
        <li><a href="#">Something else here</a></li>
        <li class="divider"></li>
        <li class="dropdown-header">Nav header</li>
        <li><a href="#">Separated link</a></li>
        <li><a href="#">One more separated link</a></li>
      </ul>
    </li>
  </ul>
  <ul class="nav navbar-nav navbar-right">
    <li><a href="../navbar/">Default</a></li>
    <li class="active"><a href="./">Static top</a></li>
    <li><a href="../navbar-fixed-top/">Fixed top</a></li>
  </ul>
</div><!--/.nav-collapse -->
</div>
</div>




<?php }} ?>
