<?php /* Smarty version Smarty-3.1.19-dev, created on 2014-09-17 13:35:55
         compiled from "/var/www/fuelphp/fuel/app/views/sample1/content.tpl" */ ?>
<?php /*%%SmartyHeaderCode:125989922654190c3b669821-77307709%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0cf289d68d9eb63d7477e4b0d12bf004178da183' => 
    array (
      0 => '/var/www/fuelphp/fuel/app/views/sample1/content.tpl',
      1 => 1410928554,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '125989922654190c3b669821-77307709',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19-dev',
  'unifunc' => 'content_54190c3b6fd5e2_28776438',
  'variables' => 
  array (
    'query' => 0,
    'foo' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54190c3b6fd5e2_28776438')) {function content_54190c3b6fd5e2_28776438($_smarty_tpl) {?><div>
  <ul>
  
  <?php  $_smarty_tpl->tpl_vars['foo'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['foo']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['query']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['foo']->key => $_smarty_tpl->tpl_vars['foo']->value) {
$_smarty_tpl->tpl_vars['foo']->_loop = true;
?>
  <li>
     <?php echo $_smarty_tpl->tpl_vars['foo']->value['id'];?>
,
     <?php echo $_smarty_tpl->tpl_vars['foo']->value['twitter_id'];?>
,
     <?php echo $_smarty_tpl->tpl_vars['foo']->value['name'];?>
,
     <?php echo $_smarty_tpl->tpl_vars['foo']->value['thumbnail_path'];?>
,
     <?php echo $_smarty_tpl->tpl_vars['foo']->value['cheering'];?>
,
     <?php echo $_smarty_tpl->tpl_vars['foo']->value['cheered'];?>
,
     <?php echo $_smarty_tpl->tpl_vars['foo']->value['created_at'];?>
,
     <?php echo $_smarty_tpl->tpl_vars['foo']->value['modified_at'];?>

  </li> 
 <?php } ?>
 
</ul>
</dvi> 

<?php }} ?>
