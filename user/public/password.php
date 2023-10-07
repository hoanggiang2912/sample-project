
<form action="index.php?pg=password" class="form user-form password-form flex-full flex-column p20 g30 r12" method="post">
    <div class="form__group flex-column">
        <label for="" class="form__label">New password</label>
        <input type="text" name="newPassword" class="form__input new-password">
        <span class="form__message"></span>
        <!-- <p class="body-text3">Minimum 6 characters</p> -->
    </div>
    <div class="form__group flex-column">
        <label for="" class="form__label">Old password <span class="required">*</span></label>
        <input type="text" name="oldPassword" class="form__input old-password">
        <span class="form__message"></span>
        <!-- <p class="body-text3"></p>
        <p class="body-text3">Confirm your old password before the change</p> -->
    </div>
    <span class="form__message"><?= $message ?></span>
    <div class="row flex-between">
        <div class="flex g6">
            <p class="required">*</p>
            <p class="body-text3">Please save your change before you leave the site</p>
        </div>
        <input type="submit" name="updatePassword" class="btn form__btn primary__btn" value="Save changes">
    </div>
</form>
<script>
    Validator({
        formSelector: '.password-form',
        formGroupSelector: '.form__group',
        formMessage: '.form__message',
        rules: [
            Validator.isRequired('.old-password' , 'Confirm your old password before the change'),
            Validator.isPassword('.old-password'),
            Validator.isPassword('.new-password' , 6),
        ]
    })
</script>