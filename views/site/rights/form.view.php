<?php viewSite('layout/head'); ?>

    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-rocket icon-gradient bg-mean-fruit">
                        </i>
                    </div>
                    <div>
                        Quản lý Quyền của <?= $role->name ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-content">
            <div class="tab-pane tabs-animation fade active show" id="tab-content-1" role="tabpanel">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title">
                            <?= isset($right) ? 'Sửa thông tin Quyền' : 'Thêm mới Quyền' ?>
                        </h5>
                        <?php viewSite('layout/message');?>
                        <form action="<?= isset($right) ? '?controller=right&action=updatesave' : '?controller=right&action=addsave' ?>" method="post" >
                            <div class="position-relative row form-group">
                                <label for="txt_name" class="col-sm-2 col-form-label">Tên quyền</label>
                                <div class="col-sm-10">
                                    <input name="name" id="txt_name" placeholder="" type="text" class="form-control" value="<?= isset($right) ? $right->name : '' ?>" required>
                                    <input name="id" type="hidden" value="<?= isset($right) ? $right->id : '' ?>" >
                                    <input name="role_id" type="hidden" value="<?= $role->id ?>" >
                                </div>
                            </div>
                            <div class="position-relative row form-check">
                                <div class="col-sm-10 offset-sm-2">
                                    <button class="btn btn-primary" >
                                        <?= isset($right) ? 'Sửa thông tin' : 'Thêm mới' ?>
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