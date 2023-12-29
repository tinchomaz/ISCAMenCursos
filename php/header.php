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
    //-------------------
    session_start();
    include "libraries/configGoogle.php";
    include "libraries/configFacebook.php";
    if (isset($_GET['logout']) && $_GET['logout'] == 1) {
        session_destroy();
        header('Location: index.php');
    }
    /*if (isset($_SESSION['uid'])) {
            $nombre = $_SESSION['displayName'];
            $email = $_SESSION['email'];
            $uid = $_SESSION['uid'];
            echo '<p>Clave: ' . $uid . '</p>';
            echo '<p>nombre: ' . $nombre . '</p>';
            echo '<p>email: ' . $email . '</p>';
        } else {
            echo "no entre";
    }*/
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
                    uid: uid
                },
                success: function(response) {
                    console.log(response);
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
                sessionStorage.setItem('displayName', user.displayName);
                sessionStorage.setItem('email', user.email);
                sessionStorage.setItem('uid', user.uid);
            }).catch((error) => {
                console.error(error);
            });
    }
    function signInWithFacebook() {
        firebase.auth()
            .signInWithPopup(providerFacebook)
            .then((result) => {
                var user = result.user;
                sessionStorage.setItem('displayName', user.displayName);
                sessionStorage.setItem('email', user.email);
                sessionStorage.setItem('uid', user.uid);
            }).catch((error) => {
                console.error(error);
            });
    }
    // Esta función comprueba si la página ya se recargó una vez
    function checkReload() {
        if (!localStorage.getItem('reloaded')) {
            localStorage.setItem('reloaded', 'true'); // Marcamos la página como recargada
            return true; // Recargar la página
        } else {
            localStorage.removeItem('reloaded'); // Limpiamos el indicador
            return false; // No recargar la página
        }
    }
    firebase.auth().onAuthStateChanged((user) => {
        var headerLogin = document.querySelector(".header.login");
        var loginMobile = document.querySelector(".loginMobile");
        var recargarPagina = false;
        if (user){
            headerLogin.innerHTML = `
                <button class="loginBoton" onclick="cerrarSesion()">
                    Desconectar
                    <img src="imagenes/login.svg" alt="" class="iconoLogin">
                </button>`;
            loginMobile.innerHTML = `
                <button class="loginBoton" onclick="cerrarSesion()">
                    Desconectar
                    <img src="imagenes/login.svg" alt="" class="iconoLogin">
                </button>`;
            sessionStorage.setItem('displayName', user.displayName);
            sessionStorage.setItem('email', user.email);
            sessionStorage.setItem('uid', user.uid);
            // Llamamos a la función para comprobar si se debe recargar la página
            if (checkReload() && user) {
                location.reload(); // Recargar la página una vez
            }
        } else {
            headerLogin.innerHTML = `
                <button class="loginBoton" onclick="mostrarLogin()">
                    INGRESAR
                    <img src="imagenes/login.svg" alt="" class="iconoLogin">
                </button>
            `;
            loginMobile.innerHTML = `
                <button class="loginBoton" onclick="mostrarLogin()">
                    INGRESAR
                    <img src="imagenes/login.svg" alt="" class="iconoLogin">
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
    function mostrarPerfil(){
            window.location.href = "php/profile.php";
    }
    function cerrarSesion(){
        firebase.auth().signOut().then(() => {
            window.location.href = "index.php?logout=1";
        }).catch((error) => {
            console.error(error);
        });
    }
    //Ocultar o mostrar Menu
    $(document).ready(function() {
        $("#menuButton").click(function() {
        $(".mainNavContenedor").toggleClass("active");
        });
        $(document).on("click", function(event) {
            if (!$(event.target).closest(".header").length) {
                $(".mainNavContenedor").removeClass("active");
            }
        });
    });
</script>
<div class="headerMobile">
        <img src="imagenes/logoMobile.svg" class="logoMobile">
        <div class="loginMobile">
        </div>
</div>
<div class="header">
    <div class="logo">
        <img src="imagenes/logo.png" alt="" class="logoIsca">
    </div>
    <div class="menuButtonHome">
        <button id="menuButton" class="menuButton">MENU</button>
    </div>
    <nav class="mainNavContenedor">
        <div class="main_nav">
            <ul class="main_nav_list">
                <li class="main_nav_item"><a href="index.php">HOME</a></li>
                <li class="main_nav_item"><a href="courses.php">CURSOS</a></li>
                <li class="main_nav_item"><a href="contact.html">CONTACTO</a></li>
            </ul>
        </div>
    </nav>
</div>
<div class="overlayLogin">
    <div class="inicioSesion">
        <button class="loginGoogle" onclick="signInWithGoogle()">
            <img src="imagenes/iconos/googleLogin.svg" alt="">Ingresar con Google
        </button>
        <button class="loginFacebook" onclick="signInWithFacebook()">
            <img src="imagenes/iconos/facebookLogin.svg" alt="">Ingresar con Facebook
        </button>
    </div>
</div>
<div class="header login">
</div>