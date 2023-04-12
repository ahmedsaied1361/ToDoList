<?php

class validator
{
    public function isset($x){
        return isset($x);
    }
    public function trim($x)
    {
        $title = htmlspecialchars(trim($x));
        return $title;
    }
    public function validate($key)
    {
        $errors = [];
        if ($key == '') {
            $errors[] = "Title Is Required";
        } elseif (is_numeric($key)) {
            $errors[] = "Title Must Be String";
        } elseif (strlen($key) > 25) {
            $errors[] = "Title Must Be Less Than 25 Char";
        }
        return $errors;
    }
}
