<?php

class Book{
	public $host;
	protected $login;
	private $password;
	protected $db;
	protected $table;
	public $name;
	public $text;
	public $date;
	
	// Конструктор
	
	public function __construct($host,$login,$password,$db,$table){
		$this->host = $host;
		$this->login = $login;
		$this->password = $password;
		$this->db = $db;
		$this->table = $table;
	}
	// Сохранить данные с полей в базу данных
	public function savePost(){
		$name = htmlspecialchars($_POST["name"]);
		$text = htmlspecialchars($_POST["text"]);
		$date = time();
		if(!empty($name) and !empty($text)){
			$mysqli = new mysqli($this->host, $this->login, $this->password, $this->db);
			$query = "INSERT INTO `".$this->table."` (name,text,date) VALUES('$name','$text','$date')";
			$res = $mysqli->query($query);
			$mysqli->close();
		}else{
			echo "<h2>Заполните поле ввода!</h2>";
		}
	}
	
	// Выборка данных из базы данных
	public function getPost(){
		$mysqli = new mysqli($this->host, $this->login, $this->password, $this->db);
		$res = $mysqli->query("SELECT id,text,name,date FROM `".$this->table."` ORDER BY id DESC");
		$mysqli->close();
		return $res->fetch_all(MYSQLI_ASSOC);
	}
}
