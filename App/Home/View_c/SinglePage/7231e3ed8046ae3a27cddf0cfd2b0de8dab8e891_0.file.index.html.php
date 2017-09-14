<?php
/* Smarty version 3.1.29, created on 2017-06-07 08:36:33
  from "D:\myweb\websites\Blog\App\Home\View\SinglePage\index.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59374a914e7305_24364832',
  'file_dependency' => 
  array (
    '7231e3ed8046ae3a27cddf0cfd2b0de8dab8e891' => 
    array (
      0 => 'D:\\myweb\\websites\\Blog\\App\\Home\\View\\SinglePage\\index.html',
      1 => 1496795789,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../Public/header.html' => 1,
  ),
),false)) {
function content_59374a914e7305_24364832 ($_smarty_tpl) {
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
style.css" rel="stylesheet">
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
    <h3 class="about_h">You're now at：<a href="index.php?p=Home&c=SinglePage&a=index&page_id=2">Home</a>><a href="1/">About Me</a></h3>
    <div class="about">
      <?php echo $_smarty_tpl->tpl_vars['pageInfo']->value['content'];?>

    </div>
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
