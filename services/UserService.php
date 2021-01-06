<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


class UserService
{
    protected $userRepository;
    protected $roleService;
    public function __construct()
    {
        $this->userRepository = new UserRepository();
        $this->roleService = new RoleService();
    }

    public function getAllUsers()
    {
        $sql = "select * from 71_nguyenthactuyen_users order by role_id";
        $userList = getAllData($sql);
        $userObjectList = [];
        foreach ($userList as $user) {
            $userObjectList[] = new User($user);
        }
        $userRightService = new UserRightService();
        $rightOfOneUserList = $userRightService->getAllRightsOfOneUser($_COOKIE['user_id']);
        $idRightOfOneUserList = [];
        foreach ($rightOfOneUserList['rightList'] as $right){
            array_push($idRightOfOneUserList, $right->id);
        }
        $roleList = $this->roleService->getAllRoles();
        return [
            'usersList' => $userObjectList,
            'roleList' => $roleList['rolesList'],
            'rightList' => $idRightOfOneUserList
        ];
    }

    public function createUser($data)
    {
        if (isset($_COOKIE['user_id'])){
            $role_id = $_POST['role_id'];
        } else {
            $role = $this->roleService->getOneRoleByName('Sinh viên%cán bộ%giảng viên');
            $role_id = $role->id;
        }
        $username = trim($data['username']);
        $password = sha1(trim($data['password']));
        $email = trim($data['email']);
        $phone = trim($data['phone']);
        $address = trim($data['address']);
        return $this->userRepository->save($role_id, $username, $password, $email, $phone, $address);
    }

    public function deleteUserProcess($id_user)
    {
        $check = $this->userRepository->deleteById($id_user);
        if ($check) setSuccessMessage('Xóa thành công');
        else setErrorMessage('Xóa không thành công');
    }

    public function updateUserProcess($data)
    {
        $role_id = $_POST['role_id'];
        $username = trim($_POST['username']);
        $email = trim($_POST['email']);
        $phone = trim($_POST['phone']);
        $address = trim($_POST['address']);
        $check = $this->userRepository->updateUser($_POST['id'], $role_id, $username, '', $email, $phone, $address);
        if ($check) setSuccessMessage('Sửa thông tin thành công');
        else setErrorMessage('Sửa thông tin không thành công');
    }

    public function auth($data)
    {
        if (isset($data['g-recaptcha-response']) && !empty($data['g-recaptcha-response'])){
            //your site secret key
            $secret = '6LfBwtgZAAAAAIw5CzZm_22wTJJKXM41aXy51_WE';
            //get verify response data
            $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
            $responseData = json_decode($verifyResponse);
            if($responseData->success){
//                $succMsg = 'Your contact request have submitted successfully.';
                $username = trim($data['username']);
                $password = sha1(trim($data['password']));
                $user = $this->userRepository->findByUsernameAndPassword($username, $password);
                if ($user->id == null){
                    setErrorMessage('Tên đăng nhập hoặc mật khẩu sai');
                    return 0;
                } else {
                    $_SESSION['user_id'] = $user->id;
                    $_SESSION['username'] = $user->username;
                    $_SESSION['email'] = $user->email;

                    setcookie('user_id', $user->id, time() + (86400 * 7), "/");
                    setcookie('username', $user->username, time() + (86400 * 7), "/");
                    setcookie('email', $user->email, time() + (86400 * 7), "/");

//                    dd($_COOKIE);
                    // Xác định vai trò
                    $_SESSION['role_id'] = $user->role_id;
                    setcookie('role_id', $user->role_id, time() + (86400 * 7), "/");


//                    $userRightService = new UserRightService();
////                    dd($_COOKIE);
//                    $rightOfOneUserList = $userRightService->getAllRightsOfOneUser($user->id);
////                    dd($rightOfOneUserList['rightList']);
//                    $idRightOfOneUserList = [];
//                    $idRightOfOneUserList[] = 0;
//                    foreach ($rightOfOneUserList['rightList'] as $right){
//                        $idRightOfOneUserList[] = $right->id;
////                        array_push($idRightOfOneUserList, $right->id);
//                    }
////                    dd($idRightOfOneUserList);
//                    $rightListString = implode(' ', $idRightOfOneUserList);
////                    dd($rightListString);
//                    $_SESSION['rightList'] = $rightListString;
//                    setcookie('rightList', $rightListString, time() + (86400 * 7), "/");
////                    dd($_COOKIE);




                    setSuccessMessage('Đăng nhập thành công');
                    return 1;
                }
            } else {
                setErrorMessage('Lỗi xác thực reCAPTCHA, hãy thử lại');
                return 0;
            }
        } else {
            setErrorMessage('Bạn chưa click vào reCAPTCHA');
            return 0;
        }
    }

    public function changePasswordProcess($data){
        $oldPassword = sha1(trim($data['oldPassword']));
        $newPassword = sha1(trim($data['newPassword']));
        $user = $this->userRepository->findByUsernameAndPassword($_COOKIE['username'], $oldPassword);
        if ($user->id != $_COOKIE['user_id']){
            setErrorMessage('Nhập sai mật khẩu hiện tại, hãy nhập lại');
            return 0;
        } else {
            $check = $this->userRepository->updateUser($user->id, '', '', $newPassword, '', '', '');
            if ($check){
                setSuccessMessage('Thay đổi mật khẩu thành công');
                return 1;
            } else {
                setErrorMessage('Thay đổi mật khẩu không thành công');
                return 0;
            }
        }
    }

    public function signoutProcess()
    {
        setcookie('user_id', '', time() - 3600, "/");
        setcookie('username', '', time() - 3600, "/");
        setcookie('email', '', time() - 3600, "/");
        setcookie('role_id', '', time() - 3600, "/");
        setcookie('rightList', '', time() - 3600, "/");


        unset($_SESSION['user_id']);
        unset($_SESSION['username']);
        unset($_SESSION['email']);
        unset($_SESSION['role_id']);
        unset($_SESSION['rightList']);

    }

    public function forgetPasswordProcess($data)
    {
        $email = trim($_POST['email']);
        $user = $this->userRepository->findByEmail($email);
        if ($user->id == null){
            setErrorMessage('Email không tồn tại trong hệ thống, hãy nhập lại');
        } else {
            // Instantiation and passing `true` enables exceptions
            $mail = new PHPMailer(true);

            try {
                //Server settings
                //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
                $mail->SMTPDebug = 0;
                $mail->isSMTP();                                            // Send using SMTP
                $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                $mail->Username   = 'tuyennt13k.actvn@gmail.com';                     // SMTP username
                $mail->Password   = 'At130958!';                               // SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

                //Recipients
                $mail->CharSet = 'UTF-8';
                $mail->setFrom('tuyennt13k.actvn@gmail.com', 'Admin from Library');
                $mail->addAddress($user->email);               // Name is optional

                // Content
                $newPassword = $this->generateRandomPassword(8);
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = 'Phản hồi yêu cầu cấp lại mật khẩu';
                $mail->Body    = "Mật khẩu mới của bạn là: $newPassword";
                $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                $mail->send();
//                echo 'Message has been sent';
                // Update new password in database
                $this->userRepository->updateUser($user->id, '', '', sha1(trim($newPassword)), '', '', '');
                setSuccessMessage('Mật khẩu mới đã được gửi tới email của bạn');
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        }
    }

    public function generateRandomPassword($passwordLength)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$&*';
        $randomString = '';
        for ($i = 0; $i < $passwordLength; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
        }
        return $randomString;
    }

    public function getOneUserById($id)
    {
        return $this->userRepository->findById($id);
    }

    public function setRight()
    {

    }
}