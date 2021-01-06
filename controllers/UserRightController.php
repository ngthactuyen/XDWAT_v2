<?php


class UserRightController
{
    protected $userRightService;
    protected $userService;
    protected $rightService;

    public function __construct()
    {
        $this->userRightService = new UserRightService();
        $this->userService = new UserService();
        $this->rightService = new RightService();
    }

    public function index()
    {
        //get all right of user is managed
        $data = $this->userRightService->getAllRightsOfOneUser($_GET['user_id']);

        //get all right of current user logged in
        $rightOfCurrentLoggedInUserList = $this->userRightService->getAllRightsOfOneUser($_COOKIE['user_id']);
        $idRightOfCurrentLoggedInUserList = [];
        foreach ($rightOfCurrentLoggedInUserList['rightList'] as $right){
            array_push($idRightOfCurrentLoggedInUserList, $right->id);
        }
        $data['rightOfCurrentLoggedInUserList'] = $idRightOfCurrentLoggedInUserList;
        viewSite('user_right/index', $data);
    }

    public function add()
    {
        $data = $this->userRightService->getAllUnselectedRightsOfOneUser($_GET['user_id']);
        if (count($data['unselectedRightsList']) == 0){
            $user_id = $data['user']->id;
            setErrorMessage('Người dùng đã có đủ các quyền');
            redirect('userRight', "index&user_id=$user_id");
        } else {
            viewSite('user_right/add', $data);
        }
    }

    public function addsave()
    {
        $data = $this->userRightService->addsaveProcess();
        $user_id = $data['user_id'];
        if ($data['flag']) setSuccessMessage('Thêm mới thành công');
        else setErrorMessage('Thêm mới không thành công');
        redirect('userRight', "index&user_id=$user_id");
    }

    public function delete()
    {
        $user_id = $_GET['user_id'];
        $check = $this->userRightService->deleteById($_GET['id'], $user_id);
        if ($check) setSuccessMessage('Xóa thành công');
        else setErrorMessage('Xóa không thành công');
        redirect('userRight', "index&user_id=$user_id");
    }
}