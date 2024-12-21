<?php
class connection {
        	// Implement of Singleton
    private static $instance = null;
    public function __construct()
    {
        try {
            self::$instance = new PDO('mysql:host=localhost;dbname=Notes_App','root', '');
            self::$instance->exec("SET CHARACTER SET utf8");
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage();
            die();
        }           
        
    }
    public static function singleton()
    {
        if (!isset(self::$instance)) {
            $miclase = __CLASS__;
            self::$instance = new $miclase;
        }
        return self::$instance;
    }
}   