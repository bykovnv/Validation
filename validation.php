<?php
 
class Validation {
    //массив который мы получается $_POST
    private $data;
    // массив, который будет возвращать нам ошибки
    private $errors = [];
    // статический массив, с ключами, который мы будем искать в массиве $_POST
    private static $fields = ['user', 'email'];
    
    // получаем массив из $_POST из формы и присваеваем в $data
    public function __construct($post_data){
        $this->data = $post_data;
    }

    // проверка все поля были заполнены 
    // если проверка на пустоту прошла 
    // выполняется дальнейшая проверка
    public function validateForm(){
        foreach(self::$fields as $field){
            if(!array_key_exists($field, $this->data)){
            trigger_error("$field is not present in data");
            return;
            }
        }

        $this->validateUser();
        $this->validateEmail();
        return $this->errors;
    }
    
    //проверка имени на пустоту и длину символов
    public function validateUser(){
        $val = trim($this->data['user']);

        if(empty($val)){
            $this->addError('user', 'Поле имя не может быть пустым');
        } else {
            if(!preg_match('/^[a-zA-Z0-9]{3,18}$/', $val)){
                $this->addError('user', 'Имя должно быть 3-18 знаков');
            }

        }
    }
    //проверка email на корректность
    public function validateEmail(){
        $val = trim($this->data['email']);

        if(empty($val)){
            $this->addError('email', 'Поле e-mail не может быть пустым');
        } else {
            if(filter_var($val, FILTER_VALIDATE_EMAIL)){
                $this->addError('email', 'E-mail должен быть правильным');
            }

        }
        
    }
    // метод присваевает ошибки
    public function addError(string $key,string $val){
        $this->errors[$key] = $val;
    }

    
}
