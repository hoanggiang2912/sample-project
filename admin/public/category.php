<?php 
    $html = '';
    $i = 1;
    foreach ($categories as $item) {
        extract($item);
        $html.= '
            <tr>
                <td>'.$i.'</td>
                <td>'.$name.'</td>
                <td>'.count(getProductByCatalogId($id)).'</td>
                <td class="flex-center g20">
                    <a href="index.php?pg=updateCategoryForm&cateId='.$id.'" class="edit__btn"><i class="fal fa-pen"></i></a>
                    | 
                    <a href="index.php?pg=delCategory&cateId='.$id.'" class="delete__btn"><i class="fal fa-trash-alt"></i></a>
                </td>
            </tr>
        ';
        $i++;
    }
?>

<div class="container-full admin__container flex">
    <?php 
        require_once 'sidebar.php';
    ?>
    <main class="admin__panel p20 flex-column flex-full g20">
        <!-- admin header start -->
        <?php 
            require_once 'header.php';
        ?>
        <!-- admin header end -->
        <div class="admin__main category__main flex-column g12">
            <table class="category__table r12 oh">
                <!-- table head start -->
                <tr>
                    <th>Id</th>
                    <th>Tên danh mục</th>
                    <th>Số lượng sản phẩm</th>
                    <th>Sửa / Xóa</th>
                </tr>
                <!-- table head end -->

                <!-- table body start -->
                <tbody>
                    <!-- single category start -->
                    <!-- <tr>
                        <td>1</td>
                        <td>Keyboards</td>
                        <td>28</td>
                        <td class="flex-center g12">
                            <a href="" class="edit__btn">
                                <i class="fal fa-pen"></i>  
                            </a>
                            |
                            <a href="" class="delete__btn">
                                <i class="fal fa-trash-alt"></i>
                            </a>
                        </td>
                    </tr> -->
                    <!-- single category end -->
                    <?= $html ?>
                    <tr>
                        <td colspan="4">
                            <a href="index.php?pg=addCategory" class="md"><i class="far fa-plus"></i> Thêm danh mục</a>
                        </td>
                    </tr>
                </tbody>
                <!-- table body end -->

            </table>
        </div>
    </main>
</div>