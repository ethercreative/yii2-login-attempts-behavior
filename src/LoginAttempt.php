<?php

namespace ethercreative\loginattempts;

use yii\behaviors\TimestampBehavior;

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
