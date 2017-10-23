Yii2 Login Attempts Behavior
========================

Store login failures, and disable after multiple failures.

Installation
------------
The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run
```sh
composer require ethercreative/yii2-login-attempts-behavior
```
or add
```json
"ethercreative/yii2-login-attempts-behavior": "*"
```
to the require section of your `composer.json` file.

Usage
=====
Run the following migration

    php yii migrate --migrationPath="@app/vendor/ethercreative/yii2-login-attempts-behavior/src/migrations"  --interactive=0

Add the behavior to your login model.

```php
public function behaviors()
{
    $behaviors = parent::behaviors();

    $behaviors[] = [
        'class' => '\ethercreative\loginattempts\LoginAttemptBehavior'],

        // Amount of attempts in the given time period
        'attempts' => 3,

        // the duration, in seconds, for a regular failure to be stored for
        // resets on new failure
        'duration' => 300,

        // the duration, in seconds, to disable login after exceeding `attemps`
        'disableDuration' => 900,

        // 
        'usernameAttribute' => 'email',
        'passwordAttribute'
        'message'
    ];

    return $behaviors;
}
```

Todo
====

- [ ] Add cache storage
- [ ] Add better DB support
- [ ] Add option for IP (other?) instead of key
- [ ] Add failure delay option
- [ ] More customisable
