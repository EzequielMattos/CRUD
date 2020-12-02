<?php 

include_once 'conn.php';

function cadastrar_func($func)
{

	global $conn;

	$values = "('".$func['nome']."',
			  '".$func['cargo']."',
			  '".$func['email']."')";

	$sql = "INSERT INTO funcionarios (nome, cargo, email) VALUES $values";
	
	$result = mysqli_query($conn, $sql);

	if (mysqli_affected_rows($conn) > 0 )
	{
		header('location:index.php?msg=cadok');
	}else{
		header('location:index.php?msg=caderro');
	}		  
}

function select_func()
{
	global $conn;

	$sql = "SELECT * FROM funcionarios";

	$result = mysqli_query($conn, $sql);

	if (mysqli_affected_rows($conn) > 0)
	{
		$info = '';

		$info .= '<table class="table table-hover table-sm">';
		$info .= 	'<tr>';
		$info .= 		'<th>Cadastro #</th>';
		$info .= 		'<th>Nome do Funcionário</th>';
		$info .= 		'<th>Cargo</th>';
		$info .= 		'<th>Email</th>';
		$info .= 		'<th>Ações</th>';
		$info .= 	'</tr>';

		while ($func = mysqli_fetch_assoc($result))
		{
			$info .= '<tr>';

				foreach ($func as $key => $values)
				{
					if($key == 'id_funcionario')
					{
						$id_func = $values;
					}

					$info .= '<td>'. $values . "</td>";
				}
				$info .= '<td>';
			$info .= '<a href="editar.php?id_funcionario='.$id_func.'" class="btn btn-warning">Editar</a>  ';
			$info .= '<a href="deletar.php?id_funcionario='.$id_func.'" class="btn btn-danger" onclick="return confirm(\'Tem Certeza Que Deseja Excluir Este Funcionário?\')">Deletar</a>' ;
			$info .= '</td>';

			$info .= '</tr>';
		}
		$info .= '</table>';

		return $info;
	}else{
		return '<h3>Não Há Funcionários Cadastrados</h3>';
	}
}

function cad_user($user)
{
	global $conn;

	$values = "('" .$user['username'] ."', " .
			   "'" .$user['password'] ."', " .
			   "'" .$user['email']    ."') ";

	$sql = "INSERT INTO usuarios (username, password, email) VALUES $values";
	
	$result = mysqli_query($conn, $sql);

	if(mysqli_affected_rows($conn) > 0)
	{
		header('location:login.php?msg=newuser');
	}
	else
	{
		header('location:login.php?msg=usererro');
	}	   
}

function deletar_func($id_func)
{
	global $conn;

	$sql = "DELETE FROM funcionarios WHERE id_funcionario = $id_func";

	mysqli_query($conn, $sql);

	if (mysqli_affected_rows($conn) > 0)
	{
		header('location:index.php?msg=delok');
	}
	else
	{
		header('location:index.php?msg=delerro');
		//echo $sql;
	}
}

function buscar_func($id_func)
{
	global $conn;

	$sql = "SELECT * FROM funcionarios WHERE id_funcionario = $id_func";

	$result = mysqli_query($conn, $sql);

	if(mysqli_affected_rows($conn)> 0)
	{
		$func = mysqli_fetch_assoc($result);
	}
	else
	{
		$func = '';
	}

	return $func;
}

function editar_func($edt)
{
	global $conn;

	$values = "nome  = '" 	. $edt['nome'] 	. "', " .
			  "cargo = '" 	. $edt['cargo'] . "' , " .
			  "email = '" 	. $edt['email'] . "'  " ;

	$sql = "UPDATE funcionarios SET $values WHERE id_funcionario =". $edt['id_func'];
	
	$result = mysqli_query($conn, $sql);

	if (mysqli_affected_rows($conn)> 0)
	{
		header('location:index.php?msg=edtok');
	}	
	else
	{
		header('location:index.php?msg=edterro');
		//echo $sql;
	}   
}

?>