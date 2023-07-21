<?php include 'database.php';$id=$_POST['id'];$query="SELECT * FROM tbl_ktgr_baju WHERE id_ktgr_baju =".$id;$result=$connection->query($query);if(!$result){printf("Errormessage: %s\n",$connection->error);}else{while($data=$result->fetch_array(MYSQLI_ASSOC)){$stok=$data['stok'];$harga=$data['harga'];echo '
                
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Stok</label>
                        <input type="text" class="form-control form-control-border" disabled="" value="'.$stok.' Buah">
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Harga</label>
                        <input type="text" class="form-control form-control-border" disabled="" value="Rp. '.$harga.'">
                        </select>
                    </div>
                </div>';}} ?>