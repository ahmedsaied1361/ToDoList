<?php

// class name should be in PascalCase
// formatting...
// the class should have a property called errors
// and methods for each validation rule
// for example: required, string, max, min, etc...
// and each one of them should return true or false, and append to the errors array if needed
class validator
{
    // what is this method??
    public function isset($x){
        return isset($x);
    }
    // this is not a validation method, it's a preparation method
    public function trim($x)
    {
        $title = htmlspecialchars(trim($x));
        return $title;
    }
    // what are we validating here??
    // the method name should be required for example
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
