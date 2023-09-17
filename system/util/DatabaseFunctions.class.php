<?php
class DatabaseFunctions{
    public static function convertToJSONFormat($data){
        $counter = 0;
        $empty_array = "[]";
        $array = array();
            while($row = mysqli_fetch_assoc($data)){
                $array[] = $row;
                $counter++;
            }

            if($counter > 0){
                return json_encode($array, JSON_PRETTY_PRINT);
            }

        else return $empty_array;
    }

    public static function checkCityandDate($city,$date){
        $sql = "SELECT * FROM `temp` WHERE `city` = '$city' AND `date` = '$date'";  
        $result = AppCore::getDB()->sendQuery($sql);
        if(MySQLIDatabase::numberOfRows($result) == 0){
            return false;
        }
        else 
        return true; 
    }
}