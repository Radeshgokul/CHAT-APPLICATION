<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="css/signin.css">
</head>
<body>
    <div class="signin-form">
        <form action="signin_user.php" method="post">
            <div class="form-header">
                <h1>Sing in</h1>
                <p>Login In My Chat</p>
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="email" class="form-control" name="email" placeholder="Email Address" Autocomplete="off" required>
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input type="password" class="form-control" name="pass" placeholder="Password" Autocomplete="off" required>
            </div>
            <div class="small">Forgot password?<a href="forgot_pass.php">click hear</a></div>
            <div class="form-group">
                <button type="submit" class="btn-btn-primary btn-block btn-lg" name="sing_in">Sing in</button>
            </div>
            <?php include("signin_user.php"); ?>
            <div class="text-center small" style="color:red;">Dont havent account? <a href="signup.php">Create one</a></div>
        </form>
    </div>
</body>
</html>