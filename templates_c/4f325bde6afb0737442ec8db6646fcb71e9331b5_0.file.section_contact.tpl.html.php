<?php
/* Smarty version 4.5.5, created on 2026-09-12 15:38:37
  from 'D:\dung-derasoft\templates\mpx\section_contact.tpl.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_6aa50f8d71e416_29944711',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4f325bde6afb0737442ec8db6646fcb71e9331b5' => 
    array (
      0 => 'D:\\dung-derasoft\\templates\\mpx\\section_contact.tpl.html',
      1 => 1788924238,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6aa50f8d71e416_29944711 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="container-l flex flex-wrap gap-20">
    <div class="contact-section__container  item-padding-40 flex flex-col gap-30 border-radius-10">
        <div class="flex flex-col gap-10">
            <h2 class="uppercase bold"><?php echo $_smarty_tpl->tpl_vars['messages']->value['any_questions'];?>
</h2>
            <div class="title-border-bottom__left"></div>
        </div>

        <div class="flex flex-col gap-20">
            <div class="custom-item__low item-padding-20 flex center-ver gap-20 border-radius-10">
                <div class="icon-box-50">
                    <img src="/<?php echo $_smarty_tpl->tpl_vars['templatePath']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['userTemplate']->value;?>
/img/icon/phone-icon.svg" class="img-icon" alt="Phone">
                </div>
                <div class="flex flex-col">
                    <span class="text-color-deactive text-sm"><?php echo $_smarty_tpl->tpl_vars['messages']->value['call_us_now'];?>
</span>
                    <span class="bold"><?php echo $_smarty_tpl->tpl_vars['estore']->value->getTel();?>
</span>
                </div>
            </div>

            <div class="custom-item__low item-padding-20 flex center-ver gap-20 border-radius-10">
                <div class="icon-box-50">
                    <img src="/<?php echo $_smarty_tpl->tpl_vars['templatePath']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['userTemplate']->value;?>
/img/icon/mail-icon.svg" class="img-icon" alt="Email">
                </div>
                <div class="flex flex-col">
                    <span class="text-color-deactive text-sm"><?php echo $_smarty_tpl->tpl_vars['messages']->value['email_us_now'];?>
</span>
                    <span class="bold"><?php echo $_smarty_tpl->tpl_vars['estore']->value->getEmail();?>
</span>
                </div>
            </div>

            <div class="custom-item__low item-padding-20 flex center-ver gap-20 border-radius-10">
                <div class="icon-box-50">
                    <img src="/<?php echo $_smarty_tpl->tpl_vars['templatePath']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['userTemplate']->value;?>
/img/icon/map-icon.svg" class="img-icon" alt="Map">
                </div>
                <div class="flex flex-col">
                    <span class="text-color-deactive text-sm"><?php echo $_smarty_tpl->tpl_vars['messages']->value['address_center'];?>
</span>
                    <span class="bold"><?php echo $_smarty_tpl->tpl_vars['estore']->value->getAddress($_smarty_tpl->tpl_vars['lang']->value);?>
</span>
                </div>
            </div>
        </div>
    </div>
    <div
        class="contact-section__container contact-form__background item-padding-40 bg-white-secondary border-radius-10">
        <form class="flex flex-col gap-20 js-validate-form">
            <div class="flex flex-col gap-10">
                <span class="text-color-deactive italic text-sm"><?php echo $_smarty_tpl->tpl_vars['messages']->value['contact'];?>
</span>
                <h2 class="uppercase bold"><?php echo $_smarty_tpl->tpl_vars['messages']->value['contact_us'];?>
</h2>
                <div class="title-border-bottom__left"></div>
            </div>

            <div class="flex flex-wrap gap-20">
                <div class="flex-1 flex flex-col gap-10 form-group">
                    <label class="bold"><?php echo $_smarty_tpl->tpl_vars['messages']->value['full_name'];?>
</label>
                    <input type="text" name="name" placeholder="John Architect" required data-msg="Vui lòng nhập họ tên"
                        class="item-padding-10-20 border-radius-5 bg-white border-none fill-view">
                    <span class="error-msg text-red text-xs"></span>
                </div>
                <div class="flex-1 flex flex-col gap-10 form-group">
                    <label class="bold"><?php echo $_smarty_tpl->tpl_vars['messages']->value['email'];?>
</label>
                    <input type="email" name="email" placeholder="name@architect.core" required
                        class="item-padding-10-20 border-radius-5 bg-white border-none fill-view">
                    <span class="error-msg text-red text-xs"></span>
                </div>
            </div>

            <div class="flex flex-wrap gap-20">
                <div class="flex-1 flex flex-col gap-10 form-group">
                    <label class="bold"><?php echo $_smarty_tpl->tpl_vars['messages']->value['phone'];?>
</label>
                    <input type="text" name="phone_number" placeholder="<?php echo $_smarty_tpl->tpl_vars['messages']->value['phone'];?>
" required
                        data-msg="SĐT phải có 10-11 số"
                        class="item-padding-10-20 border-radius-5 bg-white border-none fill-view">
                    <span class="error-msg text-red text-xs"></span>
                </div>
                <div class="flex-1 flex flex-col gap-10 form-group">
                    <label class="bold"><?php echo $_smarty_tpl->tpl_vars['messages']->value['address'];?>
</label>
                    <input type="text" name="address" placeholder="<?php echo $_smarty_tpl->tpl_vars['messages']->value['address'];?>
" required
                        class="item-padding-10-20 border-radius-5 bg-white border-none fill-view">
                    <span class="error-msg text-red text-xs"></span>
                </div>
            </div>

            <div class="flex flex-col gap-10 form-group">
                <label class="bold"><?php echo $_smarty_tpl->tpl_vars['messages']->value['message'];?>
</label>
                <textarea name="description" rows="4" required minlength="10" data-msg="Nội dung phải ít nhất 10 ký tự"
                    class="item-padding-10-20 border-radius-5 bg-white border-none fill-view"></textarea>
                <span class="error-msg text-red text-xs"></span>
            </div>
            <div class="g-recaptcha" data-sitekey="6Ld6z_wsAAAAAO62WhfUGrt4k_NQP5ZLV2Mw3Qfe"></div>

            <!-- <div class="flex flex-col gap-10 form-group">
                <label class="bold"><?php echo $_smarty_tpl->tpl_vars['messages']->value['captcha'];?>
</label>
                <input type="text" name="captcha"
                    class="item-padding-10-20 border-radius-5 bg-white border-none fill-view">
                <span class="error-msg text-red text-xs"></span>
            </div> -->

            <button id="btn-submit-contact-form" type="submit"
                class="bg-primary text-color-white border-radius-5 bold uppercase cursor-pointer btn-submit-large border-none">
                <?php echo $_smarty_tpl->tpl_vars['messages']->value['submit_message'];?>
 →
            </button>
        </form>
    </div>
</div>
<?php }
}
