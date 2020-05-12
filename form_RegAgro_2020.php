<?
  $title= 'РегАгро';
  include 'site_components/header_RegAgro_2020.php';
?>
<main>
  <div class="container">
    <div class="row justify-content-center">
    <div class="col-8">
      <h2 class="text-center my-3">Населенный пункт</h2>
      <form id="regAgroForm" action="reg_obr_RegAgro.php" method="POST" onsubmit="send(); return false;"> 
        <div class="input-group flex-nowrap my-2"> 
          <div class="input-group-prepend">
            <span class="input-group-text" id="addon-wrapping"><i class="fas fa-pen-alt"></i></span>
          </div>
          <input type="text" class="form-control" placeholder="Название" aria-label="Username" aria-describedby="addon-wrapping" name="name" required>
        </div>                                  
        <div class="input-group flex-nowrap my-2">
          <div class="input-group-prepend">
            <span class="input-group-text" id="addon-wrapping"><i class="fas fa-pen-alt"></i></span>
          </div>
          <input type="number" class="form-control" placeholder="Широта" aria-label="Username" aria-describedby="addon-wrapping" name="latitude" required>
        </div>
        <div class="input-group flex-nowrap my-2"> 
          <div class="input-group-prepend">
            <span class="input-group-text" id="addon-wrapping"><i class="fas fa-pen-alt"></i></span>
          </div>
          <input type="number" class="form-control" placeholder="Долгота" aria-label="Username" aria-describedby="addon-wrapping" name="longitude" required>
        </div>
        <div class="input-group flex-nowrap my-2">
          <div class="input-group-prepend">
            <span class="input-group-text" id="addon-wrapping"><i class="fas fa-pen-alt"></i></span>
          </div>
          <input type="number" class="form-control" placeholder="Количество населения" aria-label="Username" aria-describedby="addon-wrapping" name="numberPopulation" required>
        </div>
        <input type="submit" class="btn btn-block btn-primary" value="Записать">
      </form>  
      <div class="input-group flex-nowrap my-2"> 
        <a href="table_RegAgro_2020.php" class="btn btn-block btn-primary">Таблица</a> 
      </div>
    </div>
    </div>
  </div> 
  
</main>
<script>
  async function send() {
    let data = {
        name: regAgroForm.querySelector('[name="name"]').value,
        latitude: regAgroForm.querySelector('[name="latitude"]').value,
        longitude: regAgroForm.querySelector('[name="longitude"]').value,
        numberPopulation: regAgroForm.querySelector('[name="numberPopulation"]').value,
    };
    
    let response = await fetch('reg_obr_RegAgro.php',{
      method: 'POST',
      headers: {
        'Content-Type': 'application/json;charset=utf-8'
      },
      body: JSON.stringify(data),
    });
    if (response.ok) {
      let result = await response.json();
      if (result.code==1) {
        alert(result.answer);
      }
      else alert (result.answer);
    }
    else {
      alert('Ошибка:'+response.status);
    }
    
    console.log(data);
  }
</script>
<?
  include 'site_components/footer.php';
?>