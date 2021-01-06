<?php viewSite('layout/head'); ?>

    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-menu icon-gradient bg-mean-fruit">
                        </i>
                    </div>
                    <div>
                        Quản lý Thể loại Sách
                    </div>
                </div>

                <?php if (array_search(RIGHT_LIBRARIAN_ADD_CATEGORY, $rightList) !== false): ?>
                <div class="page-title-actions">
                    <button type="button" class="btn-shadow mr-3 btn btn-primary" onclick="window.location.href='?controller=category&action=add'">
                        Thêm mới
                    </button>
                </div>
                <?php endif; ?>
            </div>
        </div>
        <div class="tab-content">
            <div class="tab-pane tabs-animation fade active show" id="tab-content-1" role="tabpanel">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title">Danh sách Thể loại</h5>
                        <?php viewSite('layout/message'); ?>
                        <table class="mb-0 table table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Tên thể loại</th>
                                <th>Mô tả</th>
                                <th colspan="2">Thao tác</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php foreach ($categoriesList as $key => $category): ?>
                                <tr>
                                    <td scope="row"><?= $category->id ?></td>
                                    <td scope="row"><?= $category->name ?></td>
                                    <td scope="row"><?= $category->description ?></td>
                                    <td>
                                        <?php if (array_search(RIGHT_LIBRARIAN_UPDATE_CATEGORY, $rightList) !== false): ?>
                                        <button class="mb-2 mr-2 btn btn-primary" onclick="window.location.href='?controller=category&action=update&id=<?= $category->id?>'">
                                            <i class="pe-7s-pen"></i>
                                        </button>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if (array_search(RIGHT_LIBRARIAN_DELETE_CATEGORY, $rightList) !== false): ?>
                                        <button class="mb-2 mr-2 btn btn-danger" onclick="if (confirm('Bạn chắc chắn muốn xóa?')) return window.location.href='?controller=category&action=delete&id=<?= $category->id?>'">
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