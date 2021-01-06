<?php

class RightController
{
    protected $rightService;
    protected $roleService;
    public function __construct()
    {
        $this->rightService = new RightService();
        $this->roleService = new RoleService();
    }

    public function index()
    {
        $rightList = $this->rightService->getAllRightsOfOneRole($_GET['role_id']);
        $role = $this->roleService->getOneRoleById($_GET['role_id']);
        viewSite('rights/index', [
            'rightList' => $rightList,
            'role' => $role
        ]);
    }

    public function add()
    {
        $role = $this->roleService->getOneRoleById($_GET['role_id']);
        viewSite('rights/form', ['role' => $role]);
    }

    public function addsave()
    {
        $data = $this->rightService->addsaveProcess();
        $role_id = $data['role_id'];
        if ($data['check']) setSuccessMessage('Thêm mới thành công');
        else setErrorMessage('Thêm mới không thành công');
        redirect('right', "index&role_id=$role_id");
    }

    public function update()
    {
        $right = $this->rightService->getOneRightById($_GET['id']);
        $role = $this->roleService->getOneRoleById($_GET['role_id']);
        viewSite('rights/form', [
            'role' => $role,
            'right' => $right
        ]);
    }

    public function updatesave()
    {
        $data = $this->rightService->updatesaveProcess();
        if ($data['check']) setSuccessMessage('Sửa thông tin thành công');
        else setErrorMessage('Sửa thông tin không thành công');
        $role_id = $data['role_id'];
        redirect('right', "index&role_id=$role_id");
    }

    public function delete()
    {
        $role_id = $_GET['role_id'];
        $check = $this->rightService->deleteById($_GET['id']);
        if ($check) setSuccessMessage('Xóa thành công');
        else setErrorMessage('Xóa không thành công');
        redirect('right', "index&role_id=$role_id");
    }
}