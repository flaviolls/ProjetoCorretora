<?php

class Usuario{
  
  private $id;
  private $usuario;
  private $senha;
  
  public function setId($i) {
    $this->id = $i;
  }
  
  public function getId() {
    return $this->id;
  }

  public function setUsuario($u) {
    $this->usuario = $u;
  }
  
  public function getUsuario() {
    return $this->usuario;
  }
  
  public function setSenha($s) {
    $this->senha = $s;
  }
  
  public function getSenha() {
    return $this->senha;
  }

  
  public function Pessoa($i, $u, $s) {
    $this->id = $i;
	$this->usuario = $u;
	$this->senha = $s;		
  }
}

?>