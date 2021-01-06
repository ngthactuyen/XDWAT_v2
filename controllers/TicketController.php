<?php

class TicketController
{
    protected $ticketService;
    public function __construct()
    {
        $this->ticketService = new TicketService();
    }

    public function index()
    {
        $data = $this->ticketService->getAllTicketsOfOneUser($_COOKIE['user_id']);
        viewSite('tickets/index', $data);
    }

    public function add()
    {
        $this->addsave();
    }

    public function addsave()
    {
        $check = $this->ticketService->addsaveProcess();
        if ($check) setSuccessMessage('Thêm mới thành công');
        else setErrorMessage('Thêm mới không thành công vì có phiếu mượn chưa gửi');
        redirect('ticket', "index");
    }

    public function delete()
    {
        $check = $this->ticketService->deleteById($_GET['id']);
        if ($check) setSuccessMessage('Xóa thành công');
        else setErrorMessage('Xóa không thành công');
        redirect('ticket', "index");
    }
}