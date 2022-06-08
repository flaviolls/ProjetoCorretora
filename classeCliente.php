<?php

class Apartamento {
  
  private $nome;
  private $email;
  private $sexo;

  public function setnome($e) {
    $this->nome = $e;
  }
  
  public function getNome() {
    return $this->nome;
  }

  public function setEmail($em) {
    $this->email = $em;
  }
  
  public function getEmail() {
    return $this->email;
  }
  
  public function setSexo($s) {
    $this->sexp = $s;
  }
  
  public function getSexo() {
    return $this->sexo;
  }
  
  public function Pessoa($e, $em, $s) {
    $this->nome = $e;
	$this->email = $em;
	$this->sexo = $s;
  }
}

?>