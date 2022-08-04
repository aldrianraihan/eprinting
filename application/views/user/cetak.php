<body style="background-color: #edeff0;">
    <div class="container-fluid">

        <!-- navbar -->
        <?php
        // $this->load->view('user/navbar'); 
        ?>

        <div class="row mt-5 justify-content-center">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <form action="<?= base_url('c_home/insert_trx') ?>" method="post" class="bg-own-darkblue text-own-white" style="padding: 3rem 0rem 3rem 7rem; border-radius: 2rem;" enctype="multipart/form-data">
                    <?php
                    if ($jenis_cetak == 'dokumen') {
                    ?>
                        <div class="mb-3 open-poppins-400 h4 text-center me-5">
                            <?= 'Cetak ' . $jenis_cetak ?>
                        </div>
                        <div class="row mb-3 open-poppins-400">
                            <div class="col-sm-7">
                                <input type="text" class="form-control bg-own-lightgray" name="jenis_cetak" value="<?= $jenis_cetak ?>" hidden>
                            </div>
                        </div>
                        <div class="row mb-3 open-poppins-400">
                            <label class="col-sm-3 col-form-label">Jenis Kertas</label>
                            <div class="col-sm-7">
                                <select name="jenis_kertas" class="form-control" required>
                                    <option value="">-Pilih-</option>
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
                            <label class="col-sm-3 col-form-label">BW / Color</label>
                            <div class="col-sm-7">
                                <select name="bw_color" class="form-control" required>
                                    <option value="">-Pilih-</option>
                                    <option value="bw">Hitam Putih</option>
                                    <option value="color">Warna</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3 open-poppins-400">
                            <label class="col-sm-3 col-form-label">Halaman / File</label>
                            <div class="col-sm-7">
                                <div class="form-check">
                                    <input class="form-check-input halaman_file" type="radio" name="halaman_file" id="flexRadioDefault1" value="halaman">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Halaman
                                    </label>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <input class="form-control" type="number" step="0" min="0" name="halaman_awal" placeholder="Halaman Awal">
                                    </div>
                                    <div class="col-sm-6">
                                        <input class="form-control" type="number" step="0" min="0" name="halaman_akhir" placeholder="Halaman Akhir">
                                    </div>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input halaman_file" type="radio" name="halaman_file" id="flexRadioDefault2" value="file">
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        File
                                    </label>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <input class="form-control" type="number" step="0" min="0" name="jumlah_halaman" placeholder="Jumlah Halaman">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3 open-poppins-400">
                            <label class="col-sm-3 col-form-label">Jilid</label>
                            <div class="col-sm-7">
                                <select name="jilid" class="form-control col-sm-6" required>
                                    <option value="0">Tidak</option>
                                    <option value="1">Ya</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3 open-poppins-400">
                            <label class="col-sm-3 col-form-label">Jumlah</label>
                            <div class="col-sm-7">
                                <input type="number" class="form-control" min="0" step="0" name="jumlah" required>
                            </div>
                        </div>
                        <div class="row mb-3 open-poppins-400">
                            <label class="col-sm-3 col-form-label">Upload File</label>
                            <div class="col-sm-7">
                                <input type="file" class="form-control" name="file" required>
                            </div>
                        </div>
                        <div class="row open-poppins-400">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-7 d-flex justify-content-between">
                                <input type="submit" class="btn btn-primary" name="submit" value="Submit">
                                <a href="<?= base_url('c_home#services') ?>" class="btn btn-warning">Back</a>
                            </div>
                        </div>
                    <?php
                    } elseif ($jenis_cetak == 'poster') {
                    ?>
                        <div class="mb-3 open-poppins-400 h4 text-center me-5">
                            <?= 'Cetak ' . $jenis_cetak ?>
                        </div>
                        <div class="row mb-3 open-poppins-400">
                            <div class="col-sm-7">
                                <input type="text" class="form-control bg-own-lightgray" name="jenis_cetak" value="<?= $jenis_cetak ?>" hidden>
                            </div>
                        </div>
                        <div class="row mb-3 open-poppins-400">
                            <label class="col-sm-3 col-form-label">Jenis Kertas</label>
                            <div class="col-sm-7">
                                <select name="jenis_kertas" class="form-control" required>
                                    <option value="">-Pilih-</option>
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
                            <label class="col-sm-3 col-form-label">BW / Color</label>
                            <div class="col-sm-7">
                                <select name="bw_color" class="form-control" required>
                                    <option value="">-Pilih-</option>
                                    <option value="bw">Hitam Putih</option>
                                    <option value="color">Warna</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3 open-poppins-400">
                            <label class="col-sm-3 col-form-label">Jumlah</label>
                            <div class="col-sm-7">
                                <input type="number" class="form-control" min="0" step="0" name="jumlah" required>
                            </div>
                        </div>
                        <div class="row mb-3 open-poppins-400">
                            <label class="col-sm-3 col-form-label">Upload File</label>
                            <div class="col-sm-7">
                                <input type="file" name="file" class="form-control" required>
                            </div>
                        </div>
                        <div class="row open-poppins-400">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-7 d-flex justify-content-between">
                                <input type="submit" class="btn btn-primary" name="submit" value="Submit">
                                <a href="<?= base_url('c_home#services') ?>" class="btn btn-warning">Back</a>
                            </div>
                        </div>
                    <?php
                    } elseif ($jenis_cetak == 'banner') {
                    ?>
                        <div class="mb-3 open-poppins-400 h4 text-center me-5">
                            <?= 'Cetak ' . $jenis_cetak ?>
                        </div>
                        <div class="row mb-3 open-poppins-400">
                            <div class="col-sm-7">
                                <input type="text" class="form-control bg-own-lightgray" name="jenis_cetak" value="<?= $jenis_cetak ?>" hidden>
                            </div>
                        </div>
                        <div class="row mb-3 open-poppins-400">
                            <label class="col-sm-3 col-form-label">BW / Color</label>
                            <div class="col-sm-7">
                                <select name="bw_color" class="form-control" required>
                                    <option value="">-Pilih-</option>
                                    <option value="bw">Hitam Putih</option>
                                    <option value="color">Warna</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3 open-poppins-400">
                            <label class="col-sm-3 col-form-label">Ukuran</label>
                            <div class="col-sm-3">
                                <input type="number" class="form-control" min="0" step="0" name="panjang" placeholder="Panjang" required>
                            </div>
                            <label class="col-sm-1 col-form-label text-center">X</label>
                            <div class="col-sm-3">
                                <input type="number" class="form-control" min="0" step="0" name="lebar" placeholder="Lebar" required>
                            </div>
                        </div>
                        <div class="row mb-3 open-poppins-400">
                            <label class="col-sm-3 col-form-label">Jumlah</label>
                            <div class="col-sm-7">
                                <input type="number" class="form-control" min="0" step="0" name="jumlah" required>
                            </div>
                        </div>
                        <div class="row mb-3 open-poppins-400">
                            <label class="col-sm-3 col-form-label">Upload File</label>
                            <div class="col-sm-7">
                                <input type="file" name="file" class="form-control" required>
                            </div>
                        </div>
                        <div class="row open-poppins-400">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-7 d-flex justify-content-between">
                                <input type="submit" class="btn btn-primary" name="submit" value="Submit">
                                <a href="<?= base_url('c_home#services') ?>" class="btn btn-warning float-right">Back</a>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </form>
            </div>
            <div class="col-sm-3"></div>
        </div>
    </div>

    <!-- footer -->
    <?php $this->load->view('user/footer'); ?>

</body>