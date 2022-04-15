<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Wedding Booking</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<header class="p-3 bg-dark text-white">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-center">
          <h1 class="nav-header text-white">F130368</h1>
      </div>
    </div>
  	</header>
	<main>
		<form class="container-sm" onsubmit="wedding.php">
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
		<?php
		
		?>
	</main>
</body>
</html>