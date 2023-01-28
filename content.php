<?php
function ispis($result, $conn){
    $list ="";
    if (!$result) {
        echo "Greska kod upita<br>";
        die();
    }
    if ($result->num_rows == 0) {
        $list = "Nema proizvoda";
        die();
    }
        $list.='<table class="table">
        <thead>
          <tr>
            <th scope="col"></th>
            <th scope="col">#</th>
            <th scope="col">Naziv</th>
            <th scope="col">Kategorija</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
          
           ';
        /* fetch associative array */
        while ($row = $result->fetch_assoc()) {
            //print_r($row);
            $kategorija = Kategorija::getById(intval($row["cat_ID"]), $conn);  
            //print_r($kategorija);
            $list.='<tr> <th width="30" scope="row"><td>'.$row["id"].'</td></th>';
            $list.="<td>";
            $list.=$row["naziv"];
            $list.="</td>";
            $list.="<td>";
            $list.=$kategorija['naziv'];
            $list.="</td>";
            $list.="<td width='140'>";
            $list.="<button type='button' id='btn-izmeni' data-action='izmena' data-catID='".$row["cat_ID"]."' data-name='".$row["naziv"]."' data-bs-toggle='modal' data-bs-target='#unos-modal' class='btn btn-sm btn-light'>Izmeni</button>";
            $list.="<button type='button' id='btn-obrisi' class='btn btn-sm btn-light'>Obriši</button>";
            $list.="</td>";
        }
        $list.="</tr>";
        /* free result set */
        $result->free();

    
    return $list.="</tbody>
    </table>";
}


   
?>