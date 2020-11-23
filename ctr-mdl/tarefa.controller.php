<?php
	/*
	echo "<pre>";
		print_r($_POST);
	echo "</pre>"; */

	require "tarefa.model.php";
	require "tarefa.service.php";
	require "conexao.php";

	$acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;

	if($acao == 'inserir'){

		$tarefa = new Tarefa();
		$tarefa->__set('tarefa', $_POST['tarefa']);

		$conexao = new Conexao();

		$tarefaService = new tarefaService($conexao, $tarefa);

		$tarefaService->inserir();
		
		header('Location: ../nova_tarefa.php?inclusao=1');

	} else if($acao == 'recuperar'){
		//echo 'Ok...';
		$tarefa = new Tarefa();
		$conexao = new Conexao();

		$tarefaService = new tarefaService($conexao, $tarefa);
		$tarefas = $tarefaService->recuperar();
	}