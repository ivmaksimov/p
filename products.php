<?php

require_once 'components/db_connect.php';


$res = mysqli_query($connect, "SELECT * FROM productss" );
$row = mysqli_fetch_array($res, MYSQLI_ASSOC);


$sql = "SELECT * FROM productss";
$result = mysqli_query($connect ,$sql);
$tbody=''; //this variable will hold the body for the table
if(mysqli_num_rows($result)  > 0) {     
    while($rows = mysqli_fetch_array($result, MYSQLI_ASSOC)){         
        $tbody .= "<tr>
            <td>" .$rows['id']."</td>
            
            <td>" .$rows['name']."</td>
            <td>" .$rows['price']."</td>
            <td>" .$rows['quantity']."</td>
            
            
            
            <td><a href='update_prod.php?id=" .$rows['id']."'><button class='btn btn-primary btn-sm' type='button'>Edit</button></a>
            <a href='delete_prod.php?id=" .$rows['id']."'><button class='btn btn-danger btn-sm' type='button'>Delete</button></a></td>
            </tr>";
    };
} else {
    $tbody =  "<tr><td colspan='5'><center>No Data Available </center></td></tr>";
}












mysqli_close($connect);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Welcome - <?php echo $row['first_name']; ?></title>
  <?php require_once 'components/boot.php' ?>
  <style>
      .userImage {
          width: 200px;
          height: 200px;
      }

      .hero {
          background: rgb(2, 0, 36);
          background: linear-gradient(24deg, rgba(2, 0, 36, 1) 0%, rgba(0, 212, 255, 1) 100%);
      }
  </style>
</head>

<body>
  <div class="container">
     
  </div>
  <div>
    <p class='h2 d-inline'>Products</p>
     <a href='./products.php'><button class='btn btn-primary btn-sm' type='button'>Back</button></a>
            <table class='table '>
                <thead class='table-success'>
                    <tr >
                        <th>ID</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Quantiy</th>
                        
                    </tr>
                </thead>
                <tbody >
                    <?= $tbody;?>
                </tbody>
            </table>
  </div>
</body>
</html>