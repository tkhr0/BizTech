<?php /* Smarty version Smarty-3.1.19-dev, created on 2014-09-18 16:48:15
         compiled from "/var/www/fuelphp/fuel/app/views/sukima/timeline.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1458874088541a6c34159d32-19003496%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6dc9ef3b1bdda276913ab4340abe8af1acc263fd' => 
    array (
      0 => '/var/www/fuelphp/fuel/app/views/sukima/timeline.tpl',
      1 => 1411026285,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1458874088541a6c34159d32-19003496',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19-dev',
  'unifunc' => 'content_541a6c34227849_42422824',
  'variables' => 
  array (
    'containers' => 0,
    'container' => 0,
    'user' => 0,
    'cheer_user' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_541a6c34227849_42422824')) {function content_541a6c34227849_42422824($_smarty_tpl) {?><!DOCTYPE html>
<html lang="ja">
  <head>
    <title>すきまハック</title>
    <?php echo $_smarty_tpl->getSubTemplate ('./meta_header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

  </head>
  <body>
    <?php echo $_smarty_tpl->getSubTemplate ('./page_header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

      
   <ul style="display:none;">
　　　　<?php  $_smarty_tpl->tpl_vars['container'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['container']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['containers']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['container']->key => $_smarty_tpl->tpl_vars['container']->value) {
$_smarty_tpl->tpl_vars['container']->_loop = true;
?>
          
          <?php  $_smarty_tpl->tpl_vars['user'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['user']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['container']->value['cheer_users']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['user']->key => $_smarty_tpl->tpl_vars['user']->value) {
$_smarty_tpl->tpl_vars['user']->_loop = true;
?>
            <li><?php echo $_smarty_tpl->tpl_vars['user']->value['name'];?>
</li>
            <li><?php echo $_smarty_tpl->tpl_vars['user']->value['thumbnail'];?>
</li>
          <?php } ?>
        <br>
        <?php } ?>
   </ul>
　<?php  $_smarty_tpl->tpl_vars['container'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['container']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['containers']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['container']->key => $_smarty_tpl->tpl_vars['container']->value) {
$_smarty_tpl->tpl_vars['container']->_loop = true;
?>　
    <div class="container">
      <!--タイムライン-->
      <div id="timeline">
        <!--やりたいことアクティビティ-->
        <div class="activity">
          <!--表明-->
          <div class="media">
            <a class="pull-left" href="#"><img class="media-object" src="<?php echo $_smarty_tpl->tpl_vars['container']->value['thumbnail'];?>
" width="100%" alt="..."></a>
             <div class="media-body">
              <h4 class="media-heading"><?php echo $_smarty_tpl->tpl_vars['container']->value['goal_name'];?>
を<?php echo $_smarty_tpl->tpl_vars['container']->value['status'];?>
<span class="badge"><?php echo $_smarty_tpl->tpl_vars['container']->value['cheer_num'];?>
</span></h4>
              <!--応援している人リスト(アイコン)-->
              <ul class="cheerer_list">
 
                <?php  $_smarty_tpl->tpl_vars['cheer_user'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cheer_user']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['container']->value['cheer_users']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cheer_user']->key => $_smarty_tpl->tpl_vars['cheer_user']->value) {
$_smarty_tpl->tpl_vars['cheer_user']->_loop = true;
?>  
                  <li><a href="http://192.168.56.10/sukima/mypage/<?php echo $_smarty_tpl->tpl_vars['cheer_user']->value['id'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['cheer_user']->value['thumbnail'];?>
" width="100%" alt="..."></a></li>   
                <?php } ?>

              </ul>
              <!--応援している人リスト(アイコン)-->
            </div>
            <!--表明-->
          </div>
          <!--いいねボタン-->
          <form action="#" class="cheer-form">
            <input type="hidden" name="target-id" value="2" />
            <input type="hidden" name="type-id" value="2" />
            <input type="submit" name="cheer" class="btn btn-xs btn-primary btn-block" value="応援！" >
          </form>
          <!--いいねボタン-->
        </div>
        <!--やりたいことアクティビティ-->
      </div>
      <!--タイムライン-->
     </div> <!-- /container -->
   <?php } ?> 
   <div><div id="yaruzo"><span class="glyphicon glyphicon-star"></span> Star</div></div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <?php echo Asset::js('timeline.js');?>

  <?php echo Asset::js('bootstrap.min.js');?>

  </body>
</html>
<?php }} ?>
