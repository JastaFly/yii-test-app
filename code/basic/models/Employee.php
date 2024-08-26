<?php

namespace app\models;

use webvimark\modules\UserManagement\models\User;

class Employee extends User
{
    public $attestation_date;
    public $username;
    public $status;
    public $email_confirmed;
    public $bind_to_ip;

    public function __construct($username)
    {
        $this->username = $username;
    }

    public static function tableName(): string
    {
        return 'employee';
    }
}
