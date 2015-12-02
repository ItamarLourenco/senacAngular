<?php
class Tipos extends PDOSenacExample{

	protected $table = "tipo";

	public function save(array $dados)
	{
		if($this->insert($dados) > 0){
			return ['sucesso' => true, 'msg' => 'Tipo cadastrada com sucesso!'];
		}else{
			return ['sucesso' => false, 'msg' => 'Ocorreu um erro ao cadastra a tipo!'];
		}
	}

	public function get($id)
	{
		$tipo = $this->selectOne(['id' => $id]);

		if($tipo){
			return ['sucesso' => true, 'tipo' => $tipo];
		}else{
			return ['sucesso' => false, 'msg' => 'Ocorreu um erro ao buscar o tipo!'];
		}
	}

	public function all($where = "", $limit = 20)
	{
		return $this->select($where, $limit);
	}

	public function edit(array $fields, $by = 'id')
	{
		$noticias = $this->update($fields, $by);
		if($noticias){
			return ['sucesso' => true, 'msg' => 'Tipo editada com sucesso!'];
		}else{
			return ['sucesso' => false, 'msg' => 'Ocorreu um erro ao editar o Tipo!'];
		}
	}

	public function remove($id, $by = 'id')
	{
		$noticias = $this->delete($id, $by);
		if($noticias){
			return ['sucesso' => true, 'msg' => 'Tipo removido com sucesso!'];
		}else{
			return ['sucesso' => false, 'msg' => 'Ocorreu um erro ao removida o tipo!'];
		}
	}
}