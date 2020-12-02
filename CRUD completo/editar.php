<?php include_once 'lock.php'; 
include_once 'DAO.php';

if (isset($_POST['editar']))
{
	$edt['id_func'] 	= $_POST['id_func'];
	$edt['nome'] 			= $_POST['nome'];
	$edt['cargo'] 			= $_POST['cargo'];
	$edt['email'] 			= $_POST['email'];

	editar_func($edt);
}
else if(empty($_GET['id_funcionario']))
{
	header('location:index.php?msg=invalidid');
}
else
{
	$id_func = $_GET['id_funcionario'];
	
	$func = buscar_func($id_func);

	if(empty($func))	
	{
		header('location:index.php?msg=errobusca');
	}
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<title>Funcionários System - Editar</title>
</head>
<body class="container-fluid">

	<h1>Funcionários System - Editar</h1>

	<p><?php include_once 'menu.php'; ?></p>

	<h3>Editar Funcionário:</h3>

	<form action="editar.php" method="post">
		<p>
			<label>Nome:</label><br>
			<input type="text" name="nome" maxlength="100" 
			value="<?php echo $func['nome']; ?>">
		</p>
		<p>
			<label>Cargo</label><br>
			
			<select name="cargo">
				<option value="Programador">Programador</option>
				<?php if($func['cargo'] == 'Programador') echo "selected"; ?>>Programador</option>
				<option value="Gerente" >Gerente</option>
				<?php if($func['cargo'] == 'Gerente') echo "selected"; ?>>Gerente</option>
				<option value="Analista">Analista</option>
				<?php if($func['cargo'] == 'Analista') echo "selected"; ?>>Analista</option>
				<option value="DBA" >DBA</option>
				<?php if($func['cargo'] == 'DBA') echo "selected"; ?>>DBA</option>
				<option value="Arquiteto de Sistemas">Arquiteto de Sistemas</option>
				<?php if($func['cargo'] == 'Arquiteto de Sistemas') echo "selected"; ?>>Arquiteto de Sistemas</option>
				<option value="Designer">Designer</option>
				<?php if($func['cargo'] == 'Designer') echo "selected"; ?>>Designer</option>
			</select>
		</p>
		<p>
			<label>E-mail:</label><br>
			<input type="email" name="email" maxlength="50" 
			value="<?php echo $func['email']; ?>">
		</p>

		<input type="hidden" name="id_func" value="<?php echo $func['id_funcionario']; ?>">

		<button type="submit" name="editar" class="btn btn-warning">Editar</button>
	</form>
</body>
</html>