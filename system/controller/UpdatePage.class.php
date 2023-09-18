<?php
include('AbstractPage.class.php');
include('system/util/DatabaseFunctions.class.php');

class UpdatePage extends AbstractPage{
    public $templateName = 'update';
    public function execute(){
        $this->updateData();
    }

    private function updateData(){
        $method = $_GET['method'] ?? '';
        $city = $_GET['city'] ?? '';
        $date=$_GET['date'] ??'';
        $temperature=$_GET['temperature'] ??'';
        switch($method){
            case 'patch':
                if ($city == null || $date == null ||$temperature == null)
                {return $this->data="One of parametars was not defined";}
                else if(DatabaseFunctions::checkCityandDate($city, $date) == false){
                    return $this->data = "Recrod for $city does not exits for date: $date";
                }
                else
                {
                    $sql = "UPDATE temp SET temperature='$temperature' WHERE city='$city' AND date='$date';";
                    AppCore::getDB()->sendQuery($sql);
                    return $this->data="Recrod for $city for date: $date had its temperature updated to: $temperature";

                }
            default:
            return $this->data ="Invalid method";
        }
    }
}