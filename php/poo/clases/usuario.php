<?php
class Usuario{
    private $email;
    private $password;
    private $userName;
    private $passwordRepeat;
    private $avatar;

    public function __construct($email,$password,$userName=null,$passwordRepeat=null,$avatar=null){
        $this->email = $email;
        $this->password = $password;
        $this->userName = $userName;
        $this->passwordRepeat = $passwordRepeat;
        $this->avatar = $avatar;
    }

    public function getEmail(){
        return $this->email;
    }
    public function getpassword(){
        return $this->password;
    }
    public function getUserName(){
        return $this->userName;
    }
    public function getPasswordRepeat(){
        return $this->passwordRepeat;
    }
    public function getAvatar(){
        return $this->avatar;
    }

    public function setEmail($email){
        $this->email = $email;
    }
    public function setPassword($password){
        $this->password = $password;
    }
    public function setUserName($userName){
        $this->userName = $userName;
    }
    public function setPasswordRepeat($passwordRepeat){
        $this->passwordRepeat = $passwordRepeat;
    }
    public function setAvatar($avatar){
        $this->avatar = $avatar;
    }
    

}