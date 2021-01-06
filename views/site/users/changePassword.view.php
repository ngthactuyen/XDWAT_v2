<?php viewSite('layout/head'); ?>

    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-config icon-gradient bg-mean-fruit">
                        </i>
                    </div>
                    <div>
                        Thay đổi mật khẩu
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-content">
            <div class="tab-pane tabs-animation fade active show" id="tab-content-1" role="tabpanel">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <!--                    <h5 class="card-title">Grid</h5>-->
                        <!--                    --><?php //viewSite('layout/message');?>
                        <form action="?controller=user&action=processingChangePassword" method="post" onsubmit="return changePasswordValidation()">
                            <div class="position-relative row form-group">
                                <label for="txt_oldPassword" class="col-sm-2 col-form-label">Mật khẩu hiện tại</label>
                                <div class="col-sm-10">
                                    <input name="oldPassword" id="txt_oldPassword" type="password" class="form-control" required>
                                    <div class="validate-error" id="error_oldPasswordValidation"></div>
                                </div>
                            </div>
                            <div class="position-relative row form-group">
                                <label for="txt_newPassword" class="col-sm-2 col-form-label">Mật khẩu mới</label>
                                <div class="col-sm-10">
                                    <input name="newPassword" id="txt_newPassword" type="password" class="form-control" required>
                                    <div class="validate-error" id="error_newPasswordValidation"></div>
                                </div>
                            </div>
                            <div class="position-relative row form-group">
                                <label for="txt_retypeNewPassword" class="col-sm-2 col-form-label">Nhập lại mật khẩu mới</label>
                                <div class="col-sm-10">
                                    <input name="retypeNewPassword" id="txt_retypeNewPassword" type="password" class="form-control" required>
                                    <div class="validate-error" id="error_retypeNewPasswordValidation"></div>
                                    <?php viewSite('layout/message');?>
                                </div>
                            </div>
                            <div class="position-relative row form-check">
                                <div class="col-sm-10 offset-sm-2">
                                    <button class="btn btn-primary" type="submit">Lưu thay đổi</button>
                                    <button class="btn btn-primary" type="reset">Hủy bỏ</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php viewSite('layout/foot'); ?>