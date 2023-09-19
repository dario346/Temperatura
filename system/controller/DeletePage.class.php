<?php
include('AbstractPage.class.php');
include('system/util/DatabaseFunctions.class.php');

class DeletePage extends AbstractPage{
    public $templateName = 'delete';
    public function execute(){
        $this->DeleteData();
    }

    private function DeleteData(){
        $method = $_GET['method'] ?? '';
        $city = $_GET['city'] ?? '';
        $date=$_GET['date'] ??'';
        switch($method){
            case 'delete':
                if($date!=null&&$city!=null){
                    $sql = "DELETE FROM temp where city='$city' AND date='$date'";
                    $result = AppCore::getDB()->sendQuery($sql);
                    $row = AppCore::getDB()->MySQLi->affected_rows;
                    if($row>0){
                        return $this->data = "Temperature was deleted for $city on $date";
                    }
                    else{
                        return $this->data = "No record found for $city on $date";
                    }
                }
                if ($date == null) {
                    $sql = "DELETE FROM temp where city='$city'";
                    $result = AppCore::getDB()->sendQuery($sql);
                    $row = AppCore::getDB()->MySQLi->affected_rows;
                    if($row>0){
                        return $this->data = "Temperatures were deleted for $city";
                    }
                    else{
                        return $this->data = "No record was found for city $city";
                    }
                }
                else if ($city == null) {
                    $sql = "DELETE FROM temp where date='$date'";
                    $result = AppCore::getDB()->sendQuery($sql);
                    $row = AppCore::getDB()->MySQLi->affected_rows;
                    if($row>0){
                        return $this->data = "Temperatures were deleted for $date";
                    }
                    else{
                        return $this->data = "No record was found for date $city";
                    }
                }
                else if ($city==null && $date==null){
                    return $this->data = "Missing parametars";
                }
            default:
            return $this->data ="Invalid method";
        }
    }
}