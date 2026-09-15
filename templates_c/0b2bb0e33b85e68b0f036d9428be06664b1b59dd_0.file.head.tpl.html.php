<?php
/* Smarty version 4.5.5, created on 2026-09-12 15:38:36
  from 'D:\dung-derasoft\templates\mpx\head.tpl.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_6aa50f8c6b3c65_14779529',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0b2bb0e33b85e68b0f036d9428be06664b1b59dd' => 
    array (
      0 => 'D:\\dung-derasoft\\templates\\mpx\\head.tpl.html',
      1 => 1789097760,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6aa50f8c6b3c65_14779529 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="<?php if ($_smarty_tpl->tpl_vars['currentLang']->value == 'en') {?>en<?php } else { ?>vi<?php }?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="referrer" content="strict-origin-when-cross-origin">

    <!-- ═══ SEO / Meta ═══ -->
    <?php if (!empty($_smarty_tpl->tpl_vars['pageTitle']->value)) {?>
        <?php $_smarty_tpl->_assignInScope('metaTitle', htmlspecialchars((string)preg_replace('!<[^>]*?>!', ' ', (string) $_smarty_tpl->tpl_vars['pageTitle']->value), ENT_QUOTES, 'UTF-8', true));?>
    <?php } else { ?>
        <?php $_smarty_tpl->_assignInScope('metaTitle', htmlspecialchars((string)preg_replace('!<[^>]*?>!', ' ', (string) $_smarty_tpl->tpl_vars['estore']->value->getProperty('custom_meta_title')), ENT_QUOTES, 'UTF-8', true));?>
    <?php }?>

    <?php if (!empty($_smarty_tpl->tpl_vars['pageDescription']->value)) {?>
        <?php $_smarty_tpl->_assignInScope('metaDescription', htmlspecialchars((string)preg_replace('!<[^>]*?>!', ' ', (string) $_smarty_tpl->tpl_vars['pageDescription']->value), ENT_QUOTES, 'UTF-8', true));?>
    <?php } else { ?>
        <?php $_smarty_tpl->_assignInScope('metaDescription', htmlspecialchars((string)preg_replace('!<[^>]*?>!', ' ', (string) $_smarty_tpl->tpl_vars['estore']->value->getProperty('custom_meta_description')), ENT_QUOTES, 'UTF-8', true));?>
    <?php }?>

    <?php if (!empty($_smarty_tpl->tpl_vars['pageKeywords']->value)) {?>
        <?php $_smarty_tpl->_assignInScope('metaKeywords', htmlspecialchars((string)preg_replace('!<[^>]*?>!', ' ', (string) $_smarty_tpl->tpl_vars['pageKeywords']->value), ENT_QUOTES, 'UTF-8', true));?>
    <?php } else { ?>
        <?php $_smarty_tpl->_assignInScope('metaKeywords', htmlspecialchars((string)preg_replace('!<[^>]*?>!', ' ', (string) $_smarty_tpl->tpl_vars['estore']->value->getProperty('custom_meta_keyword')), ENT_QUOTES, 'UTF-8', true));?>
    <?php }?>

    <?php if (!empty($_smarty_tpl->tpl_vars['pageTitle']->value)) {?>
        <?php $_smarty_tpl->_assignInScope('ogSiteName', htmlspecialchars((string)preg_replace('!<[^>]*?>!', ' ', (string) $_smarty_tpl->tpl_vars['pageTitle']->value), ENT_QUOTES, 'UTF-8', true));?>
    <?php } else { ?>
        <?php $_smarty_tpl->_assignInScope('ogSiteName', htmlspecialchars((string)preg_replace('!<[^>]*?>!', ' ', (string) $_smarty_tpl->tpl_vars['estore']->value->getName()), ENT_QUOTES, 'UTF-8', true));?>
    <?php }?>

    <title><?php echo $_smarty_tpl->tpl_vars['metaTitle']->value;?>
</title>
    <meta name="description" content="<?php echo $_smarty_tpl->tpl_vars['metaDescription']->value;?>
">
    <meta name="robots" content="max-image-preview:large">
    <meta name="keywords"    content="<?php echo $_smarty_tpl->tpl_vars['metaKeywords']->value;?>
">
    <?php if ($_smarty_tpl->tpl_vars['currentUrlx1']->value) {?><link rel="canonical" href="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['currentUrlx1']->value, ENT_QUOTES, 'UTF-8', true);?>
"><?php }?>

    <!-- ═══ Open Graph ═══ -->
    <meta property="og:type"         content="<?php echo (($tmp = $_smarty_tpl->tpl_vars['typeweb']->value ?? null)===null||$tmp==='' ? 'website' ?? null : $tmp);?>
">
    <meta property="og:title"        content="<?php echo $_smarty_tpl->tpl_vars['metaTitle']->value;?>
">
    <meta property="og:description"  content="<?php echo $_smarty_tpl->tpl_vars['metaDescription']->value;?>
">
    <meta property="og:image"        content="<?php echo (($tmp = $_smarty_tpl->tpl_vars['logoimg1']->value ?? null)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['logoimg']->value ?? null : $tmp);?>
">
    <meta property="og:image:alt"    content="<?php echo $_smarty_tpl->tpl_vars['metaTitle']->value;?>
">
    <meta property="og:image:width"  content="384">
    <meta property="og:image:height" content="384">
    <meta property="og:site_name"    content="<?php echo $_smarty_tpl->tpl_vars['ogSiteName']->value;?>
">
    <?php if ($_smarty_tpl->tpl_vars['currentUrlx1']->value) {?><meta property="og:url" content="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['currentUrlx1']->value, ENT_QUOTES, 'UTF-8', true);?>
"><?php }?>

    <!-- ═══ Favicon ═══ -->
    <link rel="icon" type="image/png" href="/<?php echo $_smarty_tpl->tpl_vars['templatePath']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['userTemplate']->value;?>
/img/logo/favicon.png">

    <!-- ═══ Fonts ═══ -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet"  href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;700&family=Roboto:wght@400;500;700&display=swap">

    <!-- ═══ Vendor CSS ═══ -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css">

    <!-- ═══ Theme CSS ═══ -->
    <?php $_smarty_tpl->_assignInScope('cssBase', "/".((string)$_smarty_tpl->tpl_vars['templatePath']->value)."/".((string)$_smarty_tpl->tpl_vars['userTemplate']->value)."/css");?>
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['cssBase']->value;?>
/base.css">
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['cssBase']->value;?>
/font.css">
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['cssBase']->value;?>
/custom.css">
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['cssBase']->value;?>
/utility.css">
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['cssBase']->value;?>
/responsive.css">
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['cssBase']->value;?>
/swiper-custom.css">
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['cssBase']->value;?>
/literature-redesign.css">
    
    <!-- ═══ Google Site Verification ═══ -->
    <meta name="google-site-verification" content="KLrl7JXZNDVP8epy8qIT9DD2sblUmeQoG3C1hdl-RjY" />

    <!-- ═══ Inline Scripts ═══ -->
    <?php echo '<script'; ?>
>window.csrfToken = '<?php echo $_smarty_tpl->tpl_vars['csrf_token']->value;?>
';<?php echo '</script'; ?>
>

    <!-- ═══ Structured Data ═══ -->
    <?php if ($_smarty_tpl->tpl_vars['breadcrumbJson']->value) {?>
    <?php echo '<script'; ?>
 type="application/ld+json"><?php echo $_smarty_tpl->tpl_vars['breadcrumbJson']->value;
echo '</script'; ?>
>
    <?php }?>
</head>
<body>
<?php }
}
