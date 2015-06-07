<?php
    foreach($data as $key=>$value){?>
        <div data-<?=$key?>="<?=json_encode($value)?>"></div>
    <?php
    }
?>