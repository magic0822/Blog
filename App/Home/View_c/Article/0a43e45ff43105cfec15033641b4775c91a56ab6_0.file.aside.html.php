<?php
/* Smarty version 3.1.29, created on 2017-06-07 13:28:56
  from "D:\myweb\websites\Blog\App\Home\View\Public\aside.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59378f18c2a829_23774454',
  'file_dependency' => 
  array (
    '0a43e45ff43105cfec15033641b4775c91a56ab6' => 
    array (
      0 => 'D:\\myweb\\websites\\Blog\\App\\Home\\View\\Public\\aside.html',
      1 => 1496813306,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59378f18c2a829_23774454 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once 'D:/myweb/websites/Blog/Vendor/Smarty/plugins\\modifier.date_format.php';
?>
<aside>
    <div class="rnav">
        <?php
$_from = $_smarty_tpl->tpl_vars['subCate']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_n1_0_saved = isset($_smarty_tpl->tpl_vars['__smarty_foreach_n1']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_n1'] : false;
$__foreach_n1_0_saved_item = isset($_smarty_tpl->tpl_vars['row']) ? $_smarty_tpl->tpl_vars['row'] : false;
$_smarty_tpl->tpl_vars['row'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['__smarty_foreach_n1'] = new Smarty_Variable(array('index' => -1));
$_smarty_tpl->tpl_vars['row']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['row']->value) {
$_smarty_tpl->tpl_vars['row']->_loop = true;
$_smarty_tpl->tpl_vars['__smarty_foreach_n1']->value['index']++;
$__foreach_n1_0_saved_local_item = $_smarty_tpl->tpl_vars['row'];
?>
        <li class="rnav1<?php echo (isset($_smarty_tpl->tpl_vars['__smarty_foreach_n1']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_n1']->value['index'] : null)%4+1;?>
 "><a href="index.php?p=Home&c=Article&a=index&cate_id=<?php echo $_smarty_tpl->tpl_vars['row']->value['cate_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['row']->value['cate_name'];?>
</a></li>
        <?php
$_smarty_tpl->tpl_vars['row'] = $__foreach_n1_0_saved_local_item;
}
if ($__foreach_n1_0_saved) {
$_smarty_tpl->tpl_vars['__smarty_foreach_n1'] = $__foreach_n1_0_saved;
}
if ($__foreach_n1_0_saved_item) {
$_smarty_tpl->tpl_vars['row'] = $__foreach_n1_0_saved_item;
}
?>
    </div>
    <div class="ph_news">
        <h2>
            <p>Tops</p>
        </h2>
        <ul class="ph_n">
            <?php
$_from = $_smarty_tpl->tpl_vars['sortByHits']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_n2_1_saved = isset($_smarty_tpl->tpl_vars['__smarty_foreach_n2']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_n2'] : false;
$__foreach_n2_1_saved_item = isset($_smarty_tpl->tpl_vars['row']) ? $_smarty_tpl->tpl_vars['row'] : false;
$_smarty_tpl->tpl_vars['row'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['__smarty_foreach_n2'] = new Smarty_Variable(array('iteration' => 0));
$_smarty_tpl->tpl_vars['row']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['row']->value) {
$_smarty_tpl->tpl_vars['row']->_loop = true;
$_smarty_tpl->tpl_vars['__smarty_foreach_n2']->value['iteration']++;
$__foreach_n2_1_saved_local_item = $_smarty_tpl->tpl_vars['row'];
?>
            <?php if ((isset($_smarty_tpl->tpl_vars['__smarty_foreach_n2']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_n2']->value['iteration'] : null) <= 3) {?>
            <li><span class="num<?php echo (isset($_smarty_tpl->tpl_vars['__smarty_foreach_n2']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_n2']->value['iteration'] : null);?>
"><?php echo (isset($_smarty_tpl->tpl_vars['__smarty_foreach_n2']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_n2']->value['iteration'] : null);?>
</span><a href="index.php?p=Home&c=Article&a=show&art_id=<?php echo $_smarty_tpl->tpl_vars['row']->value['art_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['row']->value['title'];?>
</a></li>
            <?php } else { ?>
            <li><span><?php echo (isset($_smarty_tpl->tpl_vars['__smarty_foreach_n2']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_n2']->value['iteration'] : null);?>
</span><a href="index.php?p=Home&c=Article&a=show&art_id=<?php echo $_smarty_tpl->tpl_vars['row']->value['art_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['row']->value['title'];?>
</a></li>
            <?php }?>
            <?php
$_smarty_tpl->tpl_vars['row'] = $__foreach_n2_1_saved_local_item;
}
if ($__foreach_n2_1_saved) {
$_smarty_tpl->tpl_vars['__smarty_foreach_n2'] = $__foreach_n2_1_saved;
}
if ($__foreach_n2_1_saved_item) {
$_smarty_tpl->tpl_vars['row'] = $__foreach_n2_1_saved_item;
}
?>
        </ul>
        <h2>
            <p>Recommend</p>
        </h2>
        <ul>
            <?php
$_from = $_smarty_tpl->tpl_vars['sortByRecommend']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_row_2_saved_item = isset($_smarty_tpl->tpl_vars['row']) ? $_smarty_tpl->tpl_vars['row'] : false;
$_smarty_tpl->tpl_vars['row'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['row']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['row']->value) {
$_smarty_tpl->tpl_vars['row']->_loop = true;
$__foreach_row_2_saved_local_item = $_smarty_tpl->tpl_vars['row'];
?>
            <li><a href="index.php?p=Home&c=Article&a=show&art_id=<?php echo $_smarty_tpl->tpl_vars['row']->value['art_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['row']->value['title'];?>
</a></li>
            <?php
$_smarty_tpl->tpl_vars['row'] = $__foreach_row_2_saved_local_item;
}
if ($__foreach_row_2_saved_item) {
$_smarty_tpl->tpl_vars['row'] = $__foreach_row_2_saved_item;
}
?>
        </ul>
        <h2>
            <p>最新评论</p>
        </h2>
        <ul class="pl_n">
            <?php
$_from = $_smarty_tpl->tpl_vars['cmtInfos']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_row_3_saved_item = isset($_smarty_tpl->tpl_vars['row']) ? $_smarty_tpl->tpl_vars['row'] : false;
$_smarty_tpl->tpl_vars['row'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['row']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['row']->value) {
$_smarty_tpl->tpl_vars['row']->_loop = true;
$__foreach_row_3_saved_local_item = $_smarty_tpl->tpl_vars['row'];
?>
            <dl>
                <dt><img src="/Uploads/User/<?php echo $_smarty_tpl->tpl_vars['row']->value['user_image'];?>
"> </dt>
                <dt> </dt>
                <dd><?php echo $_smarty_tpl->tpl_vars['row']->value['cmt_user'];?>

                    <time><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['row']->value['cmt_time'],'%Y-%m-%d %H:%M:%S');?>
</time>
                </dd>
                <dd><a href="/"><?php echo $_smarty_tpl->tpl_vars['row']->value['cmt_content'];?>
</a></dd>
            </dl>
            <?php
$_smarty_tpl->tpl_vars['row'] = $__foreach_row_3_saved_local_item;
}
if ($__foreach_row_3_saved_item) {
$_smarty_tpl->tpl_vars['row'] = $__foreach_row_3_saved_item;
}
?>
        </ul>
        <h2>
            <p>最近访客</p>
            <ul>
                <img src="images/vis.jpg"><!-- 直接使用“多说”插件的调用代码 -->
            </ul>
        </h2>
    </div>
    <div class="copyright">
        <ul>
            <p> Design by <a href="/">DanceSmile</a></p>
            <p>蜀ICP备11002373号-1</p>
            </p>
        </ul>
    </div>
</aside><?php }
}
