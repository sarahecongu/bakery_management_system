<?php
class Model extends DatabaseConnection
{
	protected $connection;
	protected $table;

	public function __construct()
	{
		$this->connection = $this->connect_db();
	}

	/**
	 * Get
	 * @return object
	 */
	public function all()
	{
		$sql = "SELECT * FROM " . $this->table;
		$result = $this->connection->query($sql);
		$result->execute();
		return $result->fetchAll(PDO::FETCH_OBJ);
	}

	/**
	 * Find
	 * @param int $id
	 * @return object
	 */
	public function find($id)
	{
		$sql = "SELECT * FROM " . $this->table . " WHERE id=" . $id;
		$result = $this->connection->prepare($sql);

		$result->execute();

		return $result->fetch(PDO::FETCH_OBJ);
	}

	/**
	 * Create
	 * @param array $data
	 * @return bool
	 */
	public function create($data)
	{
		$columns = implode(", ", array_keys($data));
		$values = ":" . implode(", :", array_keys($data));

		$sql = "INSERT INTO " . $this->table . " (" . $columns . ") VALUES (" . $values . ")";
		$result = $this->connection->prepare($sql);

		return $result->execute($data);
	}

	/**
	 * Update
	 * @param int $id
	 * @param array $data
	 * @return bool
	 */
	public function update($id, $data)
	{
		$set = "";
		foreach ($data as $key => $value) {
			$set .= $key . "=:" . $key . ", ";
		}
		$set = rtrim($set, ", ");

		$sql = "UPDATE " . $this->table . " SET " . $set . " WHERE id=" . $id;
		$result = $this->connection->prepare($sql);

		return $result->execute($data);
	}

	/**
	 * Delete
	 * @param int $id
	 * @return bool
	 */
	public function delete($id)
	{
		$sql = "DELETE FROM " . $this->table . " WHERE id=" . $id;
		$result = $this->connection->prepare($sql);

		return $result->execute();
	}

	/**
	 * Count
	 * @return int
	 */
	public function count()
	{
		$sql = "SELECT COUNT(*) as count FROM " . $this->table;
		$result = $this->connection->query($sql);

		$result->execute();
		$count = $result->fetch(PDO::FETCH_OBJ);

		return $count->count;
	}

	/**
	 * Where
	 * @param array $conditions
	 * @return object
	 */
	public function where($conditions)
	{
		$where = "";
		foreach ($conditions as $column => $value) {
			$where .= $column . "='" . $value . "' AND ";
		}
		$where = rtrim($where, " AND ");

		$sql = "SELECT * FROM " . $this->table . " WHERE " . $where;
		$result = $this->connection->query($sql);

		$result->execute();

		return $result->fetchAll(PDO::FETCH_OBJ);
	}

	/**
	 * Order By
	 * @param string $column
	 * @param string $direction
	 * @return object
	 */
	public function orderBy($column, $direction = 'DESC')
	{
		$sql = "SELECT * FROM " . $this->table . " ORDER BY " . $column . " " . $direction;
		$result = $this->connection->query($sql);

		$result->execute();

		return $result->fetchAll(PDO::FETCH_OBJ);
	}

	/**
	 * Custom Query
	 * @param string $query
	 * @return object
	 */
	public function customQuery($query)
	{
		$result = $this->connection->query($query);

		$result->execute();

		return $result->fetchAll(PDO::FETCH_OBJ);
	}
	/**
	 * Get limited records
	 * @param mixed $limit
	 * @return object
	 */
	public function limit($limit)
	{
		$sql = "SELECT * FROM " . $this->table . " LIMIT " . $limit;
		$result = $this->connection->query($sql);
		$result->execute();
		return $result->fetchAll(PDO::FETCH_OBJ);
	}

	/**
	 * Create
	 * @param array $data
	 * @return array
	 */
	public function createMany($many)
	{
		$succes = 0;
		$failed = 0;

		foreach ($many as $data) {
			try {
			$columns = implode(", ", array_keys($data));
			$values = ":" . implode(", :", array_keys($data));

			$sql = "INSERT INTO " . $this->table . " (" . $columns . ") VALUES (" . $values . ")";
			$result = $this->connection->prepare($sql);
			if($result->execute($data)){
				$succes++;
			}
			} catch (PDOException $e) {
				$failed++;
			}
		}

		return ['success'=>$succes, 'failed'=>$failed];
	}

	// /**
	//  * Get limited records
	//  * @param mixed $limit
	//  * @return object
	//  */
	// public function limit($limit)
	// {
	// 	$sql = "SELECT * FROM " . $this->table . " LIMIT " . $limit;
	// 	$result = $this->connection->query($sql);
	// 	$result->execute();
	// 	return $result->fetchAll(PDO::FETCH_OBJ);
	// }

}