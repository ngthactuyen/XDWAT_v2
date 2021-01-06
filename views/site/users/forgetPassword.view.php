<?php viewSite('layout/head'); ?>

    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-help1 icon-gradient bg-mean-fruit">
                        </i>
                    </div>
                    <div>
                        Quên mật khẩu
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-content">
            <div class="tab-pane tabs-animation fade active show" id="tab-content-1" role="tabpanel">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title">Nhập email bạn đã đăng ký</h5>
                        <!--                    --><?php //viewSite('layout/message');?>
                        <form action="?controller=user&action=processingForgetPassword" method="post" >
                            <div class="position-relative row form-group">
                                <label for="txt_email" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input name="email" id="txt_email" placeholder="" type="email" class="form-control" required>
                                    <?php viewSite('layout/message');?>
                                </div>
                            </div>

                            <div class="position-relative row form-check">
                                <div class="col-sm-10 offset-sm-2">
                                    <button class="btn btn-primary" type="submit">Xác nhận</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php viewSite('layout/foot'); ?>