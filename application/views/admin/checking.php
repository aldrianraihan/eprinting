<body style="background-color: #edeff0;">
    <div class="container-fluid">

        <!-- navbar -->
        <?php $this->load->view('admin/navbar');  ?>

        <div class="row mt-5">
            <div class="col-sm-1"></div>
            <div class="col-sm-2 me-auto open-poppins-400 h4" style="margin-left: 4.2rem;">
                Final Check
            </div>
            <div class="col-sm-2 ms-auto">
                <a href="<?= base_url('c_admin') ?>" class="btn btn-md btn-primary">
                    <i class="fa-solid fa-circle-chevron-left"></i>
                </a>
            </div>
        </div>
        <div class="row justify-content-center mt-3">
            <div class="col-sm-9">
                <table id="example" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th scope="col" class="">No Order</th>
                            <th scope="col" class="text-center">Jenis Cetak</th>
                            <th scope="col" class="text-center">Jenis Kertas</th>
                            <th scope="col" class="text-center">BW / Color</th>
                            <th scope="col" class="text-center">Jilid</th>
                            <th scope="col" class="text-center">Jumlah Halaman</th>
                            <th scope="col" class="text-center">Jumlah</th>
                            <th scope="col" class="text-center">Total Harga</th>
                            <th scope="col" class="text-center">Kekurangan</th>
                            <th scope="col" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($trx_print as $tp) {
                        ?>
                            <tr>
                                <td>
                                    <?= $tp->kode ?>
                                </td>
                                <td class="text-center">
                                    <?= $tp->jenis_cetak ?>
                                </td>
                                <td class="text-center">
                                    <?= $tp->jenis_kertas ?>
                                </td>
                                <td class="text-center">
                                    <?= $tp->bw_color ?>
                                </td>
                                <td class="text-center">
                                    <?php
                                    if ($tp->jilid == 1) {
                                        echo 'Ya';
                                    } else {
                                        echo 'Tidak';
                                    }
                                    ?>
                                </td>
                                <td class="text-center">
                                    <?= $tp->jumlah_halaman ?>
                                </td>
                                <td class="text-center">
                                    <?= $tp->jumlah ?>
                                </td>
                                <td class="text-center">
                                    <?= $tp->total_harga ?>
                                </td>
                                <td class="text-center">
                                    <?= $tp->kekurangan_harga ?>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <?php
                                        if ($tp->kekurangan_harga == 0) {
                                        ?>
                                            <a href="<?= base_url('c_admin/ceklist_check/' . $tp->kode) ?>" class="btn btn-success text-link-white">
                                                <i class="fa-regular fa-circle-check"></i>
                                            </a>
                                        <?php
                                        } else {
                                        ?>
                                            <a href="<?= base_url('c_admin/payment_qr/' . $tp->kode) ?>" class="btn btn-success text-link-white">
                                                <i class="fa-solid fa-sack-dollar"></i>
                                            </a>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>

</html>