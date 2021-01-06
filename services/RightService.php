<?php


class RightService
{
    public function getAllRightsOfOneRole($role_id)
    {
        $sql = "select * from 71_nguyenthactuyen_rights where role_id = $role_id";
        $rightList = getAllData($sql);
        $rightObjectList = [];
        foreach ($rightList as $right) {
            $rightObjectList[] = new Right($right);
        }
        return $rightObjectList;
    }

    public function getOneRightById($id){
        $sql = "select * from 71_nguyenthactuyen_rights where id = $id";
        $temp = getOneData($sql);
        return $right = new Right($temp);
    }

    public function getOneRightByName($name){
        $sql = "select * from 71_nguyenthactuyen_rights where name like '%$name%'";
        $temp = getOneData($sql);
        return $right = new Right($temp);
    }

    public function addsaveProcess()
    {
        $role_id = $_POST['role_id'];
        $name = trim($_POST['name']);
        $sql = "insert into 71_nguyenthactuyen_rights(role_id, name) value ($role_id, '$name')";
        $check = execute($sql);
        return [
            'check' => $check,
            'role_id' => $role_id
        ];
    }

    public function updatesaveProcess()
    {
        $id = $_POST['id'];;
        $name = trim($_POST['name']);
        $role_id = $_POST['role_id'];
        $sql = "update 71_nguyenthactuyen_rights set name = '$name' where id = $id";
        $check = execute($sql);
        return [
            'check' => $check,
            'role_id' => $role_id
        ];
    }

    public function deleteById($id)
    {
        $sql = "delete from 71_nguyenthactuyen_rights where id = $id";
        return execute($sql);
    }
}