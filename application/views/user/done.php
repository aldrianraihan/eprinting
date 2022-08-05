<body style="background-color: #edeff0;">
    <div class="container-fluid">

        <!-- navbar -->
        <?php
        // $this->load->view('user/navbar'); 
        ?>

        <div class="row mt-5 justify-content-center">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <div class="open-poppins-400 h4">
                    Selamat pembayaran kamu sudah diterima!
                </div>
                <div class="open-poppins-400 h5 mt-4">
                    Berikut rincian pembelian kamu
                </div>
                <table class="table bg-own-darkblue text-own-white open-poppins-400" style="padding: 3rem 0rem 3rem 7rem; border-radius: 1rem;">
                    <tr>
                        <td colspan="3">Nomor Orderan</td>
                        <td colspan="2" class="text-center open-poppins-700"><?= $trx[0]->kode ?></td>
                    </tr>
                    <tr>
                        <td class="text-center" style="width: 50%;">Produk</td>
                        <td class="text-center" style="width: 10%;">Harga</td>
                        <td class="text-center" style="width: 10%;">Jumlah Halaman</td>
                        <td class="text-center" style="width: 10%;">Jumlah</td>
                        <td class="text-center" style="width: 20%;">Harga</td>
                    </tr>
                    <?php
                    foreach ($trx as $tx) {
                        if ($tx->jenis_cetak == 'dokumen') {
                    ?>
                            <tr>
                                <td style="padding-left: 2%;">Jasa print dokumen</td>
                                <td class="text-center"><?= $tx->harga ?></td>
                                <td class="text-center"><?= $tx->jumlah_halaman ?></td>
                                <td class="text-center"><?= $tx->jumlah ?></td>
                                <td class="text-center"><?= $tx->harga * $tx->jumlah_halaman * $tx->jumlah ?></td>
                            </tr>
                        <?php
                        } elseif ($tx->jenis_cetak == 'poster') {
                        ?>
                            <tr>
                                <td style="padding-left: 2%;">Jasa print poster</td>
                                <td class="text-center"><?= $tx->harga ?></td>
                                <td class="text-center"><?= $tx->jumlah_halaman ?></td>
                                <td class="text-center"><?= $tx->jumlah ?></td>
                                <td class="text-center"><?= $tx->harga * $tx->jumlah ?></td>
                            </tr>
                        <?php
                        } elseif ($tx->jenis_cetak == 'banner') {
                        ?>
                            <tr>
                                <td style="padding-left: 2%;">Jasa print banner (<?= $tx->panjang . 'x' . $tx->lebar ?>)</td>
                                <td class="text-center"><?= $tx->harga * $tx->panjang * $tx->lebar ?></td>
                                <td class="text-center"><?= $tx->jumlah_halaman ?></td>
                                <td class="text-center"><?= $tx->jumlah ?></td>
                                <td class="text-center"><?= $tx->harga * $tx->panjang * $tx->lebar * $tx->jumlah ?></td>
                            </tr>
                        <?php
                        }

                        if ($tx->jilid == 0) {
                        } else {
                        ?>
                            <tr>
                                <td style="padding-left: 2%;">Jilid</td>
                                <td class="text-center"><?= 3000 ?></td>
                                <td class="text-center">-</td>
                                <td class="text-center"><?= $tx->jumlah ?></td>
                                <td class="text-center"><?= 3000 * $tx->jumlah ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                        <tr>
                            <td colspan="4" class="text-center">Total</td>
                            <td class="text-center"><?= $tx->total_harga ?></td>
                        </tr>
                        <tr>
                            <td colspan="4" class="text-center">Status Pembayaran</td>
                            <td class="text-center"><?= $tx->stat_payment ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </table>

                <div class="col-sm-12 d-flex justify-content-center">
                    <a href="<?= base_url('c_home') ?>" class="btn btn-warning open-poppins-400">Home</a>
                </div>
            </div>
            <div class="col-sm-3"></div>
        </div>
    </div>

    <!-- footer -->
    <?php $this->load->view('user/footer'); ?>

</body>