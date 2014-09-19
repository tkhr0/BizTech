<?php /* Smarty version Smarty-3.1.19-dev, created on 2014-09-19 23:16:27
         compiled from "/var/www/html/sukima/fuel/app/views/sukima/timeline.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1980062658541a62e4e8b699-69952385%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6cdbb33ed2c14ea5011519a78e63e15e678b6995' => 
    array (
      0 => '/var/www/html/sukima/fuel/app/views/sukima/timeline.tpl',
      1 => 1411135892,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1980062658541a62e4e8b699-69952385',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19-dev',
  'unifunc' => 'content_541a62e4ec1dc3_39444996',
  'variables' => 
  array (
    'containers' => 0,
    'container' => 0,
    'user' => 0,
    'cheer_user' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_541a62e4ec1dc3_39444996')) {function content_541a62e4ec1dc3_39444996($_smarty_tpl) {?><!DOCTYPE html>
<html lang="ja">
  <head>
    <title>すきまハック</title>
    <?php echo $_smarty_tpl->getSubTemplate ('./meta_header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

  </head>
  <body>
    <?php echo $_smarty_tpl->getSubTemplate ('./page_header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    
    <?php $_smarty_tpl->tpl_vars['containers'] = new Smarty_variable(array(array("id"=>"33","thumbnail"=>"https://pbs.twimg.com/profile_images/488564985199476736/tYBB--BV_bigger.png","name"=>"hino","goal_name"=>"本読む","status"=>"始めました","cheer_num"=>"32","cheer_users"=>array(array("id"=>"3","name"=>"yamagiwa","thumbnail"=>"https://pbs.twimg.com/profile_images/3623049308/feacb807df8d3e5cf8649143125a3e0d_bigger.jpeg"),array("id"=>"4","name"=>"たか","thumbnail"=>"https://pbs.twimg.com/profile_images/420322569867104257/7mNC5dJB_bigger.jpeg"))),array("id"=>"22","thumbnail"=>"https://pbs.twimg.com/profile_images/449024716951404544/O8bBoM-o_bigger.jpeg","name"=>"もりもり","goal_name"=>"controllerを書く","status"=>"登録して初めました","cheer_num"=>"10","cheer_users"=>array(array("id"=>"1","name"=>"hino","thumbnail"=>"https://pbs.twimg.com/profile_images/512572564934103040/VkSJAtJe_bigger.jpeg"),array("id"=>"2","name"=>"giwa","thumbnail"=>"https://pbs.twimg.com/profile_images/2446689015/fjxbuni2hmaqz6xkh3n2_bigger.png")))), null, 0);?>
      
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
            <input type="hidden" name="target-id" value="1" />
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
   <div id="footer">
     <!--<div id="yaruzo"><div><span class="glyphicon glyphicon-star"></span></div></div>-->
     <div id="yaruzo">
        <!--<div>★</div>-->
        <form action="#" class="cheer-form">
          <input type="hidden" name="target-id" value="1" />
          <input type="hidden" name="type-id" value="2" />
          <input type="submit" name="cheer" class="btn btn-xs btn-primary btn-block" value="応援！" >
        </form>
     </div>
   </div>
  <?php echo $_smarty_tpl->getSubTemplate ('./js_footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

  <?php echo Asset::js('timeline.js');?>

  </body>
</html>
<?php }} ?>
