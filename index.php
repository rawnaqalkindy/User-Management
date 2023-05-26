
<!DOCTYPE html>
<html>
<head>
	<title>User Management System</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<body>
    <div class="container">
      <form class= "border shadow p-3 rounded" 
        action="php/check-login.php" 
        method="post"
        > 
        <h1 class="text-center p-3">LOGIN PAGE</h1>
        <?php if (isset($_GET['error'])) { ?>
      	      <div class="alert alert-danger" role="alert">
				  <?=$_GET['error']?>
			  </div>
			  <?php } ?>
        <div class="mb-3">
         <label for="username" class="form-label">Username: </label>
        <input type="text" class="form-control" name= "username" id="username">
    </div>
    <div class="mb-3">
         <label for="displayName" class="form-label">Display Name: </label>
        <input type="text" class="form-control" name= "displayName" id="displayName">
    </div>
    <div class="mb-3">
         <label for="phone" class="form-label">Phone: </label>
        <input type="text" class="form-control" name= "phone"id="phone">
    </div>
    <div class="mb-3">
         <label for="email" class="form-label">Email: </label>
        <input type="text" class="form-control" name= "email" id="email">
    </div>
    <div class="mb-0">
         <label class="form-label">User roles: </label>
    </div>
    <select class="form-select mb-3" name= "userRoles" aria-label="Default select example">
        <option selected value= "guest" >Guest</option>
        <option value="admin">Admin</option>
        <option value="superAdmin">SuperAdmin</option>
    </select>
    <div class="form-check">
        <input class="form-check-input" name="enabled" type="checkbox" value="enabled" id="flexCheckDefault">
        <label class="form-check-label" for="flexCheckDefault">
            Enabled
        </label>
    </div>



    <button type="submit" class="btn btn-primary">Save User</button>
    </form>

    </div>
</body>
</html>