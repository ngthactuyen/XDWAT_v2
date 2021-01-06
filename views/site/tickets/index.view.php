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
                        Quản lý Phiếu mượn
                    </div>
                </div>

                <?php if (array_search(RIGHT_STUDENT_ADD_TICKET, $rightList) !== false): ?>
                <div class="page-title-actions">
                    <button type="button" class="btn-shadow mr-3 btn btn-primary" onclick="window.location.href='?controller=ticket&action=add'">
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
                        <h5 class="card-title">Danh sách Phiếu mượn</h5>
                        <?php viewSite('layout/message'); ?>
                        <table class="mb-0 table table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Trạng thái</th>
                                <th>Ngày mượn</th>
                                <th>Ngày trả</th>

                                <th colspan="5">Thao tác</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($ticketList as $key => $ticket): ?>
                                <tr>
                                    <td scope="row"><?= $ticket->id ?></td>
                                    <td scope="row">
                                        <?php
                                            if ($ticket->status == -1) echo 'Chưa gửi';
                                            if ($ticket->status == 0) echo 'Đã gửi';
                                            if ($ticket->status == 1) echo 'Đã trả';
                                        ?>
                                    </td>
                                    <td scope="row"><?= $ticket->borrow_date ?></td>
                                    <td scope="row"><?= $ticket->return_date ?></td>


                                    <td>
                                        <button class="mb-2 mr-2 btn btn-primary" onclick="window.location.href='?controller=ticketBook&action=index&ticket_id=<?= $ticket->id?>'">
                                            Chi tiết
                                        </button>
                                    </td>

                                    <?php if (array_search(RIGHT_STUDENT_BORROW_BOOK, $rightList) !== false): ?>
                                    <td>
                                        <button class="mb-2 mr-2 btn btn-primary" onclick="window.location.href='?controller=ticket&action=update&id=<?= $ticket->id?>&role_id=<?= $role->id ?>'">
                                            Gửi đi
                                        </button>
                                    </td>
                                    <td>
                                        <button class="mb-2 mr-2 btn btn-primary" onclick="window.location.href='?controller=ticketBook&action=add&ticket_id=<?= $ticket->id?>'">
                                            Mượn sách
                                        </button>
                                    </td>

                                    <?php endif; ?>

                                    <?php if (array_search(RIGHT_STUDENT_DELETE_TICKET, $rightList) !== false): ?>
                                    <td>
                                        <button class="mb-2 mr-2 btn btn-danger" onclick="if (confirm('Bạn chắc chắn muốn xóa?')) return window.location.href='?controller=ticket&action=delete&id=<?= $ticket->id?>'">
                                            <i class="pe-7s-trash"></i>
                                        </button>
                                    </td>
                                    <?php endif; ?>

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