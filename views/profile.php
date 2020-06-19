<div class="container  mt-5 d-flex justify-content-end">
    <a href="/auth/logout" class="btn btn-danger btn-lg">Logout</a>
</div>
<div class="container border border-info mt-5 d-flex justify-content-between">
    <div>
        <h3 class="my-3">Profile information</h3>  
        <p>Your name is <?= $this->name ?></p>
        <p>Your email is <?= $this->email ?></p>
    </div>
    <div class="w-25 p-2">
        <img class="w-100" src="/public/images/users/<?= $this->img?>" alt="Avatar">
        <form action="/profile/upg_img/<?= $_SESSION['user_id'] ?>/<?= $this->img ?>" method="POST" enctype="multipart/form-data">
            <input class="mt-2" name="img" class="form-control" type="file">
            <div style="height:30px; color: red;">
                <?= helpers\FlashHelper::get_flash_message(['imgError', 'xxx', 'yyy', 'gggdg'], $_SESSION) ?>
            </div>
            <input type="submit" value="Upgrade" class="form-control">
        </form>
    </div>
</div>