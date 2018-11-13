<?php

class Validacao{
	private $dados;
	private $erro = array();
	
	public function set($valor, $nome){
		$this->dados = array("valor" => trim($valor),"nome" => $nome);
		return $this;
	}
	
	public function obrigatorio(){
		if(empty($this->dados['valor'])){
			$this->erro[] = sprintf("O campo %s é obrigatorio", $this->dados['nome']);
		}
		return $this;
	}
	
	public function email(){
		if(!filter_var($this->dados['valor'], FILTER_VALIDATE_EMAIL)){
			$this->erro[] = sprintf("O campo %s não é email valido", $this->dados['nome']);
		}
		return $this;
	}
	
	public function data(){
		//99-99-9999
		if(!preg_match("/^[0-9]{2}\-[0-9]{2}\-[0-9]{4}$/", $this->dados['valor'])){
			$this->erro[] = sprintf("o campo %s só aceita formato dd-mm-aaaa", $this->dados['nome']);
		}
		return $this;
	}
	
	public function telefone(){
		//(99)9999-9999
		if(!preg_match("/^\([0-9]{2}\)[0-9]{4}\-[0-9]{4}$/", $this->dados['valor'])){
			$this->erro[] = sprintf("o campo %s só aceita formato (99)9999-9999", $this->dados['nome']);
		}
		return $this;
	}
	
	public function validar(){
		if(count($this->erro) > 0){
			return false;
		}else{
			return true;
		}
	}
	
	public function getErrors(){
		return $this->erro;
	}
}




