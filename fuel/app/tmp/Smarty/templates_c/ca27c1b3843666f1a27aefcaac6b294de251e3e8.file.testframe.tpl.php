<?php /* Smarty version Smarty-3.1.19-dev, created on 2014-09-19 18:53:13
         compiled from "/var/www/html/sukima/fuel/app/views/sukima/testframe.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1846612569541bf783e30b99-07173386%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ca27c1b3843666f1a27aefcaac6b294de251e3e8' => 
    array (
      0 => '/var/www/html/sukima/fuel/app/views/sukima/testframe.tpl',
      1 => 1411120364,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1846612569541bf783e30b99-07173386',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19-dev',
  'unifunc' => 'content_541bf784018474_88910453',
  'variables' => 
  array (
    'datas' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_541bf784018474_88910453')) {function content_541bf784018474_88910453($_smarty_tpl) {?><html>
<head>
</head>
<body>
        <?php echo var_dump($_smarty_tpl->tpl_vars['datas']->value);?>

        
        <form action="/sukima/cheer/<?php echo $_smarty_tpl->tpl_vars['datas']->value['target'];?>
/1" method="post">
          goal
          <input type="submit"/>
        </form>

        <form action="/sukima/cheer/<?php echo $_smarty_tpl->tpl_vars['datas']->value['target'];?>
/2" method="post">
          container
          <input type="submit"/>
        </form>
</body>
</html>
<?php }} ?>
