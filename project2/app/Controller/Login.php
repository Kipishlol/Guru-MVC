<?php


namespace App\Controller;

class Login 
{
    public function run()
    {
        if ($_POST) {
           $db = \App\Service\DB::get();
           $stmt =$db->prepare("
               SELECT 
                    *
                FROM
                    `users`
                WHERE 
                `email` = :email AND `password` = :password
                ");

                $stmt->execute([
                    ':email' => $_POST['email'],
                    ':password' => sha1($_POST['password'])

                ]);
                $result = $stmt ->fetch();

                if ($result) {
                    $_SESSION['auth'] = $result;
                    header('Location: /');
                    return;
                }
        }
        $view = new \App\View\Login();
        $view->render();
    }
}