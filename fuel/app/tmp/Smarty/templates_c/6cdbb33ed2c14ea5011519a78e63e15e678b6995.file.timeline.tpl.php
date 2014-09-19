<?php /* Smarty version Smarty-3.1.19-dev, created on 2014-09-18 23:51:55
         compiled from "/var/www/html/sukima/fuel/app/views/sukima/timeline.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1980062658541a62e4e8b699-69952385%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6cdbb33ed2c14ea5011519a78e63e15e678b6995' => 
    array (
      0 => '/var/www/html/sukima/fuel/app/views/sukima/timeline.tpl',
      1 => 1411051849,
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
    'user_id' => 0,
    'user_cheering_num' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_541a62e4ec1dc3_39444996')) {function content_541a62e4ec1dc3_39444996($_smarty_tpl) {?><html>
<head>
        <title>TEST</title>
</head>
<body>
        userId: <?php echo $_smarty_tpl->tpl_vars['user_id']->value;?>
 <br />
        cheering: <?php echo $_smarty_tpl->tpl_vars['user_cheering_num']->value;?>
<br />

        <p>
        読書 
                <form action="/sukima/cheer" method="post">
                        <input type="submit" value="cheer">
                        <input type="hidden" name="container_id" value="2">
                </form>
        </p>
        <p>
        階段 
                <form action="/sukima/cheer" method="post">
                        <input type="submit" value="cheer">
                        <input type="hidden" name="container_id" value="5">
                </form>
        </p>
        <p>
        英単語50こ 
                <form action="/sukima/cheer" method="post">
                        <input type="submit" value="cheer">
                        <input type="hidden" name="container_id" value="7">
                </form>
        </p>
</body>
</html>
<?php }} ?>
