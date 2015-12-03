<?php
class Noticias extends PDOSenacExample{

	protected $table = "noticias";

	public function save(array $dados)
	{
		isset($dados['destaque']) ? $dados['destaque'] = "sim" : $dados['destaque'] = 'nao';

		if($this->insert($dados) > 0){
			return ['sucesso' => true, 'msg' => 'Noticia cadastrada com sucesso!'];
		}else{
			return ['sucesso' => false, 'msg' => 'Ocorreu um erro ao cadastra a noticia!'];
		}
	}

	public function get($id)
	{
		$noticia = $this->selectOne(['id' => $id]);

		if($noticia){
			return ['sucesso' => true, 'noticia' => $noticia];
		}else{
			return ['sucesso' => false, 'msg' => 'Ocorreu um erro ao buscar a noticia!'];
		}
	}

	public function all($where = "", $limit = 20)
	{
		$sql = "SELECT 
					n.id As id, 
					data_db, 
					tipo, titulo, 
					resumo, 
					texto, 
					imagem, 
					destaque,
					label
				FROM {$this->table} n INNER JOIN tipo t ON n.tipo = t.id LIMIT $limit";
		return $this->execute($sql);
	}

	public function edit(array $fields, $by = 'id')
	{
		$noticias = $this->update($fields, $by);
		if($noticias){
			return ['sucesso' => true, 'msg' => 'Noticia editada com sucesso!'];
		}else{
			return ['sucesso' => false, 'msg' => 'Ocorreu um erro ao editar a noticia!'];
		}
	}

	public function remove($id, $by = 'id')
	{
		$noticias = $this->delete($id, $by);
		if($noticias){
			return ['sucesso' => true, 'msg' => 'Noticia removida com sucesso!'];
		}else{
			return ['sucesso' => false, 'msg' => 'Ocorreu um erro ao removida a notícia!'];
		}
	}


}