<?=$this->extend("layout")?>

<?=$this->section("content")?>

<div class="container">
    <div class="row justify-content-md-center mt-5">
        <div class="col-12">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">Dashboard</a>
                    <div class="d-flex">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url('/logout'); ?>">Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <h2 class="text-center mt-5">User Dashboard</h2>

            <!-- Tabel Data User -->
            <div class="mt-4">
                <h4>Daftar Pengguna</h4>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $user): ?>
                            <tr>
                                <td><?= $user['name']; ?></td>
                                <td><?= $user['email']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

                <!-- Tombol Export -->
                <a href="<?= base_url('/dashboard/exportPdf'); ?>" target="_blank" class="btn btn-danger">Export PDF</a>
                <a href="<?= base_url('/dashboard/exportExcel'); ?>" class="btn btn-success">Export Excel</a>
            </div>
        </div>
    </div>
</div>

<?=$this->endSection()?>
