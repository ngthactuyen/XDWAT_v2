<?php

class BookController
{
    protected $bookService;
    public $categoryService;
    protected $userRightService;


    public function __construct()
    {
        $this->bookService = new BookService();
        $this->categoryService = new CategoryService();

    }

    public function index()
    {
        $data = $this->bookService->getAllBooks();
        viewSite('books/index', $data);
    }

    public function add()
    {
        $categoriesList = $this->categoryService->getAllCategories();
        viewSite('books/form', [
            'categoriesList' => $categoriesList['categoriesList']
        ]);
    }

    public function addsave()
    {
        $check = $this->bookService->addsaveProcess();
        if ($check) setSuccessMessage('Thêm mới thành công');
        else setErrorMessage('Thêm mới không thành công');
        redirect('book', 'index');
    }

    public function update()
    {
        $book = $this->bookService->getOneBookById($_GET['id']);
        $categoriesList = $this->categoryService->getAllCategories();
        viewSite('books/form', [
            'book' => $book,
            'categoriesList' => $categoriesList['categoriesList']
        ]);
    }

    public function updatesave()
    {
        $check = $this->bookService->updatesaveProcess();
        if ($check) setSuccessMessage('Sửa thông tin thành công');
        else setErrorMessage('Sửa thông tin không thành công');
        redirect('book', 'index');
    }

    public function delete()
    {
        $check = $this->bookService->deleteById($_GET['id']);
        if ($check) setSuccessMessage('Xóa thành công');
        else setErrorMessage('Xóa không thành công');
        redirect('book', 'index');
    }
}