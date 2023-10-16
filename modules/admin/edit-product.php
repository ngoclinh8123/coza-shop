            <!-- edit product -->
            <?php
                ini_set('display_errors',0);
                include_once './modules/admin/heading-ad.php';
                include_once './modules/handle/connect-database.php';
                if($connect){
                    $sql='select * from product where id = '.$_GET['id'];
                    $result=mysqli_query($connect,$sql);
                    $data=array();
                    while($row=mysqli_fetch_array($result)){
                        array_push($data,$row);
                    }
                }
                // echo '<pre>';print_r($data);echo '</pre>';

                $dataClass=array();
                if($connect){
                    $sql='select * from class';
                    $result= mysqli_query($connect,$sql);
                    while($row=mysqli_fetch_array($result)){
                        array_push($dataClass,$row);
                    }
                }
                // echo '<pre>';print_r($dataClass);

                // $dataSize=array();
                // if($connect){
                //     $sql='select * from size';
                //     $result= mysqli_query($connect,$sql);
                //     while($row=mysqli_fetch_array($result)){
                //         array_push($dataSize,$row);
                //     }
                // }
                // ini_set('display_errors','off');
                $data=$data[0];
                $image=explode('|',$data['image']);
            ?>
            <div class="ap-block">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-title-heading">Sửa sản phẩm</div>
                    

                    <div class="form-big-row">
                        <div class="form-big-col">
                            <!-- product class -->
                            <div class="form-row">
                                <div class="form-title">Phân loại<span>(Bắt buộc)</span></div>
                                <select name="add-class" id="">
                                    <?php
                                        foreach($dataClass as $key => $value){
                                            if($value['code']==$data['class']){
                                                echo '<option value="'.$value['code'].'" selected>'.$value['name'].'</option>';
                                            }else{
                                                echo '<option value="'.$value['code'].'">'.$value['name'].'</option>';
                                            }
                                        }
                                    ?>
                                    
                                </select>
                            </div>
                            <!-- product name -->
                            <div class="form-row">
                                <div class="form-title">Tên <span>(Bắt buộc)</span></div>
                                <?php 
                                    if(isset($_POST['add-name']) && trim($_POST['add-name'])!=""){
                                        echo '<input type="text" name="add-name" value="'.$_POST['add-name'].'">';
                                    }else{
                                        echo '<input type="text" name="add-name" value="'.$data['name'].'" class="input-error">';
                                        echo '<div class="form-error">Trường này không được để trống</div>';
                                    }
                                ?>
                            </div>
        
                            <!-- product description -->
                            <div class="form-row">
                                <div class="form-title">Mô tả</div>
                                <?php 
                                    if(isset($_POST['add-desc']) && trim($_POST['add-desc'])!=""){
                                        echo '<textarea class="add-textarea" name="add-desc">'.$_POST['add-desc'].'</textarea>';
                                    }else{
                                        echo '<textarea class="add-textarea" name="add-desc">'.$data['description'].'</textarea>';
                                    }
                                ?>
                            </div>

                            <div class="form-row">
                                
                            </div>
        
                            <!-- product price -->
                            <div class="form-row">
                                <div class="form-title">Giá tiền(VNĐ) <span>(Bắt buộc)</span></div>
                                
                                <?php 
                                    if(isset($_POST['add-price']) && trim($_POST['add-price'])!=""){
                                            echo '<input type="number" name="add-price" min="0" value="'.$_POST['add-price'].'">';
                                    }else{
                                            echo '<input type="number" name="add-price" min="0" class="input-error" value="'.$data['price'].'">';
                                            echo '<div class="form-error">Trường này không được để trống</div>';
                                    }
                                ?>
                            </div>
                    
                    </div>
                    <div class="form-big-col">
                        <!-- product image -->
                        <div class="form-row">
                            <div class="form-title">Hình ảnh(1) <span>(Bắt buộc)</span></div>
                            <div class="ep-img">
                            <?php
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
                                        echo '<img src="'.$path.$image[2].'">';

                                    } 
                                ?>
                            </div>
                            <input type="file" name="add-image-3">
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
                include_once './modules/handle/function.php';
                // include './modules/handle/connect-database.php';

                $id=$_GET["id"];

                $class=$_POST['add-class'];
                $id2=str_pad($id,4,"0",STR_PAD_LEFT);
                $code=$class.$id2;
                // echo $class;
                $name=$_POST['add-name'];
                $desc=$_POST['add-desc'];
                $price=$_POST['add-price'];
                $color=$_POST['add-color'];
                if( trim($_POST['add-name'])!="" && trim($_POST['add-price'])!=""){
                    // if(trim($_FILES['add-image-1']['tmp_name'])!="" && trim($_FILES['add-image-2']['tmp_name'])!=""  && trim($_FILES['add-image-3']['tmp_name'])!=""){

                    // }
                    $path='./includes/images/';
                    if(trim($_FILES['add-image-1']['tmp_name'])!=""){
                        // xoa anh cu
                        $value=$path.$image[0];
                        unlink($value);

                        // them anh moi
                        $image1Name=createImageName($_FILES['add-image-1']);
                        $destination=$path.$image1Name;
                        move_uploaded_file($_FILES['add-image-1']['tmp_name'],$destination);
                        $image[0]=$image1Name;
                    }
                    if(trim($_FILES['add-image-2']['tmp_name'])!=""){
                        // xoa anh cu
                        $value=$path.$image[1];
                        unlink($value);

                        // them anh moi
                        $image2Name=createImageName($_FILES['add-image-2']);
                        $destination=$path.$image2Name;
                        move_uploaded_file($_FILES['add-image-2']['tmp_name'],$destination);
                        $image[1]=$image2Name;
                    }
                    if(trim($_FILES['add-image-3']['tmp_name'])!=""){
                        // xoa anh cu
                        $value=$path.$image[2];
                        unlink($value);

                        // them anh moi
                        $image3Name=createImageName($_FILES['add-image-3']);
                        $destination=$path.$image3Name;
                        move_uploaded_file($_FILES['add-image-3']['tmp_name'],$destination);
                        $image[2]=$image3Name;
                    }

                    $image=implode('|',$image);

                    
                    // $sql='update product set class="'.$class.'" name="'.$name.'",description="'.$desc.'",image="'.$image.'",price="'.$price.'",dimension="'.$dimension.'",color="'.$color.'",size="'.$size.'",weight="'.$weight.'",material="'.$material.'" where id='.$id;
                    $sql="update product set code='".$code."', class='".$class."', name='".$name."',description='".$desc."',image='".$image."',price='".$price."' where id=".$id;
                    if($connect){
                        if(mysqli_query($connect,$sql)){
                            echo '<div class="add-success-model"><div class="add-success-title"><span class="add-sucess-message">Sửa dữ liệu thành công</span><span class="add-sucess-button"><a href="danh-sach-san-pham">OK</a></span></div></div>';
                        }else{
                            
                            echo '<div class="add-success-model"><div class="add-success-title"><span class="add-sucess-message">Có lỗi xảy ra</span><span class="add-sucess-button"><a href="">OK</a></span></div></div>';
                        } 
                    }
                }else{
                    // echo '<div class="add-success-model"><div class="add-success-title"><span class="add-sucess-message">Thêm dữ liệu thành công</span><span class="add-sucess-button"><a href="">OK</a></span></div></div>';
                }
            ?>
        <?php
            include './modules/admin/foot-ad.php';
        ?>
        