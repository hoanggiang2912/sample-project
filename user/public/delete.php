

<form action="index.php?pg=delete" class="form user-form delete-form flex-full flex-column p20 g30 r12" method="post">
    <div class="form__group flex-column">
        <label for="" class="form__label">Delete your account</label>
        <p class="text">If you’d like to reduce your email notifications, you can disable them here or if you just want
            to change your username, you can do that here.
            Be advised, account deletion is final. There will be no way to restore your account.</p>
        <div class="flex v-center g6 mt12">
            <input type="checkbox" name="deleteConfirm" id="deleteConfirm">
            <label for="deleteConfirm" class="sub-label">I’m sure to delete my account</label>
        </div>
    </div>
    <div class="form__group flex-column">
        <label for="" class="form__label">Confirm your password <span class="required">*</span></label>
        <input type="text" name="password" class="form__input password">
        <span class="form__message"></span>
    </div>
    <span class="form__message"><?= $message ?></span>
    <div class="row flex-between">
        <div class="flex g6">
            <p class="required">*</p>
            <p class="body-text3">We’re so sorry to see you leave</p>
        </div>
        <button type="submit" name="deleteAccount" class="btn alert__btn">Delete account</button>
    </div>
</form>
<script>
    Validator({
        formSelector: '.delete-form',
        formGroupSelector: '.form__group',
        formMessage: '.form__message',
        rules: [
            Validator.isPassword('.password')
        ]
    })
</script>
