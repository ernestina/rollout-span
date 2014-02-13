<table class="table-bordered zebra scroll" style="text-align: center; margin-left: -4px; margin-right: 7px">
                        <thead >
                        <!--<th width="5%">No</th>
                        <th width="10%">KPPN</th>
                        <th width="10%">Konversi Sukses</th>
                        <th width="10%">Supplier Sukses</th>
                        <th width="10%">SP2D Sukses</th>
                        <th width="10%">LHP Sukses</th>
                        <th width="10%">Rekon Sukses</th>
                        <th width="10%">Total/Bobot</th>-->
                        <tr>
                            <th rowspan="2" width ="3%">No</th>
                            <th rowspan="2" width ="5%">KPPN</th>
                            <th colspan="3" width ="15%">Konversi</th>
                            <th colspan="3" width ="15%">Supplier</th>
                            <th colspan="3" width ="15%">SP2D</th>
                            <th colspan="3" width ="15%">LHP</th>
                            <th colspan="3" width ="15%">Rekon</th>
                            <th width="10%">Total/Bobot</th>
                        </tr>
                        <tr>
                            <th width ="5%"><i class="icon-ok" title='sukses'></i></th>
                            <th width ="5%"><i class="icon-remove" title='gagal'></th>
                            <th width ="5%">%</th>
                            <th width ="5%"><i class="icon-ok" title='sukses'></i></th>
                            <th width ="5%"><i class="icon-remove" title='gagal'></th>
                            <th width ="5%">%</th>
                            <th width ="5%"><i class="icon-ok" title='sukses'></i></th>
                            <th width ="5%"><i class="icon-remove" title='gagal'></th>
                            <th width ="5%">%</th>
                            <th width ="5%"><i class="icon-ok" title='sukses'></i></th>
                            <th width ="5%"><i class="icon-remove" title='gagal'></th>
                            <th width ="5%">%</th>
                            <th width ="5%"><i class="icon-ok" title='sukses'></i></th>
                            <th width ="5%"><i class="icon-remove" title='gagal'></th>
                            <th width ="5%">%</th>
                        </tr>
                        </thead>
                        <tbody >
                        <?php 
                            $no = 0;
                            $konversi = array(0=>0,1=>0);
                            $supplier = array(0=>0,1=>0);
                            $sp2d = array(0=>0,1=>0);
                            $lhp = array(0=>0,1=>0);
                            $rekon = array(0=>0,1=>0);
                            $total = 0;
                            if(count($this->data)>0){
                                foreach ($this->data as $key=>$value) {
                                    echo "<tr>";
                                    echo "<td>".++$no."</td>";
                                    echo "<td>".$value['nama_kppn']."</td>";
                                    echo "<td>".$value['kd_d_konversi']."</td>"; $konversi[0]+=$value['kd_d_konversi'];
                                    echo "<td>".$value['kd_d_konversi_gagal']."</td>"; $konversi[1]+=$value['kd_d_konversi_gagal'];
                                    echo "<td>".$value['kd_d_konversi_persen']."</td>";
                                    echo "<td>".$value['kd_d_supplier']."</td>"; $supplier[0]+=$value['kd_d_supplier'];
                                    echo "<td>".$value['kd_d_supplier_gagal']."</td>"; $supplier[1]+=$value['kd_d_supplier_gagal'];
                                    echo "<td>".$value['kd_d_supplier_persen']."</td>";
                                    echo "<td>".$value['kd_d_sp2d']."</td>"; $sp2d[0]+=$value['kd_d_sp2d'];
                                    echo "<td>".$value['kd_d_sp2d_gagal']."</td>"; $sp2d[1]+=$value['kd_d_sp2d_gagal'];
                                    echo "<td>".$value['kd_d_sp2d_persen']."</td>";
                                    echo "<td>".$value['kd_d_lhp']."</td>"; $lhp[0]+=$value['kd_d_lhp'];
                                    echo "<td>".$value['kd_d_lhp_gagal']."</td>"; $lhp[1]+=$value['kd_d_lhp_gagal'];
                                    echo "<td>".$value['kd_d_lhp_persen']."</td>";
                                    echo "<td>".$value['kd_d_rekon']."</td>"; $rekon[0]+=$value['kd_d_rekon'];
                                    echo "<td>".$value['kd_d_rekon_gagal']."</td>"; $lhp[1]+=$value['kd_d_rekon_gagal'];
                                    echo "<td>".$value['kd_d_rekon_persen']."</td>";
                                    echo "<td>".$value['total']."</td>"; $total+=$value['total'];
                                    echo "</tr>"; 
                                }

                                echo "<tr style='font-weight:bold; border-top: 1px solid #D6D6C2;background-color:#0066FF;color:#CCFFFF'>";
                                    echo "<td colspan=2 >TOTAL</td>";
                                    echo "<td>".$konversi[0]/$no."</td>"; 
                                    echo "<td>".$konversi[1]/$no."</td>"; 
                                    echo "<td></td>";
                                    echo "<td>".$supplier[0]/$no."</td>"; 
                                    echo "<td>".$supplier[1]/$no."</td>"; 
                                    echo "<td></td>";
                                    echo "<td>".$sp2d[0]/$no."</td>"; 
                                    echo "<td>".$sp2d[1]/$no."</td>"; 
                                    echo "<td></td>";
                                    echo "<td>".$lhp[0]/$no."</td>"; 
                                    echo "<td>".$lhp[1]/$no."</td>"; 
                                    echo "<td></td>";
                                    echo "<td>".$rekon[0]/$no."</td>"; 
                                    echo "<td>".$rekon[1]/$no."</td>"; 
                                    echo "<td></td>";
                                    echo "<td>".$total/$no."</td>";
                                    echo "</tr>"; 
                                }else{
                                    echo "<tr >";
                                    echo "<td colspan=18 style='text-align:center' >DATA TIDAK DITEMUKAN</td>";
                                    echo "</tr>"; 
                                }
                        ?>
    					</tbody>
					</table>
