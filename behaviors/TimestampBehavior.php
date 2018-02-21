<?php
/**
 * Created by PhpStorm.
 * User: krok
 * Date: 28.08.15
 * Time: 23:13
 */

namespace app\behaviors;

use yii\db\Expression;

/**
 * Class TimestampBehavior
 *
 * ```php
 * use yii\db\Expression;
 *
 * public function behaviors()
 * {
 *     return [
 *         [
 *             'class' => TimestampBehavior::className(),
 *             'createdAtAttribute' => 'create_time',
 *             'updatedAtAttribute' => 'update_time',
 *             'value' => new Expression('NOW()'),
 *         ],
 *     ];
 * }
 * ```
 *
 * @package behaviors
 */
class TimestampBehavior extends \yii\behaviors\TimestampBehavior
{
    public function init()
    {
        parent::init();
        $this->value = new Expression('NOW()');
    }
}
