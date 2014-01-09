<?php

   	function email($email)
    {
        if(!strpos($email, '@pages.plusgoogle.com')){
            $_SESSION['email'] = $email;
            return 1;
        }
        return 0;
    }