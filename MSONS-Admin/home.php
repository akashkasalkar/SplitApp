<?php
    include "./left_nav.php";
?>
    <div class="col-12">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">Products</div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">

                                        <button class="btn btn-outline-primary btn-sm" onclick="selectImage()">Select
                                            Image</button><br><br>
                                        <input class="form-control" type="text" name="titile" id="title"
                                            placeholder="Product title" disabled><br>
                                        <textarea class="form-control" name="description" id="description" cols="30"
                                            rows="10" disabled placeholder="Description....."></textarea><br>
                                        <button class="btn btn-outline-success btn-sm" id="savebtn" disabled
                                            onclick="uploadImage()">Upload</button><br><br>
                                        <br>

                                    </div>
                                    <div class="col-6">
                                        <div class="card" style="margin-top: 2px;">
                                            <img class="placeholder rounded" id="slider1" src="" alt="" srcset="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <table class="table table-bordered" id="product_table">
                                        <thead>
                                            <tr>
                                                <th>Product Title</th>
                                                <th>Description</th>
                                                <th>Image</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <br>
                      
                       
                    </div>
                 
                </div>
            </div>

<?php 
    include "./footer.php";
?>