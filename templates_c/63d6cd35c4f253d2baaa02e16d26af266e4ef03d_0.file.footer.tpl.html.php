<?php
/* Smarty version 4.5.5, created on 2026-09-12 15:38:37
  from 'D:\dung-derasoft\templates\mpx\footer.tpl.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_6aa50f8d9394b1_65536607',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '63d6cd35c4f253d2baaa02e16d26af266e4ef03d' => 
    array (
      0 => 'D:\\dung-derasoft\\templates\\mpx\\footer.tpl.html',
      1 => 1789099618,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6aa50f8d9394b1_65536607 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="literature-footer">
    <div class="literature-footer__inner">
        <div class="literature-footer__grid">
            <div class="literature-footer__about">
                <a href="<?php echo $_smarty_tpl->tpl_vars['rootUrl']->value;?>
" class="literature-footer__logo" aria-label="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['estore']->value->getName(), ENT_QUOTES, 'UTF-8', true);?>
">
                    <img src="/<?php echo $_smarty_tpl->tpl_vars['templatePath']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['userTemplate']->value;?>
/img/literature/logo-footer.svg" alt="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['estore']->value->getName(), ENT_QUOTES, 'UTF-8', true);?>
">
                </a>
                <div class="literature-footer__description"><?php echo $_smarty_tpl->tpl_vars['estore']->value->getDescription($_smarty_tpl->tpl_vars['lang']->value);?>
</div>
            </div>

            <div class="literature-footer__column">
                <h2><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['messages']->value['services'], ENT_QUOTES, 'UTF-8', true);?>
</h2>
                <nav class="literature-footer__links" aria-label="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['messages']->value['services'], ENT_QUOTES, 'UTF-8', true);?>
">
                    <?php if (!empty($_smarty_tpl->tpl_vars['services_footer']->value)) {?>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['services_footer']->value, 'service');
$_smarty_tpl->tpl_vars['service']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['service']->value) {
$_smarty_tpl->tpl_vars['service']->do_else = false;
?>
                            <a href="<?php if ($_smarty_tpl->tpl_vars['lang']->value == 'en') {?>/en<?php }
echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['service']->value->getUrl(), ENT_QUOTES, 'UTF-8', true);?>
"><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['service']->value->getName($_smarty_tpl->tpl_vars['lang']->value), ENT_QUOTES, 'UTF-8', true);?>
</a>
                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    <?php }?>
                </nav>
            </div>

            <div class="literature-footer__column">
                <h2><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['messages']->value['contact'], ENT_QUOTES, 'UTF-8', true);?>
</h2>
                <address class="literature-footer__contact">
                    <span><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['estore']->value->getAddress($_smarty_tpl->tpl_vars['lang']->value), ENT_QUOTES, 'UTF-8', true);?>
</span>
                    <a href="tel:<?php echo rawurlencode((string)$_smarty_tpl->tpl_vars['estore']->value->getTel());?>
"><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['estore']->value->getTel(), ENT_QUOTES, 'UTF-8', true);?>
</a>
                    <a href="mailto:<?php echo rawurlencode((string)$_smarty_tpl->tpl_vars['estore']->value->getEmail());?>
"><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['estore']->value->getEmail(), ENT_QUOTES, 'UTF-8', true);?>
</a>
                </address>
            </div>

            <div class="literature-footer__column">
                <h2><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['messages']->value['connect_with_mpx'], ENT_QUOTES, 'UTF-8', true);?>
</h2>
                <div class="literature-footer__socials">
                    <?php if ($_smarty_tpl->tpl_vars['estore']->value->getProperty('custom_link_facebook')) {?><a href="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['estore']->value->getProperty('custom_link_facebook'), ENT_QUOTES, 'UTF-8', true);?>
" target="_blank" rel="noopener noreferrer" aria-label="Facebook"><img src="/<?php echo $_smarty_tpl->tpl_vars['templatePath']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['userTemplate']->value;?>
/img/icon/facebook-white.svg" alt=""></a><?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['estore']->value->getProperty('custom_link_youtube')) {?><a href="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['estore']->value->getProperty('custom_link_youtube'), ENT_QUOTES, 'UTF-8', true);?>
" target="_blank" rel="noopener noreferrer" aria-label="YouTube"><img src="/<?php echo $_smarty_tpl->tpl_vars['templatePath']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['userTemplate']->value;?>
/img/icon/youtube-white.svg" alt=""></a><?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['estore']->value->getProperty('custom_link_tiktok')) {?><a href="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['estore']->value->getProperty('custom_link_tiktok'), ENT_QUOTES, 'UTF-8', true);?>
" target="_blank" rel="noopener noreferrer" aria-label="TikTok"><img src="/<?php echo $_smarty_tpl->tpl_vars['templatePath']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['userTemplate']->value;?>
/img/icon/tiktok.svg" alt=""></a><?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['estore']->value->getProperty('custom_link_instagram')) {?><a href="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['estore']->value->getProperty('custom_link_instagram'), ENT_QUOTES, 'UTF-8', true);?>
" target="_blank" rel="noopener noreferrer" aria-label="Instagram"><img src="/<?php echo $_smarty_tpl->tpl_vars['templatePath']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['userTemplate']->value;?>
/img/icon/instagram-white.svg" alt=""></a><?php }?>
                </div>
            </div>
        </div>
        <div class="literature-footer__bottom">
            <span><?php echo $_smarty_tpl->tpl_vars['messages']->value['copyright'];?>
</span>
            <div class="literature-footer__legal">
                <a href="<?php if ($_smarty_tpl->tpl_vars['lang']->value == 'en') {?>/en/contact<?php } else { ?>/lien-he<?php }?>"><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['messages']->value['contact'], ENT_QUOTES, 'UTF-8', true);?>
</a>
                <a href="<?php if ($_smarty_tpl->tpl_vars['lang']->value == 'en') {?>/en/privacy-policy<?php } else { ?>/chinh-sach-bao-mat<?php }?>"><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['messages']->value['privacy_policy'], ENT_QUOTES, 'UTF-8', true);?>
</a>
            </div>
        </div>
    </div>
</div>

<?php if (false) {?>
<div class="container-l footer-border__bottom footer-top__container flex center-hor flex-wrap gap-20 jus-sb">
    <div class="footer-top__content flex gap-20 flex-wrap ">
        <div class="contact-card flex center-ver gap-10 item-padding-10-20">
            <div class=" contact-card__icon bg-primary flex center-ver center-hor border-radius-15">
                <img src="/<?php echo $_smarty_tpl->tpl_vars['templatePath']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['userTemplate']->value;?>
/img/icon/phone-footer.svg" alt="Phone" class="img-icon">
            </div>
            <div class="flex flex-col">
                <span class="contact-title text-color-deactive"><?php echo $_smarty_tpl->tpl_vars['messages']->value['call_us_now'];?>
</span>
                <a href="tel:+84942710025" class="un-wrap contact-content bold text-color-white ">
                    <?php echo $_smarty_tpl->tpl_vars['estore']->value->getTel();?>

                </a>
            </div>
        </div>
        <div class="contact-card flex center-ver gap-10 item-padding-10-20">
            <div class=" contact-card__icon bg-primary flex center-ver center-hor border-radius-15">
                <img src="/<?php echo $_smarty_tpl->tpl_vars['templatePath']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['userTemplate']->value;?>
/img/icon/email-footer.svg" alt="Email" class="img-icon">
            </div>
            <div class="flex flex-col text-color-white">
                <span class="contact-title text-color-deactive"><?php echo $_smarty_tpl->tpl_vars['messages']->value['email_us_now'];?>
</span>
                <a href="mailto:info@mpx.com"
                    class="un-wrap contact-content bold text-color-white "><?php echo $_smarty_tpl->tpl_vars['estore']->value->getEmail();?>
</a>
            </div>
        </div>
    </div>
    <div class="footer-top__content flex center-ver gap-10 item-padding-10-20">
        <div class=" contact-card__icon bg-primary flex center-ver center-hor border-radius-15">
            <img src="/<?php echo $_smarty_tpl->tpl_vars['templatePath']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['userTemplate']->value;?>
/img/icon/location-footer.svg" alt="Location" class="img-icon">
        </div>
        <div class="flex flex-col text-color-white">
            <span class="contact-title text-color-deactive"><?php echo $_smarty_tpl->tpl_vars['messages']->value['address_center'];?>
</span>
            <span class="bold contact-content "><?php echo $_smarty_tpl->tpl_vars['estore']->value->getAddress($_smarty_tpl->tpl_vars['lang']->value);?>
</span>
        </div>
    </div>
</div>
<div class="container-l footer-border__bottom footer-bottom__container flex center-hor flex-wrap gap-20 jus-sb">
    <div class="company-info flex flex-col gap-20">
        <div class="company-info__logo">
            <img src="/<?php echo $_smarty_tpl->tpl_vars['templatePath']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['userTemplate']->value;?>
/img/logo/logo-footer.webp" alt="MPX Logo" class="img-icon">
        </div>
        <p class="text-color-deactive line-height-16">
            <?php echo $_smarty_tpl->tpl_vars['estore']->value->getDescription($_smarty_tpl->tpl_vars['lang']->value);?>

        </p>
        <p class="text-color-deactive"><?php echo $_smarty_tpl->tpl_vars['messages']->value['tax_id'];?>
: <?php echo $_smarty_tpl->tpl_vars['estore']->value->getProperty('custom_mst');?>
</p>
        <p class="text-color-deactive"><?php echo $_smarty_tpl->tpl_vars['estore']->value->getOpenTime($_smarty_tpl->tpl_vars['lang']->value);?>
</p>
    </div>
    <div class="flex-wrap footer-menu__container flex gap-20 ">
        <div class="footer-menu flex flex-col gap-10 ">
            <h3 class="bold uppercase pos-rel text-color-white"><?php echo $_smarty_tpl->tpl_vars['messages']->value['services'];?>
</h3>
            <div class="title-border-bottom__left"></div>
            <div class="flex flex-col gap-10">
                <?php if ($_smarty_tpl->tpl_vars['services_footer']->value) {?>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['services_footer']->value, 'service');
$_smarty_tpl->tpl_vars['service']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['service']->value) {
$_smarty_tpl->tpl_vars['service']->do_else = false;
?>
                        <a href="<?php if ($_smarty_tpl->tpl_vars['lang']->value == 'en') {?>/en<?php }
echo $_smarty_tpl->tpl_vars['service']->value->getUrl();?>
" class="text-color-deactive clamp-text"><?php echo $_smarty_tpl->tpl_vars['service']->value->getName($_smarty_tpl->tpl_vars['lang']->value);?>
</a>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                <?php }?>
            </div>
        </div>
        <div class="footer-menu flex flex-col gap-10 ">
            <h3 class="bold uppercase  pos-rel text-color-white"><?php echo $_smarty_tpl->tpl_vars['messages']->value['about_mpx'];?>
</h3>
            <div class="title-border-bottom__left"></div>
            <div class="flex flex-col gap-10">
                <a href="<?php if ($_smarty_tpl->tpl_vars['lang']->value == 'en') {?>/en/contact<?php } else { ?>/lien-he<?php }?>" class="text-color-deactive"><?php echo $_smarty_tpl->tpl_vars['messages']->value['contact'];?>
</a>
                <a href="<?php if ($_smarty_tpl->tpl_vars['lang']->value == 'en') {?>/en/about-us<?php } else { ?>/gioi-thieu<?php }?>" class="text-color-deactive"><?php echo $_smarty_tpl->tpl_vars['messages']->value['about_us'];?>
</a>
                <a href="<?php if ($_smarty_tpl->tpl_vars['lang']->value == 'en') {?>/en/privacy-policy<?php } else { ?>/chinh-sach-bao-mat<?php }?>" class="text-color-deactive"><?php echo $_smarty_tpl->tpl_vars['messages']->value['privacy_policy'];?>
</a>
            </div>
            <h3 class="bold uppercase pos-rel text-color-white"><?php echo $_smarty_tpl->tpl_vars['messages']->value['consultation'];?>
</h3>
            <div class="title-border-bottom__left"></div>
            <a href="tel:<?php echo $_smarty_tpl->tpl_vars['estore']->value->getProperty('custom_phone_mobile');?>
" class="text-color-deactive"><?php echo $_smarty_tpl->tpl_vars['estore']->value->getProperty('custom_phone_mobile');?>
</a>
        </div>
        <div class="footer-menu flex flex-col gap-10 ">
            <h3 class="bold uppercase  pos-rel text-color-white"><?php echo $_smarty_tpl->tpl_vars['messages']->value['connect_with_mpx'];?>
</h3>
            <div class="title-border-bottom__left"></div>
            <div class="flex gap-10">
                <div class="social-icon bg-primary flex center-ver center-hor  pos-rel border-radius-5">
                    <img src="/<?php echo $_smarty_tpl->tpl_vars['templatePath']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['userTemplate']->value;?>
/img/icon/facebook-white.svg" alt="Facebook" class="img-icon">
                    <a href="<?php echo $_smarty_tpl->tpl_vars['estore']->value->getProperty('custom_link_facebook');?>
" class="pos-abs cover-all" aria-label="Facebook" onclick="count('fanpage')"></a>
                </div>

                <!-- <div class="social-icon bg-primary flex center-ver center-hor  pos-rel border-radius-5">
                    <img src="/<?php echo $_smarty_tpl->tpl_vars['templatePath']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['userTemplate']->value;?>
/img/icon/twitter-white.svg" alt="Twitter" class="img-icon">
                    <a href="<?php echo $_smarty_tpl->tpl_vars['estore']->value->getProperty('custom_link_twitter');?>
" class="pos-abs cover-all" aria-label="Twitter"></a>
                </div> -->

                <div class="social-icon bg-primary flex center-ver center-hor  pos-rel border-radius-5">
                    <img src="/<?php echo $_smarty_tpl->tpl_vars['templatePath']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['userTemplate']->value;?>
/img/icon/youtube-white.svg" alt="YouTube" class="img-icon">
                    <a href="<?php echo $_smarty_tpl->tpl_vars['estore']->value->getProperty('custom_link_youtube');?>
" class="pos-abs cover-all" aria-label="YouTube" onclick="count('youtube')"></a>
                </div>

                <div class="social-icon bg-primary flex center-ver center-hor  pos-rel border-radius-5">
                    <img src="/templates/mpx/img/icon/tiktok.svg" alt="TikTok" class="img-icon">
                    <a href="<?php echo $_smarty_tpl->tpl_vars['estore']->value->getProperty('custom_link_tiktok');?>
" class="pos-abs cover-all" aria-label="TikTok" onclick="count('tiktok')"></a>
                </div>
                <div class="social-icon bg-primary flex center-ver center-hor  pos-rel border-radius-5">
                    <img src="/templates/mpx/img/icon/pinterest.svg" alt="Pinterest" class="img-icon">
                    <a href="<?php echo $_smarty_tpl->tpl_vars['estore']->value->getProperty('custom_link_pinterest');?>
" class="pos-abs cover-all" aria-label="Pinterest" onclick="count('pinterest')"></a>
                </div>
                <div class="social-icon bg-primary flex center-ver center-hor  pos-rel border-radius-5">
                    <img src="/templates/mpx/img/icon/instagram-white.svg" alt="Instagram" class="img-icon">
                    <a href="<?php echo $_smarty_tpl->tpl_vars['estore']->value->getProperty('custom_link_instagram');?>
" class="pos-abs cover-all" aria-label="Instagram" onclick="count('instagram')"></a>
                </div>
                 <div class="social-icon bg-primary flex center-ver center-hor  pos-rel border-radius-5">
                    <img src="/templates/mpx/img/icon/LinkedIn.svg" alt="LinkedIn" class="img-icon">
                    <a href="<?php echo $_smarty_tpl->tpl_vars['estore']->value->getProperty('custom_link_linkedIn');?>
" class="pos-abs cover-all" aria-label="LinkedIn" onclick="count('linkedin')"></a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-f flex center-hor center-ver copyright-padding">
    <p class="text-center text-color-white">
        <?php echo $_smarty_tpl->tpl_vars['messages']->value['copyright'];?>

    </p>
</div>
<?php }
}
}
