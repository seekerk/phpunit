<?php
/**
 * Created by PhpStorm.
 * User: kulakov
 * Date: 14.05.18
 * Time: 9:45
 */

class UserProfile
{
    private $name;
    private $email;
    private $password;

    public function printProfile(): string {
        return "<p>name: {$this->name}<br/> email: {$this->email}</p>";
    }

    public function __construct($name, $email, $password)
    {
        $this->email = $email;
        $this->name = $name;
        $this->password = $password;
    }

    public function compare($name, $password) {
        return $this->name === $name && $this->password === $password;
    }

    public function getName(): string {
        return $this->name;
    }
}
