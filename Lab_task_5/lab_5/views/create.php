<?php include "../db/config.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php
            if(isset($_GET['edit_id'])){
                echo "Edit Product";
            }
            else{
                echo "Create Product";
            }
        ?>
    </title>
</head>
<body>
    <fieldset>
        <legend>
            <?php
                if(isset($_GET['edit_id'])){
                    echo "Edit Product";
                }
                else{
                    echo "Create Product";
                }
            ?>
        </legend>

        <?php
            if(isset($_GET['edit_id'])){
                $id = $_GET['edit_id'];
                $sql = 'select * from products where id = "' . $id . '"';
                $db_result = mysqli_query($db, $sql);
                $product = null;
                while($row = mysqli_fetch_assoc($db_result)){
                    $product = $row;
                }
                ?>
                    <form action="../controllers/action.php" method="post">
                        <table>
                            <tr>
                                <td width="10%">Name</td>
                                <td>:</td>
                                <td><input type="text" value="<?=$product['name']?>" name="name"></td>
                            </tr>
                            <tr>
                                <td width="10%">Buying Price</td>
                                <td>:</td>
                                <td><input type="text" value="<?=$product['buying_price']?>" name="buying_price"></td>
                            </tr>
                            <tr>
                                <td width="10%">Selling Price</td>
                                <td>:</td>
                                <td><input type="text" value="<?=$product['selling_price']?>" name="selling_price"></td>
                            </tr>
                            <tr>
                                <td width="10%">Status</td>
                                <td>:</td>
                                <td>
                                    <select name="status" id="">
                                        <option value="0" <?php if($product['status'] == 0){ echo "selected";}?> >Inactive</option>
                                        <option value="1" <?php if($product['status'] == 1){ echo "selected";}?> >Active</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="hidden" name="edit_id" value="<?=$product['id']?>">
                                    <input type="submit" value="Submit" name="update">
                                </td>
                            </tr>
                        </table>
                    </form>
                <?php
            }
            else{
                ?>
                    <form action="../controllers/action.php" method="post">
                        <table>
                            <tr>
                                <td width="10%">Name</td>
                                <td>:</td>
                                <td><input type="text" name="name"></td>
                            </tr>
                            <tr>
                                <td width="10%">Buying Price</td>
                                <td>:</td>
                                <td><input type="text" name="buying_price"></td>
                            </tr>
                            <tr>
                                <td width="10%">Selling Price</td>
                                <td>:</td>
                                <td><input type="text" name="selling_price"></td>
                            </tr>
                            <tr>
                                <td width="10%">Status</td>
                                <td>:</td>
                                <td>
                                    <select name="status" id="">
                                        <option value="0" >Inactive</option>
                                        <option value="1" >Active</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="submit" value="Submit" name="submit">
                                </td>
                            </tr>
                        </table>
                    </form>
                <?php
            }
        ?>

    </fieldset>
</body>
</html>