<?php
/* Smarty version 4.5.5, created on 2026-09-14 11:28:13
  from 'D:\dung-derasoft\templates\mpx\editorial-home.tpl.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_6aa777dde64fe2_44321360',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b33c330f568340ca3a977f0aea3a40dece30de5b' => 
    array (
      0 => 'D:\\dung-derasoft\\templates\\mpx\\editorial-home.tpl.html',
      1 => 1789352570,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:head.tpl.html' => 1,
    'file:header.tpl.html' => 1,
    'file:editorial-home-section.tpl.html' => 4,
    'file:footer.tpl.html' => 1,
    'file:rolltotop.tpl.html' => 1,
    'file:script.tpl.html' => 1,
  ),
),false)) {
function content_6aa777dde64fe2_44321360 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:head.tpl.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>'head'), 0, false);
?>
<header class="container-f bg-black z-index-5"><?php $_smarty_tpl->_subTemplateRender('file:header.tpl.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>'header'), 0, false);
?></header>
<main class="editorial-home">
 <section class="editorial-home-hero"><div class="container-l"><div><span>VĂN HỌC &amp; NGHỆ THUẬT</span><h1>Không gian của<br>văn chương và cái đẹp</h1><p>Nơi lưu giữ tác phẩm, kết nối những câu chuyện văn hóa và lan tỏa giá trị nhân văn.</p><a href="/van-tho">Khám phá tác phẩm</a></div><img src="/<?php echo $_smarty_tpl->tpl_vars['templatePath']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['userTemplate']->value;?>
/img/literature/author.jpg" alt="Văn học và nghệ thuật"></div></section>
 <?php $_smarty_tpl->_subTemplateRender('file:editorial-home-section.tpl.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('sectionTitle'=>'Văn thơ','sectionIntro'=>'Tác phẩm mới','sectionRoute'=>'/van-tho','sectionItems'=>$_smarty_tpl->tpl_vars['homeLiterature']->value), 0, false);
?>
 <?php $_smarty_tpl->_subTemplateRender('file:editorial-home-section.tpl.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('sectionTitle'=>'Nghệ thuật','sectionIntro'=>'Dòng chảy văn hóa','sectionRoute'=>'/nghe-thuat','sectionItems'=>$_smarty_tpl->tpl_vars['homeArt']->value,'sectionAlt'=>true), 0, true);
?>
 <?php $_smarty_tpl->_subTemplateRender('file:editorial-home-section.tpl.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('sectionTitle'=>'Tin tức','sectionIntro'=>'Thông tin mới','sectionRoute'=>'/tin-tuc','sectionItems'=>$_smarty_tpl->tpl_vars['homeNews']->value), 0, true);
?>
 <?php $_smarty_tpl->_subTemplateRender('file:editorial-home-section.tpl.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('sectionTitle'=>'Video','sectionIntro'=>'Nghe và nhìn','sectionRoute'=>'/video','sectionItems'=>$_smarty_tpl->tpl_vars['homeVideos']->value,'sectionAlt'=>true), 0, true);
?>
</main>
<footer class="container-f bg-black center-ver flex flex-col"><?php $_smarty_tpl->_subTemplateRender('file:footer.tpl.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>'footer'), 0, false);
?></footer>
<div class="btntotop__container pos-fixed bg-white" id="btnToTop"><?php $_smarty_tpl->_subTemplateRender('file:rolltotop.tpl.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>'rolltotop'), 0, false);
?></div><?php $_smarty_tpl->_subTemplateRender('file:script.tpl.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>'script'), 0, false);
?>
</body></html>

<?php }
}
