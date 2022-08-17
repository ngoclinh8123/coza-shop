            <!-- edit product -->
            <?php
                ini_set('display_errors',0);
                include './heading-ad.php';
                include '../handle/connect-database.php';
                if($connect){
                    $sql='select * from product where id = '.$_GET['id'];
                    $result=mysqli_query($connect,$sql);
                    $data=array();
                    while($row=mysqli_fetch_array($result)){
                        array_push($data,$row);
                    }
                }
                // ini_set('display_errors','off');
                $data=$data[0];
                $image=explode('|',$data['productimage']);
            ?>
            <div class="ap-block">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-title-heading">Sửa sản phẩm</div>
                    

                    <div class="form-big-row">
                        <div class="form-big-col">

                        <!-- product name -->
                        <div class="form-row">
                        <div class="form-title">Tên <span>(Bắt buộc)</span></div>
                        <?php 
                            if(isset($_POST['add-name']) && trim($_POST['add-name'])!=""){
                                echo '<input type="text" name="add-name" value="'.$_POST['add-name'].'">';
                            }else{
                                echo '<input type="text" name="add-name" value="'.$data['productname'].'" class="input-error">';
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
                                    echo '<textarea class="add-textarea" name="add-desc" class="input-error">'.$data['productdescription'].'</textarea>';
                                    echo '<div class="form-error">Trường này không được để trống</div>';
                                }
                            ?>
                        </div>

                        <div class="form-row">
                            
                        </div>
        
                        <!-- product image -->
                        <div class="form-row">
                            <div class="form-title">Hình ảnh(1) <span>(Bắt buộc)</span></div>
                            <div class="ep-img">
                            <?php
                                    // $path="./includes/images/";
                                    $path="./includes/images/";
                                    if($_FILES["add-image-1"]['error']===UPLOAD_ERR_OK){
                                        echo '<img src="'.$path.$_FILES["add-image-1"]["name"].'">';
                                    }else{
                                        echo '<img src="'.$path.$image[0].'">';

                                    } 
                                ?>
                            </div>
                            <input type="file" name="add-image-1" >
                            <div class="form-title">Hình ảnh(2) <span>(Bắt buộc)</span></div>
                            <div class="ep-img">
                            <?php
                                    $path="./includes/images/";
                                    if($_FILES["add-image-2"]['error']===UPLOAD_ERR_OK){
                                        echo '<img src="'.$path.$_FILES["add-image-2"]["name"].'">';
                                    }else{
                                        echo '<img src="'.$path.$image[1].'">';

                                    } 
                                ?>
                            </div>
                            <input type="file" name="add-image-2">
                            <div class="form-title">Hình ảnh(3) <span>(Bắt buộc)</span></div>
                            <div class="ep-img">
                                <?php
                                    $path="./includes/images/";
                                    if($_FILES["add-image-3"]['error']===UPLOAD_ERR_OK){
                                        echo '<img src="'.$path.$_FILES["add-image-3"]["name"].'">';
                                    }else{
                                        echo '<img src="'.$path.$_image[2].'">';

                                    } 
                                ?>
                            </div>
                            <input type="file" name="add-image-3">
                            
                        </div>
                        <div class="form-row">
                            <div class="form-title">Giá tiền(VNĐ) <span>(Bắt buộc)</span></div>
                            
                            <?php 
                                if(isset($_POST['add-price']) && trim($_POST['add-price'])!=""){
                                        echo '<input type="number" name="add-price" min="0" value="'.$_POST['add-price'].'">';
                                }else{
                                        echo '<input type="number" name="add-price" min="0" class="input-error" value="'.$data['productprice'].'">';
                                        echo '<div class="form-error">Trường này không được để trống</div>';
                                }
                            ?>
                        </div>
                    
                    </div>
                        <div class="form-big-col">
                            <div class="form-row">
                                <div class="form-title">Màu sắc</div>
                                <?php
                                    if(isset($_POST['add-color'])){
                                        echo '<input type="text" name="add-color" placeholder="Trắng|Nâu|...." value="'.$_POST['add-color'].'">';
                                    }else echo '<input type="text" name="add-color" placeholder="Trắng|Nâu|...." value="'.$data['productcolor'].'">'
                                ?>
                                
                            </div>
                            <div class="form-row">
                                <div class="form-title">Chất liệu</div>
                                <?php
                                    if(isset($_POST['add-material'])){
                                        echo '<input type="text " name="add-material" value="'.$_POST['add-material'].'" />';
                                    }else echo '<input type="text " name="add-material" value="'.$data['productmaterial'].'">'
                                ?>
                            </div>
                            <div class="form-row">
                                <div class="form-title">Khối lượng</div>
                                <?php
                                    if(isset($_POST['add-weight'])){
                                        echo '<input type="text " name="add-weight" value="'.$_POST['add-weight'].'" />';
                                    }else echo '<input type="text " name="add-weight" value="'.$data['productweight'].'">'
                                ?>
                            </div>
                            <div class="form-row-size">
                            <div class="form-title">Size </div>
                                <?php 
                                $size=$data['productzise'];
                                $size=explode("|",$size);
                                $keyS=false;
                                $keyM=false;
                                $keyL=false;
                                $keyXL=false;
                                $key37=false;
                                $key38=false;
                                $key39=false;
                                $key40=false;
                                $key41=false;
                                $key42=false;
                                if(!empty($size)){
                                    foreach($size as $key=>$value){
                                        if($value=="S") $keyS=true;
                                        else if($value=="M") $keyM=true;
                                        else if($value=="L") $keyL=true;
                                        else if($value=="XL") $keyXL=true;
                                        else if($value=="37") $key37=true;
                                        else if($value=="38") $key38=true;
                                        else if($value=="39") $key39=true;
                                        else if($value=="40") $key40=true;
                                        else if($value=="41") $key39=true;
                                        else if($value=="42") $key39=true;
                                    }
                                }
                                
                                ?>
                                <span class="form-add-size"><span>S</span><input type="checkbox" name="add-size[]" value="S" <?php if($keyS) echo "checked"; ?> ></span>
                                <span class="form-add-size"><span>M</span><input type="checkbox" name="add-size[]" value="M" <?php if($keyM) echo "checked"; ?> ></span>
                                <span class="form-add-size"><span>L</span><input type="checkbox" name="add-size[]" value="L" <?php if($keyL) echo "checked"; ?> ></span>
                                <span class="form-add-size"><span>XL</span><input type="checkbox" name="add-size[]" value="XL" <?php if($keyXL) echo "checked"; ?> ></span>
                                <span class="form-add-size"><span>37</span><input type="checkbox" name="add-size[]" value="37" <?php if($key37) echo "checked"; ?> ></span>
                                <span class="form-add-size"><span>38</span><input type="checkbox" name="add-size[]" value="38" <?php if($key38) echo "checked"; ?> ></span>
                                <span class="form-add-size"><span>39</span><input type="checkbox" name="add-size[]" value="39" <?php if($key39) echo "checked"; ?> ></span>
                                <span class="form-add-size"><span>40</span><input type="checkbox" name="add-size[]" value="40" <?php if($key40) echo "checked"; ?> ></span>
                                <span class="form-add-size"><span>41</span><input type="checkbox" name="add-size[]" value="41" <?php if($key41) echo "checked"; ?> ></span>
                                <span class="form-add-size"><span>42</span><input type="checkbox" name="add-size[]" value="42" <?php if($key42) echo "checked"; ?> ></span>
                            </div>
                            <div class="form-row">
                                <div class="form-title">Kích thước</div>
                                <?php
                                    if(isset($_POST['add-dimension'])){
                                        echo '<input type="text " name="add-dimension" value="'.$_POST['add-dimension'].'" />';
                                    }else echo '<input type="text " name="add-dimension" value="'.$data['productdimension'].'">'
                                ?>
                            </div>
                            <div class="form-row">
                                <div class="add-btn">
                                    <input type="submit" value="Cập Nhật">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <?php
                include '../handle/function.php';
                include '../handle/connect-database.php';

                $id=$_GET["id"];

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
                    // sau khi cap nhat thi xoa anh cu di
                    foreach($image as $key=>$value){
                        unlink($value);
                    }
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

                    
                    $sql='update product set productname="'.$name.'",productdescription="'.$desc.'",productimage="'.$image.'",productprice="'.$price.'",productdimension="'.$dimension.'",productcolor="'.$color.'",productzise="'.$size.'",productweight="'.$weight.'",productmaterial="'.$material.'" where id='.$id;
                    if($connect){
                        if(mysqli_query($connect,$sql)){
                            echo '<div class="add-success-model"><div class="add-success-title"><span class="add-sucess-message">Thêm dữ liệu thành công</span><span class="add-sucess-button"><a href="./list-product.php">OK</a></span></div></div>';
                        }else{
                            
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
        