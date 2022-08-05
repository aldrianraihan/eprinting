<body style="background-color: #edeff0;">
    <div class="container-fluid">

        <!-- navbar -->
        <?php
        // $this->load->view('user/navbar'); 
        ?>

        <div class="row mt-5 justify-content-center">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <div class="row">
                    <div class="open-poppins-700 text-center">
                        QR Code
                    </div>
                </div>
                <div class="row text-center mt-3">
                    <div class="open-poppins-700 text-center">
                        <img src="<?= base_url('assets/img/qr ovo.jpg') ?>" style="height: 24rem; width: 26rem;">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="open-poppins-700 text-center h3">
                        0811-1989-334
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="open-poppins-400 text-center h5 text-own-red">
                        <p>Anda memiliki kekurangan pembayaran sebesar <strong><?= $trx[0]->kekurangan_harga ?></strong>
                        </p>
                    </div>
                </div>

                <form action="<?= base_url('c_admin/upload_bukti_bayar') ?>" method="post" enctype="multipart/form-data">
                    <div class="row mb-3 mt-3 open-poppins-400">
                        <label class="col-sm-3 col-form-label">Upload Bukti Bayar</label>
                        <div class="col-sm-7">
                            <input type="file" class="form-control" name="file" required>
                        </div>
                    </div>
                    <div class="row mb-3 mt-3 open-poppins-400">
                        <div class="col-sm-3"></div>
                        <div class="col-sm-7">
                            <input type="number" name="kode" value="<?= $trx[0]->kode ?>" hidden>
                            <input type="number" name="kekurangan_harga" value="<?= $trx[0]->kekurangan_harga ?>" hidden>
                            <input type="number" name="total_harga" value="<?= $trx[0]->total_harga ?>" hidden>
                            <input type="submit" name="submit" class="btn btn-md btn-success" value="Submit">
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-sm-3"></div>
        </div>
    </div>

    <!-- footer -->
    <?php $this->load->view('user/footer'); ?>

</body>