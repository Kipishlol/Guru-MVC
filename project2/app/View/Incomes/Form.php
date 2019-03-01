<?php 

namespace App\View\Incomes;

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
                    <h3 class="block-title"><?= isset($data['income']) ? 'Редактирование дохода' : 'Добавление дохода' ?></h3>
                </div>
                <div class="block-content ">
                    <form class="form-horizontal push-10-t" action="<?= isset($data['income']) ? '/incomes/edit?id=' . $data['income']['id'] : '/incomes/add' ?>" method="post">
                        <div class="form-group">
                            <div class="col-sm-6">
                                <div class="form-material floating">
                                    <input class="form-control" type="text" id="material-text2" name="title" value="<?= isset($data['income']) ? $data['income']['title'] : '' ?>">
                                    <label for="material-text2">Название дохода</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-6">
                                <div class="form-material floating">
                                    <input class="form-control" type="text" id="material-password2" name="amount">
                                    <label for="material-password2">Сумма</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-6">
                                <div class="form-material floating">
                                    <input class="form-control" type="text" id="material-text3" name="description" value="<?= isset($data['income']) ? $data['income']['description'] : '' ?>">
                                    <label for="material-text3">Описание </label>
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