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
                        Quản lý Quyền người dùng <?= $user->username ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-content">
            <div class="tab-pane tabs-animation fade active show" id="tab-content-1" role="tabpanel">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title">
                            Thêm mới Quyền
                        </h5>
                        <?php viewSite('layout/message');?>
                        <form action="?controller=userRight&action=addsave" method="post" >
                            <input name="user_id" type="hidden" value="<?= $user->id ?>" >
                            <div class="position-relative row form-group">
                                <label for="" class="col-sm-2 col-form-label">Tên quyền</label>
                                <div class="col-sm-10">
                                    <?php foreach ($unselectedRightsList as $key => $right): ?>
                                    <input name="right_<?= $right->id ?>" id="right_<?= $right->id ?>"  type="checkbox" value="<?= $right->id ?>">
                                    <label for="right_<?= $right->id ?>"><?= $right->name ?></label>
                                    <br>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <div class="position-relative row form-check">
                                <div class="col-sm-10 offset-sm-2">
                                    <button class="btn btn-primary" >
                                        Thêm mới
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