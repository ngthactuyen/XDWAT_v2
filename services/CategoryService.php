<?php


class CategoryService
{
    protected $userRightService;

    public function __construct()
    {
        $this->userRightService = new UserRightService();
    }

    public function getAllCategories()
    {
        $sql = "select * from 71_nguyenthactuyen_categories";
        $categoriesList = getAllData($sql);
        $categoriesObjectList = [];
        foreach ($categoriesList as $category) {
            $categoriesObjectList[] = new Category($category);
        }
        $rightOfOneUserList = $this->userRightService->getAllRightsOfOneUser($_COOKIE['user_id']);
        $idRightOfOneUserList = [];
        foreach ($rightOfOneUserList['rightList'] as $right){
            array_push($idRightOfOneUserList, $right->id);
        }

        return [
            'categoriesList' => $categoriesObjectList,
            'rightList' => $idRightOfOneUserList
        ];
    }

    public function getOneCategoryById($id){
        $sql = "select * from 71_nguyenthactuyen_categories where id = $id";
        $temp = getOneData($sql);
        return $category = new category($temp);
    }

    public function addsaveProcess()
    {
        $name = trim($_POST['name']);
        $description = trim($_POST['description']);
        $sql = "insert into 71_nguyenthactuyen_categories(name, description) value ('$name', '$description')";
        return execute($sql);
    }

    public function updatesaveProcess()
    {
        $id = $_POST['id'];
        $name = trim($_POST['name']);
        $description = trim($_POST['description']);
        $sql = "update 71_nguyenthactuyen_categories set name = '$name', description = '$description' where id = $id";
        return execute($sql);
    }

    public function deleteById($id)
    {
        $sql = "delete from 71_nguyenthactuyen_categories where id = $id";
        return execute($sql);
    }
}