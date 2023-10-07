<?php
    extract($catalog[0]);
?>

<div class="container-full admin__container flex">
    <?php 
        require_once 'sidebar.php';
    ?>
    <main class="admin__panel p20 flex-column flex-full g20">
        <h4 class="heading-4">Update category</h4>
        <div class="admin__main category__main flex-column g12">
            <form action="index.php?pg=updateCategoryForm&cateId=<?= $id ?>" method="post" class="form admin__form update-category__form">
                <table class="category__table r12 oh full">
                    <!-- table head start -->
                    <tr>
                        <th style="width: 80%">Tên danh mục</th>
                        <th></th>
                    </tr>
                    <!-- table head end -->

                    <!-- table body start -->
                    <!-- single category start -->
                    <tr>
                        <td>
                            <input type="text" name="name" class="form__input" value="<?= $name ?>">
                        </td>
                        <td class="flex j-center">
                            <input type="submit" name="categoryUpdate" class="btn form__btn primary__btn" value="Cập nhật">
                        </td>
                    </tr>
                    <!-- single category end -->
                    <!-- table body end -->
                        
                </table>
            </form>
        </div>
    </main>
</div>