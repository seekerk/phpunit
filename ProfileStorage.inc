<?php
/**
 * Created by PhpStorm.
 * User: kulakov
 * Date: 14.05.18
 * Time: 9:49
 */

require_once 'UserProfile.inc';

class ProfileStorage
{
    private  static $instance = null;

    static function getInstance(): ProfileStorage {
        if (self::$instance == null) {
            self::$instance = new ProfileStorage();
        }

        return self::$instance;
    }

    /*
     * Disable public constructor
     */
    private function __construct()
    {
    }

    public function checkLogin(string $name, string $pass) {
        $profiles = $this->getProfiles();
        foreach ($profiles as $profile) {
            if ($profile->compare($name, $pass))
                return $profile;
        }

        return null;
    }

    protected function getProfiles(): array {
        $ret = [];

        for ($i = 0; $i < 10; $i++) {
            $profile = new UserProfile("name$i", "name$i@localhost", "pass$i");
            $ret[] = $profile;
        }

        return $ret;
    }

    public function getProfile(string $name) {
        $profiles = $this->getProfiles();
        foreach ($profiles as $profile) {
            if ($profile->getName() === $name)
                return $profile;
        }

        return null;
    }
}