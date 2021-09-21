<?php namespace App\Controllers;

class Ctipo extends BaseController {
	public function index() {
		$tipoModel = new \App\Models\Mtipo();
		$data['listaDeTipos'] = $tipoModel->find();
		$data['titulo'] = 'Lista de Tipos';
		
		echo view('VlistaDeTipos', $data);
	}
	
	public function inserir() {
		$data['titulo'] = 'Inserir Novo Tipo de Cliente';
		$data['acao']   = 'Inserir';
		$data['msg']    = '';
		
		if ($this->request->getMethod() === 'post') {
			$Mtipo = new \App\Models\Mtipo();
			$Mtipo->set('descricao',$this->request->getPost('descricao'));
			
			if ($Mtipo->insert()) {
				$data['msg']    = 'Tipo de Cliente inserido com sucesso.';
			} else  {
				$data['msg']    = 'Erro na inserção do Tipo de Cliente.';
			}
		}
		echo view('Vtipo_form', $data);
	}
	
	
	public function editar($id_tipo) {
		$data['titulo'] = 'Editar Tipo de Cliente '.$id_tipo;
		$data['acao']   = 'Editar';
		$data['msg']    = '';
		$Mtipo = new \App\Models\Mtipo();
		$tipo  = $Mtipo->find($id_tipo);
		
		if ($this->request->getMethod() === 'post') {
			$tipo->descricao = $this->request->getPost('descricao');
			if ($Mtipo->update($id_tipo,$tipo)) {
				$data['msg'] = 'Tipo de Cliente atualizado com sucesso.';
			} else {
				$data['msg'] = 'Erro na atualização do Tipo de Cliente.';
			}
		}
		$data['tipo'] = $tipo;
		
		echo view('Vtipo_form', $data);
	}
	
	public function excluir($id_tipo) {
		$data['titulo'] = 'Excluir Tipo de Cliente '.$id_tipo;
		$data['acao']   = 'Excluir';
		$data['msg']    = '';
		$Mtipo = new \App\Models\Mtipo();
		$tipo  = $Mtipo->find($id_tipo);
		
		if ($this->request->getMethod() === 'post') {
			if ($Mtipo->delete($id_tipo)) {
				$data['msg'] = 'Tipo de Cliente excluído com sucesso.';
			} else {
				$data['msg'] = 'Erro na exclusão do Tipo de Cliente.';
			}
		}
		$data['tipo'] = $tipo;
		
		echo view('Vtipo_form', $data);
	}
}