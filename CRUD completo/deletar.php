<?php 
include_once 'lock.php';

if(empty($_GET['id_funcionario'])) 
{ 
	header('location:index.php?msg=invalidid');
} 
else 
{
	$id_func = $_GET['id_funcionario'];
	// incluir arquivo com a função para deletar o funcionário:
	include_once 'DAO.php';
	// chamar função para deletar funcionário:
	deletar_func($id_func);
	
}
?>