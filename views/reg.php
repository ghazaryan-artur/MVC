<div class="container mt-5">
    <div class="text-center">
    <h1 class="m-auto">Registration</h1>
    <p>Please, write information about you, in this textareas. <br>It does not take much time</p>

    <form action="/auf" method="POST">
        <div class="form container">
                <div class="col-4 mx-auto my-3">
                    <input type="text" class="form-control" placeholder="First name"  name="first_name" pattern="[A-Za-z][a-z]{1,16}" maxlength="17" >
                </div>
                <div class="col-4 mx-auto my-3">
                    <input  type="text" class="form-control" placeholder="Last name"  name="last_name"  pattern="[A-Za-z][a-z]{1,16}"  maxlength="17">
                </div>
                <div class="col-4 mx-auto my-3">
                    <input type="text" class="form-control" placeholder="Login"  name="login"  minlength="3" maxlength="17">
                </div>
                <div class="col-4 mx-auto my-3">
                    <input  type="email" class="form-control"  placeholder="Email"  name="email" pattern="[A-Za-z0-9]{2,20}[@]{1}[a-z]{2,8}.[a-z]{2,3}" maxlength="30">
                </div>
                <div class="col-4 mx-auto my-3">
                    <input  type="tel" class="form-control" placeholder="Phone number"  pattern="[0-9]{5,10}"  name="phone" id="phone">
                </div>
                <div class="col-4 mx-auto my-3">
                    <input type="password" name="password" class="form-control" placeholder="Password"  minlength="8" maxlength="17">
                </div>
        </div>
        <div>
            <a href="/auf" class="btn btn-secondary">Back to login</a>
            <button type="submit" class="btn btn-success">Submit</button>
        </div>
    </form>
</div>
</div>