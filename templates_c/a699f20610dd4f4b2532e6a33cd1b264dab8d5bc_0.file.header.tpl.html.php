<?php
/* Smarty version 4.5.5, created on 2026-09-14 11:28:14
  from 'D:\dung-derasoft\templates\mpx\header.tpl.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_6aa777de9fcb57_60629936',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a699f20610dd4f4b2532e6a33cd1b264dab8d5bc' => 
    array (
      0 => 'D:\\dung-derasoft\\templates\\mpx\\header.tpl.html',
      1 => 1789352344,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6aa777de9fcb57_60629936 (Smarty_Internal_Template $_smarty_tpl) {
?><header class="literature-header" data-public-header>
    <div class="literature-header__inner">
        <div class="literature-header__brand-row">
            <a href="<?php echo $_smarty_tpl->tpl_vars['rootUrl']->value;?>
" class="literature-header__brand" aria-label="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['estore']->value->getName(), ENT_QUOTES, 'UTF-8', true);?>
">
                <img src="/<?php echo $_smarty_tpl->tpl_vars['templatePath']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['userTemplate']->value;?>
/img/literature/logo-top.svg" alt="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['estore']->value->getName(), ENT_QUOTES, 'UTF-8', true);?>
">
            </a>
        </div>
        <div class="literature-header__nav-row">
            <nav class="literature-header__nav" aria-label="Điều hướng chính">
                <div class="literature-header__nav-item <?php if (empty($_smarty_tpl->tpl_vars['slugActive']->value)) {?>active<?php }?>">
                    <a class="literature-header__nav-link" href="<?php echo $_smarty_tpl->tpl_vars['rootUrl']->value;?>
">Trang chủ</a>
                </div>
                <div class="literature-header__nav-item <?php if ($_smarty_tpl->tpl_vars['slugActive']->value == 'van-tho' || $_smarty_tpl->tpl_vars['slugActive']->value == 'tho' || $_smarty_tpl->tpl_vars['slugActive']->value == 'van-xuoi') {?>active<?php }?>">
                    <a class="literature-header__nav-link" href="<?php echo $_smarty_tpl->tpl_vars['rootUrl']->value;?>
/van-tho">Văn thơ</a>
                </div>
                <div class="literature-header__nav-item <?php if ($_smarty_tpl->tpl_vars['slugActive']->value == 'nghe-thuat' || $_smarty_tpl->tpl_vars['slugActive']->value == 'am-nhac' || $_smarty_tpl->tpl_vars['slugActive']->value == 'my-thuat' || $_smarty_tpl->tpl_vars['slugActive']->value == 'san-khau-nghe-thuat' || $_smarty_tpl->tpl_vars['slugActive']->value == 'van-hoa') {?>active<?php }?>">
                    <a class="literature-header__nav-link" href="<?php echo $_smarty_tpl->tpl_vars['rootUrl']->value;?>
/nghe-thuat">Nghệ thuật</a>
                </div>
                <div class="literature-header__nav-item <?php if ($_smarty_tpl->tpl_vars['slugActive']->value == 'tin-tuc') {?>active<?php }?>">
                    <a class="literature-header__nav-link" href="<?php echo $_smarty_tpl->tpl_vars['rootUrl']->value;?>
/tin-tuc">Tin tức</a>
                </div>
                <div class="literature-header__nav-item <?php if ($_smarty_tpl->tpl_vars['slugActive']->value == 'video') {?>active<?php }?>">
                    <a class="literature-header__nav-link" href="<?php echo $_smarty_tpl->tpl_vars['rootUrl']->value;?>
/video">Video</a>
                </div>
                <?php if (false) {?>
                <?php if (!empty($_smarty_tpl->tpl_vars['menuTree']->value)) {?>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['menuTree']->value, 'menuItem');
$_smarty_tpl->tpl_vars['menuItem']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['menuItem']->value) {
$_smarty_tpl->tpl_vars['menuItem']->do_else = false;
?>
                        <div class="literature-header__nav-item <?php if ($_smarty_tpl->tpl_vars['menuItem']->value['item']->getUrl() == "/".((string)$_smarty_tpl->tpl_vars['slugActive']->value)) {?>active<?php }?>">
                            <a class="literature-header__nav-link" href="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['menuItem']->value['item']->getUrlByLang($_smarty_tpl->tpl_vars['lang']->value), ENT_QUOTES, 'UTF-8', true);?>
">
                                <?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['menuItem']->value['item']->getNameByLang($_smarty_tpl->tpl_vars['lang']->value), ENT_QUOTES, 'UTF-8', true);?>

                            </a>
                            <?php if (!empty($_smarty_tpl->tpl_vars['menuItem']->value['children'])) {?>
                                <div class="literature-header__submenu">
                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['menuItem']->value['children'], 'child');
$_smarty_tpl->tpl_vars['child']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['child']->value) {
$_smarty_tpl->tpl_vars['child']->do_else = false;
?>
                                        <a href="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['child']->value['item']->getUrlByLang($_smarty_tpl->tpl_vars['lang']->value), ENT_QUOTES, 'UTF-8', true);?>
"><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['child']->value['item']->getNameByLang($_smarty_tpl->tpl_vars['lang']->value), ENT_QUOTES, 'UTF-8', true);?>
</a>
                                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                </div>
                            <?php }?>
                        </div>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                <?php }?>
                <?php }?>
            </nav>
            <div class="literature-header__tools">
                <div class="literature-header__language" aria-label="Ngôn ngữ">
                    <a href="<?php echo $_smarty_tpl->tpl_vars['rootUrl']->value;
echo $_smarty_tpl->tpl_vars['urlVi']->value;?>
" class="<?php if ($_smarty_tpl->tpl_vars['lang']->value == 'vn') {?>active<?php }?>" lang="vi">VI</a>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['rootUrl']->value;
echo $_smarty_tpl->tpl_vars['urlEn']->value;?>
" class="<?php if ($_smarty_tpl->tpl_vars['lang']->value == 'en') {?>active<?php }?>" lang="en">EN</a>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['rootUrl']->value;
echo $_smarty_tpl->tpl_vars['urlZh']->value;?>
" class="<?php if ($_smarty_tpl->tpl_vars['lang']->value == 'zh') {?>active<?php }?>" lang="zh">中文</a>
                </div>
                <button type="button" class="literature-header__menu-button" data-public-menu-toggle aria-label="Mở menu" aria-expanded="false" aria-controls="public-mobile-menu">
                    <img src="/<?php echo $_smarty_tpl->tpl_vars['templatePath']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['userTemplate']->value;?>
/img/icon/bars.svg" alt="">
                </button>
            </div>
        </div>
    </div>
    <nav class="literature-header__mobile-nav" id="public-mobile-menu" aria-label="Điều hướng di động">
        <div class="literature-header__mobile-list">
            <div class="literature-header__mobile-item"><a href="<?php echo $_smarty_tpl->tpl_vars['rootUrl']->value;?>
">Trang chủ</a></div>
            <div class="literature-header__mobile-item"><a href="<?php echo $_smarty_tpl->tpl_vars['rootUrl']->value;?>
/van-tho">Văn thơ</a></div>
            <div class="literature-header__mobile-item"><a href="<?php echo $_smarty_tpl->tpl_vars['rootUrl']->value;?>
/nghe-thuat">Nghệ thuật</a></div>
            <div class="literature-header__mobile-item"><a href="<?php echo $_smarty_tpl->tpl_vars['rootUrl']->value;?>
/tin-tuc">Tin tức</a></div>
            <div class="literature-header__mobile-item"><a href="<?php echo $_smarty_tpl->tpl_vars['rootUrl']->value;?>
/video">Video</a></div>
            <?php if (false) {?>
            <?php if (!empty($_smarty_tpl->tpl_vars['menuTree']->value)) {?>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['menuTree']->value, 'menuItem');
$_smarty_tpl->tpl_vars['menuItem']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['menuItem']->value) {
$_smarty_tpl->tpl_vars['menuItem']->do_else = false;
?>
                    <div class="literature-header__mobile-item">
                        <a href="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['menuItem']->value['item']->getUrlByLang($_smarty_tpl->tpl_vars['lang']->value), ENT_QUOTES, 'UTF-8', true);?>
"><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['menuItem']->value['item']->getNameByLang($_smarty_tpl->tpl_vars['lang']->value), ENT_QUOTES, 'UTF-8', true);?>
</a>
                        <?php if (!empty($_smarty_tpl->tpl_vars['menuItem']->value['children'])) {?>
                            <div class="literature-header__mobile-children">
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['menuItem']->value['children'], 'child');
$_smarty_tpl->tpl_vars['child']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['child']->value) {
$_smarty_tpl->tpl_vars['child']->do_else = false;
?>
                                    <a href="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['child']->value['item']->getUrlByLang($_smarty_tpl->tpl_vars['lang']->value), ENT_QUOTES, 'UTF-8', true);?>
"><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['child']->value['item']->getNameByLang($_smarty_tpl->tpl_vars['lang']->value), ENT_QUOTES, 'UTF-8', true);?>
</a>
                                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            </div>
                        <?php }?>
                    </div>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            <?php }?>
            <?php }?>
        </div>
        <div class="literature-header__mobile-languages" aria-label="Ngôn ngữ">
            <a href="<?php echo $_smarty_tpl->tpl_vars['rootUrl']->value;
echo $_smarty_tpl->tpl_vars['urlVi']->value;?>
" class="<?php if ($_smarty_tpl->tpl_vars['lang']->value == 'vn') {?>active<?php }?>" lang="vi">VI</a>
            <a href="<?php echo $_smarty_tpl->tpl_vars['rootUrl']->value;
echo $_smarty_tpl->tpl_vars['urlEn']->value;?>
" class="<?php if ($_smarty_tpl->tpl_vars['lang']->value == 'en') {?>active<?php }?>" lang="en">EN</a>
            <a href="<?php echo $_smarty_tpl->tpl_vars['rootUrl']->value;
echo $_smarty_tpl->tpl_vars['urlZh']->value;?>
" class="<?php if ($_smarty_tpl->tpl_vars['lang']->value == 'zh') {?>active<?php }?>" lang="zh">中文</a>
        </div>
    </nav>
</header>

<?php if (false) {?>
<div class="container-f bg-primary">
    <div class="container-l flex center-ver header-bar jus-sb">
        <div class="flex center-ver gap-10">
            <div class="top-menu__iconcontact flex center-ver gap-10 jus-sb">
                <div class="top-menu__iconcontact-item flex gap-10 item-padding-10">
                    <div class="top-menu__iconcontact-icon flex center-ver center-hor">
                        <img class="img-icon"
                            src="/<?php echo $_smarty_tpl->tpl_vars['templatePath']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['userTemplate']->value;?>
/img/icon/phone.svg"
                            alt="">
                    </div>
                    <p class="text-color-white">
                        <?php echo $_smarty_tpl->tpl_vars['messages']->value['247support'];?>
: (<?php echo $_smarty_tpl->tpl_vars['estore']->value->getTel();?>
)
                    </p>
                </div>
                <div class="top-menu__iconcontact-item flex gap-10 item-padding-10">
                    <div class="top-menu__iconcontact-icon flex center-ver center-hor">
                        <img class="img-icon"
                            src="/<?php echo $_smarty_tpl->tpl_vars['templatePath']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['userTemplate']->value;?>
/img/icon/envelope.svg"
                            alt="">
                    </div>
                    <p class="text-color-white">
                        <?php echo $_smarty_tpl->tpl_vars['estore']->value->getEmail();?>

                    </p>
                </div>
            </div>
        </div>
            <div class="flex gap-10 center-ver">
            <div class="lang-icon pos-rel ratio-1x1 <?php if ($_smarty_tpl->tpl_vars['lang']->value == 'vn') {?>active<?php }?>">
                <img title="flag VN" src="/templates/mpx/img/icon/VN.svg" alt="">
                <a href="<?php echo $_smarty_tpl->tpl_vars['rootUrl']->value;
echo $_smarty_tpl->tpl_vars['urlVi']->value;?>
" class="pos-abs cover-all"></a>
            </div>
            <div class="lang-icon pos-rel ratio-1x1 <?php if ($_smarty_tpl->tpl_vars['lang']->value == 'en') {?>active<?php }?>">
                <img title="flag EN" src="/templates/mpx/img/icon/EN.svg" alt="">
                <a href="<?php echo $_smarty_tpl->tpl_vars['rootUrl']->value;
echo $_smarty_tpl->tpl_vars['urlEn']->value;?>
" class="pos-abs cover-all"></a>
            </div>
            <div class="lang-icon pos-rel ratio-1x1 <?php if ($_smarty_tpl->tpl_vars['lang']->value == 'zh') {?>active<?php }?>">
                <img title="flag CN" src="/templates/mpx/img/icon/CN.svg" alt="">
                <a href="<?php echo $_smarty_tpl->tpl_vars['rootUrl']->value;
echo $_smarty_tpl->tpl_vars['urlZh']->value;?>
" class="pos-abs cover-all"></a>
            </div>
        </div>
        <!-- <div class="top-menu__container center-ver pos-rel">
            <a class="text-color-white">
                <?php if ($_smarty_tpl->tpl_vars['lang']->value == 'vn') {?>
                    Tiếng Việt
                <?php } elseif ($_smarty_tpl->tpl_vars['lang']->value == 'en') {?>
                    English
                <?php } elseif ($_smarty_tpl->tpl_vars['lang']->value == 'zh') {?>
                    中文
                <?php }?>
                ▾
            </a>
            <div class="top-menu__list pos-abs bg-white z-index-1 item-padding-10 border-radius-5 flex-col gap-10">
                <?php if ($_smarty_tpl->tpl_vars['lang']->value != 'vn') {?>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['rootUrl']->value;
echo $_smarty_tpl->tpl_vars['urlVi']->value;?>
">
                        Tiếng Việt
                    </a>
                <?php }?>

                <?php if ($_smarty_tpl->tpl_vars['lang']->value != 'en') {?>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['rootUrl']->value;
echo $_smarty_tpl->tpl_vars['urlEn']->value;?>
">
                        English
                    </a>
                <?php }?>

                <?php if ($_smarty_tpl->tpl_vars['lang']->value != 'zh') {?>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['rootUrl']->value;
echo $_smarty_tpl->tpl_vars['urlZh']->value;?>
">
                        中文
                    </a>
                <?php }?>
            </div>
        </div> -->
    </div>
</div>
<div class="container-l flex pos-rel header-bottom jus-sb item-padding-10">
    <a href="/" class="logo">
        <img
            title="logo trang chủ"
            src="/<?php echo $_smarty_tpl->tpl_vars['templatePath']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['userTemplate']->value;?>
/img/logo/logo-top.webp"
            alt="">
    </a>
    <div class="flex gap-20 header-bottom__menu center-ver">
        <?php if (!empty($_smarty_tpl->tpl_vars['menuTree']->value)) {?>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['menuTree']->value, 'menuItem');
$_smarty_tpl->tpl_vars['menuItem']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['menuItem']->value) {
$_smarty_tpl->tpl_vars['menuItem']->do_else = false;
?>
                <?php if ($_smarty_tpl->tpl_vars['menuItem']->value['item']->getUrl() == "/".((string)$_smarty_tpl->tpl_vars['slugActive']->value)) {?>
                    <?php $_smarty_tpl->_assignInScope('active', "active");?>
                <?php } else { ?>
                    <?php $_smarty_tpl->_assignInScope('active', '');?>
                <?php }?>
                <div class="header-bottom__item pos-rel <?php echo $_smarty_tpl->tpl_vars['active']->value;?>
 <?php if (!empty($_smarty_tpl->tpl_vars['menuItem']->value['children'])) {?>has-children<?php }?>">
                    <a
                        class="text-color-deactive uppercase bold"
                        href="<?php echo $_smarty_tpl->tpl_vars['menuItem']->value['item']->getUrlByLang($_smarty_tpl->tpl_vars['lang']->value);?>
">
                        <?php echo $_smarty_tpl->tpl_vars['menuItem']->value['item']->getNameByLang($_smarty_tpl->tpl_vars['lang']->value);?>

                        <?php if (!empty($_smarty_tpl->tpl_vars['menuItem']->value['children'])) {?>
                            ▿
                        <?php }?>
                    </a>
                    <?php if (!empty($_smarty_tpl->tpl_vars['menuItem']->value['children'])) {?>
                        <div class="header-bottom__dropdown pos-abs bg-white z-index-1 border-radius-5">
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['menuItem']->value['children'], 'child');
$_smarty_tpl->tpl_vars['child']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['child']->value) {
$_smarty_tpl->tpl_vars['child']->do_else = false;
?>
                                <div class="header-bottom__dropdown-item pos-rel">
                                    <a
                                        class="un-wrap"
                                        href="<?php echo $_smarty_tpl->tpl_vars['child']->value['item']->getUrlByLang($_smarty_tpl->tpl_vars['lang']->value);?>
">
                                        <?php echo $_smarty_tpl->tpl_vars['child']->value['item']->getNameByLang($_smarty_tpl->tpl_vars['lang']->value);?>

                                    </a>
                                    <?php if (!empty($_smarty_tpl->tpl_vars['child']->value['children'])) {?>
                                        <div class="header-bottom__dropdown-item__lvtwo flex flex-col pos-abs bg-white border-radius-5 z-index-1">
                                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['child']->value['children'], 'child2');
$_smarty_tpl->tpl_vars['child2']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['child2']->value) {
$_smarty_tpl->tpl_vars['child2']->do_else = false;
?>
                                                <div class="item-padding-10 pos-rel <?php if (!empty($_smarty_tpl->tpl_vars['child2']->value['children'])) {?>has-children<?php }?>">
                                                    <a href="<?php echo $_smarty_tpl->tpl_vars['child2']->value['item']->getUrlByLang($_smarty_tpl->tpl_vars['lang']->value);?>
">
                                                        <?php echo $_smarty_tpl->tpl_vars['child2']->value['item']->getNameByLang($_smarty_tpl->tpl_vars['lang']->value);?>

                                                    </a>
                                                    <?php if (!empty($_smarty_tpl->tpl_vars['child2']->value['children'])) {?>
                                                        <div class="header-bottom__dropdown-item__lvthree flex flex-col pos-abs bg-white border-radius-5 z-index-2 overflow-hidden">
                                                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['child2']->value['children'], 'child3');
$_smarty_tpl->tpl_vars['child3']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['child3']->value) {
$_smarty_tpl->tpl_vars['child3']->do_else = false;
?>
                                                                <div class="item-padding-10">
                                                                    <a href="<?php echo $_smarty_tpl->tpl_vars['child3']->value['item']->getUrlByLang($_smarty_tpl->tpl_vars['lang']->value);?>
">
                                                                        <?php echo $_smarty_tpl->tpl_vars['child3']->value['item']->getNameByLang($_smarty_tpl->tpl_vars['lang']->value);?>

                                                                    </a>
                                                                </div>
                                                            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                                        </div>
                                                    <?php }?>
                                                </div>
                                            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                        </div>
                                    <?php }?>
                                </div>
                            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                        </div>
                    <?php }?>
                </div>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        <?php }?>
    </div>
    <div class="flex gap-20 header-bottom__function">
        <div class="cursor-pointer btn-register__cal bg-primary header-bottom__res flex center-ver gap-20 btn-padding border-radius-5">
            <p class="uppercase text-color-white bold un-wrap">
                <?php echo $_smarty_tpl->tpl_vars['messages']->value['schedule'];?>

            </p>
            <div class="header-bottom__icon">
                <img
                    class="img-icon"
                    src="/<?php echo $_smarty_tpl->tpl_vars['templatePath']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['userTemplate']->value;?>
/img/icon/arrow-right.svg"
                    alt="icon-mui-ten">
            </div>
        </div>
        <button class="menu-container__bar center-ver">
            <img
                class="img-icon"
                src="/<?php echo $_smarty_tpl->tpl_vars['templatePath']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['userTemplate']->value;?>
/img/icon/bars.svg"
                alt="">
        </button>
    </div>
    <div class="m-menu flex flex-col pos-abs bg-white jus-sb">
        <div class="m-menu__root">
            <?php if (!empty($_smarty_tpl->tpl_vars['menuTree']->value)) {?>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['menuTree']->value, 'menuItem');
$_smarty_tpl->tpl_vars['menuItem']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['menuItem']->value) {
$_smarty_tpl->tpl_vars['menuItem']->do_else = false;
?>
                    <div class="m-menu__item flex flex-col active">
                        <a
                            href="<?php echo $_smarty_tpl->tpl_vars['menuItem']->value['item']->getUrlByLang($_smarty_tpl->tpl_vars['lang']->value);?>
"
                            class="text-color-deactive blod uppercase">
                            <?php echo $_smarty_tpl->tpl_vars['menuItem']->value['item']->getNameByLang($_smarty_tpl->tpl_vars['lang']->value);?>

                        </a>
                        <?php if (!empty($_smarty_tpl->tpl_vars['menuItem']->value['children'])) {?>
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['menuItem']->value['children'], 'child');
$_smarty_tpl->tpl_vars['child']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['child']->value) {
$_smarty_tpl->tpl_vars['child']->do_else = false;
?>
                                <div class="m-menu__child-item">
                                    <a
                                        class="text-right text-color-deactive"
                                        href="<?php echo $_smarty_tpl->tpl_vars['child']->value['item']->getUrlByLang($_smarty_tpl->tpl_vars['lang']->value);?>
">
                                        <?php echo $_smarty_tpl->tpl_vars['child']->value['item']->getNameByLang($_smarty_tpl->tpl_vars['lang']->value);?>

                                        <span>▶</span>
                                    </a>
                                </div>
                            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                        <?php }?>
                    </div>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            <?php }?>
        </div>
        <div class="m-land gap-10 center-hor jus-center">
            <a class="m-land__item active">
                <?php if ($_smarty_tpl->tpl_vars['lang']->value == 'vn') {?>
                    Tiếng Việt
                <?php } elseif ($_smarty_tpl->tpl_vars['lang']->value == 'en') {?>
                    English
                <?php } elseif ($_smarty_tpl->tpl_vars['lang']->value == 'zh') {?>
                    中文
                <?php }?>
            </a>

            <?php if ($_smarty_tpl->tpl_vars['lang']->value != 'vn') {?>
                <a href="<?php echo $_smarty_tpl->tpl_vars['rootUrl']->value;
echo $_smarty_tpl->tpl_vars['urlVi']->value;?>
" class="m-land__item">
                    Tiếng Việt
                </a>
            <?php }?>

            <?php if ($_smarty_tpl->tpl_vars['lang']->value != 'en') {?>
                <a href="<?php echo $_smarty_tpl->tpl_vars['rootUrl']->value;
echo $_smarty_tpl->tpl_vars['urlEn']->value;?>
" class="m-land__item">
                    English
                </a>
            <?php }?>

            <?php if ($_smarty_tpl->tpl_vars['lang']->value != 'zh') {?>
                <a href="<?php echo $_smarty_tpl->tpl_vars['rootUrl']->value;
echo $_smarty_tpl->tpl_vars['urlZh']->value;?>
" class="m-land__item">
                    中文
                </a>
            <?php }?>
        </div>
    </div>
</div>
<?php }
}
}
