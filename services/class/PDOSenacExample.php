<?php
abstract class PDOSenacExample{
	protected $conn = null;
	protected $table = "";

	public function __construct(){
		try{
			$this->conn = new PDO( 'mysql:host=localhost;dbname=senac', 'root', 'root');	

			if($this->table == ""){
				throw new Exception("Por favor, implemente uma váriavel table em sua classe filha: " . get_called_class() . ".php");
			}
		}catch(PDOException $e) {
		    print "Error!: " . $e->getMessage() . "<br/>";
		    die;
		}
	}

	public function __destruct() {
       $this->conn = null;
	}

	public function insert(array $fields){
		$fieldsReplace = implode(array_keys($fields), ", :");
		$fieldsSql  = implode(array_keys($fields), ", ");

		$sql = "INSERT INTO {$this->table} ($fieldsSql) VALUES (:$fieldsReplace)";
		$stmt = $this->conn->prepare($sql);
		$stmt->execute($fields);

		return $stmt->rowCount();
	}

	public function select($where = "", $limit = 20){
		if($where != ""){
			$where = implode('AND ', array_map(function ($v, $k) { return sprintf("%s='%s'", $k, $v); }, $where, array_keys($where)));;
			$where = "WHERE $where";
		}
		$sql = "SELECT * FROM {$this->table} $where LIMIT $limit";
		return $this->conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
	}

	public function selectOne($where = "", $limit = 20){
		$noticia = $this->select($where, $limit);
		if(sizeof($noticia) > 0){
			return $noticia[0];
		}

		return false;
	}

	public function update(array $fields, $by = 'id'){
		if(!isset($fields['id'])){
			throw new Exception("Por favor informe o ID para o update");
		}
		$id = $fields['id'];
		unset($fields['id']);
		$fields = implode(', ', array_map(function ($v, $k) { return sprintf("%s='%s'", $k, $v); }, $fields, array_keys($fields)));;
		$sql = "UPDATE {$this->table} SET $fields WHERE $by =$id;";
		$stmt = $this->conn->prepare($sql);
		$stmt->execute();
		return $stmt->rowCount();
	}

	public function delete($id, $by = 'id'){
		$sql = "DELETE FROM {$this->table} WHERE $by=:$by";
		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam($by, $id);
		$stmt->execute();

		return $stmt->rowCount();
	}

	public function execute($sql){
		return $this->conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
	}

	public abstract function save(array $data);
	public abstract function get($id);
	public abstract function all($where = "", $limit = 20);
	public abstract function edit(array $fields, $by = 'id');
	public abstract function remove($id, $by = 'id');
}