<?php


class TicketBookService
{
    protected $categoryService;
    protected $bookService;
    protected $userRightService;

    public function __construct()
    {
        $this->categoryService = new CategoryService();
        $this->bookService = new BookService();
        $this->userRightService = new UserRightService();
    }

    public function getAllBooksOfOneTicket($ticket_id)
    {
        $sql = "SELECT * FROM 71_nguyenthactuyen_ticket_book WHERE ticket_id = $ticket_id";
        $ticketBookList = getAllData($sql);
        $idTicketBookList = [];
        $bookObjectList = [];
        foreach ($ticketBookList as $ticketBook){
            $idTicketBookList[] = $ticketBook['id'];
            $bookObjectList[] = $this->bookService->getOneBookById($ticketBook['book_id']);
        }

        $categoryObjectList = [];
        foreach ($bookObjectList as $book){
            $categoryObjectList[] = $this->categoryService->getOneCategoryById($book->category_id);
        }
        $idRightsOfOneUserList = $this->userRightService->getAllIdRightsOfOneUser($_COOKIE['user_id']);

        return [
            'rightList' => $idRightsOfOneUserList,
            'idTicketBookList' =>$idTicketBookList,
            'bookList' => $bookObjectList,
            'categoryList' => $categoryObjectList
        ];


    }

    public function addsaveProcess()
    {
        $ticket_id = $_POST['ticket_id'];
        $flag = true;
        if (empty($_POST['idBookList'])){   //kiểm tra nếu không sách nào được chọn
            $flag = false;
        } else {
            foreach ($_POST['idBookList'] as $key => $book_id){
                $insertBookToTicketQuery = "insert into 71_nguyenthactuyen_ticket_book(ticket_id, book_id)
                        value ($ticket_id, $book_id)";
                execute($insertBookToTicketQuery);
                //$this->bookService->updateAmountOfOneBook($book_id, 'decrease');
            }
        }
        return [
            'flag' => $flag,
            'ticket_id' => $ticket_id
        ];
    }

    public function deleteById($id)
    {
        $sql = "delete from 71_nguyenthactuyen_ticket_book where id = $id";
        return execute($sql);
    }

    public function deleteAllBookInOneTicket($ticket_id)
    {
        $sql = "delete from 71_nguyenthactuyen_ticket_book where id = $ticket_id";
        return execute($sql);
    }

}