<nav class="navbar navbar-expand-lg bg-own-darkblue mt-2 open-quicksand-600" style="border-radius: 15px;">
    <div class="container-fluid">
        <a class="navbar-brand text-light" href="#">Malendro Printing</a>
        <button class="bg-own-white text-own-black navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <!-- <span class="navbar-toggler-icon text-light"></span> -->
            <i class="fa-solid fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active text-light" aria-current="page" href="<?= base_url('c_admin') ?>">Home</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <?= $_SESSION['username'] ?>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="<?= base_url('c_home/logout') ?>">Sign Out</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>