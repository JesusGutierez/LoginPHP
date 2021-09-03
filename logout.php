<?php
    session_start();

    session_unset(); #Elimina o quita la sesión

    session_destroy(); #Destruye sesión

    header('Location: /phplogin');
?>