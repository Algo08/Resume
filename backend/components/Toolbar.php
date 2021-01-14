<?php
namespace app\components;
use common\models\Message;
use yii\base\Widget;

/**
 * Created by PhpStorm.
 * User: AGC PROJECTS
 * Date: 11.06.2019
 * Time: 14:28
 */

class Toolbar extends Widget
{
    public function run()
    {
        return $this->render('toolbar');
    }

}