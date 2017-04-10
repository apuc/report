<?php
namespace backend\widgets;
use Yii;
use yii\base\Widget;
use yii\helpers\Url;

class MainMenuAdmin extends Widget
{
    public function run(){
        echo \yii\widgets\Menu::widget(
            [
                'items' => [
                    [
                        'label' => 'Пользователи',
                        'url' => Url::to(['/user/admin']),
                        'template' => '<a href="{url}"><i class="fa fa-users"></i> <span>{label}</span></a>',
                        'active' => Yii::$app->controller->module->id === 'user' || Yii::$app->controller->module->id === 'rbac',

                    ],
                    [
                        'label' => 'Поля',
                        'url' => Url::to(['/custom_fields/custom_fields']),
                        'template' => '<a href="{url}"><i class="fa fa-keyboard-o"></i> <span>{label}</span></a>',
                        'active' => Yii::$app->controller->module->id === 'custom_fields',

                    ],
                    [
                        'label' => 'Валидация',
                        'url' => Url::to(['/validate/validate']),
                        'template' => '<a href="{url}"><i class="fa fa-cogs"></i> <span>{label}</span></a>',
                        'active' => Yii::$app->controller->module->id === 'validate',

                    ],
                    [
                        'label' => 'Отчеты',
                        'url' => Url::to(['/report/report']),
                        'template' => '<a href="{url}"><i class="fa fa-file-text-o"></i> <span>{label}</span></a>',
                        'active' => Yii::$app->controller->module->id === 'report',

                    ],
                ],
                'activateItems' => true,
                'activateParents' => true,
                'activeCssClass'=>'active',
                'encodeLabels' => false,
                /*'dropDownCaret' => false,*/
                'submenuTemplate' => "\n<ul class='treeview-menu' role='menu'>\n{items}\n</ul>\n",
                'options' => [
                    'class' => 'sidebar-menu',
                ]
            ]
        );
    }
}