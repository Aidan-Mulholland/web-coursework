<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Wedding Booking</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<script>
		$(document).ready(()=> {
			$("form").submit((event) => {
				event.preventDefault();
				let cdate = $("#date").val();
				let csize = $("#size").val();
				let cgrade = $("#catering").val();
				$.ajax({
					url: "request.php",
					type: "POST",
					data: {date:cdate,size:csize,grade:cgrade},
					success: (responseData) => {
						$(".table").children("tbody").html(responseData);
					},
					error: (xhr,status,error) => {
						console.log(xhr.status + ': ' + xhr.statusText);
					}
				});
			})
		})
	</script>
</head>
<body>
<header class="p-3 bg-dark text-white">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-center">
          <h1 class="nav-header text-white">F130368</h1>
      </div>
    </div>
  	</header>
	<main class="m-5 justify-content-center">
		<form class="w-25 container-sm mb-5">
			<div class="row mb-3">
				<div class="mb-3">
					<label for="date" class="form-label">Example label</label>
					<input name="date" class="form-control" id="date" type="date">
				</div>
				<div class="mb-3">
					<label for="size" class="form-label">Party size</label> 
					<input name="size" class="form-control" id="size" type="number">
				</div>
				<div class="mb-3">
					<label for="catering" class="form-label">Catering grade</label>
					<select name="catering" class="form-select" id="catering">
						<option selected>Choose catering grade</option>
						<option value="1">Grade 1</option>
						<option value="2">Grade 2</option>
						<option value="3">Grade 3</option>
						<option value="4">Grade 4</option>
						<option value="5">Grade 5</option>
					</select>
				</div>
				<div class="d-grid gap-2 col-6 mx-auto">
					<button class="btn btn-primary" type="submit">Submit</button>
				</div>
			</div>
		</form>
		<table class="table">
    		<thead>
				<tr>
					<th>Name</th>
					<th>Capacity</th>
					<th>Licensed</th>
					<th>Catering cost / person</th>
					<th>Price</th>
					<th>Number of bookings</th>
				</tr>
			</thead>
			<tbody></tbody>
		</table>
	</main>
</body>
</html>