<html>
    <head>
        <Title>Edit And View</Title>
    </head>
    
    <body>
        <?php 
            include "menu.php";
            include "database.php";
        ?>
        <div class="container-fluid" style="width: 95%;">
            <div class="row">
                <div class="col-xl-12 pt-4" style="text-align: center;">
                    <h3><bold>Edit And View Restaurant Menu</bold></h3>
                    <hr>
                </div>
                <div class="col-xl-12 my-auto">
                    <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%" style="text-align: center;">
                        <thead>
                            <tr>
                                <th class="th-sm">No</th>
                                <th class="th-sm">Menu Name</th>
                                <th class="th-sm">Description</th>
                                <th class="th-sm">Ingredients</th>
                                <th class="th-sm">Price</th>
                                <th class="th-sm">View</th>
                                <th class="th-sm">Amend</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $sql = "select * from tblresmenu";
                                $data = $conn -> query($sql);
                                $i = 0;
                                while($result = $data -> fetch_array(MYSQLI_ASSOC)){
                            ?>
                                <tr>
                                    <td><?php echo $i+1;?></td>
                                    <td><?php echo $result['menu_name']?></td>
                                    <td><?php echo $result['menu_ingredients']; ?></td>
                                    <td><?php echo $result['menu_description']; ?></td>
                                    <td><?php echo $result['menu_price']; ?></td>
                                    <td><a data-toggle="modal" data-target="#exampleModalCenter" onclick="SetPicture('<?php echo $result['menu_image_path']; ?>')">View</a></td>
                                    <td><a href="EditRestMenu.php?mid=<?php echo $result['menu_id']; ?>">Edit</a></td>
                                </tr>
                            <?php
                                    $i++;
                                }
                            ?>
                        </tbody>
                    </table>   
                </div>            
            </div>     
        </div>
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <img alt="Picture" id="view_image" height="200px">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $('#myModal').on('shown.bs.modal', function () {
                $('#myInput').trigger('focus');
            });

            function SetPicture(x){
                $("#view_image").attr("src", x);
            }
        </script>
    </body>
</html>