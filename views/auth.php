    <div class="container mt-5 w-50">
        <h1 class="text-center my-5">Welcome to our site!</h1>
        <form action="auth/login" method="POST">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" name="email" id="email"  placeholder="Please enter your email">
                <small class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Password">
            </div>
            <div>
                <input type="submit" class="btn btn-success" value="Sign in">
                <a class="btn btn-primary" href="auth/reg">Sign up</a>
            </div>
        </form>
    </div>
