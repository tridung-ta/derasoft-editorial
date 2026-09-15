<?php
/* Smarty version 4.5.5, created on 2026-09-12 15:38:35
  from 'D:\dung-derasoft\templates\mpx\index.tpl.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_6aa50f8be6c129_85274233',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '19db332ca9f0b2820cc4a1c902abed847b7d7f99' => 
    array (
      0 => 'D:\\dung-derasoft\\templates\\mpx\\index.tpl.html',
      1 => 1789099620,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:head.tpl.html' => 1,
    'file:header.tpl.html' => 1,
    'file:section_contact.tpl.html' => 1,
    'file:recent_news.tpl.html' => 1,
    'file:footer.tpl.html' => 1,
    'file:CTA.tpl.html' => 1,
    'file:rolltotop.tpl.html' => 1,
    'file:popup.tpl.html' => 1,
    'file:script.tpl.html' => 1,
  ),
),false)) {
function content_6aa50f8be6c129_85274233 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:head.tpl.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>'head'), 0, false);
?>
    <header class="container-f bg-black z-index-5">
        <?php $_smarty_tpl->_subTemplateRender('file:header.tpl.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>'header'), 0, false);
?>
    </header>
    <main >
        <?php if ($_smarty_tpl->tpl_vars['bannerDesktop']->value) {?>
            <?php $_smarty_tpl->_assignInScope('bannerD', $_smarty_tpl->tpl_vars['bannerDesktop']->value->getAvatarImage($_smarty_tpl->tpl_vars['uploads']->value));?>
            <?php if ($_smarty_tpl->tpl_vars['bannerD']->value) {?>
            <section class="container-f swiper js-slider-wrapper">
                <div class="container-f js-slider-banner js-slider-ratio overflow-hidden">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide ">
                            <div class="overflow-hidden fill-view pos-rel">
                                <picture>
                                    <source media="(min-width: 1024px)"
                                        srcset="/<?php echo $_smarty_tpl->tpl_vars['bannerD']->value->getPath();?>
/<?php echo $_smarty_tpl->tpl_vars['bannerD']->value->getUrlO();?>
">
                                    <?php if ($_smarty_tpl->tpl_vars['bannerMobile']->value) {?>
                                        <?php $_smarty_tpl->_assignInScope('bannerM', $_smarty_tpl->tpl_vars['bannerMobile']->value->getAvatarImage($_smarty_tpl->tpl_vars['uploads']->value));?>
                                        <?php if ($_smarty_tpl->tpl_vars['bannerM']->value) {?>
                                        <source media="(max-width: 768px)"
                                            srcset="<?php echo $_smarty_tpl->tpl_vars['bannerM']->value->getPath();?>
/<?php echo $_smarty_tpl->tpl_vars['bannerM']->value->getUrlO();?>
">
                                        <?php }?>
                                    <?php }?>
                                    <img class="img-content" src="/<?php echo $_smarty_tpl->tpl_vars['bannerD']->value->getPath();?>
/<?php echo $_smarty_tpl->tpl_vars['bannerD']->value->getUrlO();?>
"
                                        alt="<?php echo $_smarty_tpl->tpl_vars['bannerDesktop']->value->getName();?>
">
                                </picture>
                                <a href="javascript:void(0)" class="pos-abs cover-all z-index-2" aria-label="Xem chi tiết dự án"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <?php }?>
        <?php }?>
        <section class="services-section bg-white-secondary container-padding flex center-hor">
            <div class="container-l flex flex-col gap-20">
                <h1 class="section-title text-center bold uppercase"><?php echo $_smarty_tpl->tpl_vars['messages']->value['professional_services'];?>
</h1>
                <p class="text-center">
                    <?php echo $_smarty_tpl->tpl_vars['messages']->value['professional_services_des'];?>

                </p>
                <div class="service-slider-wrapper pos-rel">
                    <div class="swiper-button-prev custom-prev-btn"></div>
                    <div class="swiper-button-next custom-next-btn"></div>
                    <div class="service-list fill-view swiper" >
                        <div class="swiper-wrapper fill-view ">
                            <?php if ($_smarty_tpl->tpl_vars['listProfessionalService']->value) {?>
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['listProfessionalService']->value, 'service');
$_smarty_tpl->tpl_vars['service']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['service']->value) {
$_smarty_tpl->tpl_vars['service']->do_else = false;
?>
                            <article class="swiper-slide col-3">
                                <div
                                    class="service-item__content border-radius-5 gap-20 bg-white jus-sb flex flex-col pos-rel item-padding-30 center-ver center-hor">
                                    <div class="icon-box-sm ">
                                        <?php $_smarty_tpl->_assignInScope('avatar', $_smarty_tpl->tpl_vars['service']->value->getAvatarImage($_smarty_tpl->tpl_vars['uploads']->value));?>
                                        <?php if ($_smarty_tpl->tpl_vars['avatar']->value) {?>
                                        <img src="/<?php echo $_smarty_tpl->tpl_vars['avatar']->value->getPath();?>
/<?php echo $_smarty_tpl->tpl_vars['avatar']->value->getUrlL();?>
" alt="<?php echo $_smarty_tpl->tpl_vars['service']->value->getName($_smarty_tpl->tpl_vars['lang']->value);?>
"
                                            class="icon-img">
                                        <?php } else { ?>
                                        <img src="/<?php echo $_smarty_tpl->tpl_vars['templatePath']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['userTemplate']->value;?>
/img/icon/no-image.webp"
                                            alt="<?php echo $_smarty_tpl->tpl_vars['service']->value->getName($_smarty_tpl->tpl_vars['lang']->value);?>
" class="icon-img">
                                        <?php }?>
                                    </div>
                                    <div class="service-content flex flex-col gap-10 flex-1">
                                        <h3 class="service-name text-center bold fill-view">
                                            <?php echo $_smarty_tpl->tpl_vars['service']->value->getName($_smarty_tpl->tpl_vars['lang']->value);?>

                                        </h3>
                                        <p class="service-text text-center fill-view">
                                        <?php if ($_smarty_tpl->tpl_vars['lang']->value == 'vn') {?>
                                            <?php echo preg_replace('!<[^>]*?>!', ' ', (string) $_smarty_tpl->tpl_vars['service']->value->getProperty('custom_sapo'));?>

                                        <?php } elseif ($_smarty_tpl->tpl_vars['lang']->value == 'en') {?>
                                            <?php echo preg_replace('!<[^>]*?>!', ' ', (string) $_smarty_tpl->tpl_vars['service']->value->getProperty('custom_sapo_en'));?>

                                        <?php } elseif ($_smarty_tpl->tpl_vars['lang']->value == 'zh') {?>
                                            <?php echo preg_replace('!<[^>]*?>!', ' ', (string) $_smarty_tpl->tpl_vars['service']->value->getProperty('custom_sapo_zh'));?>

                                        <?php }?>
                                        </p>
                                    </div>
                                    <a href="<?php echo $_smarty_tpl->tpl_vars['service']->value->getUrlByLang($_smarty_tpl->tpl_vars['lang']->value);?>
" class="pos-abs cover-all"
                                        aria-label="<?php echo $_smarty_tpl->tpl_vars['service']->value->getName($_smarty_tpl->tpl_vars['lang']->value);?>
"></a>
                                    <button
                                        class="btn-padding text-color-white border-radius-5 cursor-point home-banner__btn bg-primary uppercase flex gap-20 un-wrap">
                                        <?php echo $_smarty_tpl->tpl_vars['messages']->value['learn_more'];?>
 →</button>
                                </div>
                            </article>
                            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            <?php }?>
                        </div>
                        <div class="swiper-pagination custom-dots"></div>
                    </div>
                </div>
        </section>
        <section class="container-f container-padding flex center-hor bg-white-secondary">
            <div class="container-l flex flex-col gap-30">
                <div class="flex flex-col gap-10 center-hor">
                    <h2 class="section-title text-center bold uppercase"><?php echo $_smarty_tpl->tpl_vars['messages']->value['featured_projects'];?>
</h2>
                    <p class="text-center">
                        <?php echo $_smarty_tpl->tpl_vars['messages']->value['featured_projects_des'];?>

                    </p>
                </div>
                <div class="project-slider-wrapper pos-rel">
                    <div class="swiper-button-prev custom-prev-btn"></div>
                    <div class="swiper-button-next custom-next-btn"></div>
                    <div class="project-swiper fill-view swiper">
                        <div class="swiper-wrapper">
                            <?php if ($_smarty_tpl->tpl_vars['featuredProjects']->value) {?>
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['featuredProjects']->value, 'project');
$_smarty_tpl->tpl_vars['project']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['project']->value) {
$_smarty_tpl->tpl_vars['project']->do_else = false;
?>
                            <article class="swiper-slide col-4">
                                <div class="project-item hover-border-primary bg-white flex flex-col pos-rel border-radius-5">
                                    <div class="project-item__img">
                                        <?php $_smarty_tpl->_assignInScope('avatar', $_smarty_tpl->tpl_vars['project']->value->getAvatarImage($_smarty_tpl->tpl_vars['uploads']->value));?>
                                        <?php if ($_smarty_tpl->tpl_vars['avatar']->value) {?>
                                        <img src="/<?php echo $_smarty_tpl->tpl_vars['avatar']->value->getPath();?>
/<?php echo $_smarty_tpl->tpl_vars['avatar']->value->getUrlM();?>
" alt="<?php echo $_smarty_tpl->tpl_vars['project']->value->getTitle($_smarty_tpl->tpl_vars['lang']->value);?>
" class="img-content">
                                        <?php } else { ?>
                                        <img src="/<?php echo $_smarty_tpl->tpl_vars['templatePath']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['userTemplate']->value;?>
/img/logo/no-image.webp" alt="<?php echo $_smarty_tpl->tpl_vars['project']->value->getTitle($_smarty_tpl->tpl_vars['lang']->value);?>
" class="img-content">
                                        <?php }?>
                                    </div>
                                    <div class="project-item__content  item-padding-20 flex flex-col gap-10 jus-sb flex-1">
                                        <div class="flex flex-col gap-10">
                                            <h3 class="bold uppercase clamp-text"><?php echo $_smarty_tpl->tpl_vars['project']->value->getTitle($_smarty_tpl->tpl_vars['lang']->value);?>
</h3>
                                            <p class="clamp-text">
                                                <?php echo preg_replace('!<[^>]*?>!', ' ', (string) $_smarty_tpl->tpl_vars['project']->value->getDescription($_smarty_tpl->tpl_vars['lang']->value));?>

                                            </p>
                                        </div>
                                        <button
                                            class="project-btn btn-padding border-radius-5 cursor-point home-banner__btn bg-primary uppercase flex gap-20 un-wrap">
                                            <p class="text-color-white"><?php echo $_smarty_tpl->tpl_vars['messages']->value['view_details'];?>
</p>
                                            <p class="text-color-white">➔</p>
                                        </button>
                                    </div>
                                    <a href="<?php echo $_smarty_tpl->tpl_vars['project']->value->getUrl($_smarty_tpl->tpl_vars['lang']->value);?>
" class="pos-abs cover-all"
                                        aria-label="<?php echo $_smarty_tpl->tpl_vars['project']->value->getTitle($_smarty_tpl->tpl_vars['lang']->value);?>
"></a>
                                </div>
                            </article>
                            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            <?php }?>
                        </div>
                        <div class="swiper-pagination custom-dots"></div>
                    </div>
                </div>
            </div>
        </section>
        <section class="container-f container-padding flex center-hor bg-white-secondary">
            <div class="container-l flex flex-col gap-30">
                <div class="container-m flex flex-col gap-10 center-hor">
                    <h2 class="section-title text-center bold uppercase"><?php echo $_smarty_tpl->tpl_vars['messages']->value['customer_testimonials'];?>
</h2>
                    <?php if ($_smarty_tpl->tpl_vars['groupBannerCustomerListMpx']->value) {?>
                        <p class="text-center">
                            <?php echo preg_replace('!<[^>]*?>!', ' ', (string) $_smarty_tpl->tpl_vars['groupBannerCustomerListMpx']->value->getProperty('detail'));?>

                        </p>
                    <?php }?>
                </div>
                <div class="logo-brand-wrapper pos-rel">

                    <div class="swiper-button-prev custom-prev-btn"></div>
                    <div class="swiper-button-next custom-next-btn"></div>

                    <div class="logo-brand__swiper fill-view swiper " >
                        <div class="swiper-wrapper ">
                            <?php if ($_smarty_tpl->tpl_vars['customerListMpx']->value) {?>
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['customerListMpx']->value, 'customer');
$_smarty_tpl->tpl_vars['customer']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['customer']->value) {
$_smarty_tpl->tpl_vars['customer']->do_else = false;
?>
                            <?php $_smarty_tpl->_assignInScope('avatar', $_smarty_tpl->tpl_vars['customer']->value->getAvatarImage($_smarty_tpl->tpl_vars['uploads']->value));?>
                            <?php if ($_smarty_tpl->tpl_vars['avatar']->value) {?>
                            <div class="swiper-slide col-6">
                                <div class="logo-brand__item padding-10 pos-rel">
                                    <img class="img-icon" src="/<?php echo $_smarty_tpl->tpl_vars['avatar']->value->getPath();?>
/<?php echo $_smarty_tpl->tpl_vars['avatar']->value->getUrlO();?>
"
                                        alt="<?php echo $_smarty_tpl->tpl_vars['customer']->value->getName($_smarty_tpl->tpl_vars['lang']->value);?>
">
                                </div>
                            </div>
                            <?php }?>
                            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            <?php }?>
                        </div>
                        <div class="swiper-pagination custom-dots"></div>
                    </div>
                </div>
            </div>
        </section>
        <section class="container-f container-padding bg-white">
            <?php $_smarty_tpl->_subTemplateRender('file:section_contact.tpl.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>'section_contact'), 0, false);
?>
        </section>
        <section class="container-f container-padding news-background flex center-hor bg-white-secondary">
            <div class="container-l flex flex-col gap-30">
                <div class=" flex flex-col center-hor z-index-2 guest-comment__title">
                    <p class="text-color-white"><?php echo $_smarty_tpl->tpl_vars['messages']->value['news_and_blogs'];?>
</p>
                    <h2 class="section-title bold uppercase text-color-white"><?php echo $_smarty_tpl->tpl_vars['messages']->value['recent_news'];?>
</h2>
                    <div class="title-border-bottom__left"></div>
                </div>
                <?php $_smarty_tpl->_subTemplateRender('file:recent_news.tpl.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>'recent_news'), 0, false);
?>
            </div>
        </section>
    </main>
    <?php echo '<script'; ?>
 type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@graph": [
                {
                "@type": "WebSite",
                "@id": "<?php echo strtr((string)$_smarty_tpl->tpl_vars['rootUrl']->value, array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", 
                       "\n" => "\\n", "</" => "<\/", "<!--" => "<\!--", "<s" => "<\s", "<S" => "<\S",
                       "`" => "\\`", "\${" => "\\\$\{"));?>
/#website",
                "url": "<?php echo strtr((string)$_smarty_tpl->tpl_vars['rootUrl']->value, array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", 
                       "\n" => "\\n", "</" => "<\/", "<!--" => "<\!--", "<s" => "<\s", "<S" => "<\S",
                       "`" => "\\`", "\${" => "\\\$\{"));?>
/",
                "name": "<?php echo strtr((string)$_smarty_tpl->tpl_vars['estore']->value->getName(), array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", 
                       "\n" => "\\n", "</" => "<\/", "<!--" => "<\!--", "<s" => "<\s", "<S" => "<\S",
                       "`" => "\\`", "\${" => "\\\$\{"));?>
",
                "description": "<?php echo strtr((string)$_smarty_tpl->tpl_vars['estore']->value->getDescription(), array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", 
                       "\n" => "\\n", "</" => "<\/", "<!--" => "<\!--", "<s" => "<\s", "<S" => "<\S",
                       "`" => "\\`", "\${" => "\\\$\{"));?>
",
                "inLanguage": "vi-VN"
                },
                {
                "@type": "Corporation",
                "@id": "<?php echo strtr((string)$_smarty_tpl->tpl_vars['rootUrl']->value, array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", 
                       "\n" => "\\n", "</" => "<\/", "<!--" => "<\!--", "<s" => "<\s", "<S" => "<\S",
                       "`" => "\\`", "\${" => "\\\$\{"));?>
/#organization",
                "name": "<?php echo strtr((string)$_smarty_tpl->tpl_vars['estore']->value->getName(), array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", 
                       "\n" => "\\n", "</" => "<\/", "<!--" => "<\!--", "<s" => "<\s", "<S" => "<\S",
                       "`" => "\\`", "\${" => "\\\$\{"));?>
",
                "url": "<?php echo strtr((string)$_smarty_tpl->tpl_vars['rootUrl']->value, array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", 
                       "\n" => "\\n", "</" => "<\/", "<!--" => "<\!--", "<s" => "<\s", "<S" => "<\S",
                       "`" => "\\`", "\${" => "\\\$\{"));?>
/",
                "logo": {
                    "@type": "ImageObject",
                    "url": "<?php echo $_smarty_tpl->tpl_vars['rootUrl']->value;
echo $_smarty_tpl->tpl_vars['estore']->value->getProperty('store_logo');?>
",
                    "width": 600,
                    "height": 600
                },
                "description": "<?php echo strtr((string)$_smarty_tpl->tpl_vars['estore']->value->getDescription(), array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", 
                       "\n" => "\\n", "</" => "<\/", "<!--" => "<\!--", "<s" => "<\s", "<S" => "<\S",
                       "`" => "\\`", "\${" => "\\\$\{"));?>
",
                "telephone": "<?php echo strtr((string)$_smarty_tpl->tpl_vars['estore']->value->getTel(), array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", 
                       "\n" => "\\n", "</" => "<\/", "<!--" => "<\!--", "<s" => "<\s", "<S" => "<\S",
                       "`" => "\\`", "\${" => "\\\$\{"));?>
",
                "address": {
                    "@type": "PostalAddress",
                    "streetAddress": "<?php echo strtr((string)$_smarty_tpl->tpl_vars['estore']->value->getProperty('custom_address'), array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", 
                       "\n" => "\\n", "</" => "<\/", "<!--" => "<\!--", "<s" => "<\s", "<S" => "<\S",
                       "`" => "\\`", "\${" => "\\\$\{"));?>
",
                    "addressLocality": "TP. Hồ Chí Minh",
                    "addressCountry": "VN"
                },
                "contactPoint": {
                    "@type": "ContactPoint",
                    "telephone": "<?php echo strtr((string)$_smarty_tpl->tpl_vars['estore']->value->getTel(), array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", 
                       "\n" => "\\n", "</" => "<\/", "<!--" => "<\!--", "<s" => "<\s", "<S" => "<\S",
                       "`" => "\\`", "\${" => "\\\$\{"));?>
",
                    "contactType": "customer service",
                    "areaServed": "VN",
                    "availableLanguage": ["Vietnamese", "English"]
                },
                "sameAs": [
                    "<?php echo $_smarty_tpl->tpl_vars['estore']->value->getProperty('custom_link_facebook');?>
",
                    "<?php echo $_smarty_tpl->tpl_vars['estore']->value->getProperty('custom_link_youtube');?>
"
                ]
                }
            ]
        }
    <?php echo '</script'; ?>
>
    <footer class="container-f bg-black center-ver flex flex-col item-padding-80-0 gap-30">
        <?php $_smarty_tpl->_subTemplateRender('file:footer.tpl.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>'footer'), 0, false);
?>
    </footer>
    <?php $_smarty_tpl->_subTemplateRender('file:CTA.tpl.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>'call to action contact'), 0, false);
?>
    <div class="btntotop__container pos-fixed bg-white" id="btnToTop">
        <?php $_smarty_tpl->_subTemplateRender('file:rolltotop.tpl.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>'rolltotop'), 0, false);
?>
    </div>
    <div class="popup-register__container pos-fixed z-index-2 center-ver center-hor container-f">
        <?php $_smarty_tpl->_subTemplateRender('file:popup.tpl.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>'popup'), 0, false);
?>
    </div>
    <?php $_smarty_tpl->_subTemplateRender('file:script.tpl.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>'script'), 0, false);
?>
</body>

</html>
<?php }
}
