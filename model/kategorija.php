<?php

class Kategorija{
    public $id;
    public $naziv;


public function __construct($id = null, $naziv=null){
    $this->id = $id;
    $this->naziv = $naziv;
}
public static function getAll(mysqli $conn)
    {
        $q = "SELECT * FROM kategorije";
        return $conn->query($q);
    }
    public static function deleteById($id, mysqli $conn)
    {
        $q = "DELETE FROM kategorije WHERE id=$id";
        return $conn->query($q);
    }

    public static function add($naziv, mysqli $conn)
    {

        $q = "INSERT INTO kategorije(naziv) values('$naziv')";
        return $conn->query($q);
    }


    public static function update($id, $naziv, mysqli $conn)
    {
        $q = "UPDATE kategorije set naziv='$naziv', where id=$id";
        return $conn->query($q);
    }

    public static function getById($id, mysqli $conn)
    {
        $q = "SELECT * FROM kategorije WHERE id=$id";
        $myArray;
        if ($result = $conn->query($q)) {

            while ($row = $result->fetch_array(1)) {
                $myArray = $row;
            }
        }
        return $myArray;
    }
   
    public static function getLast(mysqli $conn)
    {
        $q = "SELECT * FROM kategorije ORDER BY id DESC LIMIT 1";
        return $conn->query($q);
    }
}
?>