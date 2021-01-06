<?php


class BookService
{
    public $categoryService;
    public $userRightService;

    public function __construct()
    {
        $this->categoryService = new CategoryService();
        $this->userRightService = new UserRightService();
    }

    public function getAllBooks()
    {
        $sql = "select * from 71_nguyenthactuyen_books order by category_id";
        $booksList = getAllData($sql);
        $booksObjectList = [];
        $categoriesObjectList = [];
        foreach ($booksList as $book) {
            $booksObjectList[] = new Book($book);
            $categoriesObjectList[] = $this->categoryService->getOneCategoryById($book['category_id']);
        }
        $rightOfOneUserList = $this->userRightService->getAllRightsOfOneUser($_COOKIE['user_id']);
        $idRightOfOneUserList = [];
        foreach ($rightOfOneUserList['rightList'] as $right){
            array_push($idRightOfOneUserList, $right->id);
        }

        return [
            'booksList' => $booksObjectList,
            'categoriesList' => $categoriesObjectList,
            'rightList' => $idRightOfOneUserList
        ];
    }

    public function getAllAvailableBooks()
    {
        $ticket_id = $_GET['ticket_id'];
        $sql = "SELECT * FROM 71_nguyenthactuyen_books
                WHERE id NOT IN (
                SELECT book_id FROM 71_nguyenthactuyen_ticket_book
                WHERE ticket_id = $ticket_id) 
                order by category_id";
        $booksList = getAllData($sql);
        $booksObjectList = [];
        $categoriesObjectList = [];
        foreach ($booksList as $book) {
            $booksObjectList[] = new Book($book);
            $categoriesObjectList[] = $this->categoryService->getOneCategoryById($book['category_id']);
        }
        $rightOfOneUserList = $this->userRightService->getAllRightsOfOneUser($_COOKIE['user_id']);
        $idRightOfOneUserList = [];
        foreach ($rightOfOneUserList['rightList'] as $right){
            array_push($idRightOfOneUserList, $right->id);
        }

        return [
            'booksList' => $booksObjectList,
            'categoriesList' => $categoriesObjectList,
            'rightList' => $idRightOfOneUserList
        ];
    }

    public function getOneBookById($id)
    {
        $sql = "select * from 71_nguyenthactuyen_books where id = $id";
        $temp = getOneData($sql);
        return $book = new Book($temp);
    }

    public function addsaveProcess()
    {
//        dd($_POST);
//        dd($_FILES);
        $category_id = $_POST['category_id'];
        $name = trim($_POST['name']);
        $author = trim($_POST['author']);
        $year = trim($_POST['year']);
        $publisher = trim($_POST['publisher']);
        $content = trim($_POST['content']);
        $amount = $_POST['amount'];
        $price = $_POST['price'];
        $image = 'assets/images/books/' . $_FILES['image']['name'];

        $sql = "insert into 71_nguyenthactuyen_books(category_id, name, author, year, publisher, content, amount, price, image) 
                value ($category_id, '$name', '$author', '$year', '$publisher', '$content', $amount, $price, '$image')";
        $check = execute($sql);
        if ($check) move_uploaded_file($_FILES['image']['tmp_name'], $image);
        return $check;
    }

    public function updatesaveProcess()
    {
//        dd($_POST);
//        dd($_FILES);
        $id = $_POST['id'];
        $category_id = $_POST['category_id'];
        $name = trim($_POST['name']);
        $author = trim($_POST['author']);
        $year = trim($_POST['year']);
        $publisher = trim($_POST['publisher']);
        $content = trim($_POST['content']);
        $amount = $_POST['amount'];
        $price = $_POST['price'];
        if ($_FILES['image']['name'] == '') {
            $image = '';
            $sql = "update 71_nguyenthactuyen_books set 
                category_id = $category_id, name = '$name', author = '$author',
                year = '$year', publisher = '$publisher', content = '$content', 
                amount = $amount, price = $price 
                where id = $id";
        } else {
            $image = 'assets/images/books/' . $_FILES['image']['name'];
            $sql = "update 71_nguyenthactuyen_books set 
                category_id = $category_id, name = '$name', author = '$author',
                year = '$year', publisher = '$publisher', content = '$content', 
                amount = $amount, price = $price, image = '$image' 
                where id = $id";
        }
        return execute($sql);
    }

    public function deleteById($id)
    {
        $sql = "delete from 71_nguyenthactuyen_books where id = $id";
        return execute($sql);
    }

    public function updateAmountOfOneBook($book_id, $status)
    {
        $book = $this->getOneBookById($book_id);
        switch ($status){
            case 'increase':
                $newAmount = $book->amount + 1;
                break;
            case 'decrease':
                $newAmount = $book->amount - 1;
                break;
        }
        $updateAmountOfBookQuery = "update 71_nguyenthactuyen_books set amount = $newAmount where id = $book_id";
        execute($updateAmountOfBookQuery);
    }
}