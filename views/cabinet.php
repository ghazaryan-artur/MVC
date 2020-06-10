<div class="container border border-info mt-5 d-flex justify-content-between">
    <div>
        <h3 class="my-3">Your cabinet</h3>  
        <p>Your name is <?= $this->user_data['name'] ?></p>
        <p>Your email is <?= $this->user_data['email'] ?></p>
    </div>
    <div class="w-25 p-2">
        <img class="w-100" src="/images/users/<?= $this->user_data['image'] ?>" alt="Avatar">
    </div>
    
</div>
