<div class="row">
            <div class="row frmtitle mb">
               <h1>Danh sách loại hàng hóa</h1>
            </div>
            <div class="row frmcontent">  
                <div class="row mb10 frmsloai">
                    <form action="index.php?act=listsp" method="post">
                        <input type="text" name="kyw">
                        <section name="iddm">
                        <option value="0" selected>Tất cả</option>
                        <?php
                            foreach ($listdanhmuc as $danhmuc) {
                                extract($danhmuc);
                                echo '<option value="'.$id.'">'.$name.'</option>';
                            }
                        ?>                 
                        </section>
                        <input type="submit" name="listok" value="GO">
                    </form>
                    <table>
                        <tr>
                            <th></th>
                            <th>Mã loại</th>
                            <th>Tên sản phẩm</th>
                            <th>Hình</th>
                            <th>GIÁ</th>
                            <th>CHI TIẾT</th>
                            <th>TRẠNG THÁI</th>
                            <th>Lượt xem</th>
                            <th></th>
                        </tr>
                        <?php
                            foreach ($listsanpham as $sanpham) {
                                extract($sanpham);
                                $suasp="index.php?act=suasp&id=".$id;
                                $xoasp="index.php?act=xoasp&id=".$id;
                                $hinhpath="../upload/".$image_url;
                                if(is_file($hinhpath)){
                                    $hinh="<img src='".$hinhpath."' height='80'>";
                                } else{
                                    $hinh ="no photo";
                                }
                                echo '<tr>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td>'.$id.'</td>
                                        <td>'.$name.'</td>
                                        <td>'.$hinh.'</td>
                                        <td>'.$gia.'</td>  
                                        <td>'.$chitiet.'</td> 
                                        <td>'.$trangthai.'</td> 
                                        <td>'.$luotxem.'</td>
                                        <td><a href="'.$suasp.'"<input type="button" value="Sửa"></a> <a href="'.$xoasp.'"><input type="button" value="Xóa"></a></td>
                                    </tr>';
                            }
                        ?>
                        
                        
                    </table>
                </div>
                <div class="row mb10">
                    <input type="button" value="Chọn tất cả">
                    <input type="button" value="Bỏ chọn tất cả">
                    <input type="button" value="Xóa các đã chọn tất cả">
                    <a href="index.php?act=addsp"><input type="button" value="Nhập thêm"></a>
                </div>
            </div>
        </div>