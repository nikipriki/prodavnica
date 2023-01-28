<?php


echo '
<button type="button" data-action="unos" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#unos-modal">
  Unesi novi proizvod
</button>
<div class="modal fade" id="unos-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <h1 class="modal-title fs-5" id="exampleModalLabel"></h1>
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
      <form  id="unosForm" name="unos" role="form">
      <div class="mb-3">
      <input type="readonly" id="id" name="id" class="visually-hidden"/>
      <input type="readonly" id="action" name="action" class="visually-hidden"/>
  <label for="naziv" class="form-label">Naziv proizvoda</label>
  <input type="text" class="form-control" id="naziv" placeholder="naziv proizvoda" name="naziv">
</div>
<div class="mb-3">
  <label for="cat_ID" class="form-label">Example textarea</label>
  ';

  if (!$result_kategorije) {
    echo "Greska kod upita<br>";
    die();
}
if ($result_kategorije->num_rows == 0) {
    echo "Nema kategorije";
    die();
}else{
   echo '<select id="kategorija" name="cat_ID" class="form-select" aria-label="Default select example">
   <option>Izaberite kategoriju</option>
   ';

  while ($row = $result_kategorije->fetch_assoc()) {
    echo "<option value='".$row["id"]."'>".$row["naziv"]."</option>";
 
  }
   echo '</select>';

}
  echo '
</div>

    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Odustani</button>
      <input type="submit" class="btn btn-primary" id="submit">
    </div>
    </form>
  </div>
</div>
</div>';
?>