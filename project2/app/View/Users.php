<?php


namespace App\View;

class Users extends Main 
{
    public function pageContent($data = [])
    {
        $options = [
            'id' => [
                'class' => 'text-center',
                'label' => '#'
            ],
            'email' => [
                'class' => '',
                'label' => 'Email'

            ],
            'name' => [
                'class' => '',
                'label' => 'Имя пользователя'
            ],
            'table-actions' => [
                'class' => 'text-center',
                'label'=> 'Действия',
                'actions' => [
                    [
                        'icon' => 'fa-pencil',
                        'link' => '/users/edit'
                    ],
                    [
                        'icon' => 'fa-times',
                        'link' => '/users/delete'
                    ]
                ]
            ]
        ];

        $buttons = [
            [
                'link' => '/users/add',
                'label' => 'Добавить'
            ]
           
        ];
        $this->table($data['data'], $options, $buttons);
       
    }

}