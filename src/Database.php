<?php


class Database
{

    public static $conn;

    public static function connect()
    {
        $config = json_decode(
            file_get_contents(__DIR__."/../config/dbconfig.php")
        );

        $dsn = "mysql:host=".$config->host.";dbname=".$config->database;

        self::$conn = new PDO($dsn,$config->user,$config->pass);
    }

    public static function getArray($object)
    {
        $array = get_object_vars($object);
        unset($array["id"]);
        return $array;
    }

    public static function renderQuery($object)
    {
        $array = self::getArray($object);
        $start = "INSERT INTO ".$object::table." (";
        $keys = implode(",",array_keys($array));
        $end = ") VALUES (".str_repeat("?,",count($array)-1)."?)";
        return $start.$keys.$end;
    }

    public static function save($object)
    {
        $sql = self::renderQuery($object);
        $stmt = self::$conn->prepare($sql);
        return $stmt->execute(array_values(
            self::getArray($object)
        ));
    }



//    public static function renderQuery($object)
//    {
//        $array = self::getArray($object);
//        $start = "INSERT INTO ".$object::table." (";
//        $keys = implode(",",array_keys($array));
//        $end = ") VALUES (".str_repeat("?,",count($array)-1)."?)";
//        return $start.$keys.$end;
//    }
//
//    public static function save($object)
//    {
//        $sql = self::renderQuery($object);
//        $stmt = self::$conn->prepare($sql);
//        return $stmt->execute(array_values(
//            self::getArray($object)
//        ));
//    }
//
//    public static function selectAll($nameOfClass,$type = PDO::FETCH_ASSOC)
//    {
//        $sth = self::$conn->query("SELECT * FROM ".$nameOfClass::table);
//        return $sth->fetchAll($type);
//    }
//
//    public static function delete($name,$id)
//    {
//        $sth = self::$conn
//                ->prepare("DELETE FROM ".$name::table
//            ." WHERE id=:id");
//        return $sth->execute(['id'=>$id]);
//    }

}