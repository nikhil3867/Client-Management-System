<?php 
$whitelist = array(
    '127.0.0.1',
    '::1'
);

if(in_array($_SERVER['REMOTE_ADDR'], $whitelist)){
    // DB credentials.
    define('DB_HOST','localhost');
    define('DB_USER','root');
    define('DB_PASS','');
    define('DB_NAME','library');
    define('DB_PORT','');
}
else{
    define('DB_HOST',getenv("MYSQLHOST"));
    define('DB_USER',getenv("MYSQLUSER"));
    define('DB_PASS',getenv("MYSQLPASSWORD"));
    define('DB_NAME',getenv("MYSQLDATABASE"));
    define('DB_PORT',getenv("MYSQLPORT"));
}
    // Establish database connection.
    try
    {
        $dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME.";port=".DB_PORT,DB_USER, DB_PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
    }
    catch (PDOException $e)
    {
        exit("Error: " . $e->getMessage());
    }
?>
