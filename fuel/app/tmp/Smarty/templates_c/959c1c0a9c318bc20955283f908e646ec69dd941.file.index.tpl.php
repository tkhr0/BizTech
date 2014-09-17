<?php /* Smarty version Smarty-3.1.19-dev, created on 2014-09-18 14:04:02
         compiled from "/var/www/html/sukima/fuel/app/views/sukima/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1280585385541a65cc1d4788-84407540%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '959c1c0a9c318bc20955283f908e646ec69dd941' => 
    array (
      0 => '/var/www/html/sukima/fuel/app/views/sukima/index.tpl',
      1 => 1411016641,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1280585385541a65cc1d4788-84407540',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19-dev',
  'unifunc' => 'content_541a65cc285162_32918080',
  'variables' => 
  array (
    'data' => 0,
    'id' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_541a65cc285162_32918080')) {function content_541a65cc285162_32918080($_smarty_tpl) {?><html>
<head>
        
</head>
<body>
        <?php echo var_dump($_smarty_tpl->tpl_vars['data']->value);?>

        <br>
        <?php echo $_smarty_tpl->tpl_vars['id']->value;?>

        <br />
        <a href="/sukima/timeline">timeline</a><br />
        <a href="/sukima/mypage">mypage</a>
</body>
</html>
<?php }} ?>
