<?php /* Smarty version Smarty-3.1.19-dev, created on 2014-09-17 07:40:48
         compiled from "/var/www/fuelphp/fuel/app/views/test01.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14571198815418bc70b952e9-49413998%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8c630798d44a387c6d90aafae3bc2555f6b6d7d8' => 
    array (
      0 => '/var/www/fuelphp/fuel/app/views/test01.tpl',
      1 => 1410903897,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14571198815418bc70b952e9-49413998',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'msg' => 0,
    'val' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19-dev',
  'unifunc' => 'content_5418bc70beee86_14090995',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5418bc70beee86_14090995')) {function content_5418bc70beee86_14090995($_smarty_tpl) {?><html>
<head>
    <title>smarty test</title>
</head>
<body>
<?php echo $_smarty_tpl->tpl_vars['msg']->value;?>


<?php $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['val']->step = 1;$_smarty_tpl->tpl_vars['val']->total = (int) ceil(($_smarty_tpl->tpl_vars['val']->step > 0 ? 5+1 - (1) : 1-(5)+1)/abs($_smarty_tpl->tpl_vars['val']->step));
if ($_smarty_tpl->tpl_vars['val']->total > 0) {
for ($_smarty_tpl->tpl_vars['val']->value = 1, $_smarty_tpl->tpl_vars['val']->iteration = 1;$_smarty_tpl->tpl_vars['val']->iteration <= $_smarty_tpl->tpl_vars['val']->total;$_smarty_tpl->tpl_vars['val']->value += $_smarty_tpl->tpl_vars['val']->step, $_smarty_tpl->tpl_vars['val']->iteration++) {
$_smarty_tpl->tpl_vars['val']->first = $_smarty_tpl->tpl_vars['val']->iteration == 1;$_smarty_tpl->tpl_vars['val']->last = $_smarty_tpl->tpl_vars['val']->iteration == $_smarty_tpl->tpl_vars['val']->total;?>
<?php echo $_smarty_tpl->tpl_vars['val']->value;?>
,
<?php }} ?>

</body>
</html>
<?php }} ?>
