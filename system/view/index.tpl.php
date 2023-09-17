<?php 
foreach($data['linkovi'] as $key => $data){?>
    
    <div>URL: </div>
    <div><?=$data['url']?></div><br><br>
    <div>Description:</div>
    <div><?=$data['description']?></div><br><br>

<?php
}