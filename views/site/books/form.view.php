<?php viewSite('layout/head'); ?>
<?php //dd($categoriesList); ?>
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-menu icon-gradient bg-mean-fruit">
                        </i>
                    </div>
                    <div>
                        Quản lý Sách
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-content">
            <div class="tab-pane tabs-animation fade active show" id="tab-content-1" role="tabpanel">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title">
                            <?= isset($book) ? 'Sửa thông tin Sách' : 'Thêm mới Sách' ?>
                        </h5>
                        <?php viewSite('layout/message');?>
                        <form action="<?= isset($book) ? '?controller=book&action=updatesave' : '?controller=book&action=addsave' ?>" method="post" enctype="multipart/form-data">
                            <div class="position-relative row form-group">
                                <label for="sl_category_id" class="col-sm-2 col-form-label">Thể loại</label>
                                <div class="col-sm-10">
                                    <select id="sl_category_id" class="mb-2 form-control" name="category_id">
                                        <?php foreach ($categoriesList as $category): ?>
                                            <option value="<?= $category->id ?>" <?= (isset($book) && $book->category_id == $category->id) ? 'selected' : '' ?>>
                                                <?= $category->name ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="position-relative row form-group">
                                <label for="name" class="col-sm-2 col-form-label">Tên sách</label>
                                <div class="col-sm-10">
                                    <input name="name" id="name" placeholder="" type="text" class="form-control" value="<?= isset($book) ? $book->name : '' ?>" required>
                                </div>
                            </div>
                            <div class="position-relative row form-group">
                                <label for="txt_author" class="col-sm-2 col-form-label">Tác giả</label>
                                <div class="col-sm-10">
                                    <input name="author" id="txt_author" placeholder="" type="text" class="form-control" value="<?= isset($book) ? $book->author : '' ?>" required>
                                </div>
                            </div>
                            <div class="position-relative row form-group">
                                <label for="txt_year" class="col-sm-2 col-form-label">Năm xuất bản</label>
                                <div class="col-sm-10">
                                    <input name="year" id="txt_year" placeholder="" type="text" class="form-control" value="<?= isset($book) ? $book->year : '' ?>" required>
                                </div>
                            </div>
                            <div class="position-relative row form-group">
                                <label for="txt_publisher" class="col-sm-2 col-form-label">Nhà xuất bản</label>
                                <div class="col-sm-10">
                                    <input name="publisher" id="txt_publisher" placeholder="" type="text" class="form-control" value="<?= isset($book) ? $book->publisher : '' ?>" required>
                                </div>
                            </div>
                            <div class="position-relative row form-group">
                                <label for="txt_content" class="col-sm-2 col-form-label">Nội dung</label>
                                <div class="col-sm-10">
                                    <textarea name="content" id="txt_content" class="form-control" ><?= isset($book) ? $book->content : '' ?></textarea>
                                </div>
                            </div>
                            <div class="position-relative row form-group">
                                <label for="txt_amount" class="col-sm-2 col-form-label">Số lượng</label>
                                <div class="col-sm-10">
                                    <input name="amount" id="txt_amount" placeholder="" type="number" class="form-control" value="<?= isset($book) ? $book->amount : '' ?>" required>
                                </div>
                            </div>
                            <div class="position-relative row form-group">
                                <label for="txt_price" class="col-sm-2 col-form-label">Giá</label>
                                <div class="col-sm-10">
                                    <input name="price" id="txt_price" placeholder="" type="text" class="form-control" value="<?= isset($book) ? $book->price : '' ?>" required>
                                </div>
                            </div>
                            <div class="position-relative row form-group">
                                <label for="file_image" class="col-sm-2 col-form-label">Ảnh</label>
                                <div class="col-sm-10">
                                    <input name="image" id="file_image" placeholder="" type="file">
                                </div>
                            </div>
                            <input name="id" type="hidden" value="<?= isset($book) ? $book->id : '' ?>" >
                            <div class="position-relative row form-check">
                                <div class="col-sm-10 offset-sm-2">
                                    <button class="btn btn-primary" >
                                        <?= isset($book) ? 'Sửa thông tin' : 'Thêm mới' ?>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php viewSite('layout/foot'); ?>