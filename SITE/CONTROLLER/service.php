<?php

class Service {

	private $conexao;
	private $cNome;


	public function __construct(Conexao $conexao,CADASTRIC $cNome ,CADASTRIC $cEmail , CADASTRIC $tEsc ,CADASTRIC $cEndereco  ,CADASTRIC $cSexo ,CADASTRIC $cDataNasc,CADASTRIC $cInstituicao ,CADASTRIC $cCurso ,CADASTRIC $cSenha){

		$this->conexao = $conexao->conectar();
		$this->cNome = $cNome;
		$this->cEmail = $cEmail;
		$this->tEsc = $tEsc;
		$this->cEndereco = $cEndereco;
		$this->cSexo = $cSexo; 
		$this->cDataNasc = $cDataNasc;
		$this->cInstituicao = $cInstituicao;
		$this->cCurso = $cCurso;
		$this->cSenha = $cSenha;
	}
	

	Public function inserir(){ //create
		$query = 'insert into Usuario_Comum(cNome, cEmail, tEsc, cEndereco, cSexo, cDataNasc, cInstituicao, cCurso, cSenha)
		values(:cNome, :cEmail, :tEsc, :cEndereco, :cSexo, :cDataNasc, :cInstituicao, :cCurso, :cSenha)';
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':cNome', $this->cNome->__get('cNome'));
		$stmt->bindValue(':cEmail', $this->cEmail->__get('cEmail'));
		$stmt->bindValue(':tEsc', $this->tEsc->__get('tEsc'));
		$stmt->bindValue(':cEndereco', $this->cEndereco->__get('cEndereco'));
		$stmt->bindValue(':cSexo', $this->cSexo->__get('cSexo'));
		$stmt->bindValue(':cDataNasc', $this->cDataNasc->__get('cDataNasc'));
		$stmt->bindValue(':cInstituicao', $this->cInstituicao->__get('cInstituicao'));
		$stmt->bindValue(':cCurso', $this->cCurso->__get('cCurso'));
		$stmt->bindValue(':cSenha', $this->cSenha->__get('cSenha'));
		$stmt->execute();
	}
	public function recuperar(){ //read
		$query = 'select ID_User, cNome, cEmail, tEsc, cEndereco, cSexo, cDataNasc, cInstituicao, cCurso from Usuario_Comum where ID_User=1';
		$stmt = $this->conexao->prepare($query);
		$stmt->execute();
		return $stmt->fetchALL(PDO::FETCH_OBJ);
	}
	public function atualizar(){ //update
	}
	public function remover(){ //delete

	}
}
?>