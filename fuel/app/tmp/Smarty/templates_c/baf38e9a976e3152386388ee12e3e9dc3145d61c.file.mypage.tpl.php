<?php /* Smarty version Smarty-3.1.19-dev, created on 2014-09-19 16:05:10
         compiled from "/var/www/html/sukima/fuel/app/views/sukima/mypage.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1414926286541b9890be9ea9-51713065%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'baf38e9a976e3152386388ee12e3e9dc3145d61c' => 
    array (
      0 => '/var/www/html/sukima/fuel/app/views/sukima/mypage.tpl',
      1 => 1411109159,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1414926286541b9890be9ea9-51713065',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19-dev',
  'unifunc' => 'content_541b9890c6b8e8_28389195',
  'variables' => 
  array (
    'name' => 0,
    'cheered' => 0,
    'cheering' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_541b9890c6b8e8_28389195')) {function content_541b9890c6b8e8_28389195($_smarty_tpl) {?><!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>すきまハック</title>
    <!-- Bootstrap -->
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
    <!--ヘッダー-->
    <?php echo $_smarty_tpl->getSubTemplate ('./page_header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <!--ヘッダー-->
    <div class="container">
      <!-- Main component for a primary marketing message or call to action -->
      <div class="user_info"><!--ユーザ情報-->
        <div class="row">
          <div class="col-xs-4"> 
            <?php echo Asset::img('dummy_icon.jpeg',array('class'=>'img-thumbnail','width'=>'100%'));?>
 
          </div>
          <div class="col-xs-8"><!--ユーザ紹介-->
            <div id="user-name"><!--名前-->
              <?php echo $_smarty_tpl->tpl_vars['name']->value;?>

            </div>
            <div id="user-description">がんばる人を応援するスキマハックを作ってます！</div>
          </div><!--ユーザ紹介-->
        </div><!--ユーザ情報-->
        <!--チアされた数-->
        <table class="cheer-table">
          <tr>
            <th>応援された回数</th>
            <th>応援した回数</th>
          </tr>
          <tr>
            <td><strong><?php echo $_smarty_tpl->tpl_vars['cheered']->value;?>
</strong></td>
            <td><strong><?php echo $_smarty_tpl->tpl_vars['cheering']->value;?>
</strong></td>
          </tr>
        </table>
        <!--チアされた数-->
        <!--フォローボタン-->
        <div class="follow-btn">
        <form action="#" class="follow-form">
          <input type="hidden" name="user-id" value="1" />
          <input type="hidden" name="follow-id" value="2" />
          <input type="submit" class="btn btn-xs btn-primary btn-block" value="フォロー" />
        </form>
        </div><!--フォローボタン-->
      </div><!--ユーザ情報-->
      <div class="col-xs-12">
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
    <?php echo Asset::js('mypage.js');?>

    <?php echo Asset::js('bootstrap.min.js');?>

  </body>
</html>

<?php }} ?>
