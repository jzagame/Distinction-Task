<html>
    <head>
        <title>Order</title>
        <style>
            table{
                border-collapse: separate;
                border-spacing: 0 15px;
            }
            td{
                padding: 5px;
            }
            .tdname{
                width: 10%;
            }
        </style>
    </head>
    <body>
        <?php 
            include "database.php";
            include "menu.php";
            error_reporting(0);
        ?>
        <div class="container-fluid pt-4" style="width: 95%;">
            <div class="row" style="text-align: center;">
                <div class="col-xl-12">
                    <h3><bold>Add Order</bold></h3>
                    <hr>
                </div>
                <div class="col-xl-12">
                    <form method="POST" action="#">
                        <table border="0" style="width: 100%;">
                            <tr>
                                <td>Customer IC : </td>
                                <td colspan="3"><input type="text" class="form-control" aria-label="Default" name="cust-ic" aria-describedby="inputGroup-sizing-default" required></td>
                            </tr>
                            <tr>
                                <td>Customer Name : </td>
                                <td colspan="3"><input type="text" class="form-control" aria-label="Default" name="cust-name" aria-describedby="inputGroup-sizing-default" required></td>
                            </tr>
                            <tr>
                                <td colspan="4" style="text-align: center;"><h4><bold>Select Food</bold></h4></td>
                            </tr>
                            <?php 
                                $sql = "select * from tblresmenu";
                                $data = $conn -> query($sql);
                                while($result = $data -> fetch_array(MYSQLI_ASSOC)){
                                ?>
                                <td><img src="../<?php echo $result['menu_image_path']; ?>"></td>
                                <td><?php echo $result['menu_name']; ?></td>
                                <td><?php echo $result['menu_price']; ?></td>
                                <td><?php echo $result['menu_description'];  ?></td>
                                <?php
                                }
                            ?>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>