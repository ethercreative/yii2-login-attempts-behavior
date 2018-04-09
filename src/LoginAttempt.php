<?php

namespace ethercreative\loginattempts;

use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;

/**
 * Class LoginAttempt
 * @package ethercreative\loginattempts
 * @property int $amount
 * @property string $key
 */
class LoginAttempt extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%login_attempt}}';
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'value' => new Expression('NOW()'),
            ]
        ];
    }

    public function rules()
    {
        return [
            [['key'], 'required'],
        ];
    }
}
