<?php


class panel extends Controller
{
    private $message;

    public function indexAction()
    {
        if (!isset($_SESSION['key'])) {
            header('location:' . Address);
        } else {
            $ticket = $this->loadModel('ticket');
            $readtitleticket = $ticket->readtitleticket($_SESSION['userid']);
//            echo $_SESSION['userid'];
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if (isset($_POST['btn'])) {
                    $title = sanytize($_POST['title']);
                    $content = sanytize($_POST['content']);
                    if ($ticket->newticketopen($title, $content, $_SESSION['userid'])) {
                        $this->message = 'ارسال تیکیت با موفقیت انجام شد :)))';
                        header('location:' . Address . 'panel/');
                    } else {
                        $this->message = 'ارور در ارسال تیکیت مجدد تست نمایید';
                    }
                }
                if (isset($_POST['btnexit'])) {
                    session_unset();
                    session_destroy();
                    header('location:http://localhost/mvc');
                }
            }

            $this->loadView('panel/index', array('title' => 'پنل مدیریت وبسایت', 'message' => $this->message, 'readtitleticket' => $readtitleticket));
        }

    }

    public function view($id)
    {
        if (!isset($_SESSION['key'])) {
            header('location:' . Address);
        } else {
            $ticket = $this->loadModel('ticket');


            $this->loadView('panel/view', array('title' => 'مشاهده تیکیت شماره ' . $id, 'dataticket' => $ticket->readByid($id), 'answer' => $ticket));

        }
    }

}
