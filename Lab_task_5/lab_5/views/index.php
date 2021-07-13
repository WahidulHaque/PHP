<?php include "../db/config.php";?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab Task 5</title>
</head>
<body>
    <section>
        <a href="create.php" style="padding: 10px;">Add Product</a>
        <fieldset>
            <legend>Products Table</legend>
            <table style="border-collapse: collapse; border: 1px solid #000;width: 100%;">
                <thead>
                    <th style="border-collapse: collapse; border: 1px solid #000;">Sl.</th>
                    <th style="border-collapse: collapse; border: 1px solid #000;">Name</th>
                    <th style="border-collapse: collapse; border: 1px solid #000;">Buying Price</th>
                    <th style="border-collapse: collapse; border: 1px solid #000;">Selling Price</th>
                    <th style="border-collapse: collapse; border: 1px solid #000;">Profit</th>
                    <th style="border-collapse: collapse; border: 1px solid #000;">Status</th>
                    <th style="border-collapse: collapse; border: 1px solid #000;">Action</th>
                </thead>
                <tbody>
                    <?php
                        $sl = 1;
                        $sql = 'select * from products where status=1';
                        $db_result = mysqli_query($db, $sql);
                        while ($row = mysqli_fetch_assoc($db_result) ) {
                            ?>
                                <tr>
                                    <td style="border-collapse: collapse; border: 1px solid #000;"><?=$sl++?></td>
                                    <td style="border-collapse: collapse; border: 1px solid #000;"><?=$row['name'];?></td>
                                    <td style="border-collapse: collapse; border: 1px solid #000;"><?=$row['buying_price'];?></td>
                                    <td style="border-collapse: collapse; border: 1px solid #000;"><?=$row['selling_price'];?></td>
                                    <td style="border-collapse: collapse; border: 1px solid #000;"><?=($row['selling_price'] - $row['buying_price']);?></td>
                                    <td style="border-collapse: collapse; border: 1px solid #000;">
                                        <?php
                                            if($row['status'] == 1){
                                                echo "Active";
                                            }
                                            else{
                                                echo "Inactive";
                                            }
                                        ?>
                                    </td>
                                    <td style="border-collapse: collapse; border: 1px solid #000;">
                                        <table>
                                            <tr>
                                                <td width="10%" style="border-collapse: collapse; border: 1px solid #000;">
                                                    <a href="create.php?edit_id=<?php echo $row['id'];?>" >EDIT</a>
                                                </td>
                                                <td width="10%" style="border-collapse: collapse; border: 1px solid #000;">
                                                    <a href="../controllers/action.php?delete_id=<?=$row['id'];?>" >Delete</a>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            <?php
                        }
                    ?>
                </tbody>
            </table>
        </fieldset>
    </section>
</body>
</html>