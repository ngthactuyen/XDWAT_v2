<?php viewSite('layout/head'); ?>
<?php //dd($booksList); ?>
<?php //dd($_COOKIE); ?>
    <div class="app-main__inner">
        <form action="?controller=ticketBook&action=addsave" method="post">
            <input type="hidden" name="ticket_id" value="<?= $_GET['ticket_id'] ?>">
            <div class="app-page-title">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                        <div class="page-title-icon">
                            <i class="pe-7s-bookmarks icon-gradient bg-mean-fruit">
                            </i>
                        </div>
                        <div>
                            Mượn sách
                        </div>
                    </div>
                    <div class="page-title-actions">
                        <button type="submit" class="btn-shadow mr-3 btn btn-primary" ">
                            Thêm vào Phiếu mượn
                        </button>
                    </div>
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
                                    <th>Nội dung</th>
                                    <th>Số lượng còn lại</th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php foreach ($booksList as $key => $book): ?>
                                    <tr>
                                        <td>
                                            <input type="checkbox" name="idBookList[]" value="<?= $book->id ?>">
                                        </td>
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
                                    </tr>
                                <?php endforeach;?>
                                </tbody>
                            </table>


                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>

<?php viewSite('layout/foot'); ?>