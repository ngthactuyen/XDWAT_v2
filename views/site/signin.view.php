<?php viewSite('layout/head'); ?>

<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-right-arrow icon-gradient bg-mean-fruit">
                    </i>
                </div>
                <div>
                    Đăng nhập
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
                    <form action="?controller=user&action=authenticate" method="post" >
                        <div class="position-relative row form-group">
                            <label for="txt_username" class="col-sm-2 col-form-label">Tên đăng nhập</label>
                            <div class="col-sm-10">
                                <input name="username" id="txt_username" placeholder="" type="text" class="form-control" required>
                            </div>
                        </div>
                        <div class="position-relative row form-group">
                            <label for="txt_password" class="col-sm-2 col-form-label">Mật khẩu</label>
                            <div class="col-sm-10">
                                <input name="password" id="txt_password" type="password" class="form-control" required>
                            </div>
                        </div>
                        <div class="position-relative row form-group">
                            <label for="" class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                                <div class="g-recaptcha" data-sitekey="6LfBwtgZAAAAAN_RjVUEKVvZNxDFwh1IuY0ue4rI"></div>
<!--                                <div class="validate-error" id="error_passwordValidation"></div>-->
                                <?php viewSite('layout/message');?>
                            </div>
                        </div>

                        <div class="position-relative row form-check">
                            <div class="col-sm-10 offset-sm-2">
                                <button class="btn btn-primary" type="submit">Đăng nhập</button>
                                <button class="btn btn-primary" type="button" onclick="window.location.href='http://localhost:71/XDWAT_v2/?controller=user&action=forgetPassword'">Quên mật khẩu</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php viewSite('layout/foot'); ?>