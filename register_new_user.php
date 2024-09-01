<!DOCTYPE html>
<html>
<head>
    <title>Register New User</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <h1>Register New User</h1>
        <form action="process_new_user.php" method="post" class="form-horizontal">
            <fieldset>
                <legend>Registration Form</legend>
                <div class="form-group">
                    <label class="col-md-4 control-label" for="username">Username</label>
                    <div class="col-md-5">
                        <input id="username" name="username" type="text" placeholder="Username" class="form-control input-md" required>
                        <p class="help-block">Enter your username</p>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label" for="password">Password</label>
                    <div class="col-md-5">
                        <input id="password" name="password" type="password" placeholder="Password" class="form-control input-md" required>
                        <p class="help-block">Enter your password</p>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label" for="password-confirm">Confirm Password</label>
                    <div class="col-md-5">
                        <input id="password-confirm" name="password-confirm" type="password" placeholder="Confirm Password" class="form-control input-md" required>
                        <p class="help-block">Re-enter your password</p>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-5 col-md-offset-4">
                        <button id="submit" name="submit" class="btn btn-primary">Register</button>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
</body>
</html>
