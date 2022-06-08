<?php

class Apartamento {
  
  private $id;
  private $rua;
  private $bairro;
  private $quarto;
  private $suite;
  private $valor;
  private $area;
  private $vagas;
  private $descricao;
  private $extensao;
  private $cidade;
  
  
  public function setId($i) {
    $this->id = $i;
  }
  
  public function getId() {
    return $this->id;
  }

  public function setRua($r) {
    $this->nome = $r;
  }
  
  public function getRua() {
    return $this->rua;
  }
  
  public function setBairro($b) {
    $this->nome = $b;
  }
  
  public function getBairro() {
    return $this->bairro;
  }
  
  public function setQuarto($q) {
    $this->nome = $q;
  }
  
  public function getQuarto() {
    return $this->quarto;
  }
  
  public function setSuite($s) {
    $this->nome = $s;
  }
  
  public function getSuite() {
    return $this->suite;
  }
  
  public function setValor($v) {
    $this->nome = $v;
  }
  
  public function getValor() {
    return $this->valor;
  }
  
  public function setArea($a) {
    $this->nome = $a;
  }
  
  public function getArea() {
    return $this->area;
  }
  
  public function setVagas($va) {
    $this->nome = $va;
  }
  
  public function getVagas() {
    return $this->vagas;
  }
  
  public function setDescricao($d) {
    $this->nome = $d;
  }
  
  public function getDescricao() {
    return $this->Descricao;
  }

  public function setExtensao($e) {
    $this->extensao = $e;
  }
  
  public function getExtensao() {
    return $this->extensao;
  }
  
  public function setCidade($c) {
    $this->cidade = $c;
  }
  
  public function getCidade() {
    return $this->cidade;
  }
  
  public function Pessoa($i, $r, $b, $q, $s, $v, $a, $va, $d, $e, $c) {
    $this->id = $i;
	$this->rua = $r;
	$this->bairro = $b;
	$this->quarto = $q;
	$this->suite = $s;
	$this->valor = $v;
	$this->area = $a;
	$this->vagas = $va;
	$this->descricao = $d;
	$this->extensao = $e;
	$this->cidade = $c;
  }
}

?>