<?
  include 'site_components/db.php';
  header('Content-Type: text/html; charset=utf-8');
  
  $request = file_get_contents('php://input');
  $request = json_decode($request,true);
  
  $name = htmlspecialchars(trim($request['name']));
  $numberPopulation = htmlspecialchars(trim($request['numberPopulation'])); 
  $latitude = htmlspecialchars(trim($request['latitude'])); 
  $longitude = htmlspecialchars(trim($request['longitude'])); 

  if(empty($numberPopulation) or empty($latitude) or empty($longitude) or empty($name)) {
    $answer=array(
      'code'=>'2',
      'answer'=> 'Не все поля заполнены',
      );
    exit (json_encode($answer));
  }
  
  $result=$mysqli->query("SELECT * FROM `users` WHERE `name`='$name'");
  
  $result=$result->fetch_assoc();
  
  if(isset($result)) { 
    $answer=array(
      'code'=>'4',
      'answer'=> 'Такой населенный пункт уже существует',
      );
    exit (json_encode($answer));
  }
  $result=$mysqli->query("INSERT INTO `users` VALUES (NULL,'$name','$latitude','$longitude','$numberPopulation')");
  if($result) {
    $answer=array(
      'code'=>'1',
      'answer'=> 'Населенный пункт успешно зарегистрирован',
      );
    exit (json_encode($answer));
  }
  else {
    $answer=array(
      'code'=>'5',
      'answer'=> 'Ошибка записи в БД',
      );
    exit (json_encode($answer));
  }
?>