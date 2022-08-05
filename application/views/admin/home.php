<body style="background-color: #edeff0;">
    <div class="container-fluid">

        <!-- navbar -->
        <?php $this->load->view('admin/navbar');  ?>

        <div class="row mt-5 ms-2 me-2">
            <div class="col-sm-4">
                <div class="btn-primary open-quicksand-700" style="border-radius: 15px;">
                    <a href="<?= base_url('c_admin/menu_printing') ?>" class="text-decoration-none text-link-white">
                        <h1 class="card-title text-end me-5 pt-4"><?= $progress[0]->c_stat_print ?></h1>
                        <h1 class="card-text ms-5 pb-4">
                            Printing
                        </h1>
                    </a>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="btn-warning open-quicksand-700" style="border-radius: 15px;">
                    <a href="<?= base_url('c_admin/menu_checking') ?>" class="text-decoration-none text-link-white">
                        <h1 class="card-title text-end me-5 pt-4"><?= $progress[0]->c_stat_cek ?></h1>
                        <h1 class="card-text ms-5 pb-4">
                            Final Check
                        </h1>
                    </a>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="btn-success open-quicksand-700" style="border-radius: 15px;">
                    <a href="<?= base_url('c_admin/menu_done') ?>" class="text-decoration-none link-light">
                        <h1 class="card-title text-end me-5 pt-4"><?php echo ($progress[0]->c_stat_done == '' || $progress[0]->c_stat_done == 0) ? 0 : $progress[0]->c_stat_done; ?></h1>
                        <h1 class="card-text ms-5 pb-4">
                            Done
                        </h1>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>

</html>