<?php viewSite('layout/head'); ?>
<?php //dd($usersList);
//dd($roleList);
?>
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
                <div class="page-title-actions">
                    <?php if (array_search(RIGHT_ADMIN_ADD_USER, $rightList) !== false): ?>
                    <button type="button" class="btn-shadow mr-3 btn btn-primary" onclick="window.location.href='?controller=user&action=add'">
                        Thêm mới
                    </button>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="tab-content">
            <div class="tab-pane tabs-animation fade active show" id="tab-content-1" role="tabpanel">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title">Danh sách người dùng</h5>
                        <?php viewSite('layout/message'); ?>
                        <table class="mb-0 table table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Vai trò</th>
                                <th>Tên đăng nhập</th>
                                <th>Email</th>
                                <th>Số điện thoại</th>
                                <th>Địa chỉ</th>
                                <th colspan="3">Thao tác</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($usersList as $key => $user): ?>
                            <tr>
                                <td scope="row"><?= $user->id ?></td>
                                <td scope="row">
                                    <?php foreach ($roleList as $role){
                                        if ($user->role_id == $role->id) echo $role->name;
                                    } ?>
                                </td>
                                <td scope="row"><?= $user->username ?></td>
                                <td scope="row"><?= $user->email ?></td>
                                <td scope="row"><?= $user->phone ?></td>
                                <td scope="row"><?= $user->address ?></td>
                                <td>
                                    <?php if (array_search(RIGHT_ADMIN_UPDATE_USER, $rightList) !== false): ?>
                                    <button class="mb-2 mr-2 btn btn-primary" onclick="window.location.href='?controller=user&action=update&id_user=<?= $user->id?>'">
                                        <i class="pe-7s-pen"></i>
                                    </button>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if (array_search(RIGHT_ADMIN_DELETE_USER, $rightList) !== false): ?>
                                    <button class="mb-2 mr-2 btn btn-danger" onclick="if (confirm('Bạn chắc chắn muốn xóa?')) return window.location.href='?controller=user&action=delete&id_user=<?= $user->id?>'">
                                        <i class="pe-7s-trash"></i>
                                    </button>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <button class="mb-2 mr-2 btn btn-primary" onclick="window.location.href='?controller=userRight&action=index&user_id=<?= $user->id?>'">
                                        Xem Quyền
                                    </button>
                                </td>
                            </tr>
                            <?php endforeach;?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php viewSite('layout/foot'); ?>