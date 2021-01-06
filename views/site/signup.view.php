<?php viewSite('layout/head'); ?>

<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-add-user icon-gradient bg-mean-fruit">
                    </i>
                </div>
                <div>
                    <?= isset($_COOKIE['user_id']) ? 'Thêm mới người dùng' : 'Đăng ký' ?>
                </div>
            </div>
        </div>
    </div>
    <div class="tab-content">
        <div class="tab-pane tabs-animation fade active show" id="tab-content-1" role="tabpanel">
            <div class="main-card mb-3 card">
                <div class="card-body">
<!--                    <h5 class="card-title">Grid</h5>-->
                    <?php viewSite('layout/message');?>

                    <form action="?controller=user&action=store" method="post" name="addUserForm" onsubmit="return addUserValidation()">
                        <?php if (isset($_COOKIE['user_id'])): ?>
                        <div class="position-relative row form-group">
                            <label for="sl_role_id" class="col-sm-2 col-form-label">Vai trò</label>
                            <div class="col-sm-10">
                                <select id="sl_role_id" class="mb-2 form-control" name="role_id">
                                    <?php foreach ($roleList as $role): ?>
                                    <option value="<?= $role->id ?>">
                                        <?= $role->name ?>
                                    </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <?php endif; ?>
                        <div class="position-relative row form-group">
                            <label for="txt_username" class="col-sm-2 col-form-label">Tên đăng nhập</label>
                            <div class="col-sm-10">
                                <input name="username" id="txt_username" placeholder="" type="text" class="form-control" required>
                                <div class="validate-error" id="error_usernameValidation"></div>
                            </div>
                        </div>
                        <div class="position-relative row form-group">
                            <label for="txt_password" class="col-sm-2 col-form-label">Mật khẩu</label>
                            <div class="col-sm-10">
                                <input name="password" id="txt_password" type="text" class="form-control" required>
                                <div class="validate-error" id="error_passwordValidation"></div>
                            </div>
                        </div>
                        <div class="position-relative row form-group">
                            <label for="txt_retypePassword" class="col-sm-2 col-form-label">Nhập lại mật khẩu</label>
                            <div class="col-sm-10">
                                <input name="retypePassword" id="txt_retypePassword" type="text" class="form-control" required>
                                <div class="validate-error" id="error_retypePasswordValidation"></div>
                            </div>
                        </div>
                        <div class="position-relative row form-group">
                            <label for="exampleEmail" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input name="email" id="exampleEmail" placeholder="" type="email" class="form-control" required>
                            </div>
                        </div>
                        <div class="position-relative row form-group">
                            <label for="examplePhone" class="col-sm-2 col-form-label">Số điện thoại</label>
                            <div class="col-sm-10">
                                <input name="phone" id="examplePhone" placeholder="" type="text" class="form-control">
                            </div>
                        </div>


                        <div class="position-relative row form-group">
                            <label for="exampleAddress" class="col-sm-2 col-form-label">Địa chỉ</label>
                            <div class="col-sm-10">
                                <textarea name="address" id="exampleAddress" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="position-relative row form-check">
                            <div class="col-sm-10 offset-sm-2">
                                <button class="btn btn-primary" >
                                    <?= isset($_COOKIE['user_id']) ? 'Thêm mới' : 'Đăng ký' ?>
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