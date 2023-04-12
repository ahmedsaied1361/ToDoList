<?php

session_start();

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
