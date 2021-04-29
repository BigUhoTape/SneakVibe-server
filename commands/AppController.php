<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;

use app\models\User;
use yii\console\Controller;
use yii\helpers\Console;

/**
 * This command echoes the first argument that you have entered.
 *
 * This command is provided as an example for you to learn how to create console commands.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppController extends Controller
{
    public function actionAddUser () {
        $user = new User();
        $user->email = 'admin';
        $user->password_hash = \Yii::$app->security->generatePasswordHash('admin');
        $user->access_token = \Yii::$app->security->generateRandomString(255);

        if ($user->save(false)) {
            Console::output('Saved');
        } else {
            var_dump($user->errors);
            Console::output('Not Saved');
        }
    }
}
