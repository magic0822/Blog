<?php
/* Smarty version 3.1.29, created on 2017-06-01 21:58:53
  from "D:\myweb\websites\Blog\App\Back\View\singlePage\add.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59301d9d915193_89628421',
  'file_dependency' => 
  array (
    '0ba7f335f98e23182ed4b39fdae13155f9e97b14' => 
    array (
      0 => 'D:\\myweb\\websites\\Blog\\App\\Back\\View\\singlePage\\add.html',
      1 => 1496325096,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../Public/header.html' => 1,
  ),
),false)) {
function content_59301d9d915193_89628421 ($_smarty_tpl) {
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:../Public/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php echo '<script'; ?>
 type="text/javascript" src="/App/Back/Public/ckeditor/ckeditor.js"><?php echo '</script'; ?>
>
<div class="admin">
  <div class="tab">
    <div class="tab-head"> <strong>Page Mange</strong>
      <ul class="tab-nav">
        <li class="active"><a href="#tab-set">Add Page</a></li>
      </ul>
    </div>
    <div class="tab-body"> <br />
      <div class="tab-panel active" id="tab-set">
        <form method="POST" class="form-x" action="index.php?p=Back&c=singlePage&a=dealAdd" enctype="multipart/form-data">
          <div class="form-group">
            <div class="label">
              <label for="sitename">Page Title</label>
            </div>
            <div class="field">
              <input type="text" class="input" id="title" name="title" size="50" placeholder="Page Title" data-validate="required:Please input your page title" />
            </div>
          </div>
          <div class="form-group">
            <div class="label">
              <label for="readme">Page Content</label>
            </div>
            <div class="field">
              <textarea name="content" id="ckeditor" class="input" rows="8" cols="50" placeholder="Please input your page content" data-validate="required:Please input your page content"></textarea>
              <?php echo '<script'; ?>
 type="text/javascript">CKEDITOR.replace('ckeditor')<?php echo '</script'; ?>
>
            </div>
          </div>
          <div class="form-button">
            <button name="submit" class="button bg-main" type="submit">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div style='height:40px; border-bottom:1px #DDD solid'></div>
  <p class="text-right text-gray" style="float:right"><a class="text-gray" target="_blank" href="#"></a></p>
</div>
</body>
</html><?php }
}
