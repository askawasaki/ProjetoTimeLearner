<?php
	require"../CONTROLLER/model.php";
	require"../CONTROLLER/service.php";
	require"../CONTROLLER/conexao.php";

	$acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;

	if ($acao == 'inserir'){

	$cNome = new CADASTRIC();
	$cNome->__set('cNome', $_POST['cNome']);

	$cEmail = new CADASTRIC();
	$cEmail->__set('cEmail', $_POST['cEmail']);

	$tEsc = new CADASTRIC();
	$tEsc->__set('tEsc', $_POST['tEsc']);

	$cEndereco = new CADASTRIC();
	$cEndereco->__set('cEndereco', $_POST['cEndereco']);

	$cSexo = new CADASTRIC();
	$cSexo->__set('cSexo', $_POST['cSexo']);

	$cDataNasc = new CADASTRIC();
	$cDataNasc->__set('cDataNasc', $_POST['cDataNasc']);

	$cInstituicao = new CADASTRIC();
	$cInstituicao->__set('cInstituicao', $_POST['cInstituicao']);

	$cCurso = new CADASTRIC();
	$cCurso->__set('cCurso', $_POST['cCurso']);

	$cSenha = new CADASTRIC();
	$cSenha->__set('cSenha', $_POST['cSenha']);

	$cConfirmarSenha = new CADASTRIC();
	$cConfirmarSenha->__set('cConfirmarSenha', $_POST['cConfirmarSenha']);

	if($_POST['cSenha'] == $_POST['cConfirmarSenha']){

	$conexao = new Conexao();

	$Service = new Service($conexao,$cNome ,$cEmail ,$tEsc ,$cEndereco  ,$cSexo ,$cDataNasc,$cInstituicao ,$cCurso ,$cSenha ,$cConfirmarSenha);
	$Service->inserir();

	header('Location: login.html');
}else{header('Location: cadastro.html');}
	
	}

?>