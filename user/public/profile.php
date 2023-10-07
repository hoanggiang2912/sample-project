<?php
    $bioView = $fullNameView = '';
    if (isset($bio) && !empty($bio)) {
        $bioView = $bio;
    }
    if (isset($fullName) && !empty($fullName)) {
        $fullNameView = $fullName;
    }
?>

<form action="index.php?pg=profile" class="form user-form user-profile-form flex-full flex-column p20 g30 r12" method="post">
    <div class="form__group row v-center start g12 avt__uploader">
        <div class="user__avt rf common-banner" style="background-image: url('../views/assets/images/user__avt.png')"></div>
        <button class="btn alert__btn">Delete</button>
        <button class="btn outline__btn">Upload new picture</button>
    </div>
    <div class="form__group flex-column">
        <label for="" class="form__label">Full name</label>
        <input type="text" class="form__input" name="fullName" value="<?= $fullNameView ?>">
        <span class="form__message"></span>
        <span class="body-text3">We’re big on real names around here, so people know who’s who.</span>
    </div>
    <div class="form__group flex-column">
        <label for="" class="form__label">Location</label>
        <input type="text" class="form__input">
        <span class="form__message"></span>
    </div>
    <div class="form__group flex-column">
        <div class="flex-between">
            <label for="" class="form__label">Bio</label>
            <span class="label">1024</span>
        </div>
        <textarea type="text" class="form__input" name="bio" rows="15"><?= $bioView ?></textarea>
        <span class="form__message"></span>
    </div>
    <div class="row flex-between">
        <div class="flex g6">
            <p class="required">*</p>
            <p class="body-text3">Please save your change before you leave the site</p>
        </div>
        <input type="submit" name="updateProfile" class="btn form__btn primary__btn" value="Save changes">
    </div>
</form>