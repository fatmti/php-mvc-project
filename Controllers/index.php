<?php

class index extends Controller
{
    private $errors, $errorsRegister, $registersuccess;

    public function indexAction()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $users = $this->loadModel('indexusers');

            if (isset($_POST['btnlogin'])) {
                $usernamelogin = sanytize($_POST['usernamelogin']);
                $passwordlogin = md5(sanytize($_POST['passwordlogin']));
                if ($users->login($usernamelogin, $passwordlogin)) {
                    $_SESSION['key'] = $passwordlogin;
                    $_SESSION['userid'] = $usernamelogin;
                    header('location:' . Address . 'panel');
                } else {
                    $this->errors = 'یوزرنیم یا پسورد اشتباه میباشد';
                }
            }

            if (isset($_POST['btnregister'])) {
                $usernameregister = sanytize($_POST['usernameregister']);
                $passwordregister = sanytize($_POST['passwrodregister']);
                $rpasswordregister = sanytize($_POST['rpasswrodregister']);
                $passwordregister = md5($passwordregister);
                $rpasswordregister = md5($rpasswordregister);
                if ($passwordregister == $rpasswordregister) {
                    if ($users->register($usernameregister, $passwordregister)) {
                        $this->registersuccess = 'ثبت نام شما با موفقیت انجام شد';
                    }
                } else {
                    $this->errorsRegister = 'پسورد و تکرار پسورد یکسان نمیباشد';
                }

            }
        }


        $this->loadView('index/index', ['title' => 'ثبت نام | ورود به سایت', 'errors' => $this->errors, 'errorsregister' => $this->errorsRegister, 'registersuccess' => $this->registersuccess]);
    }
}