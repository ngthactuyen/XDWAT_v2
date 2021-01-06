<?php viewSite('layout/head'); ?>

    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-menu icon-gradient bg-mean-fruit">
                        </i>
                    </div>
                    <div>
                        Quản lý Thể loại Sách
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-content">
            <div class="tab-pane tabs-animation fade active show" id="tab-content-1" role="tabpanel">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title">
                            <?= isset($category) ? 'Sửa thông tin Thể loại Sách' : 'Thêm mới Thể loại Sách' ?>
                        </h5>
                        <?php viewSite('layout/message');?>
                        <form action="<?= isset($category) ? '?controller=category&action=updatesave' : '?controller=category&action=addsave' ?>" method="post" >
                            <div class="position-relative row form-group">
                                <label for="name" class="col-sm-2 col-form-label">Tên thể loại</label>
                                <div class="col-sm-10">
                                    <input name="name" id="name" placeholder="" type="text" class="form-control" value="<?= isset($category) ? $category->name : '' ?>" required>
                                    <input name="id" type="hidden" value="<?= isset($category) ? $category->id : '' ?>" >
                                </div>
                            </div>
                            <div class="position-relative row form-group">
                                <label for="description" class="col-sm-2 col-form-label">Mô tả</label>
                                <div class="col-sm-10">
                                    <textarea name="description" id="description" class="form-control" required><?= isset($category) ? $category->description : '' ?></textarea>
                                </div>
                            </div>
                            <div class="position-relative row form-check">
                                <div class="col-sm-10 offset-sm-2">
                                    <button class="btn btn-primary" >
                                        <?= isset($category) ? 'Sửa thông tin' : 'Thêm mới' ?>
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