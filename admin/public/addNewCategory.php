<div class="container-full admin__container flex">
    <!-- admin sidebar start -->
    <?php 
        require_once 'sidebar.php';
    ?>
    <!-- admin sidebar end -->
    <main class="admin__panel p20 flex-column flex-full g20">
        <h4 class="heading-4">Add new category</h4>
        <div class="admin__main category__main flex-column g12">
            <form action="" method="post" class="form admin__form update-category__form">
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
                            <input type="text" class="form__input" name="name" placeholder="Category name">
                        </td>
                        <td class="flex j-center">
                            <button type="submit" name="addNewCategory" class="btn primary__btn">Add</button>
                        </td>
                    </tr>
                    <!-- single category end -->
                    <!-- table body end -->

                </table>
            </form>
        </div>
    </main>
</div>