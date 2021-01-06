<?php

class RoleController
{
    protected $roleService;
    public function __construct()
    {
        $this->roleService = new RoleService();
    }

    public function index()
    {
        $data = $this->roleService->getAllRoles();
        viewSite('roles/index', $data);
    }

    public function add()
    {
        viewSite('roles/form');
    }

    public function addsave()
    {
        $check = $this->roleService->addsaveProcess();
        if ($check) setSuccessMessage('Thêm mới thành công');
        else setErrorMessage('Thêm mới không thành công');
        redirect('role', 'index');
    }

    public function update()
    {
        $role = $this->roleService->getOneRoleById($_GET['id']);
        viewSite('roles/form', ['role' => $role]);
    }

    public function updatesave()
    {
        $check = $this->roleService->updatesaveProcess();
        if ($check) setSuccessMessage('Sửa thông tin thành công');
        else setErrorMessage('Sửa thông tin không thành công');
        redirect('role', 'index');
    }

    public function delete()
    {
        $check = $this->roleService->deleteById($_GET['id']);
        if ($check) setSuccessMessage('Xóa thành công');
        else setErrorMessage('Xóa không thành công');
        redirect('role', 'index');
    }
}