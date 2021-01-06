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
                <div class="page-title-actions">
                    <?php
//                    dd($rightOfCurrentLoggedInUserList);
                    if (array_search(RIGHT_ADMIN_ADD_USER_RIGHT, $rightOfCurrentLoggedInUserList) !== false):
                    ?>
                    <button type="button" class="btn-shadow mr-3 btn btn-primary" onclick="window.location.href='?controller=userRight&action=add&user_id=<?= $user->id ?>'">
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
                        <h5 class="card-title">Danh sách quyền</h5>
                        <?php viewSite('layout/message'); ?>
                        <table class="mb-0 table table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Tên quyền</th>
                                <th colspan="2">Thao tác</th>
                            </tr>
                            </thead>

                            <tbody>
                            <?php foreach ($rightList as $key => $right): ?>
                                <tr>
                                    <td scope="row"><?= $right->id ?></td>
                                    <td scope="row"><?= $right->name ?></td>
                                    <td>
                                        <?php if (array_search(RIGHT_ADMIN_DELETE_USER_RIGHT, $rightOfCurrentLoggedInUserList)): ?>
                                        <button class="mb-2 mr-2 btn btn-danger" onclick="if (confirm('Bạn chắc chắn muốn xóa?')) return window.location.href='?controller=userRight&action=delete&user_id=<?= $user->id?>&id=<?= $userRightList[$key]->id?>'">
                                            <i class="pe-7s-trash"></i>
                                        </button>
                                        <?php endif; ?>
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