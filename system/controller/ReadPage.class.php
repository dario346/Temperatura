<?php
include('AbstractPage.class.php');
include('system/util/DatabaseFunctions.class.php');

class ReadPage extends AbstractPage{
    public $templateName = 'read';
    public function execute(){
        $this->getData();
    }

    private function getData(){ 
        $method = $_GET['method'] ?? '';
        $city = $_GET['city'] ?? '';
        $date=$_GET['date'] ??'';
        switch($method){
            case 'get':
                if ($city == null) {
                    $sql = "SELECT * FROM temp where Date='$date'";
                    $result = AppCore::getDB()->sendQuery($sql);
                    return $this->data = DatabaseFunctions::convertToJSONFormat($result);
                }
                else if ($date == null) {
                    $sql = "SELECT * FROM temp WHERE City = '$city'";
                    $result = AppCore::getDB()->sendQuery($sql);
                    return $this->data = DatabaseFunctions::convertToJSONFormat($result);
                }
                else{
                    $sql = "SELECT * FROM temp WHERE City = '$city' and Date='$date'";
                    $result = AppCore::getDB()->sendQuery($sql);
                    return $this->data = DatabaseFunctions::convertToJSONFormat($result);
                }
            default:
            return $this->data ="Invalid method";
        }
    }
}