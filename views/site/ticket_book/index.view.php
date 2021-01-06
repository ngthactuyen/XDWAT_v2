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
                        Chi tiết Phiếu mượn
                    </div>
                </div>

                <?php if (array_search(RIGHT_STUDENT_BORROW_BOOK, $rightList) !== false): ?>
                    <div class="page-title-actions">
                        <button type="button" class="btn-shadow mr-3 btn btn-primary" onclick="window.location.href='?controller=ticketBook&action=add&ticket_id=<?= $_GET["ticket_id"]?>'">
                            Thêm Sách vào Phiếu
                        </button>
                    </div>
                <?php endif; ?>

            </div>
        </div>
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
                                <th>Giá</th>
                                <th>Thao tác</th>


                            </tr>
                            </thead>
                            <tbody>

                            <?php foreach ($bookList as $key => $book): ?>
                                <tr>
                                    <td scope="row"><?= $book->id ?></td>
                                    <td scope="row"><?= $categoryList[$key]->name ?></td>
                                    <td scope="row">
                                        <img src="<?= $book->image ?>" alt="" style="width: 100px">
                                    </td>
                                    <td scope="row"><?= $book->name ?></td>
                                    <td scope="row"><?= $book->author ?></td>
                                    <td scope="row"><?= $book->year ?></td>
                                    <td scope="row"><?= $book->publisher ?></td>
                                    <td scope="row"><?= number_format($book->price) ?> VNĐ</td>

                                    <?php //if (array_search(RIGHT_STUDENT_DELETE_TICKET, $rightList) !== false): ?>
                                        <td>
                                            <button class="mb-2 mr-2 btn btn-danger" onclick="if (confirm('Bạn chắc chắn muốn xóa?')) return window.location.href='?controller=ticketBook&action=delete&id=<?= $idTicketBookList[$key] ?>&ticket_id=<?= $_GET['ticket_id'] ?>'">
                                                <i class="pe-7s-trash"></i>
                                            </button>
                                        </td>
                                    <?php //endif; ?>

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