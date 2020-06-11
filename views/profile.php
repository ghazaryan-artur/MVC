<div class="container  mt-5 d-flex justify-content-end">
    <a href="/profile/logout" class="btn btn-danger btn-lg">Logout</a>
</div>
<div class="container border border-info mt-5 d-flex justify-content-between">
    <div>
        <h3 class="my-3">Profile information</h3>  
        <p>Your name is <?= $this->name ?></p>
        <p>Your email is <?= $this->email ?></p>
    </div>
    <div class="w-25 p-2">
        <img class="w-100" src="/public/images/<?= $this->img ?>" alt="Avatar">
    </div>
    
</div>
