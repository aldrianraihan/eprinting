<body style="background-color: #edeff0;">
    <div class="container-fluid">

        <?php
        // $this->load->view('user/navbar'); 
        ?>

        <div class="row mt-3 justify-content-center">
            <div class="col-sm-4">
                <div class="row open-poppins-400 mt-4 ml-4">
                    Cek orderan kamu disini
                </div>
                <div class="row">
                    <form action="" method="get" class="ml-4">
                        <div class="form-group row mb-3">
                            <input type="text" class="form-control open-poppins-400" name="no_order" placeholder="No Order" required>
                        </div>
                        <div class="d-flex justify-content-between">
                            <a href="<?= base_url('c_home#services') ?>" class="btn btn-warning open-poppins-400">Back</a>
                            <button type="submit" class="btn btn-primary open-poppins-400" name="search" value="search">Search</button>
                        </div>
                    </form>
                </div>


                <?php
                if (!empty($this->input->get('search'))) {
                ?>
                    <div class="row mt-4">
                        <table class="table table-hover open-poppins-400">
                            <tr>
                                <th>No Order</th>
                                <th>Status</th>
                            </tr>
                            <?php
                            foreach ($trx2 as $tx2) {
                            ?>
                                <tr>
                                    <td><?= $tx2->kode ?></td>
                                    <td>
                                        <?php
                                        if ($tx2->stat_print <> 'lunas' && $tx2->stat_print == '' && $tx2->stat_cek == '' && $tx2->stat_done == '') {
                                        ?>
                                            <a href="<?php echo base_url('c_home/payment_qr/' . $tx2->kode) ?>">Menunggu Pembayaran</a>
                                        <?php
                                        } elseif ($tx2->stat_print == '' && $tx2->stat_cek == '' && $tx2->stat_done == '') {
                                            echo 'Print';
                                        } elseif ($tx2->stat_print == 0) {
                                            echo 'Print';
                                        } elseif ($tx2->stat_cek == '' || $tx2->stat_cek == 0) {
                                            echo 'Pengecekan';
                                        } elseif ($tx2->stat_done == '' || $tx2->stat_done == 0) {
                                            echo 'Selesai';
                                        }
                                        ?>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </table>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>

    <!-- footer -->
    <?php $this->load->view('user/footer'); ?>

</body>