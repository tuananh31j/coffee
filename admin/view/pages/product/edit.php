<?php
    if(is_array($dm)){
        extract($dm);
    }
    $hinhpath="../upload/".$img;
    if(is_file($hinhpath)){
        $hinh="<img src='".$hinhpath."' height='80'>";
    } else{
        $hinh ="no photo";
    }
?>
<div class="row">
            <div class="row frmtitle">
               <h1>Cập nhật loại hàng hóa</h1>
            </div>
            <div class="row frmcontent">
            <form action="index.php?act=updatesp" method="post" enctype="multipart/form-data" >
                    <div class="row mb10">
                    <section name="iddm">
                        <option value="0" selected>Tất cả</option>
                        <?php
                            foreach ($listdanhmuc as $danhmuc) {
                                extract($danhmuc);
                                if($iddm==$product_id) $s="selected"; else $s="";
                                echo '<option value="'.$id.'">'.$name.'</option>';
                               
                            }
                        ?>                 
                    </section>
                    </div>
                    <div class="row mb10">
                        Tên sản phẩm <br>
                    <input type="text" name="tensp">
                    </div>
                    <div class="row mb10">
                        Gía <br>
                    <input type="text" name="giasp">
                    </div>
                    <div class="row mb10">
                        Hình <br>
                    <input type="file" name="hinh">
                    </div>
                    <div class="row mb10">
                        Mô tả <br>
                    <textarea name="mota"  cols="30" rows="10"></textarea>
                    <div class="row mb10">
                        Trạng thái <br>
                    <input type="text" name="trangThai">
                    <div class="row mb10">
                        Lượt xem <br>
                    <input type="text" name="luotXem">
                    </div>
                    <div class="row mb10">
                        <input type="hidden" name="id" value="<?=$id?>">
                        <input type="submit" name="capnhat" value="Cập nhật">
                        <input type="reset" value="Nhập lại">
                        <a href="index.php?act=lissp"><input type="button" value="Danh sách"></a>
                    </div>
                    <?php
                        if(isset($thongbao)&&($thongbao!="")) echo $thongbao;
                    ?>

                </form>
            </div>
        </div>
    </div>