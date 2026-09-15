<?php
/* Smarty version 4.5.5, created on 2026-09-12 15:38:37
  from 'D:\dung-derasoft\templates\mpx\recent_news.tpl.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_6aa50f8d81ee69_79984867',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '69ddd1ecc8342d5ed4f36ac14da168d19cbc250c' => 
    array (
      0 => 'D:\\dung-derasoft\\templates\\mpx\\recent_news.tpl.html',
      1 => 1789099358,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6aa50f8d81ee69_79984867 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="news-slider-wrapper pos-rel">
    <div class="swiper-button-prev custom-prev-btn"></div>
    <div class="swiper-button-next custom-next-btn"></div>
    <div class="news-swiper fill-view swiper">
        <div class="swiper-wrapper">
            <?php if ($_smarty_tpl->tpl_vars['recentArticlesBlock']->value) {?>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['recentArticlesBlock']->value, 'article');
$_smarty_tpl->tpl_vars['article']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['article']->value) {
$_smarty_tpl->tpl_vars['article']->do_else = false;
?>
            <article class="swiper-slide col-4">
                <div class="news-item hover-border-primary bg-white flex flex-col pos-rel border-radius-5 overflow-hidden">
                    <div class="news-item__img">
                        <?php $_smarty_tpl->_assignInScope('avatar', $_smarty_tpl->tpl_vars['article']->value->getAvatarImage($_smarty_tpl->tpl_vars['uploads']->value));?>
                        <?php if ($_smarty_tpl->tpl_vars['avatar']->value) {?>
                        <img src="/<?php echo $_smarty_tpl->tpl_vars['avatar']->value->getPath();?>
/<?php echo $_smarty_tpl->tpl_vars['avatar']->value->getUrlL();?>
" alt="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['article']->value->getTitle($_smarty_tpl->tpl_vars['lang']->value), ENT_QUOTES, 'UTF-8', true);?>
"
                            class="img-content" loading="lazy">
                        <?php } else { ?>
                        <img src="/<?php echo $_smarty_tpl->tpl_vars['templatePath']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['userTemplate']->value;?>
/img/news/news.jpg" alt="<?php echo $_smarty_tpl->tpl_vars['article']->value->getTitle($_smarty_tpl->tpl_vars['lang']->value);?>
"
                            class="img-content">
                        <?php }?>
                    </div>
                    <div class="news-item__content item-padding-20 flex flex-1 flex-col gap-10 jus-sb">
                        <div class="news-item__info flex flex-col gap-10">
                            <div class="flex gap-20">
                                <div class="news-item__date flex gap-10">
                                    <img class="img-icon" src="/<?php echo $_smarty_tpl->tpl_vars['templatePath']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['userTemplate']->value;?>
/img/icon/clock.svg"
                                        alt="">
                                    <p>
                                        <?php echo $_smarty_tpl->tpl_vars['article']->value->getDisplayDate();?>

                                    </p>
                                </div>
                                <div class="news-item__view flex gap-10">
                                    <img class="img-icon" src="/<?php echo $_smarty_tpl->tpl_vars['templatePath']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['userTemplate']->value;?>
/img/icon/eye.svg"
                                        alt="">
                                    <p><?php echo $_smarty_tpl->tpl_vars['article']->value->getViewed();?>
</p>
                                </div>
                            </div>
                            <h4 class="news-item__title clamp-text bold"><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['article']->value->getTitle($_smarty_tpl->tpl_vars['lang']->value), ENT_QUOTES, 'UTF-8', true);?>
</h4>
                            <p class="news-item__desc clamp-text">
                                <?php echo preg_replace('!<[^>]*?>!', ' ', (string) $_smarty_tpl->tpl_vars['article']->value->getDescription($_smarty_tpl->tpl_vars['lang']->value));?>

                            </p>
                        </div>
                        <button
                            class="news-btn btn-padding flex gap-5 center-hor center-ver text-color-white border-radius-5 cursor-point bg-primary uppercase flex gap-10 center-ver un-wrap">
                            <p class="text-color-white"><?php echo $_smarty_tpl->tpl_vars['messages']->value['view_details'];?>
</p>
                            <p class="text-color-white">➔</p>
                        </button>
                    </div>
                    <a href="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['article']->value->getUrl($_smarty_tpl->tpl_vars['lang']->value), ENT_QUOTES, 'UTF-8', true);?>
" class="pos-abs cover-all" aria-label="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['article']->value->getTitle($_smarty_tpl->tpl_vars['lang']->value), ENT_QUOTES, 'UTF-8', true);?>
"></a>
                </div>
            </article>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            <?php }?>
        </div>
    </div>
</div>
<?php }
}
