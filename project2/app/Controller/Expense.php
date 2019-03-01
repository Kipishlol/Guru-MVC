<?php
namespace app\Controller;

class Expense
{
    public function run()
    {
        $db = \App\Service\DB::get();
        $stmt = $db->prepare("
            SELECT
              *
            FROM
              `incomes`
              
        ");
        $stmt->execute();

        $view = new \App\View\Expense();
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
             `incomes` (
                    `title`,
                    `description`,
                    `amount`
                ) VALUES (
                    :title,
                    :description,
                    :amount
                )
                ");
                $stmt->execute([
                    ':title' => $_POST['title'],
                    ':description' => sha1($_POST['description']),
                    ':amount' => $_POST['amount'],
                ]);
                header('Location: /incomes');
            return;
        }
        $view = new \App\View\Expense\Form();
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