<div class="container  mt-5 d-flex justify-content-end">
    <?php if($this->id == $_SESSION['user_id']) : ?>
        <a href="/auth/logout" class="btn btn-danger btn-lg">Logout</a>
    <?php else : ?>
        <a href="/profile" class="btn btn-info btn-lg">To my page</a>
    <?php endif ?>
</div>
<div class="container border border-info mt-5 d-flex justify-content-between">
    <div>
        <h3 class="my-3">Profile information</h3>  
        <p>Your name is <?= $this->name ?></p>
        <p class="mb-5">Your email is <?= $this->email ?></p>
        <a href="/profile/friends" class="btn btn-info w-100 mt-5">Friends list</a>
            
    </div>
    <div class="w-25 p-2">
        <img class="w-100" src="/public/images/users/<?= $this->img?>" alt="Avatar">
        <?php if($this->id == $_SESSION['user_id']) : ?>
            <form action="/profile/upg_img" method="POST" enctype="multipart/form-data">
                <input class="mt-2" name="img" class="form-control" type="file">
                <div style="height:30px; color: red;">
                    <?=  helpers\FlashHelper::get_flash_message($_SESSION, ['error', 'img', 'thirdLevel']) ?>
                </div>
                <input type="submit" value="Upgrade" class="form-control">
            </form>
        <?php else : ?>
            <a href="/chat/conversation/<?= $this->id ?>/" class="btn btn-info btn-lg mt-5">Come to chat</a>
        <?php endif ?>
        
    </div>
</div>