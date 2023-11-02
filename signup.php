<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Website</title>
   
    <link rel = "stylesheet" href=./css/style.css>
    <!--Icon Scout cdn for icons like the three lines or unicons-->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <!--this is from google fonts-->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,500;0,600;1,800&display=swap" rel="stylesheet">
</head>
<body>


<section class="form_section">
    <div class="container form_section-container">
        <h2>Join TheBlogProject</h2>
        <div class="alert_message success">
            <p>This is a error message</p>
        </div>
        <form action="" enctype="multipart/form-data" >
            <input type="text" placeholder="First name">
            <input type="text" placeholder="Last name">
            <input type="text" placeholder="User name">
            <input type="email" placeholder="Email">
            <input type="password" placeholder="Create Password">
            <input type="password" placeholder="Confirm Password">
        
            <div class="form_control">
                <label for="avatar">User Avatar</label>
                <input type="file" id="avatar">
            </div>
            <div class="signup_bar">
                <button type="submit" class="btn">Sign Up</button>
            <small>Already have an Account? <a href="signin.php">Sign In!</a></small>
                
            </div>
         </form>
    </div>
</section>


</body>
</html>