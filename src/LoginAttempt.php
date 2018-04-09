<?php

namespace ethercreative\loginattempts;

use yii\behaviors\TimestampBehavior;

/**
 * Class LoginAttempt
 * @package ethercreative\loginattempts
 * @property int $amount
 * @property string $key
 */
class LoginAttempt extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return '{{%login_attempt}}';
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    public function rules()
    {
        return [
            [['key'], 'required'],
        ];
    }
}
