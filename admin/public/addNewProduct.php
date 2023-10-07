<?php 
    // render available categories
    $categoriesHtml = '';
    $i = 1;
    foreach ($catalogs as $item) {
        extract($item);
        $categoriesHtml .= '
            <option value="'.$i.'">'.$name.'</option>
        ';
        $i++;
    }
?>

<div class="container-full admin__container flex">
    <?php
    require_once 'sidebar.php';
    ?>
    <main class="admin__panel p20 flex-column flex-full g20">
        <h4 class="heading-4">Add new product</h4>
        <div class="admin-form__wrapper">
            <form action="" method="post" class="form admin__form add-product__form flex-column g20 p20 r12 common-box">
                <div class="form__group flex-full flex-column">
                    <input type="text" class="form__input" name="name" placeholder="Tên sản phẩm">
                    <span class="form__message"></span>
                </div>
                <div class="form__group flex-full flex-column">
                    <select name="categoryOption" id="category" class="form__input">
                        <option value="0" class="form__option">Chọn danh mục</option>
                        <?= $categoriesHtml ?>
                    </select>
                    <span class="form__message"></span>
                </div>
                <div class="form__group flex-full flex-column">
                    <input type="text" class="form__input" name="price" placeholder="Đơn giá">
                    <span class="form__message"></span>
                </div>
                <div class="flex-full row g12">
                    <div class="form__group flex-full flex-column">
                        <input type="text" name="amount" class="form__input" placeholder="Số lượng">
                        <span class="form__message"></span>
                    </div>
                    <div class="form__group flex-full flex-column">
                        <input type="text" name="promotion" class="form__input" placeholder="Giảm giá">
                        <span class="form__message"></span>
                    </div>
                </div>
                <div class="form__group flex-full flex-column g12 image-uploader">
                    <label for="imageUpload" class="form__input flex-between" style="display: flex">
                        <span>Upload images</span>
                        <i class="fal fa-arrow-to-top"></i>
                    </label>
                    <input type="file" multiple hidden id="imageUpload">
                    <div class="image-uploader--panel p12 r8 common-box flex-column">
                        <div class="img__box row g12">
                            <div class="img__box--item">
                                <img src="/app/views/assets/images/banner2.webp" alt="">
                                <a href="" class="delete__btn poa"><i class="fal fa-times"></i></a>
                            </div>
                            <div class="img__box--item">
                                <img src="/app/views/assets/images/banner2.webp" alt="">
                                <a href="" class="delete__btn poa"><i class="fal fa-times"></i></a>
                            </div>
                            <div class="img__box--item">
                                <img src="/app/views/assets/images/banner2.webp" alt="">
                                <a href="" class="delete__btn poa"><i class="fal fa-times"></i></a>
                            </div>
                            <div class="img__box--item">
                                <img src="/app/views/assets/images/banner2.webp" alt="">
                                <a href="" class="delete__btn poa"><i class="fal fa-times"></i></a>
                            </div>
                        </div>
                        <span class="body-text3 mt12"><span class="required">*</span> Tối đa 10 ảnh</span>
                        <div class="flex flex-full g12 j-end uploader__btns">
                            <button class="btn alert__btn">
                                <i class="fal fa-file-times"></i>
                                Xóa tất cả
                            </button>
                            <button class="btn primary__btn">
                                <i class="fal fa-arrow-to-top"></i>
                                Tải lên
                            </button>
                        </div>
                    </div>
                </div>
                <div class="form__group flex-column g12">
                    <input class="form__input" placeholder="Lựa chọn 1">
                    <input class="form__input" placeholder="Lựa chọn 2">
                    <input class="form__input" placeholder="Lựa chọn 3">
                    <button class="btn addNewOption__btn flex-full">
                        <i class="fal fa-plus"></i>
                        Thêm lựa chọn
                    </button>
                </div>
                <div class="form__group">
                    <textarea name="description" id="" cols="30" rows="10" class="form__input"
                        placeholder="Mô tả ngắn / 255"></textarea>
                </div>
                <div class="form__group">
                    <textarea name="detail" id="" cols="30" rows="15" class="form__input"
                        placeholder="Chi tiết / 1024"></textarea>
                </div>
                <div class="form-btn__group flex g12 flex-full j-end">
                    <input type="submit" name="unsave" class="btn form__btn alert__btn" value="Hủy bỏ">
                    <input type="submit" name="updateProduct" class="btn form__btn primary__btn" value="Thêm sản phẩm">
                </div>
            </form>
        </div>
    </main>
</div>