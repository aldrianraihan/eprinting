<body style="background-color: #edeff0;">
    <div class="container-fluid">

        <!-- navbar -->
        <?php
        // $this->load->view('user/navbar'); 
        ?>

        <div class="row mt-5 justify-content-center">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <table class="table bg-own-darkblue text-own-white open-poppins-400" style="padding: 3rem 0rem 3rem 7rem; border-radius: 1rem;">
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
                    <?php
                    }
                    ?>
                </table>

                <div class="col-sm-12 d-flex justify-content-center">
                    <form action="<?= base_url('c_home/payment') ?>" method="post" enctype="multipart/form-data">
                        <input type="number" name="kode" value="<?= $trx[0]->kode ?>" hidden>
                        <input type="text" name="payment" value="ovo" hidden>
                        <input type="text" name="stat_payment" value="menunggu pembayaran" hidden>
                        <input type="submit" name="submit" class="btn btn-md btn-success" value="Confirm!">
                    </form>
                </div>
            </div>
            <div class="col-sm-3"></div>
        </div>
    </div>

    <!-- footer -->
    <?php $this->load->view('user/footer'); ?>

</body>