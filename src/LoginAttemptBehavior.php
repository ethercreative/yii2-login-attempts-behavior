<?php

namespace ethercreative\loginattempts;

use yii\base\Behavior;
use yii\base\Model;
use yii\db\ActiveRecord;

/**
 * Class LoginAttemptBehavior
 * @package ethercreative\loginattempts
 * @property ActiveRecord $owner
 */
class LoginAttemptBehavior extends Behavior
{
    public $attempts = 5;
    public $usernameAttribute = 'username';
    public $passwordAttribute = 'password';

    public $message = 'You have exceeded the password attempts.';

    /** @var LoginAttempt */
    private $_attempt;

    public function events()
    {
        return [
            Model::EVENT_BEFORE_VALIDATE => 'beforeValidate',
            Model::EVENT_AFTER_VALIDATE => 'afterValidate',
        ];
    }

    public function beforeValidate()
    {
        if ($this->getAttempt() && $this->getAttempt()->amount > $this->attempts) {
            $this->owner->addError($this->usernameAttribute, $this->message);
        }
    }

    public function afterValidate()
    {
        if ($this->owner->hasErrors($this->passwordAttribute)) {
            $attempt = $this->getAttempt();

            if (!$attempt) {
                $attempt = new LoginAttempt;
                $attempt->key = $this->getKey();
            }

            $attempt->amount += 1;
            $attempt->save();
        }
    }

    /**
     * @return string
     */
    public function getKey()
    {
        return sha1($this->owner->{$this->usernameAttribute});
    }

    /**
     * @return LoginAttempt
     */
    public function getAttempt()
    {
        if (!isset($this->_attempt)) {
            $this->_attempt = LoginAttempt::find()
                ->where(['key' => $this->getKey()])
                ->one();
        }

        return $this->_attempt;
    }
}
