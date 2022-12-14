<!DOCTYPE html>
<html lang="en">

<head>

    <?php $this->load->view('user/components/header') ?>

</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <?php if ($this->session->flashdata('pesanan')) {?>
    <script>
    swal({
        title: "Success!",
        text: "Silahkann Transfer Ke Nomor Rekening Dibawah Sebesar Rp 10.000 PT. Damri Unsri 675519284791!",
        icon: "success"
    });
    </script>
    <?php }?>

   

    <?php if ($this->session->flashdata('pesanan_cash')) {
    $message = $this->session->flashdata('pesanan_cash');
    ?>
    <script>
    swal({
        title: "Success!",
        text: "<?=$message?>",
        icon: "success"
    });
    </script>
    <?php }?>
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="<?=base_url();?>assets/admin/dist/img/AdminLTELogo.png"
                alt="AdminLTELogo" height="60" width="60">
        </div>

        <!-- Navbar -->
        <?php $this->load->view('user/components/navbar') ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php $this->load->view('user/components/sidebar') ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Tiket Saya</h1>
                        </div><!-- /.col -->

                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <div class="container">
                <div class="row justify-content-start">
                    <?php $res = count($pesanan);
                    if($res==0){
                        ?>
                        <h1>Pesanan Belum Ada !</h1>
                        
                        <?php };?>
                    
                    
                    <?php
                                            $no = 0;
                                            foreach($pesanan as $i)
                                            :
                                            $no++;
                                            $id_pesanan = $i['id_pesanan'];
                                            $nomor_kursi = $i['nomor_kursi'];
                                            $nama_lengkap = $i['nama_lengkap'];
                                            $asal = $i['asal'];
                                            $tujuan = $i['tujuan'];
                                            $tanggal_berangkat =   $i['tanggal_berangkat'];
                                            $waktu_berangkat =   $i['waktu_berangkat'];
                                            $kode_pembayaran =   $i['kode_pembayaran'];
                                            $metode_pembayaran =   $i['metode_pembayaran'];
                                            ?>
                    <div class="col-4">
                        <div class="card">
                            <div class="card-header">
                                <h3>Tiket Bus</h3>
                            </div>
                            <div class="card-body">
                                <table>
                                    <tr>
                                        <td>Nomor Kursi</td>
                                        <td>&nbsp : </td>
                                        <td><?=$nomor_kursi?></td>
                                    </tr>
                                    <tr>
                                        <td>Asal</td>
                                        <td>&nbsp : </td>
                                        <td><?=$asal?></td>
                                    </tr>
                                    <tr>
                                        <td>Tujuan</td>
                                        <td>&nbsp : </td>
                                        <td><?=$tujuan?></td>
                                    </tr>
                                    <tr>
                                        <td>Tangal Berangkat</td>
                                        <td>&nbsp : </td>
                                        <td><?=$tanggal_berangkat?></td>
                                    </tr>
                                    <tr>
                                        <td>Waktu Berangkat</td>
                                        <td>&nbsp : </td>
                                        <td><?=$waktu_berangkat?></td>
                                    </tr>
                                    <tr>
                                        <td>Kode Pembayaran</td>
                                        <td>&nbsp : </td>
                                        <td><?=$kode_pembayaran?></td>
                                    </tr>
                                    <tr>
                                        <td>Metode Pembayaran</td>
                                        <td>&nbsp : </td>
                                        <td><?=$metode_pembayaran?></td>
                                    </tr>
                                </table>
                                <div class="col mt-4">
                                    <a href="https://wa.me/+6288747049006?text=Halo%20Admin,%20Pesanan%20Atas%20Nama%20<?=$nama_lengkap?>,%20Ingin%20konfirmasi%20pembayaran%20<?=$kode_pembayaran?>,%20asal%20keberangkatan%20<?=$asal?>%20dan%20tujuan%20<?=$tujuan?>,Nomor%20Kursi%20:%20<?=$nomor_kursi?>,%20Tanggal%20:%20<?=$tanggal_berangkat?>%20dan%20Waktu%20<?=$waktu_berangkat?>,%20Pembayaran%20VIA%20<?=$metode_pembayaran?>,%20Trimakasih!" class="btn btn-primary">Proses</a>
                                    <a type="button" type="button" class="btn btn-danger" data-toggle="modal"
                                        data-target="#exampleModal<?=$id_pesanan?>" class="btn btn-danger">Batal</a>
                                </div>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal<?=$id_pesanan?>" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Batalkan Pesanan !</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="<?= base_url();?>Pesanan/hapus_pesanan" method="post">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <input type="hidden" name="id_pesanan"
                                                                value="<?php echo $id_pesanan?>" />
                                                          

                                                            <p>Apakah kamu yakin ingin membatalkan pesanan
                                                                ini?</i></b></p>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger ripple"
                                                            data-dismiss="modal">Tidak</button>
                                                        <button type="submit"
                                                            class="btn btn-success ripple save-category">Ya</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>

                    <?php endforeach;?>
                </div>

            </div>
        </div>

    </div>
    <!-- /.content-wrapper -->


    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <?php $this->load->view('user/components/js') ?>
</body>

</html>