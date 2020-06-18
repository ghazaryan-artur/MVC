<div class="container mt-5 w-50">
    <h1 class="text-center my-5">Welcome to our site!</h1>
    <div style="height:40px;color:green; text-align:center;">
        <h3><?=  helpers\FlashHelper::get_flash_message('reg') ?></h3>
    </div>
    <form action="" method="POST">
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" name="email" id="email"  placeholder="Please enter your email">
            <small class="form-text text-muted">We'll never share your email with anyone else.</small>
            <div style="height:30px; color: red;">
                <?= $this->emailErr ?>
            </div>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Password">
        </div>
        <div style="height:30px; color: red;">
            <?= $this->passErr ?>
            <?= $this->matching ?>
        </div>
        <div>
            <input type="submit" class="btn btn-success w-25" value="Sign in">
            <a class="btn btn-primary w-25" href="auth/reg">Sign up</a>
        </div>
    </form>
</div>

