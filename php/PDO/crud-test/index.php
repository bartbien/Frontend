<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>

<body>
	<table>
          <tbody>
           <?php 
		   include 'database.php';
		   
		   $pdo = Database::connect();
		   
		   $sql = 'SELECT * FROM customers ORDER BY id DESC';
 		   
		   $stmt = $pdo->query($sql);
		   $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
		   
		   echo $data[0]['id'];
		   echo "<br>";
		   echo $data[1]['id'];
		   
//		   foreach ($pdo->query($sql) as $row) 
// 		   {
//			   echo '<tr>';
//			   echo '<td>'. $row['name'] . '</td>';
//			   echo '<td>'. $row['email'] . '</td>';
//			   echo '<td>'. $row['mobile'] . '</td>';
//   			   echo '<td>'. $row['id'] . '</td>';
//			   echo '</tr>';
//		   }
		   
		   Database::disconnect();
		  ?>
	      </tbody>
            </table>
 
  </body>
</html>