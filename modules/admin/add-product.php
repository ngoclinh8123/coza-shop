
            <!-- add product -->
            <?php
                include './heading-ad.php';
                ini_set('display_errors','off');
            ?>
            <div class="ap-block">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-title-heading">Thêm sản phẩm</div>
                    <div class="form-big-row">
                        <div class="form-big-col">
        
                        <!-- product name -->
                        <div class="form-row">
                        <div class="form-title">Tên <span>(Bắt buộc)</span></div>
                        <?php 
                            if(isset($_POST['add-name']) && trim($_POST['add-name'])!=""){
                                echo '<input type="text" name="add-name" value="'.$_POST['add-name'].'">';
                            }else{
                                echo '<input type="text" name="add-name" value="" class="input-error">';
                                echo '<div class="form-error">Trường này không được để trống</div>';
                            }
                        ?>
                    </div>
        
                        <!-- product description -->
                        <div class="form-row">
                            <div class="form-title">Mô tả <span>(Bắt buộc)</span></div>
                            <?php 
                            if(isset($_POST['add-desc']) && trim($_POST['add-desc'])!=""){
                                    echo '<textarea class="add-textarea" name="add-desc">'.$_POST['add-desc'].'</textarea>';
                                }else{
                                    echo '<textarea class="add-textarea" name="add-desc" class="input-error"></textarea>';
                                    echo '<div class="form-error">Trường này không được để trống</div>';
                                }
                            ?>
                            
                        </div>
        
                        <!-- product image -->
                        <div class="form-row">
                            <div class="form-title">Hình ảnh(1) <span>(Bắt buộc)</span></div>
                            <?php
                                $path="./includes/images/";
                                if($_FILES["add-image-1"]['error']===UPLOAD_ERR_OK){
                                    echo '<img src="'.$path.$_FILES["add-image-1"]["name"].'">';
                                }
                            ?>
                            <input type="file" name="add-image-1" >
                            <div class="form-title">Hình ảnh(2) <span>(Bắt buộc)</span></div>
                            <?php
                                $path="./includes/images/";
                                if($_FILES["add-image-2"]['error']===UPLOAD_ERR_OK){
                                    echo '<img src="'.$path.$_FILES["add-image-2"]["name"].'">';
                                }
                            ?>
                            <input type="file" name="add-image-2">
                            <div class="form-title">Hình ảnh(3) <span>(Bắt buộc)</span></div>
                            <?php
                                $path="./includes/images/";
                                if($_FILES["add-image-3"]['error']===UPLOAD_ERR_OK){
                                    echo '<img src="'.$path.$_FILES["add-image-3"]["name"].'">';
                                }
                            ?>
                            <input type="file" name="add-image-3">
                        </div>
                        <div class="form-row">
                            <div class="form-title">Giá tiền(VNĐ) <span>(Bắt buộc)</span></div>
                            
                            <?php 
                            if(isset($_POST['add-price']) && trim($_POST['add-price'])!=""){
                                    echo '<input type="number" name="add-price" min="0" value="'.$_POST['add-price'].'">';
                                }else{
                                    echo '<input type="number" name="add-price" min="0" class="input-error" >';
                                    echo '<div class="form-error">Trường này không được để trống</div>';
                                }
                            ?>
                        </div>
                    
                    </div>
                        <div class="form-big-col">
                            <div class="form-row">
                                <div class="form-title" placeholder="trắng|nâu|...">Màu sắc</div>
                                <input type="text" name="add-color">
                            </div>
                            <div class="form-row">
                                <div class="form-title">Chất liệu</div>
                                <input type="text " name="add-material">
                            </div>
                            <div class="form-row">
                                <div class="form-title">Khối lượng</div>
                                <input type="text" name="add-weight">
                            </div>
                            <div class="form-row-size">
                                <div class="form-title">Size </div>
                                <span class="form-add-size"><span>S</span><input type="checkbox" name="add-size[]" value="S"></span>
                                <span class="form-add-size"><span>M</span><input type="checkbox" name="add-size[]" value="M"></span>
                                <span class="form-add-size"><span>L</span><input type="checkbox" name="add-size[]" value="L"></span>
                                <span class="form-add-size"><span>XL</span><input type="checkbox" name="add-size[]" value="XL"></span>
                                <span class="form-add-size"><span>37</span><input type="checkbox" name="add-size[]" value="37"></span>
                                <span class="form-add-size"><span>38</span><input type="checkbox" name="add-size[]" value="38"></span>
                                <span class="form-add-size"><span>39</span><input type="checkbox" name="add-size[]" value="39"></span>
                                <span class="form-add-size"><span>40</span><input type="checkbox" name="add-size[]" value="40"></span>
                                <span class="form-add-size"><span>41</span><input type="checkbox" name="add-size[]" value="41"></span>
                                <span class="form-add-size"><span>42</span><input type="checkbox" name="add-size[]" value="42"></span>
                            </div>
                            <div class="form-row">
                                <div class="form-title">Kích thước</div>
                                <input type="text" name="add-dimension">
                            </div>
                            <div class="form-row">
                                <div class="add-btn">
                                    <input type="submit" value="Thêm">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <?php
                include '../handle/function.php';
                include '../handle/connect-database.php';
                
                // echo '<pre>';
                // print_r($_POST);
                // print_r($_FILES);
                // echo '</pre>';

                $name=$_POST['add-name'];
                $desc=$_POST['add-desc'];
                $price=$_POST['add-price'];
                $color=$_POST['add-color'];
                $material=$_POST['add-material'];
                $weight=$_POST['add-weight'];
                $size="";
                if(!empty($_POST['add-size'])){
                    $size=implode("|",$_POST['add-size']);
                }      
                $dimension=$_POST['add-dimension'];
                
                if( trim($_POST['add-name'])!="" && trim($_POST['add-desc'])!="" && trim($_POST['add-price'])!="" && trim($_FILES['add-image-1']['tmp_name'])!="" && trim($_FILES['add-image-2']['tmp_name'])!=""  && trim($_FILES['add-image-3']['tmp_name'])!=""){

                    $path='./includes/images/';
                    $image=array();

                    $image1Name=createImageName($_FILES['add-image-1']);
                    $destination=$path.$image1Name;
                    array_push($image,$image1Name);
                    move_uploaded_file($_FILES['add-image-1']['tmp_name'],$destination);
                        
                    $image2Name=createImageName($_FILES['add-image-2']);
                    $destination=$path.$image2Name;
                    array_push($image,$image2Name);
                    move_uploaded_file($_FILES['add-image-2']['tmp_name'],$destination);

                    $image3Name=createImageName($_FILES['add-image-3']);
                    $destination=$path.$image3Name;
                    array_push($image,$image3Name);
                    move_uploaded_file($_FILES['add-image-3']['tmp_name'],$destination);

                    $image=implode('|',$image);

                    
                    $sql="insert into product(productname,productdescription,productimage,productprice,productdimension,productcolor,productzise,productweight,productmaterial) values('".$name."','".$desc."','".$image."','".$price."','".$dimension."','".$color."','".$size."','".$weight."','".$material."');";
                    if($connect){
                        if(mysqli_query($connect,$sql)){
                            echo "<h1 style='color:red;'>Them du lieu thanh cong </h1>";
                            echo '<div class="add-success-model"><div class="add-success-title"><span class="add-sucess-message">Thêm dữ liệu thành công</span><span class="add-sucess-button"><a href="">OK</a></span></div></div>';
                            
                        }else{
                            echo "<h1 style='color:red;'>Co loi xay ra!!</h1>";
                            echo '<div class="add-success-model"><div class="add-success-title"><span class="add-sucess-message">Có lỗi xảy ra</span><span class="add-sucess-button"><a href="">OK</a></span></div></div>';
                        } 
                    }
                }else{
                    // echo '<div class="add-success-model"><div class="add-success-title"><span class="add-sucess-message">Thêm dữ liệu thành công</span><span class="add-sucess-button"><a href="">OK</a></span></div></div>';
                }
            ?>
        <?php
            include './foot-ad.php';
        ?>