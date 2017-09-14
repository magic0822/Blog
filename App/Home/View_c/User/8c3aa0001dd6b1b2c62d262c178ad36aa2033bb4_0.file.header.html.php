<?php
/* Smarty version 3.1.29, created on 2017-06-07 09:18:37
  from "D:\myweb\websites\Blog\App\Home\View\Public\header.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5937546d76bd98_24337868',
  'file_dependency' => 
  array (
    '8c3aa0001dd6b1b2c62d262c178ad36aa2033bb4' => 
    array (
      0 => 'D:\\myweb\\websites\\Blog\\App\\Home\\View\\Public\\header.html',
      1 => 1496798311,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5937546d76bd98_24337868 ($_smarty_tpl) {
?>
<header>
    <h1>Sparrow</h1>
    <h2>A place you can bullshit as you want</h2>
    <div class="logo"><a href="index.php?p=Home&c=Index&a=index"></a></div>
    <nav id="topnav"><a href="index.php?p=Home&c=Index&a=index">Home</a>
        <?php
$_from = $_smarty_tpl->tpl_vars['firstCate']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_row_0_saved_item = isset($_smarty_tpl->tpl_vars['row']) ? $_smarty_tpl->tpl_vars['row'] : false;
$_smarty_tpl->tpl_vars['row'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['row']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['row']->value) {
$_smarty_tpl->tpl_vars['row']->_loop = true;
$__foreach_row_0_saved_local_item = $_smarty_tpl->tpl_vars['row'];
?>
        <a href="index.php?p=Home&c=Article&a=index&cate_id=<?php echo $_smarty_tpl->tpl_vars['row']->value['cate_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['row']->value['cate_name'];?>
</a>
        <?php
$_smarty_tpl->tpl_vars['row'] = $__foreach_row_0_saved_local_item;
}
if ($__foreach_row_0_saved_item) {
$_smarty_tpl->tpl_vars['row'] = $__foreach_row_0_saved_item;
}
?>
    <a href="index.php?p=Home&c=SinglePage&a=index&page_id=2">About Me</a>
        <?php if ((($tmp = @$_SESSION['userInfo']['user_id'])===null||$tmp==='' ? 0 : $tmp) > 0) {?>
        <a style="font-size: 12px;margin-left: 100px;padding: 0">
            Hi,<?php echo $_SESSION['userInfo']['user_name'];?>
&nbsp;
        </a><a href="index.php?p=Home&c=User&a=logout" style="font-size: 12px;margin-right: 100px;padding: 0">Logout</a>

        <?php } else { ?>
        <a href="index.php?p=Home&c=User&a=login" style="font-size:12px;margin-left: 100px;padding: 0;">Login&nbsp;</a><a
                href="index.php?p=Home&c=User&a=register"  style="font-size:12px;margin-right: 100px;padding: 0;">&nbsp;SignUp</a>
        <?php }?>
    </nav>
</header><?php }
}
