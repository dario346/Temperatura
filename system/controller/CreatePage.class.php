<?php
include('AbstractPage.class.php');
include('system/util/DatabaseFunctions.class.php');

class CreatePage extends AbstractPage{
    public $templateName = 'create';
    public function execute(){
        $this->createData();
    }

    private function createData(){
        $method = $_GET['method'] ?? '';
        $city = $_GET['city'] ?? '';
        $date=$_GET['date'] ??'';
        $temperature=$_GET['temperature'] ??'';
        switch($method){
            case 'post':
                if ($city == null || $date == null ||$temperature == null)
                {return $this->data="One of parametars was not defined";}
                else if(DatabaseFunctions::checkCityandDate($city, $date) == true){
                    return $this->data = "Recrod for $city already exitst for date: $date";
                }
                else
                {
                    $sql = "INSERT INTO `temp` (`id`, `city`, `temperature`, `date`) VALUES (NULL, '$city', '$temperature', '$date');";
                    AppCore::getDB()->sendQuery($sql);
                    return $this->data="Recrod for $city inserted to database for date: $date";

                }
            default:
            return $this->data ="Invalid method";
        }
    }
}