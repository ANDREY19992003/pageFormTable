<?
  $title= 'Таблица';
  include 'site_components/db.php'; 
  header('Content-Type: text/html; charset=utf-8'); 
  
  $result=$mysqli->query("SELECT * FROM `users`"); 
  $res=$result->fetch_all();
  $json = json_encode($res);
  
?>
<main>
  <title><?= $title ?></title>
  <style>
     table td {
        padding: 20px;
        border: 1px solid black;
        text-align: center;
     } 
  </style>
  
  <div id="regAgro"></div> 
  
</main>
<script>
  
  let rows= <? echo mysqli_num_rows($result); ?>; 
  let cols= <? echo mysqli_num_fields($result); ?>; 
  
  let data = <? echo $json; ?>;
  
  let regAgro=document.querySelector('#regAgro');
  
  createTable(regAgro, cols, rows);
  
  function createTable (parent,cols,rows) {
    let table=document.createElement('table');
    
    for (let i=0; i<rows; i++) {
        let tr=document.createElement('tr');
        
        for (let j=0; j<cols; j++) {
            let td=document.createElement('td');
            td.innerHTML = data[i][j];
            tr.appendChild(td);
        }
        table.appendChild(tr);
    }
    parent.appendChild(table);
  }
  
</script>
<?
  include 'site_components/footer.php';
?>