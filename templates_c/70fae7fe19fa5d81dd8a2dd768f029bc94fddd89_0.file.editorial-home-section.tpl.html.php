<?php
/* Smarty version 4.5.5, created on 2026-09-14 11:28:15
  from 'D:\dung-derasoft\templates\mpx\editorial-home-section.tpl.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_6aa777df517ed8_64609744',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '70fae7fe19fa5d81dd8a2dd768f029bc94fddd89' => 
    array (
      0 => 'D:\\dung-derasoft\\templates\\mpx\\editorial-home-section.tpl.html',
      1 => 1789352571,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6aa777df517ed8_64609744 (Smarty_Internal_Template $_smarty_tpl) {
?><section class="editorial-home-section container-padding <?php if ($_smarty_tpl->tpl_vars['sectionAlt']->value) {?>bg-white-secondary<?php }?>"><div class="container-l"><div class="editorial-home-section__head"><div><span><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['sectionIntro']->value, ENT_QUOTES, 'UTF-8', true);?>
</span><h2><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['sectionTitle']->value, ENT_QUOTES, 'UTF-8', true);?>
</h2></div><a href="<?php echo $_smarty_tpl->tpl_vars['sectionRoute']->value;?>
">Xem tất cả →</a></div>
 <?php if ($_smarty_tpl->tpl_vars['sectionItems']->value) {?><div class="editorial-home-grid"><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['sectionItems']->value, 'article');
$_smarty_tpl->tpl_vars['article']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['article']->value) {
$_smarty_tpl->tpl_vars['article']->do_else = false;
$_smarty_tpl->_assignInScope('avatar', $_smarty_tpl->tpl_vars['article']->value->getAvatarImage($_smarty_tpl->tpl_vars['uploads']->value));?><article><a href="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['article']->value->getUrl($_smarty_tpl->tpl_vars['lang']->value), ENT_QUOTES, 'UTF-8', true);?>
"><?php if ($_smarty_tpl->tpl_vars['avatar']->value) {?><img src="/<?php echo $_smarty_tpl->tpl_vars['avatar']->value->getPath();?>
/<?php echo $_smarty_tpl->tpl_vars['avatar']->value->getUrlL();?>
" alt="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['article']->value->getTitle($_smarty_tpl->tpl_vars['lang']->value), ENT_QUOTES, 'UTF-8', true);?>
" loading="lazy"><?php } else { ?><img src="/<?php echo $_smarty_tpl->tpl_vars['templatePath']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['userTemplate']->value;?>
/img/logo/no-image.webp" alt="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['article']->value->getTitle($_smarty_tpl->tpl_vars['lang']->value), ENT_QUOTES, 'UTF-8', true);?>
" loading="lazy"><?php }?><div><small><?php echo $_smarty_tpl->tpl_vars['article']->value->getDisplayDate();?>
</small><h3><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['article']->value->getTitle($_smarty_tpl->tpl_vars['lang']->value), ENT_QUOTES, 'UTF-8', true);?>
</h3><p><?php echo preg_replace('!<[^>]*?>!', ' ', (string) $_smarty_tpl->tpl_vars['article']->value->getDescription($_smarty_tpl->tpl_vars['lang']->value));?>
</p></div></a></article><?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></div><?php } else { ?><div class="editorial-empty"><p>Nội dung đang được cập nhật.</p></div><?php }?>
</div></section>

<?php }
}
