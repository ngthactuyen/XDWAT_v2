<?php

class UserRepository
{
    public function save($role_id, $username, $password, $email, $phone, $address)
    {
        $sql = "insert into 71_nguyenthactuyen_users(role_id, username, password, email, phone, address) value ($role_id, '$username', '$password', '$email', '$phone', '$address')";
        return execute($sql);
    }

    public function findByEmail($email)
    {
        $sql = "select * from 71_nguyenthactuyen_users where email like '$email'";
        $temp = getOneData($sql);
        return $user = new User($temp);
    }

    public function findById($id)
    {
        $sql = "select * from 71_nguyenthactuyen_users where id = $id";
        $temp = getOneData($sql);
        return $user = new User($temp);
    }

    public function findByUsernameAndPassword($username, $password)
    {
        $sql = "select * from 71_nguyenthactuyen_users where username like'$username' and password like '$password'";
//        dd($sql);
        $temp = getOneData($sql);
        return $user = new User($temp);
    }

    public function updateUser($id, $role_id, $username, $password, $email, $phone, $address)
    {
        $sql = "update 71_nguyenthactuyen_users set ";
        if ($role_id != '') {
            if ($username !='' || $password != '' || $email != '' || $phone != '' || $address != '')
                $sql .= "role_id = $role_id, ";
            else
                $sql .= "role_id = $role_id ";
        }
        if ($username != '') {
            if ($password != '' || $email != '' || $phone != '' || $address != '')
                $sql .= "username = '$username', ";
            else
                $sql .= "username = '$username' ";
        }
        if ($password != ''){
            if ($email != '' || $phone != '' || $address != '')
                $sql .= "password = '$password', ";
            else
                $sql .= "password = '$password' ";
        }
        if ($email != ''){
            if ($phone != '' || $address != '')
                $sql .= "email = '$email', ";
            else
                $sql .= "email = '$email' ";
        }
        if ($phone != ''){
            if ($address != '')
                $sql .= "phone = '$phone', ";
            else
                $sql .= "phone = '$phone' ";
        }
        if ($address != ''){
            $sql .= "address = '$address' ";
        }
        $sql .= "where id = $id";
        return execute($sql);
    }

    public function deleteById($id)
    {
        $sql = "delete from 71_nguyenthactuyen_users where id = $id";
        return execute($sql);
    }
}