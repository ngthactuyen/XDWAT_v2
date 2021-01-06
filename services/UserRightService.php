<?php


class UserRightService
{
    protected $userService;
    protected $rightService;

    public function __construct()
    {
        $this->userService = new UserService();
        $this->rightService = new RightService();
    }

    public function getAllRightsOfOneUser($user_id)
    {
        $sql = "SELECT * FROM 71_nguyenthactuyen_user_right WHERE user_id = $user_id";
        $userRightList = getAllData($sql);
        $userRightObjectList = [];
        $rightObjectList = [];
        foreach ($userRightList as $userRight){
            $userRightObjectList[] = new UserRight($userRight);
            $rightObjectList[] = $this->rightService->getOneRightById($userRight['right_id']);
        }
        $user = $this->userService->getOneUserById($user_id);

        return [
            'userRightList' => $userRightObjectList,
            'rightList' => $rightObjectList,
            'user' => $user
        ];


    }

    public function getAllIdRightsOfOneUser($user_id)
    {
        $rightsOfOneUserList = $this->getAllRightsOfOneUser($_COOKIE['user_id']);
        $idRightsOfOneUserList = [];
        foreach ($rightsOfOneUserList['rightList'] as $right){
            array_push($idRightsOfOneUserList, $right->id);
        }
        return $idRightsOfOneUserList;
    }

    public function getAllUnselectedRightsOfOneUser($user_id)
    {
        $user = $this->userService->getOneUserById($user_id);
        $sql = "SELECT * FROM 71_nguyenthactuyen_rights
                WHERE role_id = $user->role_id AND id NOT IN (
                SELECT right_id FROM 71_nguyenthactuyen_user_right
                WHERE user_id = $user_id)";
        $unselectedRightsOfOneUserList = getAllData($sql);
        $rightObjectList = [];
        foreach ($unselectedRightsOfOneUserList as $right) {
            $rightObjectList[] = new Right($right);
        }
        return [
            'unselectedRightsList' => $rightObjectList,
            'user' => $user
        ];
    }

    public function addsaveProcess()
    {
        $user_id = $_POST['user_id'];
        $listRightId = array_values($_POST);
        $flag = true;
        for ($i = 1; $i < count($listRightId); $i++){
            $right_id = $listRightId[$i];
            $sql = "insert into 71_nguyenthactuyen_user_right(user_id, right_id) 
                    value ($user_id, $right_id)";
            if (execute($sql) == false){
                $flag = false;
                break;
            }
        }

        return [
            'flag' => $flag,
            'user_id' => $user_id
        ];
    }

    public function deleteById($id, $user_id)
    {
        $sql = "delete from 71_nguyenthactuyen_user_right where id = $id";
        return execute($sql);
    }

    public function setPrivilege($user_id)
    {
        unset($_SESSION['manageUser']);
        unset($_SESSION['manageRole']);
        unset($_SESSION['manageBook']);
        unset($_SESSION['manageCategory']);
        unset($_SESSION['manageBorrowing']);
        unset($_SESSION['manageBorrowCard']);
        setcookie('manageUser', '', time() - 3600, "/");
        setcookie('manageRole', '', time() - 3600, "/");
        setcookie('manageBook', '', time() - 3600, "/");
        setcookie('manageCategory', '', time() - 3600, "/");
        setcookie('manageBorrowing', '', time() - 3600, "/");
        setcookie('manageBorrowCard', '', time() - 3600, "/");
        $_SESSION['manageUser'] = 0;
        $_SESSION['manageRole'] = 0;
        $_SESSION['manageBook'] = 0;
        $_SESSION['manageCategory'] = 0;
        $_SESSION['manageBorrowing'] = 0;
        $_SESSION['manageBorrowCard'] = 0;

        $rolesOfOneUser = $this->getAllRolesOfOneUser($user_id);
        foreach ($rolesOfOneUser['roleList'] as $role){
            if ($role->id == 2) $_SESSION['manageUser'] = 1;
            if ($role->id == 4) $_SESSION['manageRole'] = 1;
            if ($role->id == 5) $_SESSION['manageBook'] = 1;
            if ($role->id == 6) $_SESSION['manageCategory'] = 1;
            if ($role->id == 7) $_SESSION['manageBorrowing'] = 1;
            if ($role->id == 8) $_SESSION['manageBorrowCard'] = 1;
        }
        setcookie('manageUser', $_SESSION['manageUser'], time() + (86400 * 7), "/");
        setcookie('manageRole', $_SESSION['manageUser'], time() + (86400 * 7), "/");
        setcookie('manageBook', $_SESSION['manageBook'], time() + (86400 * 7), "/");
        setcookie('manageCategory', $_SESSION['manageCategory'], time() + (86400 * 7), "/");
        setcookie('manageBorrowing', $_SESSION['manageBorrowing'], time() + (86400 * 7), "/");
        setcookie('manageBorrowCard', $_SESSION['manageBorrowCard'], time() + (86400 * 7), "/");
    }
}