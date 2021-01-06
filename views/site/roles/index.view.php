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
                        Quản lý Vai trò
                    </div>
                </div>
                <div class="page-title-actions">

                    <button type="button" class="btn-shadow mr-3 btn btn-primary" onclick="window.location.href='?controller=role&action=add'">
                        Thêm mới
                    </button>

                </div>
            </div>
        </div>
        <div class="tab-content">
            <div class="tab-pane tabs-animation fade active show" id="tab-content-1" role="tabpanel">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title">Danh sách Vai trò</h5>
                        <?php viewSite('layout/message'); ?>
                        <table class="mb-0 table table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Tên vai trò</th>
                                <th>Mô tả</th>
                                <th colspan="3">Thao tác</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($rolesList as $key => $role): ?>
                                <tr>
                                    <td scope="row"><?= $role->id ?></td>
                                    <td scope="row"><?= $role->name ?></td>
                                    <td scope="row"><?= $role->description ?></td>
                                    <td>
                                        <button class="mb-2 mr-2 btn btn-primary" onclick="window.location.href='?controller=role&action=update&id=<?= $role->id?>'">
                                            <i class="pe-7s-pen"></i>
                                        </button>
                                    </td>
                                    <td>
                                        <button class="mb-2 mr-2 btn btn-danger" onclick="if (confirm('Bạn chắc chắn muốn xóa?')) return window.location.href='?controller=role&action=delete&id=<?= $role->id?>'">
                                            <i class="pe-7s-trash"></i>
                                        </button>
                                    </td>
                                    <td>
                                        <button class="mb-2 mr-2 btn btn-primary" onclick="window.location.href='?controller=right&action=index&role_id=<?= $role->id?>'">
                                            Xem quyền
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