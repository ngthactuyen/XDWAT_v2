<?php


class RoleService
{

    public function getAllRoles()
    {
        $sql = "select * from 71_nguyenthactuyen_roles";
        $roleList = getAllData($sql);
        $roleObjectList = [];
        foreach ($roleList as $role) {
            $roleObjectList[] = new Role($role);
        }
        $userRightService = new UserRightService();
        $rightOfOneUserList = $userRightService->getAllRightsOfOneUser($_COOKIE['user_id']);
        $idRightOfOneUserList = [];
        foreach ($rightOfOneUserList['rightList'] as $right){
            array_push($idRightOfOneUserList, $right->id);
        }
        return [
            'rolesList' => $roleObjectList,
            'rightList' => $idRightOfOneUserList
        ];
    }

    public function getOneRoleById($id){
        $sql = "select * from 71_nguyenthactuyen_roles where id = $id";
        $temp = getOneData($sql);
        return $role = new Role($temp);
    }

    public function getOneRoleByName($name)
    {
        $sql = "select * from 71_nguyenthactuyen_roles where name like '%$name%'";
        $temp = getOneData($sql);
        return $role = new Role($temp);
    }

    public function addsaveProcess()
    {
        $name = trim($_POST['name']);
        $description = trim($_POST['description']);
        $sql = "insert into 71_nguyenthactuyen_roles(name, description) value ('$name', '$description')";
        return execute($sql);
    }

    public function updatesaveProcess()
    {
        $id = $_POST['id'];;
        $name = trim($_POST['name']);
        $description = trim($_POST['description']);
        $sql = "update 71_nguyenthactuyen_roles set name = '$name', description = '$description' where id = $id";
        return execute($sql);
    }

    public function deleteById($id)
    {
        $sql = "delete from 71_nguyenthactuyen_roles where id = $id";
        return execute($sql);
    }
}