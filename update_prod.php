<?php
require_once 'components/db_connect.php';

if ($_GET['id']) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM productss WHERE id = {$id}";
    $result = mysqli_query($connect, $sql);
    if (mysqli_num_rows($result) == 1) {
        $data = mysqli_fetch_assoc($result);
        $name = $data['name'];
        $price = $data['price'];
        $quantity = $data['quantity'];
      echo $id;
    } else {
        header("location: error.php");
    }
    mysqli_close($connect);
} else {
    header("location: error.php");
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Edit</title>
        <?php require_once 'components/boot.php'?>
        <style type= "text/css">
            fieldset {
                margin: auto;
                margin-top: 100px;
                width: 60% ;
            }  
            .img-thumbnail{
                width: 70px !important;
                height: 70px !important;
            }     
        </style>
    </head>
    <body class="bg-black text-white">
        <fieldset>
            <legend class='h2'>Update request </legend>
            <form action="actions/a_update.php"  method="post" enctype="multipart/form-data">
                <table class="table text-white">
                    <tr>
                        <th>Name</th>
                        <td><input class='form-control' type="text" name="name"  value="<?php echo $name ?>" /></td>
                    </tr>    
                    <tr>
                        <th>Price</th>
                        <td><input class='form-control' type="number" name= "price"  step="any" value="<?php echo $price ?>"  /></td>
                    </tr>
                    <tr>
                        <th>Quantity</th>
                        <td><input class='form-control' type="number" name= "quantity"  value="<?php echo $quantity ?>" /></td>
                    </tr>
                    
                    <tr>
                    <tr>
                        <input type= "hidden" name= "id" value= "<?php echo $data['id'] ?>" />
                       
                        <td><button class="btn btn-success" type= "submit">Save Changes</button></td>
                        <td><a href= "index.php"><button class="btn btn-warning" type="button">Home</button></a></td>
                        
                    </tr>
                </table>
            </form>
            
        </fieldset>
        
    </body>
</html>
