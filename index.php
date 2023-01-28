<?php
require "dbBroker.php";
require "model/proizvod.php";
require "model/kategorija.php";
$proizvodi = Proizvod::getAll($conn);
$result_kategorije = Kategorija::getAll($conn);
?>
<html>

<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<title>PHP Test</title>
</head>
<body>
<nav class="navbar bg-body-secondary">
  <div class="container-fluid">
  <link rel="stylesheet" href="css/style.css">
    <a class="navbar-brand" href="#">
      <img src="images/logo.png" alt="Logo" height="160" class="d-inline-block align-text-top">
      
    </a>
  </div>
</nav>
<div class="container mb-3">
<div class="row g-3 pt-3">

	<div class="col-sm-4">
	<label class="visually-hidden" for="specificSizeInputName">Name</label>
		<input type="text" class="form-control" id="specificSizeInputName" placeholder="">
	</div>
	
	<div class="col-sm-8 text-end">

<?php 
include "content.php";
include "unos.php";
?>
  </div>
</div>
</div>
<div id="lista" class="container">
<?php
echo ispis($proizvodi,$conn);
?>

</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
<script>
	const unosModal = document.getElementById('unos-modal');
	unosModal.addEventListener('show.bs.modal', event => {
	const button = event.relatedTarget;
	const recipient = button.getAttribute('data-action');
	const selectKategorija = $('select#kategorija');
	const modalNazivInput = $('input#naziv');
	const modalAction = $('input#action').val(recipient);
	// If necessary, you could initiate an AJAX request here
	// and then do the updating in a callback.
	console.log($('input#action'));
	// Update the modal's content.
	const modalTitle = unosModal.querySelector('.modal-title');
	//const idInput = unosModal.querySelector('.modal-body input#id')
		if(recipient == "unos"){
			modalTitle.textContent = 'Unesi novi proizvod';
		}else{
			$(modalNazivInput).val(button.getAttribute('data-name'));
			$(selectKategorija).val(button.getAttribute('data-catID'));
			modalTitle.textContent = 'Izmeni proizvod';
		}
	
	//idInput.value = recipient
	})
    function submitForm(){
	 $.ajax({
		type: "POST",
		url: "unesi.php",
		cache:false,
		data: $('form#unosForm').serialize(),
		success: function(response){
			$("#lista").html(response)
			$("#unos-modal").modal('hide');
		},
		error: function(){
			alert("Error");
		}
	});
}
function izmeni(id){
	/*$.ajax({
		type: "POST",
		url: "izmeni.php",
		cache:false,
		data: {id: id},
		success: function(response){
			$("#lista").html(response)
			$("#unos-modal").modal('hide');
		},
		error: function(){
			alert("Error");
		}
	});*/
}
$(document).ready(function(){	
	$("#unosForm").submit(function(event){
        console.log("test");
		submitForm();
		return false;
	});
    $('btn#izmeni').on('click', function(event){
		event.preventDefault();
		
	});
});
</script>
</body>
</html>
