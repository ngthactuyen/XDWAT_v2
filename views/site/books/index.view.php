<?php viewSite('layout/head'); ?>
<?php //dd($booksList); ?>
<?php //dd($_COOKIE); ?>
    <div class="app-main__inner">
        <?php if ($_COOKIE['role_id'] == ROLE_LIBRARIAN): ?>
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-bookmarks icon-gradient bg-mean-fruit">
                        </i>
                    </div>
                    <div>
                        Quản lý Sách
                    </div>
                </div>

                <?php if (array_search(RIGHT_LIBRARIAN_ADD_BOOK, $rightList) !== false): ?>
                <div class="page-title-actions">
                    <button type="button" class="btn-shadow mr-3 btn btn-primary" onclick="window.location.href='?controller=book&action=add'">
                        Thêm mới
                    </button>
                </div>
                <?php endif; ?>
            </div>
        </div>
        <?php endif; ?>

        <div class="tab-content">
            <div class="tab-pane tabs-animation fade active show" id="tab-content-1" role="tabpanel">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title">Danh sách</h5>
                        <?php viewSite('layout/message'); ?>
                        <table class="mb-0 table table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Thể loại</th>
                                <th>Ảnh</th>
                                <th>Tên sách</th>
                                <th>Tác giả</th>
                                <th>Năm xuất bản</th>
                                <th>Nhà xuất bản</th>
                                <th>Nội dung</th>
                                <th>Số lượng</th>
                                <th>Giá</th>
                                <?php if ($_COOKIE['role_id'] == ROLE_LIBRARIAN): ?>
                                <th colspan="">Thao tác</th>
                                <?php endif; ?>
                            </tr>
                            </thead>
                            <tbody>

                            <?php foreach ($booksList as $key => $book): ?>
                                <tr>
                                    <td scope="row"><?= $book->id ?></td>
                                    <td scope="row"><?= $categoriesList[$key]->name ?></td>
                                    <td scope="row">
                                        <img src="<?= $book->image ?>" alt="" style="width: 100px">
                                    </td>
                                    <td scope="row"><?= $book->name ?></td>
                                    <td scope="row"><?= $book->author ?></td>
                                    <td scope="row"><?= $book->year ?></td>
                                    <td scope="row"><?= $book->publisher ?></td>
                                    <td scope="row"><?= $book->content ?></td>
                                    <td scope="row"><?= ($book->amount == 0) ? "Đã hết" : "$book->amount quyển" ?></td>
                                    <td scope="row"><?= number_format($book->price) ?> VNĐ</td>

                                    <td>
                                        <?php if (array_search(RIGHT_LIBRARIAN_UPDATE_BOOK, $rightList) !== false): ?>
                                        <button class="mb-2 mr-2 btn btn-primary" onclick="window.location.href='?controller=book&action=update&id=<?= $book->id?>'">
                                            <i class="pe-7s-pen"></i>
                                        </button>
                                        <?php endif; ?>

                                        <?php if (array_search(RIGHT_LIBRARIAN_DELETE_BOOK, $rightList) !== false): ?>
                                        <button class="mb-2 mr-2 btn btn-danger" onclick="if (confirm('Bạn chắc chắn muốn xóa?')) return window.location.href='?controller=book&action=delete&id=<?= $book->id?>'">
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