<?php namespace App\Controllers;

class Ccliente extends BaseController {
	
	public function index() {
		$clienteModel = new \App\Models\Mcliente();
		//$data['listaDeClientes'] = $clienteModel->find();
		
		$clienteModel->join("tipo","cliente.id_tipo_cliente=tipo.id_tipo");
		$clienteModel->select("id_cliente as 'id_cliente', nome as 'nome', id_tipo_cliente as 'id_tipo_cliente' , CONCAT(CAST(id_tipo_cliente AS CHAR),CONCAT('-',tipo.descricao)) as texto_tipo_cliente");
		$data['listaDeClientes'] = $clienteModel->find();
		
		$data['titulo'] = 'Lista de Clientes';
		echo view('VlistaDeClientes', $data);
	}
	
	public function inserir() {
		$data['titulo'] = 'Inserir Novo Cliente';
		$data['acao']   = 'Inserir';
		$data['msg']    = '';
		
		
		// Montar o combobox de tipos.
		helper('form');
		$tipoModel = new \App\Models\Mtipo();
		$rsTipo = $tipoModel->findAll();
		$arrayTipos = [];
		foreach ($rsTipo as $itemRs) {
			$arrayTipos[$itemRs->id_tipo] = $itemRs->descricao;
		}
		$data['comboTipos'] = form_dropDown('id_tipo_cliente', $arrayTipos);
			
			
		if ($this->request->getMethod() === 'post') {
			$Mcliente = new \App\Models\Mcliente();
			$Mcliente->set('nome',$this->request->getPost('nome'));
			$Mcliente->set('id_tipo_cliente',$this->request->getPost('id_tipo_cliente'));
			
			if ($Mcliente->insert()) {
				$data['msg']    = 'Cliente inserido com sucesso.';
			} else  {
				$data['msg']    = 'Erro na inserção do Cliente.';
			}
		}	
		
		echo view('Vcliente_form', $data);
	}
	
	
	public function editar($id_cliente) {
		$data['titulo'] = 'Editar Cliente '.$id_cliente;
		$data['acao']   = 'Editar';
		$data['msg']    = '';
		$Mcliente = new \App\Models\Mcliente();
		$cliente  = $Mcliente->find($id_cliente);
				
		if ($this->request->getMethod() === 'post') {
			$cliente->nome = $this->request->getPost('nome');
			$cliente->id_tipo_cliente = $this->request->getPost('id_tipo_cliente');
			if ($Mcliente->update($id_cliente, $cliente)) {
				$data['msg'] = 'Cliente atualizado com sucesso.';
			} else {
				$data['msg'] = 'Erro na atualização do Cliente.';
			}
		}
		
		$data['cliente'] = $cliente;	
		
		
		// Montar o combobox de tipos.
		helper('form');
		$tipoModel = new \App\Models\Mtipo();
		$rsTipo = $tipoModel->findAll();
		$arrayTipos = [];
		$id_Tipo  = (isset($cliente->id_tipo_cliente)?$cliente->id_tipo_cliente:$this->request->getPost('id_tipo_cliente'));
		$tipoSelecionado = '';
		foreach ($rsTipo as $itemRs) {
			$arrayTipos[$itemRs->id_tipo] = $itemRs->id_tipo. ' '.$itemRs->descricao;
			if ($itemRs->id_tipo == $id_Tipo) {
				$tipoSelecionado = $itemRs->id_tipo;
			}
		}
		$data['comboTipos'] = form_dropDown('id_tipo_cliente', $arrayTipos, $tipoSelecionado);
			
		echo view('Vcliente_form', $data);
	}
	
	public function excluir($id_cliente) {
		$data['titulo'] = 'Excluir Cliente '.$id_cliente;
		$data['acao']   = 'Excluir';
		$data['msg']    = '';
		$Mcliente = new \App\Models\Mcliente();
		$cliente  = $Mcliente->find($id_cliente);
		$id_Tipo  = $cliente->id_tipo_cliente;
		
		
		// Montar o combobox de tipos.
		helper('form');
		$tipoModel = new \App\Models\Mtipo();
		$rsTipo = $tipoModel->find($id_Tipo);
		$arrayTipos = [];
		$arrayTipos[$rsTipo->id_tipo] = $rsTipo->id_tipo. ' '.$rsTipo->descricao;
		$data['comboTipos'] = form_dropDown('id_tipo_cliente', $arrayTipos);
			
			
		if ($this->request->getMethod() === 'post') {
			if ($Mcliente->delete($id_cliente)) {
				$data['msg'] = 'Cliente excluído com sucesso.';
			} else {
				$data['msg'] = 'Erro na exclusão do Cliente.';
			}
		} else {}
		$data['cliente'] = $cliente;
		
		echo view('Vcliente_form', $data);
	}
}