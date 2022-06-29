<?php
    #THIS FILE START A SESSION AND THE KEYS RECEIVE FALSE IF THEY 
    #HAVE NO VALUE YET. IF THEY ALREADY HAVE A VALUE, THE VALUE IS KEPT.
    #THE 'logged' key IS TO INDICATE IF THE USER IS LOGGED;
    #THE 'email' key IS TO KEEP TRACK OF WHO IS LOGGED;
    #THE 'type' key IS TO INDICATE THE TYPE OF THE ACCOUNT(user or admin)
    #THIS FILE SHOULD BE INCLUDED IN EVERY HTML FILE
    session_start();
    $_SESSION['logged'] = $_SESSION['logged'] ?? False;
    $_SESSION['email'] = $_SESSION['email'] ?? False;
    $_SESSION['type'] = $_SESSION['type'] ?? False;
?>