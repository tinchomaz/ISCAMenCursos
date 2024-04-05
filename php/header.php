<?php 
    //conexion base de datos
    require_once("app/Config.php");
    require_once("FunctionApp.php");
    if(Config::DISPLAY_ERROR){
        ini_set('display_errors','On');
        error_reporting(E_ALL);
    }else{
        ini_set('display_errors','Off');
    }
    $urlBaseIscamen = Config::getURLBaseApacheIscamen();
    $dbconn = pg_connect("host=".Config::SERVIDOR_DB." port=".Config::PUERTO_DB." dbname=".Config::BASE_DB." user=".Config::USUARIO_DB." password=".Config::CLAVE_DB."") or die('No se ha podido conectar: ' . pg_last_error());
    // Iniciar la sesión
    session_start();

    include "libraries/configGoogle.php";
    include "libraries/configFacebook.php";
    if (isset($_GET['logout']) && $_GET['logout'] == 1) {
        session_destroy();
        header('Location: index.php');
    }
?>
<script src="https://www.gstatic.com/firebasejs/8.6.1/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.6.1/firebase-auth.js"></script>
<script src="libraries/firebaseConfig.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function handleProfileOperations() {
        var displayName = sessionStorage.getItem('displayName');
        var email = sessionStorage.getItem('email');
        var uid = sessionStorage.getItem('uid');
        const overlayLogin = document.querySelector(".overlayLogin");
        if (displayName && email && uid) {
            $.ajax({
                url: 'php/profile.php',
                type: 'POST',
                data: {
                    displayName: displayName,
                    email: email,
                    uid: uid,
                },
                success: function(response) {
                    console.log("usuario inicio sesion");
                },
                error: function(error) {
                    console.error(error);
                }
            });
        }
    }
    function signInWithGoogle() {
    firebase.auth()
        .signInWithPopup(providerGoogle)
        .then((result) => {
            var user = result.user;
            $.ajax({
                url: 'php/profile.php',
                type: 'POST',
                data: {
                    displayName: user.displayName,
                    email: user.email,
                    uid: user.uid,
                    photo: user.photoURL
                },
                success: function(response) {
                    console.log("usuario inicio sesion");
                    window.location.href = "index.php";
                },
                error: function(error) {
                    console.error(error);
                }
            });
        }).catch((error) => {
            console.error(error);
        });
}

function signInWithFacebook() {
    firebase.auth()
        .signInWithPopup(providerFacebook)
        .then((result) => {
            var user = result.user;
            $.ajax({
                url: 'php/profile.php',
                type: 'POST',
                data: {
                    displayName: user.displayName,
                    email: user.email,
                    uid: user.uid,
                    photo: user.photoURL
                },
                success: function(response) {
                    console.log("usuario inicio sesion");
                    window.location.href = "index.php";
                },
                error: function(error) {
                    console.error(error);
                }
            });
        }).catch((error) => {
            console.error(error);
        });
}

    firebase.auth().onAuthStateChanged((user) => {
        var headerLogin = document.querySelector(".login");
        var loginMobile = document.querySelector(".loginMobile");

        var displayName = "<?php echo isset($_SESSION['displayName']) ? $_SESSION['displayName'] : '' ?>";
        var photo = "<?php echo isset($_SESSION['photo']) ? $_SESSION['photo'] : '' ?>";

        if (displayName && photo){
            headerLogin.innerHTML = `
                <div class="logued">
                    <span>`+displayName+`</span>
                    <button class="logout" onclick="cerrarSesion()">
                        Desconectar
                    </button>
                </div>
                <div class="perfil">
                    <img src="`+photo+`" referrerpolicy="no-referrer">
                </div>`;
            loginMobile.innerHTML = `
                <div class="logued">
                    <span>`+displayName+`</span>
                    <button class="logout" onclick="cerrarSesion()">
                        Desconectar
                    </button>
                </div>
                <div class="perfil">
                    <img src="`+photo+`" referrerpolicy="no-referrer">
                </div>`;
        } else{
            if (sessionStorage.getItem('redirected')) {
                sessionStorage.setItem('redirected', true);
                window.location.href = "index.php";
            }
            headerLogin.innerHTML = `
                <button class="loginBoton" onclick="mostrarLogin()">
                    Ingresar
                    <img src="imagenes/iconos/login.svg" alt="" class="iconoLogin">
                </button>
            `;
            loginMobile.innerHTML = `
                <button class="loginBoton" onclick="mostrarLogin()">
                    Ingresar
                    <img src="imagenes/iconos/login.svg" alt="" class="iconoLogin">
                </button>
            `;
            sessionStorage.removeItem('displayName');
            sessionStorage.removeItem('email');
            sessionStorage.removeItem('uid');
        }
        handleProfileOperations();
    });
    function mostrarLogin(){
        const overlayLogin = document.querySelector(".overlayLogin");
        if (overlayLogin) {
            overlayLogin.style.display = "flex";
        }
        //ocultar overlay
        document.addEventListener('click', function (event) {
            if (event.target === overlayLogin) {
                overlayLogin.style.display = 'none';
            }
        });
    }
    // Cerrar Sesion pasado 60 min
    var lastInteractionTime = new Date().getTime();

    function resetInteractionTimer() {
        lastInteractionTime = new Date().getTime();
    }
    function checkInactivity() {
        var currentTime = new Date().getTime();
        var elapsedTime = currentTime - lastInteractionTime;
        if (elapsedTime > 1800000) {
            cerrarSesion();
        }
    }
    setInterval(checkInactivity, 60000); // 60000 milisegundos = 1 minuto
    $(document).on('click keydown', function() {
        resetInteractionTimer();
    });
    $(document).ready(function() {
        resetInteractionTimer();
    });
    //----------------------------------
    function cerrarSesion(){
        firebase.auth().signOut().then(() => {
            window.location.href = "index.php?logout=1";
        }).catch((error) => {
            console.error(error);
        });
    }
</script>
<div class="headerMobile">
        <img src="imagenes/logoMobile.svg" class="logoMobile">
        <div class="loginMobile">
        </div>
</div>
<div class="header">
    <nav class="mainNavContenedor">
        <div class="logo">
            <img src="imagenes/logo.png" alt="" class="logoIsca">
        </div>
        <div class="main_nav">
            <ul class="main_nav_list">
                <li class="main_nav_item"><a href="index.php">HOME</a></li>
                <li class="main_nav_item"><a href="courses.php">CURSOS</a></li>
                <li class="main_nav_item"><a href="contact.html">CONTACTO</a></li>
            </ul>
        </div>
    </nav>
    <div class="login">
    </div>
</div>
<div class="overlayLogin">
    <div class="inicioSesion">
        <span>Ingresa con una de tus siguientes cuentas</span>
        <button class="loginGoogle" onclick="signInWithGoogle()">
            <img src="imagenes/iconos/googleLogin.svg" alt="">Ingresar con Google
        </button>
        <button class="loginFacebook" onclick="signInWithFacebook()">
            <img src="imagenes/iconos/facebookLogin.svg" alt="">Ingresar con Facebook
        </button>
    </div>
</div>