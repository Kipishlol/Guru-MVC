<?php


namespace App\View;

class Incomes extends Main 
{
    public function pageContent($data = [])
    {
        $options = [
            'id' => [
                'class' => 'text-center',
                'label' => '#'
            ],
            'title' => [
                'class' => '',
                'label' => 'Название'

            ],
            'amount' => [
                'class' => '',
                'label' => 'Сумма'
            ],
            'description' => [
                'class' => '',
                'label' => 'Описание'
            ],
            'table-actions' => [
                'class' => 'text-center',
                'label'=> 'Действия',
                'actions' => [
                    [
                        'icon' => 'fa-pencil',
                        'link' => '/incomes/edit'
                    ],
                    [
                        'icon' => 'fa-times',
                        'link' => '/incomes/delete'
                    ]
                ]
            ]
        ];

        $buttons = [
            [
                'link' => '/incomes/add',
                'label' => 'Добавить'
            ]
           
        ];
        $this->table($data['data'], $options, $buttons);
       
    }

}