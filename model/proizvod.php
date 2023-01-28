<?php

class Proizvod{
    public $id;
    public $naziv;
    public $cat_ID;


public function __construct($id = null, $naziv=null, $cat_ID = null){
    $this->id = $id;
    $this->naziv = $naziv;
    $this->cat_ID = $password;
}
public static function getAll(mysqli $conn)
    {
        $q = "SELECT * FROM proizvod";
        return $conn->query($q);
    }
    public static function deleteById($id, mysqli $conn)
    {
        $q = "DELETE FROM proizvod WHERE id=$id";
        return $conn->query($q);
    }

    public static function add($naziv, $cat_ID, mysqli $conn)
    {

        $q = "INSERT INTO proizvod(id, naziv, cat_ID) values(NULL,'$naziv', '$cat_ID')";
        return $conn->query($q);
    }


    public static function update($id, $naziv, $cat_ID, mysqli $conn)
    {
        $q = "UPDATE proizvod set naziv='$naziv', cat_ID='$cat_ID' where id=$id";
        return $conn->query($q);
    }

    public static function getById($id, mysqli $conn)
    {
        $q = "SELECT * FROM proizvod WHERE id=$id";
        $myArray = array();
        if ($result = $conn->query($q)) {

            while ($row = $result->fetch_array(1)) {
                $myArray[] = $row;
            }
        }
        return $myArray;
    }

    public static function getLast(mysqli $conn)
    {
        $q = "SELECT * FROM proizvod ORDER BY id DESC LIMIT 1";
        return $conn->query($q);
    }
}
?>