<?php viewSite('layout/head'); ?>

    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-users icon-gradient bg-mean-fruit">
                        </i>
                    </div>
                    <div>
                        Quản lý người dùng
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-content">
            <div class="tab-pane tabs-animation fade active show" id="tab-content-1" role="tabpanel">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title">Sửa thông tin người dùng</h5>
                        <?php viewSite('layout/message');?>
                        <form action="?controller=user&action=processingUpdate" method="post" name="addUserForm" onsubmit="return addUserValidation()">
                            <?php if (isset($_COOKIE['user_id'])): ?>
                                <div class="position-relative row form-group">
                                    <label for="txt_username" class="col-sm-2 col-form-label">Vai trò</label>
                                    <div class="col-sm-10">
                                        <select class="mb-2 form-control" name="role_id">
                                            <?php foreach ($roleList as $role): ?>
                                                <option value="<?= $role->id ?>" <?= ($user->role_id == $role->id) ? 'selected' : '' ?>>
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
                                    <input name="username" id="txt_username" placeholder="" type="text" class="form-control" value="<?= $user->username ?>" required>
                                    <div class="validate-error" id="error_usernameValidation"></div>
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label for="exampleEmail" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input name="email" id="exampleEmail" placeholder="" type="email" class="form-control" value="<?= $user->email ?>" required>
                                </div>
                            </div>
                            <div class="position-relative row form-group">
                                <label for="examplePhone" class="col-sm-2 col-form-label">Số điện thoại</label>
                                <div class="col-sm-10">
                                    <input name="phone" id="examplePhone" placeholder="" type="text" class="form-control" value="<?= $user->phone ?>" >
                                </div>
                            </div>


                            <div class="position-relative row form-group">
                                <label for="exampleAddress" class="col-sm-2 col-form-label">Địa chỉ</label>
                                <div class="col-sm-10">
                                    <textarea name="address" id="exampleAddress" class="form-control"><?= $user->address ?></textarea>
                                    <input name="id" type="hidden" value="<?= $user->id ?>" >
                                </div>
                            </div>
                            <div class="position-relative row form-check">
                                <div class="col-sm-10 offset-sm-2">
                                    <button class="btn btn-primary" >
                                        Sửa thông tin
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