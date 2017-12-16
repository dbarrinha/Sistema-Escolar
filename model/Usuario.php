<?php
class Usuario{
    
private $id;
private $nome;
private $email;
private $nick;
private $senha;

   public function getIdUsuario(){
      return $this->id;
   }

   public function getNome(){
      return $this->nome;
   }

   public function getEmail(){
      return $this->email;
   }

   public function getNick(){
      return $this->nick;
   }

   public function getSenha(){
      return $this->senha;
   }
   
   public function setIdUsuario($idUsuario){
   $this->id = $idUsuario;
}

   public function setNome($nome){
      $this->nome = $nome;
   }

   public function setEmail($email){
      $this->email = $email;
   }

   public function setNick($nick){
      $this->nick = $nick;
   }

   public function setSenha($senha){
      $this->senha = $senha;
   }

}