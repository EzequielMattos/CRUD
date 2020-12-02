<?php
include_once 'DAO.php';

function verificar_cad()
{
	if(empty($_POST['nome']) 
	|| empty($_POST['cargo']) 
	|| empty($_POST['email']))
	{
		echo '<h3 class="alert alert-warning">Por Favor, Preencha Todos os Dados</h3>';
	}else{
		$func['nome']  = $_POST['nome'];
		$func['cargo'] = $_POST['cargo'];
		$func['email'] = $_POST['email'];

		cadastrar_func($func);
	}
} 

function exibir_func()
{
	echo select_func();
}

function veref_cad_user()
{
	if(empty($_POST['username'])
	|| empty($_POST['password'])
	|| empty($_POST['email']))
	{
		echo '<h3 class="alert alert-warning">POR FAVOR, PREENCHA TODOS OS CAMPOS!</h3>';
	}
	else
	{
		$user['username'] = $_POST['username'];
		$user['password'] = $_POST['password'];
		$user['email'] = $_POST['email'];

		cad_user($user);
	}
}

function verificar_msg()
{

	if(!empty($_GET['msg']))
	{
		$msg = $_GET['msg'];

		switch ($msg) 
		{
			case 'cadok':
				$texto = "Série cadastrada com sucesso!";
				$classe = "alert alert-success";
				break;

			case 'caderro':
				$texto = "Erro ao cadastrár série. Por favor, tente novamente.";
				$classe = "alert alert-danger";
				break;

			case 'newuser':
				$texto = "Usuário cadastrado com sucesso!";
				$classe = "alert alert-success";
				break;

			case 'usererro':
				$texto = "Erro ao cadastrár usuário. Por favor, tente novamente.";
				$classe = "alert alert-danger";
				break;

			case 'delok':
				$texto = "Série excluída com com sucesso!";
				$classe = "alert alert-success";
				break;

			case 'delerro':
				$texto = "Erro ao excluir série. Por favor, tente novamente.";
				$classe = "alert alert-danger";
				break;

			case 'edtok':
				$texto = "Série editada com com sucesso!";
				$classe = "alert alert-success";
				break;

			case 'edterro':
				$texto = "Erro ao editar série. Por favor, tente novamente.";
				$classe = "alert alert-danger";
				break;
			
			case 'errobusca':
				$texto = "ATENÇÃO: não foi possível encontrar série especificada. <br> 
				Por favor, tente novamente.";
				$classe = "alert alert-warning";
				break;

			case 'invalidid':
				$texto = "ATENÇÃO: não foi possível carregar série com id informado. <br> 
				Por favor, tente novamente.";
				$classe = "alert alert-warning";
				break;

			default:
				$texto = '';
				$classe = '';
				break;
		}// fim switch

		echo '<h3 class="'.$classe.'">'.$texto.'</h3>';


	}

}
?>