<?php
/* Smarty version 4.5.5, created on 2026-09-12 15:38:37
  from 'D:\dung-derasoft\templates\mpx\popup.tpl.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_6aa50f8ddf6276_14584267',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a8ecc78c3498fae87270c710d9fe43b2d115aacf' => 
    array (
      0 => 'D:\\dung-derasoft\\templates\\mpx\\popup.tpl.html',
      1 => 1788924238,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6aa50f8ddf6276_14584267 (Smarty_Internal_Template $_smarty_tpl) {
?><div
    class="contact-section__container container-xs contact-form__background item-padding-40 bg-white-secondary border-radius-10">
    <form class="flex flex-col gap-20 js-validate-form" data-_validated="true">
        <div class="flex flex-col gap-10">
            <!-- <span class="text-color-deactive italic text-sm"><?php echo $_smarty_tpl->tpl_vars['messages']->value['contact'];?>
</span> -->
            <h2 class="uppercase bold"><?php echo $_smarty_tpl->tpl_vars['messages']->value['contact_us'];?>
</h2>
            <div class="title-border-bottom"></div>
        </div>

        <div class="flex flex-wrap gap-20">
            <div class="flex-1 flex flex-col gap-10 form-group">
                <label class="bold"><?php echo $_smarty_tpl->tpl_vars['messages']->value['full_name'];?>
</label>
                <input type="text" name="name" placeholder="John Architect" required="" data-msg="<?php echo $_smarty_tpl->tpl_vars['messages']->value['required_full_name'];?>
"
                    class="item-padding-10-20 border-radius-5 bg-white border-none fill-view">
                <span class="error-msg text-red text-xs"></span>
            </div>
            <div class="flex-1 flex flex-col gap-10 form-group">
                <label class="bold"><?php echo $_smarty_tpl->tpl_vars['messages']->value['email'];?>
</label>
                <input type="email" name="email" placeholder="name@architect.core" required=""
                    class="item-padding-10-20 border-radius-5 bg-white border-none fill-view">
                <span class="error-msg text-red text-xs"></span>
            </div>
        </div>

        <div class="flex flex-wrap gap-20">
            <div class="flex-1 flex flex-col gap-10 form-group">
                <label class="bold"><?php echo $_smarty_tpl->tpl_vars['messages']->value['phone'];?>
</label>
                <input type="text" name="phone_number" placeholder="<?php echo $_smarty_tpl->tpl_vars['messages']->value['phone'];?>
" required=""
                    data-msg="SĐT phải có 10-11 số"
                    class="item-padding-10-20 border-radius-5 bg-white border-none fill-view">
                <span class="error-msg text-red text-xs"></span>
            </div>
            <div class="flex-1 flex flex-col gap-10 form-group">
                <label class="bold"><?php echo $_smarty_tpl->tpl_vars['messages']->value['address'];?>
</label>
                <input type="text" name="address" placeholder="<?php echo $_smarty_tpl->tpl_vars['messages']->value['address'];?>
" required=""
                    class="item-padding-10-20 border-radius-5 bg-white border-none fill-view">
                <span class="error-msg text-red text-xs"></span>
            </div>
        </div>

        <div class="flex flex-col gap-10 form-group">
            <label class="bold"><?php echo $_smarty_tpl->tpl_vars['messages']->value['message'];?>
</label>
            <textarea name="description" rows="4" required="" minlength="10" data-msg="<?php echo $_smarty_tpl->tpl_vars['messages']->value['min_content_length'];?>
"
                class="item-padding-10-20 border-radius-5 bg-white border-none fill-view"></textarea>
            <span class="error-msg text-red text-xs"></span>
        </div>

        <div class="g-recaptcha" data-sitekey="6Ld6z_wsAAAAAO62WhfUGrt4k_NQP5ZLV2Mw3Qfe"></div>

        <!-- <div class="flex flex-col gap-10 form-group">
            <label class="bold"><?php echo $_smarty_tpl->tpl_vars['messages']->value['captcha'];?>
</label>
            <input type="text" name="captcha" required=""
                class="item-padding-10-20 border-radius-5 bg-white border-none fill-view">
            <span class="error-msg text-red text-xs"></span>
        </div> -->

        <button type="submit" id="btn-submit-schedule"
            class="bg-primary text-color-white border-radius-5 bold uppercase cursor-pointer btn-submit-large border-none">
            <?php echo $_smarty_tpl->tpl_vars['messages']->value['schedule_appointment'];?>
 &nbsp; →
        </button>
    </form>
</div><?php }
}
