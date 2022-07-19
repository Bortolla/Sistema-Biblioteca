<?php
    #CHECKING IF THE USER TRYING TO ACCESS THE SIGN ->
    #->UP PAGE IS ALREADY LOGGED. IF SO, IT REDIRECTS ->
    #->THEM TO THE INDEX OF THEIR PATH
    if ($_SESSION['logged']){
        if ($_SESSION['type'] == 'user'){
            header('Location: user/index.php');
        }
        elseif ($_SESSION['type'] == 'admin'){
            header('Location: admin/index.php');
        }
    }
