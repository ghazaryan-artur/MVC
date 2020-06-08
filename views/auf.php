<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5 w-50">
        <h1 class="text-center my-5">Welcome to our site!</h1>
        <form action="cabinet" method="POST">
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
                <button type="submit" class="btn btn-success">Sign in</button>
                <a class="btn btn-primary" href="auf/reg">Sign up</a>
            </div>
        </form>
    </div>
</body>
</html>
