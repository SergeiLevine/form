<?php

class Validator {
    private $errors = [];
    private static $fields = ['first_name','last_name','country','phone_number','email'];

    public function __construct($post_data){
        $this->data = $post_data;
    }

    //running all the validations from this function
    public function validateForm(){
        foreach(self::$fields as $field){
            //checking if any field is missing
            if(!array_key_exists($field,$this->data)){
                trigger_error($field . " is not present in data.",E_USER_WARNING);
                return;
            }
        }
        $this->validateFirstName();
        $this->validateLastName();
        $this->validateCountry();
        $this->validatePhoneNumber();
        $this->validateEmail();
        //returning array of errors if any were created
        return $this->$errors;
    }

    //Validating first name if exists(javascript fail) or if written properly
    private function validateFirstName(){

        if (empty(trim($this->data["first_name"]))) {
            $this->addError("first_name","First Name is required");
        } else {
            $first_name = $this->test_input($this->data["first_name"]);

            if (!preg_match("/^[a-zA-Z ]*$/",$first_name)) {
                $this->addError("first_name","Only letters and white space allowed");
            }
        }
    }

    //Validating last name if exists(javascript fail) or if written properly
    private function validateLastName(){

        if (empty(trim($this->data["last_name"]))) {
            $this->addError("last_name","Last Name is required");
        } else {
            $last_name = $this->test_input($this->data["last_name"]);

            if (!preg_match("/^[a-zA-Z ]*$/",$last_name)) {
                $this->addError("last_name","Only letters and white space allowed");
            }
        }
    }

    //Validating country if exists(javascript fail)
    private function validateCountry(){

        if (empty(trim($this->data["country"]))) {
            $this->addError("country","Country is required");
        } else {
            $country = $this->test_input($this->data["country"]);
        }
    }

    //Validating phone number if exists(javascript fail) and does not contains unnecessary characters 
    private function validatePhoneNumber(){

        if (empty(trim($this->data["phone_number"]))) {
            $this->addError("phone_number","Phone Number is required");
        } else {
            $phone_number = $this->test_input($this->data["phone_number"]);

            if (!preg_match("/^(?=.*[0-9])[- +()0-9]+$/i",$phone_number)) {
                $this->addError("phone_number","Invalid Phone Number");
            }
        }
    }

    //Validating email if exists(javascript fail) and checking if its valid with inbuilt php function
    private function validateEmail(){

        if (empty(trim($this->data["email"]))) {
            $this->addError("email","Email is required");
        } else {
            $email = $this->test_input($this->data["email"]);

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $this->addError("email","Invalid email format");
            }
        }
    }

    //addind error to error array $errors that will be displayed under the fields with explanation
    private function addError($key, $value){
        $this->$errors[$key] = $value;
    }

    //clearing the string from unnecessary special characters
    private function test_input($data) {
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}