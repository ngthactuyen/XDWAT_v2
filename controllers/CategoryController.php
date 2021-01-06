<?php

class CategoryController
{
    protected $categoryService;

    public function __construct()
    {
        $this->categoryService = new CategoryService();
    }

    public function index()
    {
        $data = $this->categoryService->getAllCategories();
        viewSite('categories/index', $data);
    }

    public function add()
    {
        viewSite('categories/form');
    }

    public function addsave()
    {
        $check = $this->categoryService->addsaveProcess();
        if ($check) setSuccessMessage('Thêm mới thành công');
        else setErrorMessage('Thêm mới không thành công');
        redirect('category', 'index');
    }

    public function update()
    {
        $category = $this->categoryService->getOneCategoryById($_GET['id']);
        viewSite('categories/form', ['category' => $category]);
    }

    public function updatesave()
    {
        $check = $this->categoryService->updatesaveProcess();
        if ($check) setSuccessMessage('Sửa thông tin thành công');
        else setErrorMessage('Sửa thông tin không thành công');
        redirect('category', 'index');
    }

    public function delete()
    {
        $check = $this->categoryService->deleteById($_GET['id']);
        if ($check) setSuccessMessage('Xóa thành công');
        else setErrorMessage('Xóa không thành công');
        redirect('category', 'index');
    }
}