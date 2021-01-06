<?php
$roleService = new RoleService();
$roleAdmin = $roleService->getOneRoleByName('Quản trị viên');
$roleLibrarian = $roleService->getOneRoleByName('Thủ thư');
$roleStudent = $roleService->getOneRoleByName('Sinh viên%cán bộ%giảng viên');
define('ROLE_ADMIN', $roleAdmin->id);
define('ROLE_LIBRARIAN', $roleLibrarian->id);
define('ROLE_STUDENT', $roleStudent->id);

//RightStudent
$rightService = new RightService();
$rightBorrowBook = $rightService->getOneRightByName('Mượn sách');//Thêm sách vào phiếu mượn
$rightAddTicket = $rightService->getOneRightByName('Thêm mới phiếu mượn');
$rightDeleteTicket = $rightService->getOneRightByName('Xóa phiếu mượn');
$rightUpdateTicket = $rightService->getOneRightByName('Sửa phiếu mượn');//Xóa sách trong phiếu mượn
define('RIGHT_STUDENT_BORROW_BOOK', $rightBorrowBook->id);//Thêm sách vào phiếu mượn
define('RIGHT_STUDENT_ADD_TICKET', $rightAddTicket->id);
define('RIGHT_STUDENT_DELETE_TICKET', $rightDeleteTicket->id);
define('RIGHT_STUDENT_UPDATE_TICKET', $rightUpdateTicket->id);//Xóa sách trong phiếu mượn



//RightLibrarian
$rightAddBook = $rightService->getOneRightByName('Thêm mới sách');
$rightUpdateBook = $rightService->getOneRightByName('Sửa thông tin sách');
$rightDeleteBook = $rightService->getOneRightByName('Xóa sách');
$rightAddCategory = $rightService->getOneRightByName('Thêm mới thể loại sách');
$rightUpdateCategory = $rightService->getOneRightByName('Sửa thông tin thể loại sách');
$rightDeleteCategory = $rightService->getOneRightByName('Xóa thể loại sách');
define('RIGHT_LIBRARIAN_ADD_BOOK', $rightAddBook->id);
define('RIGHT_LIBRARIAN_UPDATE_BOOK', $rightUpdateBook->id);
define('RIGHT_LIBRARIAN_DELETE_BOOK', $rightDeleteBook->id);
define('RIGHT_LIBRARIAN_ADD_CATEGORY', $rightAddCategory->id);
define('RIGHT_LIBRARIAN_UPDATE_CATEGORY', $rightUpdateCategory->id);
define('RIGHT_LIBRARIAN_DELETE_CATEGORY', $rightDeleteCategory->id);

//RightAdmin
$rightAddUser = $rightService->getOneRightByName('Thêm mới người dùng');
$rightUpdateUser = $rightService->getOneRightByName('Sửa thông tin người dùng');
$rightDeleteUser = $rightService->getOneRightByName('Xóa người dùng');
$rightAddUserRight = $rightService->getOneRightByName('Thêm quyền người dùng');
$rightDeleteUserRight = $rightService->getOneRightByName('Xóa quyền người dùng');
define('RIGHT_ADMIN_ADD_USER', $rightAddUser->id);
define('RIGHT_ADMIN_UPDATE_USER', $rightUpdateUser->id);
define('RIGHT_ADMIN_DELETE_USER', $rightDeleteUser->id);
define('RIGHT_ADMIN_ADD_USER_RIGHT', $rightAddUserRight->id);
define('RIGHT_ADMIN_DELETE_USER_RIGHT', $rightDeleteUserRight->id);







if (!empty($_COOKIE['user_id']) && !empty($_COOKIE['username']) && !empty($_COOKIE['email']) && !empty($_COOKIE['role_id'])){
    $_SESSION['user_id'] = $_COOKIE['user_id'];
    $_SESSION['username'] = $_COOKIE['username'];
    $_SESSION['email'] = $_COOKIE['email'];
    $_SESSION['role_id'] = $_COOKIE['role_id'];

}

//redirect
$controller = @$_GET['controller'];
$action = @$_GET['action'];
if (!$controller || ($controller == 'site' && !$action)) {
    $controller = 'site';
    $action = 'home';
}

switch ($controller) {
    case 'site':
        $siteController = new SiteController();
        $siteController->$action();
        break;
    case 'user':
        $userController = new UserController();
        $userController->$action();
        break;
    case 'role':
        $roleController = new RoleController();
        $roleController->$action();
        break;
    case 'right':
        $rightController = new RightController();
        $rightController->$action();
        break;
    case 'userRight':
        $userRightController = new UserRightController();
        $userRightController->$action();
    break;
    case 'category':
        $categoryController = new CategoryController();
        $categoryController->$action();
        break;
    case 'book':
        $bookController = new BookController();
        $bookController->$action();
        break;
    case 'ticket':
        $ticketController = new TicketController();
        $ticketController->$action();
        break;
    case 'ticketBook':
        $ticketBookController = new TicketBookController();
        $ticketBookController->$action();
        break;


    default:
        echo 'Không có controller nào được gọi';
        break;
}
