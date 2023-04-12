<?php

session_start();

// class name should be in PascalCase
class msg
{
    public function error($errors)
    {
        foreach ($errors as $error) {
            echo "* " . $error;
        }
        session_unset();
    }
}
