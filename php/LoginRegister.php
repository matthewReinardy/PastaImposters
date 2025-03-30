<?php

include "User.php";
$userCreated = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['CreateUser'])) {
    $user = new User($_POST['username'], $_POST['email'], password_hash($_POST['password'], PASSWORD_DEFAULT));

    if ($user->register()) {
        $userCreated = true;
    }
}

// Handle User Login
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['LoginUser'])) {
    // Validate inputs
    if (empty($_POST['login-email']) || empty($_POST['login-password'])) {
        $loginError = "Email and password are required";
    } else {
        $user = new User('', $_POST['login-email'], '');

        if ($user->login($_POST['login-password'])) {
            // Redirect to a dashboard or home page
            header("Location: HomePage.php");
            exit();
        } else {
            $loginError = "Invalid email or password";
        }
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Account - Login & Register</title>
    <link href="../css/UserStyle.css" rel="stylesheet">
</head>

<body>

    <!-- User Account Container -->
    <div class="user-account-container">
        <div class="account-tabs">
            <div class="tab-link active" onclick="openTab('login')">Login</div>
            <div class="tab-link" onclick="openTab('register')">Create Account</div>
        </div>

        <!-- Login Tab -->
        <div id="login" class="tab-content active">
            <div class="form-container">
                <h2 class="form-title">Welcome Back</h2>

                <?php if (isset($loginError)): ?>
                    <div class="error-message"><?php echo $loginError; ?></div>
                <?php endif; ?>

                <form action="LoginRegister.php" method="POST">
                    <div class="form-group">
                        <label class="form-label" for="login-email">Email</label>
                        <input type="email" name="login-email" id="login-email" class="form-input" placeholder="Enter your email address" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="login-password">Password</label>
                        <input type="password" name="login-password" id="login-password" class="form-input" placeholder="Enter your password" required>
                    </div>

                    <button type="submit" name="LoginUser" class="form-button">Login</button>
                </form>

                <div class="or-divider">
                    <span>OR</span>
                </div>

                <div class="form-footer">
                    Don't have an account? <a href="#" onclick="openTab('register')">Sign Up</a>
                </div>
            </div>
        </div>

        <!-- Register Tab -->
        <div id="register" class="tab-content">
            <div class="form-container">
                <h2 class="form-title">Create an Account</h2>

                <form action="LoginRegister.php" method="POST">
                    <div class="form-group">
                        <label class="form-label" for="register-name">Full Name</label>
                        <input type="text" name="username" id="register-name" class="form-input" placeholder="Enter your full name" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="register-email">Email Address</label>
                        <input type="email" name="email" id="register-email" class="form-input" placeholder="Enter your email address" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="register-password">Password</label>
                        <input type="password" name="password" id="register-password" class="form-input" placeholder="Create a password" required>
                    </div>

                    <button type="submit" name="CreateUser" class="form-button">Create Account</button>
                </form>

                <div class="or-divider">
                    <span>OR</span>
                </div>

                <?php if (isset($loginError)): ?>
                    <div class="error-message"><?php echo $loginError; ?></div>
                <?php endif; ?>

                <div class="form-footer">
                    Already have an account? <a href="#" onclick="openTab('login')">Login</a>
                </div>
            </div>
        </div>
    </div>

    <script>
        function openTab(tabName) {
            // Hide all tab content
            const tabContents = document.getElementsByClassName('tab-content');
            for (let i = 0; i < tabContents.length; i++) {
                tabContents[i].classList.remove('active');
            }

            // Remove active class from all tabs
            const tabLinks = document.getElementsByClassName('tab-link');
            for (let i = 0; i < tabLinks.length; i++) {
                tabLinks[i].classList.remove('active');
            }

            // Show the selected tab content and add active class to the button
            document.getElementById(tabName).classList.add('active');
            document.querySelector(`.tab-link[onclick="openTab('${tabName}')"]`).classList.add('active');
        }
    </script>
</body>

</html>