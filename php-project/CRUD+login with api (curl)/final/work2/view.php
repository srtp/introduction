<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>CRUD Operation on JSON File using PHP</title>
</head>
<body>
<table border="1" align="center">
    <tr>
        <td colspan="7" align="right"><a href="add.php">Add</a></td>
    </tr>
    <tr>
        <td>user</td>
        <td>password</td>
        <td>email</td>
        <td>age</td>
    </tr>
    <?php
		@$data = file_get_contents('http://localhost:3001/account/');
		$data = json_decode($data);
		$index = 0;
		if(!empty($data)){
		foreach($data as $row){			
        ?>
        <tr>
            <td><?php echo $row->user; ?></td>
            <td><?php echo $row->password; ?></td>
            <td><?php echo $row->email; ?></td>
            <td><?php echo $row->age; ?></td>
            <td><a  href="delete.php?delete_id=<?php echo $row->user; ?>">Delete</a> </td>
        </tr>
        <?php
		$index++;
		}
    }
    ?>
   
</table>
</body>
</html>
