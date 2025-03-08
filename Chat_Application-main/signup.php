<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>create new account</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    
    
    <link rel="stylesheet" href="css/signup.css">
</head>
<body>
    <div class="signup-form">
    
        <form action="signup_user.php" method="post">
            <div class="form-header">
                <h1>Sing in</h1>
                <p>fill this form</p>
            </div>
            <div class="form-group">
                <label for="">Username</label>
                <input type="text" class="form-control" name="user_name" placeholder="Your name" Autocomplete="off" >
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input type="password" class="form-control" name="user_pass" placeholder="Password" Autocomplete="off">
            </div>
            <div class="form-group">
                <label for="">Email Address</label>
                <input type="email" class="form-control" name="user_email" placeholder="Email Address" Autocomplete="off" required>
            </div>
            
            <div class="form-group">
                <label for="">Location</label>
                <select name="user_location" class="form-control">
                <option value="" disabled="">Select a location</option>
                <option value="ampara">India</option>
                <option value="anuradapuraya">Uk</option>
                <option value="badulla">France</option>
                <option value="batticaloa">Japan</option>
                <option value="colombo">China</option>
                <option value="galle">US</option>
                </select>
            </div>

            <div class="form-group">
                <label for="">Gender</label>
                <select name="user_gender" class="form-control">
                <option value="" disabled="">Select a gender</option>
                <option value="male">male</option>
                <option value="female">female</option>
                <option value="other">other</option>
                </select>
            </div>
            <div class="form-group">
                <label for=""class="checkbox-inline"><input type="checkbox" required>I accept the <a href="">Torms of use</a>&amp; <a href="">privice policy</a></label>
            </div>
            
            <div class="form-group">
                <button type="submit" class="btn-btn-primary btn-block btn-lg" name="signup">Sing up</button>
            </div>
            <?php include("signup_user.php"); ?> 
            <div class="text-center small" style="color:red;">Allrady have an account <a href="signin.php">sign in hear</a></div>
        </form>
    </div>
</body>
</html>