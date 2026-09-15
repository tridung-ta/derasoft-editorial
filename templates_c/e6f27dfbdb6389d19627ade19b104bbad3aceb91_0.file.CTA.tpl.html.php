<?php
/* Smarty version 4.5.5, created on 2026-09-12 15:38:37
  from 'D:\dung-derasoft\templates\mpx\CTA.tpl.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_6aa50f8dc70dc4_39795771',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e6f27dfbdb6389d19627ade19b104bbad3aceb91' => 
    array (
      0 => 'D:\\dung-derasoft\\templates\\mpx\\CTA.tpl.html',
      1 => 1788924242,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6aa50f8dc70dc4_39795771 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="cta-floating flex flex-col z-index-5 jus-sb">

    <div class="cta-item pos-rel flex flex-col center-ver">
        <div class="cta-item__img">
            <img src="/templates/mpx/img/icon/phone-cta.svg" alt="Phone" class="img-content">
        </div>
        <p class="cta-title"><?php echo $_smarty_tpl->tpl_vars['messages']->value['mobile_phone'];?>
</p>
        <a href="tel:<?php echo $_smarty_tpl->tpl_vars['estore']->value->getTel();?>
" class="pos-abs cover-all" aria-label="Phone" onclick="count('tel')"></a>
    </div>

    <div class="cta-item pos-rel flex flex-col center-ver">
        <div class="cta-item__img">
            <img src="/templates/mpx/img/icon/messenger-cta.svg" alt="Messenger" class="img-content">
        </div>
        <p class="cta-title">Messenger</p>
        <a href="<?php echo $_smarty_tpl->tpl_vars['estore']->value->getProperty('custom_link_facebook');?>
" target="_blank" class="pos-abs cover-all" aria-label="Messenger" onclick="count('mess')"></a>
    </div>

    <div class="cta-item pos-rel flex flex-col center-ver">
        <div class="cta-item__img">
            <img src="/templates/mpx/img/icon/zalo-cta.svg" alt="Zalo" class="img-content">
        </div>
        <p class="cta-title">Zalo</p>
        <a href="<?php echo $_smarty_tpl->tpl_vars['estore']->value->getProperty('custom_link_zalo');?>
" target="_blank" class="pos-abs cover-all" aria-label="Zalo" onclick="count('zalo')"></a>
    </div>

    <div class="cta-item pos-rel flex flex-col center-ver">
        <div class="cta-item__img">
            <img src="/templates/mpx/img/icon/map-cta.svg" alt="Google Maps" class="img-content">
        </div>
        <p class="cta-title">Google Maps</p>
        <a href="<?php echo $_smarty_tpl->tpl_vars['estore']->value->getProperty('custom_linkmap');?>
" target="_blank" class="pos-abs cover-all" aria-label="Google Maps" onclick="count('map')"></a>
    </div>

</div><?php }
}
