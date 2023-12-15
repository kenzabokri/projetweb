<?php
class config
{
    private static $pdo = null;

    public static function getConnexion()
    {
        if (!isset(self::$pdo)) {
            try {
                // Set max_allowed_packet value to a larger size (e.g., 64M) directly in the DSN
                self::$pdo = new PDO(
                    'mysql:host=localhost;dbname=user_management;charset=utf8mb4;max_allowed_packet=64M',
                    'root',
                    '',
                    [
                        PDO::ATTR_PERSISTENT => true,
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    ]
                );
                //echo "connected successfully";
            } catch (Exception $e) {
                die('Erreur: ' . $e->getMessage());
            }
        }

        return self::$pdo;
    }
}


?>
