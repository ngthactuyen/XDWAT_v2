<?php


class TicketBookController
{
    protected $ticketBookService;
//    protected $rightService;
    protected $bookService;

    public function __construct()
    {
        $this->ticketBookService = new TicketBookService();
        $this->bookService = new BookService();
//        $this->rightService = new RightService();
    }

    public function index()
    {
        $data = $this->ticketBookService->getAllBooksOfOneTicket($_GET['ticket_id']);
        viewSite('ticket_book/index', $data);
    }

    public function add()
    {
        $bookList = $this->bookService->getAllAvailableBooks();
        viewSite('ticket_book/add', $bookList);
    }

    public function addsave()
    {
        $data = $this->ticketBookService->addsaveProcess();
        $ticket_id = $data['ticket_id'];
        if ($data['flag']){
            setSuccessMessage('Thêm mới sách thành công');
            redirect('ticketBook', "index&ticket_id=$ticket_id");
        } else {
            setErrorMessage('Bạn chưa chọn sách');
            redirect('ticketBook', "add&ticket_id=$ticket_id");
        }
    }

    public function delete()
    {
        $ticket_id = $_GET['ticket_id'];
        $check = $this->ticketBookService->deleteById($_GET['id']);
        if ($check) setSuccessMessage('Xóa thành công');
        else setErrorMessage('Xóa không thành công');
        redirect('ticketBook', "index&ticket_id=$ticket_id");
    }
}