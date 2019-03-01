<?php 

namespace App\View\Users;

class Form  extends \App\View\Main 
{
    public function pageContent($data = [])
    { 
        
        ?>
            <div class="block">
                <div class="block-header">
                    <ul class="block-options">
                        <li>
                            <button type="button"><i class="si si-settings"></i></button>
                        </li>
                    </ul>
                    <h3 class="block-title"><?= isset($data['user']) ? 'Редактирование пользователя' : 'Добавление пользователя' ?></h3>
                </div>
                <div class="block-content ">
                    <form class="form-horizontal push-10-t" action="<?= isset($data['user']) ? '/users/edit?id=' . $data['user']['id'] : '/users/add' ?>" method="post">
                        <div class="form-group">
                            <div class="col-sm-6">
                                <div class="form-material floating">
                                    <input class="form-control" type="text" id="material-text2" name="user-email" value="<?= isset($data['user']) ? $data['user']['email'] : '' ?>">
                                    <label for="material-text2">Email</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-6">
                                <div class="form-material floating">
                                    <input class="form-control" type="password" id="material-password2" name="user-password">
                                    <label for="material-password2">Пароль</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-6">
                                <div class="form-material floating">
                                    <input class="form-control" type="text" id="material-text3" name="user-name" value="<?= isset($data['user']) ? $data['user']['name'] : '' ?>">
                                    <label for="material-text3">Имя пользователя</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-6">
                                <button class="btn btn-sm btn-primary" type="submit">Сохранить</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        <?php
    } 
}