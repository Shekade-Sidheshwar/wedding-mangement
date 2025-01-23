<?php
   include('../action.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Log In Form</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
    <style>
        @keyframes float {
            0% {
                transform: translateY(0);
                opacity: 2;
            }
            100% {
                transform: translateY(-100vh);
                opacity: 0;
            }
        }

        .heart,
        .emoji1 {
            position: fixed;
            bottom: -50px;
            font-size: 30px;
            animation: float 5s infinite;
        }

        .heart {
            color: darkred;
        }

        .emoji1 {
            color: blue;
        }
    </style>

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
    </head>

<body>

    <div class="main">
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <form method="POST" id="signup-form" class="signup-form">
                        <h2 class="form-title">LOG IN NOW</h2>
                        <div class="form-group">
                            <input type="text" class="form-input" name="name" id="name" placeholder="Your Name" required />
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-input" name="psw" id="password" placeholder="Password" required />
                            <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>
                        </div>
                        <div class="form-group">
                            <input type="submit" style='cursor: pointer;' name="login" id="submit" class="form-submit" value="Login Now" />
                        </div>
                    </form>
                    <p class="loginhere">
                        Have Not an account ? <a href="signup.php" class="loginhere-link ">Sign Up Here</a>
                    </p>
                </div>
            </div>
        </section>
    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
    <script>
        function createHeart() {
            // Create heart element
            const heart = document.createElement('div');
            heart.classList.add('heart');
            heart.innerText = '❤️';

            heart.style.left = Math.random() * 100 + 'vw';
            heart.style.animationDuration = Math.random() * 2 + 3 + 's';

            document.body.appendChild(heart);

            // Create emoji1 element
            const emoji1 = document.createElement('div');
            emoji1.classList.add('emoji1');
            emoji1.innerText = '❤️';

            emoji1.style.left = Math.random() * 100 + 'vw';
            emoji1.style.animationDuration = Math.random() * 2 + 3 + 's';

            document.body.appendChild(emoji1);

            
            // Remove elements after animation
            setTimeout(() => {
                heart.remove();
                emoji1.remove();
            },6000);
        }

        setInterval(createHeart, 300);
    </script>
</body>

</html>
