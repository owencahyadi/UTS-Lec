<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/icon?family=Material+Icons'>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg sticky-top  bg-dark bg-body-tertiary" data-bs-theme="dark">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                <a class="navbar-brand" href="#title"><img src="img/logo1.png" class="leblanc" alt="Leblanc Logo"></a>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="menu.php">Menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#title">About Us</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="cotn_principal">
        <div class="cont_centrar">
            <div class="cont_login">
                <div class="cont_info_log_sign_up">
                    <div class="col_md_login">
                        <div class="cont_ba_opcitiy">
                            <h2>LOGIN</h2>  
                            <p>If you hungry.</p> 
                            <button class="btn_login" onclick="cambiar_login()">LOGIN</button>
                        </div>
                    </div>
                    <div class="col_md_sign_up">
                        <div class="cont_ba_opcitiy">
                            <h2>SIGN UP</h2>
                            <p>If you don't have account.</p>
                            <button class="btn_sign_up" onclick="cambiar_sign_up()">SIGN UP</button>
                        </div>
                    </div>
                </div>
                <div class="cont_back_info">
                    <div class="cont_img_back_grey">
                        <img src="img/gambarLogin.avif" alt="" />
                    </div>
                </div>
                <div class="cont_forms" >
                    <div class="cont_img_back_">
                        <img src="img/gambarLogin.avif" alt="" />
                    </div>
                    <div class="cont_form_login">
                        <a href="#" onclick="ocultar_login_sign_up()" ><i class="material-icons">&#xE5C4;</i></a>
                        <form action="login_process.php" method="post">
                            <h2 class="login">LOGIN</h2>
                            <input class="loginInput" type="text" name="username" placeholder="Username" />
                            <input  class="loginInput" type="password" name="password" placeholder="Password" />
                            <button type="submit" class="btn_login" onclick="cambiar_login()">LOGIN</button>
                        </form>
                    </div>
                    <div class="cont_form_sign_up">
                        <a href="#" onclick="ocultar_login_sign_up()"><i class="material-icons">&#xE5C4;</i></a>
                        <form action="signup_process.php" method="post">
                            <h2 class="signup">SIGN UP</h2>
                            <input class="signupInput" type="text" placeholder="User" />
                            <input class="signupInput" type="password" placeholder="Password" />
                            <input class="signupInput" type="password" placeholder="Confirm Password" />
                            <button class="btn_sign_up" onclick="cambiar_sign_up()">SIGN UP</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="js/login.js"></script>

</body>
</html>