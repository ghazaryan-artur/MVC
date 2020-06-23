<?php 
var_dump($this->data);
?>
<div class="container">
    <div class="w-50 border border-info mx-auto chat">

        <?php foreach($this->data as $value) : ?>
           
            <div class="message border border-warning d-flex justify-content-between <?php if($value['from_id'] == $_SESSION['user_id']) echo "flex-row-reverse"?>">
                <div class="w-25"><img class="h-100 rounded-circle" src="/public/images/users/<?= $value['image'] ?>" alt=""></div>
                <div class="w-75"><p class="align-middle h-100"><?= $value['body'] ?></p></div>
            </div>
        <?php endforeach ?>
        <div class="sendField border border-info w-100">
            <div class="w-25 h-100 float-right border border-success">Send</div>
        </div>
    </div>

</div>
