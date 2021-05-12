<html>
    <head>
        <title>Add Menu</title>
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
            include "menu.php";
        ?>
        <div class="container-fluid" style="width:95%">
            <div class="row">
                <div class="col-xl-12 my-auto">
                    <form method="POST" action="./Alex/AddMenu.php">
                        <table border="0" style="width: 100%;">
                            <tr>
                                <td colspan="2" style="height: 300px;">
                                    <div id="upload-image preview">

                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="inputGroupFile02">
                                            <label class="custom-file-label" for="inputGroupFile02">Choose file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="">Upload</span>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="tdname">Menu Name</td>
                                <td>
                                    <div class="input-group">
                                        <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="tdname">Price</td>
                                <td>
                                    <div class="input-group">
                                        <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="tdname">Ingredients</td>
                                <td>
                                    <div class="input-group">
                                        <textarea class="form-control" aria-label="With textarea" style="height: 150px;"></textarea>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="tdname">Description</td>
                                <td>
                                    <div class="input-group">
                                        <textarea class="form-control" aria-label="With textarea" style="height: 150px;"></textarea>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" style="text-align: center;">
                                    <button type="submit" class="btn btn-md btn-primary" value="restaurant-submit">Submit</button>
                                    <button type="reset" class="btn btn-md btn-primary" value="restaurant-reset">Clear</button>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
                <div class="col-xl-12" style="background-color: black;">
                    
                </div>
            </div>
            <footer class="page-footer font-small teal pt-4">
                <div class="container-fluid text-center text-md-left">
                    <div class="row">
                        <div class="col-md-6 mt-md-0 mt-3">
                            <h5 class="text-uppercase font-weight-bold">Footer text 1</h5>
                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Expedita sapiente sint, nulla, nihil
                            repudiandae commodi voluptatibus corrupti animi sequi aliquid magnam debitis, maxime quam recusandae
                            harum esse fugiat. Itaque, culpa?</p>
                        </div>
                        <hr class="clearfix w-100 d-md-none pb-3">
                        <div class="col-md-6 mb-md-0 mb-3">
                            <h5 class="text-uppercase font-weight-bold">Footer text 2</h5>
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Optio deserunt fuga perferendis modi earum
                                commodi aperiam temporibus quod nulla nesciunt aliquid debitis ullam omnis quos ipsam, aspernatur id
                                excepturi hic.</p>
                        </div>
                    </div>
                </div>
                <div class="footer-copyright text-center py-3">© 2020 Copyright:
                    <a href="https://mdbootstrap.com/"> MDBootstrap.com</a>
                </div>
            </footer>
        </div>
    </body>
</html>