<?php
	require"../../CONTROLLER/model.php";
	require"../../CONTROLLER/service.php";
	require"../../CONTROLLER/conexao.php";

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
	
	}else if($acao == 'recuperar'){

	$cNome = new CADASTRIC();
	$cEmail = new CADASTRIC();
	$tEsc = new CADASTRIC();
	$cEndereco = new CADASTRIC();
	$cSexo = new CADASTRIC();
	$cDataNasc = new CADASTRIC();
	$cInstituicao = new CADASTRIC();
	$cCurso = new CADASTRIC();
	$cSenha = new CADASTRIC();
	$cConfirmarSenha = new CADASTRIC();
	$conexao = new Conexao();

	$Service = new Service($conexao ,$cNome ,$cEmail ,$tEsc ,$cEndereco ,$cSexo ,$cDataNasc,$cInstituicao ,$cCurso, $cSenha ,$cConfirmarSenha);
	$RecuServi = $Service->recuperar();

	}else if($acao == 'logar'){//LOGAR
	session_start();
	
	include('conectar.php');
	
	if(empty($_POST['cEmail']) || empty($_POST['cSenha'])) {
		header('Location: login.html');
		exit();
	}
	

	$cEmail = mysqli_real_escape_string($conexao, $_POST['cEmail']);
	$cSenha = mysqli_real_escape_string($conexao, $_POST['cSenha']);

	$query = "select cEmail from Usuario_Comum where cEmail = '{$cEmail}' and cSenha = ('{$cSenha}')";

	$result = mysqli_query($conexao, $query);

	$row = mysqli_num_rows($result);

	if($row == 1) {
		$_SESSION['cEmail'] = $cEmail;
		header('Location: home.php');
		exit();
	} else {
		$_SESSION['nao_autenticado'] = true;
		header('Location: login.html');
		exit();
	}

}


?>