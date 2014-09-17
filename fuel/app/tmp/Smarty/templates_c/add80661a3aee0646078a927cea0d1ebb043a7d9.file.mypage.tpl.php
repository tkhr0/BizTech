<?php /* Smarty version Smarty-3.1.19-dev, created on 2014-09-17 23:29:18
         compiled from "/var/www/fuelphp/fuel/app/views/sukima/mypage.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1560131080541971a0b7eb90-76409644%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'add80661a3aee0646078a927cea0d1ebb043a7d9' => 
    array (
      0 => '/var/www/fuelphp/fuel/app/views/sukima/mypage.tpl',
      1 => 1410964150,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1560131080541971a0b7eb90-76409644',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19-dev',
  'unifunc' => 'content_541971a0b87e77_66690609',
  'variables' => 
  array (
    'name' => 0,
    'cheered' => 0,
    'cheering' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_541971a0b87e77_66690609')) {function content_541971a0b87e77_66690609($_smarty_tpl) {?><!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>すきまハック</title>

    <!-- Bootstrap -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/bootstrap-thstronge.min.css" rel="stylesheet">
    <link href="assets/css/custom.css" rel="stylesheet">
    <?php echo Asset::css('custom.css');?>

    <?php echo Asset::css('bootstrap.min.css');?>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elstrongents and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <!-- Static navbar -->
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
    <div class="container">
      <!-- Main component for a primary marketing message or call to action -->
      <div class=""><!--ユーザ情報-->
      <div class="row">
        <div class="col-xs-4"> 
       <?php echo Asset::img('dummy_icon.jpeg',array('class'=>'img-thumbnail','width'=>'100%'));?>
 
        </div>          
	<div class="col-xs-8">
          <div class="col-xs-6">
            <?php echo $_smarty_tpl->tpl_vars['name']->value;?>

          </div>
          <div class="col-xs-6">
            <a class="btn btn-xs btn-primary btn-block" href="mypage.html">フォロー</a>
          </div>
          <div class="col-xs-12">がんばる人を応援するスキマハックを作ってます！</div>
        </div>
      </div>
      <div>
        <div class="col-xs-12">
        <div class="col-xs-6">
          <p class="text-center">応援された回数</p>
        </div>
        <div class="col-xs-6">
          <p class="text-center">応援した回数</p>
        </div>
        </div><!--12-->
        <div>
        <div class="col-xs-6">
          <p class="text-center"><strong><?php echo $_smarty_tpl->tpl_vars['cheered']->value;?>
</strong></p>
        </div>
        <div class="col-xs-6">
          <p class="text-center"><strong><?php echo $_smarty_tpl->tpl_vars['cheering']->value;?>
</strong></p>
        </div>
        </div>
      </div><!-- 12 -->
      </div>
      </div>
      <!--ユーザ情報-->
      <div calss="col-xs-12">
      <!--目標リスト-->
      <ul class="yaritai_list">
        <!--やりたいこと-->
        <li>
          <h3>たばこ我慢するぞ</h3><span class="badge">42</span>
          <!--応援してくれた人リスト-->
          <ul class="cheerer_list">
            <li><?php echo Asset::img('icon2.png',array('width'=>'100%'));?>
</li>
            <li><?php echo Asset::img('icon3.png',array('width'=>'100%'));?>
</li>
            <li><?php echo Asset::img('icon4.png',array('width'=>'100%'));?>
</li>
            <li><?php echo Asset::img('icon5.png',array('width'=>'100%'));?>
</li>  
	</ul>
        </li>
        <li>
          <h3>たばこ我慢するぞ</h3><span class="badge">42</span>
          <!--応援してくれた人リスト-->
        <ul class="cheerer_list">
            <li><?php echo Asset::img('icon2.png',array('width'=>'100%'));?>
</li>
            <li><?php echo Asset::img('icon3.png',array('width'=>'100%'));?>
</li>
            <li><?php echo Asset::img('icon4.png',array('width'=>'100%'));?>
</li>
            <li><?php echo Asset::img('icon5.png',array('width'=>'100%'));?>
</li> 
        </ul>
        </li>
        <li>
          <h3>たばこ我慢するぞ</h3><span class="badge">42</span>
          <!--応援してくれた人リスト-->
          <ul class="cheerer_list">
            <li><?php echo Asset::img('icon2.png',array('width'=>'100%'));?>
</li>
            <li><?php echo Asset::img('icon3.png',array('width'=>'100%'));?>
</li>
            <li><?php echo Asset::img('icon4.png',array('width'=>'100%'));?>
</li>
            <li><?php echo Asset::img('icon5.png',array('width'=>'100%'));?>
</li>
	  </ul>
        </li>
      </ul>
      <!--目標リスト-->
      </div>
    </div> <!-- /container -->    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <?php echo Asset::js('bootstrap.min.js');?>

    <script src="js/bootstrap.min.js"></script>
  </body>
</html>

<?php }} ?>
