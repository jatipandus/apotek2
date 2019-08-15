                            <ul class="sidebar-menu">
                                <li class="#">
                                    <a href="index.php">
                                        <i class="fa fa-desktop"></i> <span>Dashboard</span>
                                    </a>
                                </li>

                                <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-male"></i>
                                    <span>Data Penduduk</span>
                                    <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                    <ul class="treeview-menu">
                                        <li><a href="datapenduduk.php"><i class="fa fa-angle-double-right"></i>Lihat Data Penduduk</a></li>
                                       <!--  <li><a href="input-penduduk.php"><i class="fa fa-angle-double-right"></i>Tambah Data Penduduk</a></li> -->
                                    </ul>
                                </li>

                                 <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-users"></i>
                                    <span>Data KK</span>
                                    <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                    <ul class="treeview-menu">
                                        <li><a href="datakk.php"><i class="fa fa-angle-double-right"></i>Lihat Data KK</a></li>
                                        
                                    </ul>
                                </li> 

                                <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-child"></i>
                                    <span>Data Kelahiran</span>
                                    <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                    <ul class="treeview-menu">
                                        <li><a href="datakelahiran.php"><i class="fa fa-angle-double-right"></i>Lihat Data Kelahiran</a></li>
                                        <!-- <li><a href="input-kelahiran.php"><i class="fa fa-angle-double-right"></i>Tambah Data Kelahiran</a></li> -->
                                    </ul>
                                </li>

                                <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-user-times"></i>
                                    <span>Data Kematian</span>
                                    <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                    <ul class="treeview-menu">
                                        <li><a href="datakematian.php"><i class="fa fa-angle-double-right"></i>Lihat Data Kematian</a></li>
                                        <!-- <li><a href="input-kematian.php"><i class="fa fa-angle-double-right"></i>Tambah Data Kematian</a></li> -->
                                    </ul>
                                </li>

                                <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-user-plus"></i>
                                    <span>Data Perpindahan</span>
                                    <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                    <ul class="treeview-menu">
                                        <li><a href="datamigrasi.php"><i class="fa fa-angle-double-right"></i>Lihat Data Migrasi</a></li>
                                        <!-- <li><a href="input-migrasi.php"><i class="fa fa-angle-double-right"></i>Tambah Data Migrasi</a></li> -->
                                        <li><a href="datamutasi.php"><i class="fa fa-angle-double-right"></i>Lihat Data Mutasi</a></li>
                                        <!-- <li><a href="input-mutasi.php"><i class="fa fa-angle-double-right"></i>Tambah Data Mutasi</a></li> -->
                                    </ul>
                                </li>
                                   
                                      <li>
                                    <a href="profildesa.php">
                                        <i class="fa fa-bank"></i> <span>Profil desa</span>
                                    </a>
                                </li> 
                                    

                                <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-user"></i>
                                    <span>Admin</span>
                                    <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                    <ul class="treeview-menu">
                                        <li><a href="dataadmin.php"><i class="fa fa-angle-double-right"></i> Data Admin</a></li>
                                        <li><a href="input-admin.php"><i class="fa fa-angle-double-right"></i> Tambah Admin</a></li>
                                    </ul>
                                </li>
                                <!-- <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-file"></i>
                                    <span>laporan</span>
                                    <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                    <ul class="treeview-menu">
                                        <li><a href="404.php"><i class="fa fa-angle-double-right"></i> Laporan Anggota</a></li>
                                        <li><a href="404.php"><i class="fa fa-angle-double-right"></i> Laporan Buku</a></li>
                                        <li><a href="404.php"><i class="fa fa-angle-double-right"></i> Laporan Peminjaman Buku</a></li>
                                        <li><a href="404.php"><i class="fa fa-angle-double-right"></i> Laporan Pengembalian Buku</a></li>
                                    </ul>
                                </li> -->
                                <!-- <li>
                                    <a href="404.php">
                                        <i class="fa fa-check-square"></i> <span>Backup Data</span>
                                    </a>
                                </li> 
                                  <li>
                                    <a href="notif_buat_ktp.php">
                                         <?php $tampil=$conn->query("SELECT id,nik,nama,tempat_lahir,tgl_lahir,jk,alamat,agama,pekerjaan,status, YEAR(curdate()) - YEAR(tgl_lahir) AS usia FROM data_penduduk where ket = 'hidup' and asal !='pergi' and YEAR(curdate()) - YEAR(tgl_lahir)='17' and MONTH(tgl_lahir) = MONTH(curdate()) and DAY(tgl_lahir) <= DAY(curdate())  " );
                                         $user=mysqli_num_rows($tampil);
                                           ?>
                
                                        <i class="fa fa-bell"></i> <span>Notifikasi <?php echo "<b><red> $user </red></b>"; ?> </span>
                                    </a>
                                </li>-->


                            
                                <li>
                                    <a href="tentang.php">
                                        <i class="fa fa-info"></i> <span>Tentang</span>
                                    </a>
                                </li>


                            </ul>
