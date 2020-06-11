<div class="container mt-5">
    <div class="text-center">
    <h1 class="m-auto">Registration</h1>
    <p>Please, write information about you, in this textareas. <br>It does not take much time</p>

    <form action="/auth/reg" method="POST">
        <div class="form container">
                <div class="col-4 mx-auto my-3">
                    <input type="text" class="form-control" placeholder="Name"  name="name" pattern="[A-Za-z][a-z]{1,16}" maxlength="17" >
                    <div style="height:20px; color: red;">
                        <span style="height:100%"><?php if(isset($this->errors['name'])) echo $this->errors['email']; ?></span>
                    </div>
                </div>
                <div class="col-4 mx-auto my-3">
                    <input  type="email" class="form-control"  placeholder="Email"  name="email"  maxlength="30">
                    <div style="height:20px; color: red;">
                        <span style="height:100%"> <?php if(isset($this->errors['email'])) echo $this->errors['email']; ?></span>
                    </div>
                </div>
                <div class="col-4 mx-auto my-3">
                    <input type="password" name="password" class="form-control" placeholder="Password">
                    <div style="height:20px; color: red;">
                        <span style="height:100%"> <?php if(isset($this->errors['password'])) echo $this->errors['password']; ?></span>
                    </div>
                </div>
                <div class="col-4 mx-auto my-3">
                    <input type="password" name="conf_password" class="form-control" placeholder="Confirm password">
                </div>
                <div class="col-4 mx-auto my-3">
                    <input name="image" type="file" class="form-control">
                    <div style="height:20px; color: red;">
                        <span style="height:100%"> <?php if(isset($this->errors['image'])) echo $this->errors['image']; ?></span>
                    </div>
                </div>
        </div>
        <div>
            <a href="/" class="btn btn-secondary">Back to login</a>
            <input type="submit" class="btn btn-success" value="Submit">
        </div>
    </form>
</div>
</div>