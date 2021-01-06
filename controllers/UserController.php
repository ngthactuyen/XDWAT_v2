<?php

class UserController
{
    protected $userService;
    protected $userRepository;
    protected $roleService;
    public function __construct()
    {
        $this->userService = new UserService();
        $this->userRepository = new UserRepository();
        $this->roleService = new RoleService();
    }

    public function index()
    {
        $data = $this->userService->getAllUsers();
        viewSite('users/index', $data);
    }

    public function add()
    {
        $roleList = $this->roleService->getAllRoles();
        viewSite('signup', [
            'roleList' => $roleList['rolesList']
        ]);
    }

    public function store()
    {
        $check = $this->userService->createUser($_POST);
        if ($check)
        {
            if (isset($_COOKIE['user_id'])) setSuccessMessage('Thêm mới thành công');
            else setSuccessMessage('Đăng ký thành công');
        } else {
            if (isset($_COOKIE['user_id'])) setSuccessMessage('Thêm mới không thành công');
            else setErrorMessage('Đăng ký không thành công');
        }
        if (isset($_COOKIE['user_id'])) redirect('user', 'index');
        else redirect('site', 'signup');
    }

    public function delete()
    {
        $this->userService->deleteUserProcess($_GET['id_user']);
        redirect('user', 'index');
    }

    public function update()
    {
        $roleList = $this->roleService->getAllRoles();
        $user = $this->userRepository->findById($_GET['id_user']);
        viewSite('users/update', [
            'user' => $user,
            'roleList' => $roleList['rolesList']
        ]);
    }

    public function processingUpdate()
    {
        $this->userService->updateUserProcess($_POST);
        redirect('user', 'index');
    }

    public function authenticate()
    {
        $check = $this->userService->auth($_POST);
        if ($check == 0){
            redirect('site', 'signin');
        } else {
            redirect('site');
        }
    }

    public function signout()
    {
        $this->userService->signoutProcess();
        redirect('site');
    }

    public function changePassword()
    {
        viewSite('users/changePassword');
    }

    public function processingChangePassword()
    {
        $check = $this->userService->changePasswordProcess($_POST);
        if ($check == 0){
            redirect('user', 'changePassword');
        } else {
            redirect('site');
        }
    }

    public function forgetPassword()
    {
        viewSite('users/forgetPassword');
    }

    public function processingForgetPassword()
    {
        $this->userService->forgetPasswordProcess($_POST);
        redirect('user', 'forgetPassword');
    }


}
