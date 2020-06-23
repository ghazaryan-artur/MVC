<div class="container mt-5">
    <div class="d-flex justify-content-between my-5">
        <h3>My friends</h3>
        <a href="/profile" class="btn btn-info">Back to profile page</a>
    </div>
    
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Image</th>
                <th scope="col">Email</th>
                <th scope="col">To his page</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($this->friends as $value) : ?>
                <tr>
                    <th class="align-middle" scope="row"><?= $value['id'] ?></th>
                    <td class="align-middle"><?= $value['name'] ?></td>
                    <td  class="align-middle"><img class="h-25" src="/public/images/users/<?= $value['image'] ?>" alt="user"></td>
                    <td class="align-middle"><?= $value['email'] ?></td>
                    <td class="align-middle"><a href="/profile/user/<?= $value['id']?>" class="btn btn-outline-success">See profile</a></td>
                </tr>   
            <?php endforeach ?>
        </tbody>
    </table>
</div>
