<?php
/* Smarty version 3.1.29, created on 2017-06-01 21:58:51
  from "D:\myweb\websites\Blog\App\Back\View\SinglePage\index.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59301d9b122cb6_99760088',
  'file_dependency' => 
  array (
    'dbdd272942ccb189175cc1ddef68d06259c414f1' => 
    array (
      0 => 'D:\\myweb\\websites\\Blog\\App\\Back\\View\\SinglePage\\index.html',
      1 => 1496325061,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../Public/header.html' => 1,
  ),
),false)) {
function content_59301d9b122cb6_99760088 ($_smarty_tpl) {
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:../Public/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<?php echo '<script'; ?>
>
	//定义页面载入事件
	$(function(){
		//获取btnAdd按钮
		$('#btnAdd').bind('click',function(){
			// 设置“添加文章”链接
			window.location.href = 'index.php?p=Back&c=singlePage&a=add';
		});
	});

<?php echo '</script'; ?>
>

<div class="admin">
	<form action="index.php?p=Back&c=Article&a=delAll" method="POST">
    <div class="panel admin-panel">
    	<div class="panel-head"><strong>Page List</strong></div>
        <div class="padding border-bottom">
            <input type="button" class="button button-small checkall" name="checkall" checkfor="art_id[]" value="全选" />
            <input type="button" id="btnAdd" class="button button-small border-green" value="Add Page" />
        </div>
        <table class="table table-hover">
        	<tr>
                <th width="100">ID</th>
                <th width="200">Page Title</th>
                <th width="100">Action</th>
            </tr>
            <?php
$_from = $_smarty_tpl->tpl_vars['pageInfo']->value;
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
            <tr>
                <td><?php echo $_smarty_tpl->tpl_vars['row']->value['page_id'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['row']->value['title'];?>
</td>
                <td>
                    <a class="button border-blue button-little" href="index.php?p=Back&c=SinglePage&a=edit&page_id=<?php echo $_smarty_tpl->tpl_vars['row']->value['page_id'];?>
">Edit</a>
                    <a class="button border-yellow button-little" href="index.php?p=Back&c=SinglePage&a=del&page_id=<?php echo $_smarty_tpl->tpl_vars['row']->value['page_id'];?>
">Delete</a>
                </td>
            </tr>
            <?php
$_smarty_tpl->tpl_vars['row'] = $__foreach_row_0_saved_local_item;
}
if ($__foreach_row_0_saved_item) {
$_smarty_tpl->tpl_vars['row'] = $__foreach_row_0_saved_item;
}
?>
        </table>
		<div class="panel-foot text-center">

        </div>
    </div>
    </form>
    <br />
    <p class="text-right text-gray" style="float:right"><a class="text-gray" target="_blank" href="#"></a></p>
</div>
</body>
</html><?php }
}
