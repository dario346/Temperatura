<?php
include('AbstractPage.class.php');
class IndexPage extends AbstractPage{
    public $templateName = 'index';
   
    public function execute(){
        $sql = "SELECT * FROM linkovi";
        $result = AppCore::getDB()->sendQuery($sql);
        $linkovi=[];

        while($row = AppCore::getDB()->fetchArray($result)){
            $linkovi[$row['id']] = $row;
        }
        
        $this->data = ['linkovi' => $linkovi];
    }
}