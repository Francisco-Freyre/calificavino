<?php

    function controllers_autolad($classname){
        include 'controllers/' . $classname . '.php';
    }

    spl_autoload_register('controllers_autolad');