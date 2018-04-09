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
            'class' => TimestampBehavior::className(),
            'value' => new \yii\db\Expression('NOW()'),
        ];
    }

    public function rules()
    {
        return [
            [['key'], 'required'],
        ];
    }
}
