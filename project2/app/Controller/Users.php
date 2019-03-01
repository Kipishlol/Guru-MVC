<?php
namespace app\Controller;

class Users
{
    public function run()
    {
        $db = \App\Service\DB::get();
        $stmt = $db->prepare("
            SELECT
              *
            FROM
              `users`
              
        ");
        $stmt->execute();

        $view = new \App\View\Users();
        $data =[
             "page" => [
                 'title' => 'Пользователи',
                 'description' => '- создание/ редактирование пользователей'
                
             ],
             'data' => $stmt->fetchAll()
        ];

        $view->render($data);
    }

    public function runAdd()
    {
        if ($_POST) {
           
          $db = \App\Service\DB::get();
          $stmt = $db->prepare("
          INSERT INTO 
             `users` (
                    `email`,
                    `password`,
                    `name`
                ) VALUES (
                    :email,
                    :password,
                    :name
                )
                ");
                $stmt->execute([
                    ':email' => $_POST['user-email'],
                    ':password' => sha1($_POST['user-password']),
                    ':name' => $_POST['user-name'],
                ]);
                header('Location: /users');
            return;
        }
        $view = new \App\View\Users\Form();
        $view->render(); 
    }

    public function runEdit(){
        if ($_POST) {
            
            if ($_POST['user-password'] == '') {
            $sql = "
                UPDATE
                 `users`
                SET
                 `email` = :email,
                 `name` = :name
                WHERE 
                  `id` = :id

                ";
                $params = [ 
                    ':email' => $_POST['user-email'],
                    ':name' => $_POST['user-name'],
                    ':id' => $_GET['id']

                ];
            } else {
                $sql = "
                UPDATE
                 `users`
                SET
                 `email` = :email,
                 `name` = :name,
                 `password` = :password
                WHERE 
                  `id` = :id

                ";
                $params = [ 
                    ':email' => $_POST['user-email'],
                    ':name' => $_POST['user-name'],
                    ':password' => sha1($_POST['user-password']),
                    ':id' => $_GET['id']

                ];

            }
            $db = \App\Service\DB::get();
            $stmt = $db->prepare($sql);
            $stmt->execute($params);
            header('Location: /users');

            return;
        }
        $db = \App\Service\DB::get();
        $stmt = $db->prepare("
        SELECT 
          *
        FROM
         `users`
        WHERE
         `id` = :id
        ");

        $stmt->execute([
            ':id' => $_GET['id']
        ]);
        $view = new \App\View\Users\Form();
        $view->render([
            'user' => $stmt->fetch() 
        ]); 
    }
    public function runDelete()
    {
        $db = \App\Service\DB::get();
        $stmt = $db->prepare("
        DELETE FROM 
         `users`
        WHERE 
         `id` = :id 
        ");
        $stmt->execute([
             ':id' => $_GET['id']
        ]);
        header('Location: /users');
    }
}