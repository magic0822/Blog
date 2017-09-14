<?php
/* Smarty version 3.1.29, created on 2017-06-06 21:12:02
  from "D:\myweb\websites\Blog\App\Home\View\Index\index.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5936aa2201a438_50122723',
  'file_dependency' => 
  array (
    '8fe076e75efbbb5791a14e2f1a1709d7854049dc' => 
    array (
      0 => 'D:\\myweb\\websites\\Blog\\App\\Home\\View\\Index\\index.html',
      1 => 1496754717,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../Public/header.html' => 1,
  ),
),false)) {
function content_5936aa2201a438_50122723 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_truncate')) require_once 'D:/myweb/websites/Blog/Vendor/Smarty/plugins\\modifier.truncate.php';
if (!is_callable('smarty_modifier_date_format')) require_once 'D:/myweb/websites/Blog/Vendor/Smarty/plugins\\modifier.date_format.php';
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Sparrow's Space</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="<?php echo @constant('CSS_DIR');?>
base.css" rel="stylesheet">
<link href="<?php echo @constant('CSS_DIR');?>
index.css" rel="stylesheet">
<link href="<?php echo @constant('CSS_DIR');?>
media.css" rel="stylesheet">
<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">
  <link type="image/x-icon" href="<?php echo @constant('IMAGES_DIR');?>
favicon2.ico" rel="shortcut icon" />
  <link rel="icon" href="<?php echo @constant('IMAGES_DIR');?>
favicon2.ico" type="image/x-icon" />
<!--[if lt IE 9]>
<?php echo '<script'; ?>
 src="<?php echo @constant('JS_DIR');?>
modernizr.js"><?php echo '</script'; ?>
>
<![endif]-->
</head>
</head>
<body>
<div class="ibody">
<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:../Public/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

  <article>
    <div class="banner">
      <ul class="texts">
        <p>The best life is use of willing attitude, a happy-go-lucky life. </p>
        <p>Best lift is get something you really love and enjoy.</p>
      </ul>
    </div>
    <div class="bloglist">
      <h2>
        <p><span>Recommends</span</p>
      </h2>
      <?php
$_from = $_smarty_tpl->tpl_vars['recommendArt']->value;
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
      <div class="blogs">
        <h3><a href="index.php?p=Home&c=Article&a=show&art_id=<?php echo $_smarty_tpl->tpl_vars['row']->value['art_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['row']->value['title'];?>
</a></h3>
        <figure><img src="/Uploads/thumb/<?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['row']->value['thumb'],8,NULL);?>
/<?php echo $_smarty_tpl->tpl_vars['row']->value['thumb'];?>
" ></figure>
        <ul>
          <p><?php echo smarty_modifier_truncate(preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['row']->value['content']),200,"...");?>
</p>
          <a href="index.php?p=Home&c=Article&a=show&art_id=<?php echo $_smarty_tpl->tpl_vars['row']->value['art_id'];?>
" target="_blank" class="readmore">read more&gt;&gt;</a>
        </ul>
        <p class="autor"><span>Author：<?php echo $_smarty_tpl->tpl_vars['row']->value['author'];?>
</span><span>Category：【<a href="/"><?php echo $_smarty_tpl->tpl_vars['row']->value['cate_name'];?>
</a>】</span><span>read（<a href="/"><?php echo $_smarty_tpl->tpl_vars['row']->value['hits'];?>
</a>）</span><span>commend（<a href="/">30</a>）</span></p>
        <div class="dateview"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['row']->value['addtime'],'%Y-%m-%d');?>
</div>
      </div>
      <?php
$_smarty_tpl->tpl_vars['row'] = $__foreach_row_0_saved_local_item;
}
if ($__foreach_row_0_saved_item) {
$_smarty_tpl->tpl_vars['row'] = $__foreach_row_0_saved_item;
}
?>

  </article>
  <aside>
    <div class="avatar"><a href="about.html"><span>About Sparrow</span></a></div>
    <div class="topspaceinfo">
      <h1>Murmur</h1>
      <p>What the hell is this</p>
    </div>
    <div class="about_c">
      <p>NickName：<?php echo $_smarty_tpl->tpl_vars['masterInfo']->value['nickname'];?>
</p>
      <p>Title：<?php echo $_smarty_tpl->tpl_vars['masterInfo']->value['job'];?>
 </p>
      <p>Location：<?php echo $_smarty_tpl->tpl_vars['masterInfo']->value['home'];?>
</p>
      <p>Tel：<?php echo $_smarty_tpl->tpl_vars['masterInfo']->value['tel'];?>
</p>
      <p>Email：<?php echo $_smarty_tpl->tpl_vars['masterInfo']->value['email'];?>
</p>
    </div>
    
<div class="share-buttons">
    <!-- Email -->
    <a id="share-buttons" href="mailto:?Subject=Hey check it out!;Body=I%20saw%20this%20and%20thought%20of%20you!%20 http://mgsparrow.com">
      <img src="https://simplesharebuttons.com/images/somacro/email.png" alt="Email" sytle="cursor:pointer"/>
    </a>
    <!-- Facebook -->
    <a id="share-buttons"  href="http://www.facebook.com/sharer.php?u=http://mgsparrow.com" target="_blank">
      <img src="https://simplesharebuttons.com/images/somacro/facebook.png" alt="Facebook" sytle="cursor:pointer" />
    </a>
    <!-- Google+ -->
    <a id="share-buttons"  href="https://plus.google.com/share?url=http://mgsparrow.com" target="_blank">
      <img src="https://simplesharebuttons.com/images/somacro/google.png" alt="Google" sytle="cursor:pointer" />
    </a>
    <!-- LinkedIn -->
    <a id="share-buttons"  href="http://www.linkedin.com/shareArticle?mini=true&amp;url=http://mgsparrow.com" target="_blank">
      <img src="https://simplesharebuttons.com/images/somacro/linkedin.png" alt="LinkedIn" sytle="cursor:pointer" />
    </a>
    <!-- Pinterest -->
    <a id="share-buttons"  href="javascript:void((function()%7Bvar%20e=document.createElement('script');e.setAttribute('type','text/javascript');e.setAttribute('charset','UTF-8');e.setAttribute('src','http://assets.pinterest.com/js/pinmarklet.js?r='+Math.random()*99999999);document.body.appendChild(e)%7D)());">
      <img src="https://simplesharebuttons.com/images/somacro/pinterest.png" alt="Pinterest" sytle="cursor:pointer" />
    </a>
    <!-- Twitter -->
    <a id="share-buttons"  href="https://twitter.com/share?url=http://mgsparrow.com&amp;text=Simple%20Share%20Buttons&amp;hashtags=simplesharebuttons" target="_blank">
      <img src="https://simplesharebuttons.com/images/somacro/twitter.png" alt="Twitter" sytle="cursor:pointer" />
    </a>
</div>
    
    <div class="tj_news">
      <h2>
        <p class="tj_t1">Popular</p>
      </h2>
      <ul>
        <?php
$_from = $_smarty_tpl->tpl_vars['newArt']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_row_1_saved_item = isset($_smarty_tpl->tpl_vars['row']) ? $_smarty_tpl->tpl_vars['row'] : false;
$_smarty_tpl->tpl_vars['row'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['row']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['row']->value) {
$_smarty_tpl->tpl_vars['row']->_loop = true;
$__foreach_row_1_saved_local_item = $_smarty_tpl->tpl_vars['row'];
?>
        <li><a href="index.php?p=Home&c=Article&a=show&art_id=<?php echo $_smarty_tpl->tpl_vars['row']->value['art_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['row']->value['title'];?>
</a></li>
        <?php
$_smarty_tpl->tpl_vars['row'] = $__foreach_row_1_saved_local_item;
}
if ($__foreach_row_1_saved_item) {
$_smarty_tpl->tpl_vars['row'] = $__foreach_row_1_saved_item;
}
?>
      </ul>
      <h2>
        <p class="tj_t2">Tops</p>
      </h2>
      <ul>
        <?php
$_from = $_smarty_tpl->tpl_vars['rmdArtByHits']->value;
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
    </div>
    <div class="links">
      <h2>
        <p>other links</p>
      </h2>
      <ul>
        <li><a href="/">Sparrow's Space</a></li>
        <li><a href="#">nothing</a></li>
      </ul>
    </div>
    <div class="copyright">
      <ul>
        <p> Design by <a href="/">Sparrow</a></p>
      </ul>
    </div>
  </aside>
  <?php echo '<script'; ?>
 src="<?php echo @constant('JS_DIR');?>
silder.js"><?php echo '</script'; ?>
>
  <div class="clear"></div>
  <!-- 清除浮动 --> 
</div>
</body>
</html>
<?php }
}
