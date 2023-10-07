<?php
    $emailView = '';
    if (isset($email)) {
        if (isset($email) && $email != '') {
            $emailView = $email;
        } else {
            $emailView = '';
        }
    }
?>

<!-- user section main start -->
<form action="index.php?pg=general" class="form user-form general-form flex-full flex-column p20 g30 r12" method="post">
    <div class="form__group flex-column">
        <label for="" class="form__label">Username</label>
        <input type="text" class="form__input" name="username" value="<?= $name ?>">
        <span class="form__message"></span>
        <span class="body-text3">Your Typistial URL: https://typistial.com/<?= $name ?></span>
    </div>
    <div class="form__group flex-column">
        <label for="" class="form__label">Email</label>
        <input type="text" class="form__input email" name="email" value="<?= $emailView ?>">
        <span class="form__message"></span>
    </div>
    <div class="row flex-between">
        <div class="flex g6">
            <p class="required">*</p>
            <p class="body-text3">Please save your change before you leave the site</p>
        </div>
        <input type="submit" name="updateGeneral" class="btn form__btn primary__btn" value="Save changes">
    </div>
</form>
<!-- user section main end -->
<script>
    Validator({
        formSelector: '.general-form',
        formGroupSelector: '.form__group',
        formMessage: '.form__message',
        rules: [
            Validator.isEmail('.email')
        ]
    })
</script>