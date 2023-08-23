<?php 
    extract($productCatalog);
    extract($product);
    function renderOption ($optionList , $idCatalog = 0) {
        $html ='';
        $select = '';
        foreach ($optionList as $item) {
            extract($item);
            if (($idCatalog > 0) && ($idCatalog === $id)) {
                $select = 'selected';
            } else {
                $select = '';
            }
            $html .= '<option value="'.$id.'" '.$select.'>'.$name.'</option>';
        }
        echo $html;
    }

    function renderProductOption ($optionList) {
        $i = 1;
        $html = '';
        foreach ($optionList as $item) {
            extract($item);
            $var = 'option'.$i;
            $html .= '
                <li class="list__item">
                    <input type="text" name="option" placeholder="Lựa chọn 2" value="'.$$var.'">
                </li>
            ';
            echo $html;
            $i++;
        }
    }
?>

<div class="container admin-page">
    <?php
    require_once 'sidebar.php';
    ?>
    <div class="admin-page__body">
        <div class="admin-main__panel">
            <div class="panel__content" style="padding: 0;">
                <form action="index.php?pg=updateProductForm&Id=<?=$id?>" method="post" class="add-product__form">
                    <h2 class="title">Product update</h2>
                    <div class="form__group">
                        <input type="text" name="name" placeholder="Tên sản phẩm" value="<?=$name?>">
                    </div>
                    <div class="form__group">
                        <select name="categoryOption" id="categoriesOption">
                            <!-- render categories options start -->
                            <?= renderOption($catalogs , $id_catalog)?>
                            <!-- render categories options end -->
                        </select>
                    </div>
                    <div class="form__group">
                        <input type="text" placeholder="Đơn giá" name="price" value="<?= $price ?>">
                        <input type="text" placeholder="Số lượng" name="amount" value="<?= $amount ?>">
                    </div>
                    <div class="form__group">
                        <input type="text" name="promotion" placeholder="Giảm __%" value="<?= $promotion ?>">
                    </div>
                    <div class="form__group__wrapper">
                        <div class="form__group image-upload">
                            <label for="image-upload" class="flex"
                                style="justify-content: space-between; width: 100%; cursor: pointer;">
                                <h2>Ảnh</h2>
                                <label for="image-upload" class="form__label">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" viewBox="0 0 21 21"
                                        fill="none">
                                        <path
                                            d="M10.125 2.25V12.75M10.125 2.25L13.375 5.25M10.125 2.25L6.875 5.25M18.375 14.25V16.75C18.375 17.8546 17.4796 18.75 16.375 18.75H3.875C2.77043 18.75 1.875 17.8546 1.875 16.75V14.25"
                                            stroke="black" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                </label>
                                <input type="file" multiple id="image-upload" hidden style="display: none">
                            </label>
                        </div>
                        <div class="image-upload__panel">
                            <div class="image-uploaded__wrapper">
                                <div class="image__frame">
                                    <img src="" alt="">
                                    <a class="delete__btn"><i class="fal fa-times"></i></a>
                                </div>
                                <div class="image__frame">
                                    <img src="" alt="">
                                    <a class="delete__btn"><i class="fal fa-times"></i></a>
                                </div>
                                <div class="image__frame">
                                    <img src="" alt="">
                                    <a class="delete__btn"><i class="fal fa-times"></i></a>
                                </div>
                                <div class="image__frame">
                                    <img src="" alt="">
                                    <a class="delete__btn"><i class="fal fa-times"></i></a>
                                </div>
                                <div class="image__frame">
                                    <img src="" alt="">
                                    <a class="delete__btn"><i class="fal fa-times"></i></a>
                                </div>
                            </div>
                            <span class="user__note">Tối đa 10 ảnh <span class="warning">*</span></span>
                            <div class="buttons-set">
                                <button class="delete-all__btn"><i class="fal fa-file-times"></i> Xóa tất cả</button>
                                <button class="upload__btn">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                                        fill="none">
                                        <path
                                            d="M10 1.75V12.25M10 1.75L13.25 4.75M10 1.75L6.75 4.75M18.25 13.75V16.25C18.25 17.3546 17.3546 18.25 16.25 18.25H3.75C2.64543 18.25 1.75 17.3546 1.75 16.25V13.75"
                                            stroke="#00C2FF" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                    Tải lên
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="form__group__wrapper">
                        <div class="form__group product-option">
                            <h2>Lựa chọn</h2>
                        </div>
                        <div class="option-list__wrapper">
                            <ul class="option__list">
                                <!-- render product option start -->
                                <?=renderProductOption($productOptions)?>
                                <!-- render product option end -->
                            </ul>
                            <a href="" class="add-option__btn"><i class="fal fa-plus"></i> Thêm lựa chọn</a>
                        </div>
                    </div>
                    <div class="form__group">
                        <textarea name="desc" id="" cols="30" rows="10" placeholder="Mô tả ngắn - 255 ký tự" value="<?=$description?>"></textarea>
                    </div>
                    <div class="form__group">
                        <textarea name="detail" id="" cols="30" rows="20"
                            placeholder="Mô tả chi tiết - 1024 ký tự"></textarea>
                    </div>
                    <div class="form__group" style="box-shadow: none; justify-content: end;">
                        <div class="buttons-set" style="align-self: stretch; width: 50%">
                            <button type="submit" class="form__btn delete-form-data__btn"><i
                                    class="fal fa-times"></i> Hủy</button>
                            <button type="submit" name="updateProduct" class="form__btn submit-form__btn"> <span><i class="fal fa-save"></i>
                                    Lưu chỉnh sửa</span></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>