<body style="background-color: #edeff0;">
    <div class="container-fluid">

        <!-- navbar -->
        <?php $this->load->view('admin/navbar');  ?>

        <div class="row mt-5 justify-content-end" style="margin-right: -6rem !important;">
            <div class="col-sm-4">
                <!-- <a href="<?= base_url('c_admin/menu_printing') ?>" class="btn btn-md btn-primary">
                    <i class="fa-solid fa-circle-chevron-left"></i>
                </a> -->
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-sm-6">
                <div class="d-flex justify-content-between">
                    <h3 class="open-poppins-700">Edit Data</h3>
                    <a href="<?= base_url('c_admin/menu_printing') ?>" class="btn btn-primary">
                        <i class="fa-solid fa-circle-chevron-left"></i>
                    </a>
                </div>
                <hr style="height:1px;border:none;color:#000;background-color:#000;">
                <form action="<?= base_url('c_admin/proses_edit_print') ?>" method="post" class="open-poppins-400">
                    <?php
                    foreach ($trx_print as $tp) {
                    ?>
                        <div class="mb-3 row">
                            <label for="staticEmail" class="col-sm-4 col-form-label">No Order</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="kode" value="<?= $tp->kode ?>" readonly>
                                <input type="number" class="form-control" name="total_harga" value="<?= $tp->total_harga ?>" hidden>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="staticEmail" class="col-sm-4 col-form-label">Jenis Cetak</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="jenis_cetak" value="<?= $tp->jenis_cetak ?>" readonly>
                            </div>
                        </div>
                        <div class="row mb-3 open-poppins-400">
                            <label class="col-sm-4 col-form-label">Jenis Kertas</label>
                            <div class="col-sm-8">
                                <select name="jenis_kertas" class="form-control" readonly>
                                    <option value="<?= $tp->jenis_kertas ?>"><?= $tp->jenis_kertas ?></option>
                                    <?php
                                    foreach ($parameter as $p) {
                                    ?>
                                        <option value="<?= $p->jenis_kertas ?>"><?= $p->jenis_kertas ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3 open-poppins-400">
                            <label class="col-sm-4 col-form-label">BW / Color</label>
                            <div class="col-sm-8">
                                <select name="bw_color" class="form-control" readonly>
                                    <?php
                                    if ($tp->jenis_kertas == 'bw') {
                                    ?>
                                        <option value="<?= $tp->bw_color ?>">Hitam Putih</option>
                                    <?php
                                    } else {
                                    ?>
                                        <option value="<?= $tp->bw_color ?>">Warna</option>
                                    <?php
                                    }
                                    ?>
                                    <option value="bw">Hitam Putih</option>
                                    <option value="color">Warna</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3 open-poppins-400">
                            <label class="col-sm-4 col-form-label">Jilid</label>
                            <div class="col-sm-8">
                                <select name="jilid" class="form-control col-sm-6" readonly>
                                    <?php
                                    if ($tp->jilid == 1) {
                                    ?>
                                        <option value="1">Ya</option>
                                    <?php
                                    } else {
                                    ?>
                                        <option value="0">Tidak</option>
                                    <?php
                                    }
                                    ?>
                                    <option value="0">Tidak</option>
                                    <option value="1">Ya</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3 open-poppins-400">
                            <label class="col-sm-4 col-form-label">Jumlah Halaman</label>
                            <div class="col-sm-8">
                                <input class="form-control" type="number" step="0" min="0" name="jumlah_halaman" placeholder="Jumlah Halaman" value="<?= $tp->jumlah_halaman ?>">
                            </div>
                        </div>
                        <div class="row mb-3 open-poppins-400">
                            <label class="col-sm-4 col-form-label">Jumlah</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" min="0" step="0" name="jumlah" value="<?= $tp->jumlah ?>" required>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                    <div class="mb-3 row">
                        <label for="inputPassword" class="col-sm-4 col-form-label"></label>
                        <div class="col-sm-8 mt-3">
                            <input type="submit" class="btn btn-md btn-primary float-end" value="Submit">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>

</html>