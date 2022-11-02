<?php 

class MysqlOperations{

    protected static $db;
    protected static $errores = [];

    protected $columnDB = [];
    protected static $tabla = '';


    public static function setDB($bd)
    {
        self::$db = $bd;
    }

    public static function findAll()
    {
        $query = "SELECT * FROM ";
        $query .=  static::$tabla . " ";
        return self::$db->query($query);
    }

    public function save()
    {

        $atributos = $this->identificaColumnDB();

        echo "<pre>";
        var_dump($atributos);
        echo "</pre>";

        $str = join(",", array_keys($atributos)); 
        $str_val = join("','", array_values($atributos));

        $query = "INSERT INTO " . static::$tabla . "($str)";
        $query .= " VALUES ('$str_val')";

        echo "El query de la consulta". $query;

        echo "<pre>";
        var_dump(self::$db);
        echo "</pre>";

        return self::$db->query($query);
    }

    public static function deleteById($id){
        $query = "DELETE FROM " . static::$tabla;
        $query .= " WHERE " . static::$name_id_column . '='. $id;
        format_output($query);
        return self::$db->query($query);
    }

    public function updateById($id){

        $update_values = $this->getValuesUpdate();
        $str_val = join(",", array_values($update_values));
        $query = "UPDATE " . static::$tabla . " SET ". $str_val;
        $query .= " WHERE id=$id";
        return self::$db->query($query);
    }

    public function identificaColumnDB()
    {

        $atributos = [];

        echo "<pre>";
        var_dump($this->columnDB);
        echo "</pre>";

        foreach ($this->columnDB as $column) {
            if($this->$column == "") continue;
            if ($column === "id")  continue;
            $col = $this->$column ;
            $atributos[$column] = $col;
        }

        return $atributos;
    }

    public function getValuesUpdate(){
        $update_values = [];
        $atributos = $this->identificaColumnDB(); 

        foreach($atributos as $key => $value){
            $update_values[$key] = $key . "=" . "'" . $value . "'";
        }

        return $update_values;
    }
}
?>