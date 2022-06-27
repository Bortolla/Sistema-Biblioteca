<?php

# Function to clean the data that comes from an input
function clean_data($data){ 
        $clean_data = trim($data);
        $clean_data = htmlspecialchars($clean_data);

        return $clean_data;
    }

?>