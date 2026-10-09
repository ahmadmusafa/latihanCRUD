<?= $this ->include('layouts/navbar') ?>

    <!-- HEADER -->

    <div class="page-header">

        <div>
            <div class="title-wrapper">
                <div class="icon-title">
                    <i class="bi bi-check2-square"></i>
                </div>

                <div>
                    <h2 class="page-title">Daftar Tugas</h2>
                    <p class="page-subtitle">
                        Kelola tugas Anda dengan mudah.
                    </p>
                </div>
            </div>
        </div>

        <a href="<?= base_url('tugas/tambah') ?>" class="btn btn-add">
            <i class="bi bi-plus-lg"></i>
            Tambah Tugas
        </a>

    </div>


    <!-- PESAN -->

    <?php if (session()->getFlashdata('success')) : ?>

        <div class="alert alert-success alert-dismissible fade show">
            <i class="bi bi-check-circle me-2"></i>
            <?= session()->getFlashdata('success') ?>
            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="alert">
            </button>
        </div>
    <?php endif; ?>


    <?php if (session()->getFlashdata('error')) : ?>

        <div class="alert alert-danger alert-dismissible fade show">
            <i class="bi bi-exclamation-circle me-2"></i>
            <?= session()->getFlashdata('error') ?>

            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="alert">
            </button>
        </div>

    <?php endif; ?>


    <!-- STATISTIK -->

    <div class="row g-3 mb-4">
        <div class="col-md-4">
            <div class="stat-card">
                <div class="stat-icon icon-blue">
                    <i class="bi bi-list-task"></i>
                </div>
                <div>
                    <div class="stat-label">
                        Total Tugas
                    </div>
                    <div class="stat-number">
                        <?= $totalTugas ?>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-md-4">

            <div class="stat-card">

                <div class="stat-icon icon-yellow">
                    <i class="bi bi-clock"></i>
                </div>

                <div>
                    <div class="stat-label">
                        Belum Selesai
                    </div>

                    <div class="stat-number">
                        <?= $belumSelesai ?>
                    </div>
                </div>

            </div>

        </div>


        <div class="col-md-4">

            <div class="stat-card">

                <div class="stat-icon icon-green">
                    <i class="bi bi-check-lg"></i>
                </div>

                <div>
                    <div class="stat-label">
                        Selesai
                    </div>

                    <div class="stat-number">
                        <?= $selesai ?>
                    </div>
                </div>

            </div>

        </div>

    </div>


    <!-- PENCARIAN -->

    <div class="filter-card mb-4">

        <form
            action="<?= base_url('tugas') ?>"
            method="get">

            <div class="row g-2">

                <div class="col">

                    <div class="search-wrapper ">

                        <i class="bi bi-search "></i>

                        <input
                            type="text"
                            name="keyword"
                            class="form-control search-input"
                            placeholder="Cari tugas..."
                            value="<?= esc($keyword ?? '') ?>">

                    </div>

                </div>

                <div class="col-auto">

                    <button
                        type="submit"
                        class="btn btn-filter">

                        <i class="bi bi-search me-1"></i>
                        Cari

                    </button>

                </div>

                <?php if (!empty($keyword)) : ?>

                    <div class="col-auto">

                        <a
                            href="<?= base_url('tugas') ?>"
                            class="btn btn-light btn-reset">

                            <i class="bi bi-x-lg"></i>

                        </a>

                    </div>

                <?php endif; ?>

            </div>

        </form>

    </div>


    <!-- TABEL -->

    <div class="table-card">

        <div class="table-responsive">

            <table class="table table-striped">

                <thead>
                    <tr>
                        <th width="70">No</th>
                        <th>Tugas</th>
                        <th width="180">Deadline</th>
                        <th width="150">Aksi</th>
                    </tr>
                </thead>

                <tbody>

        <?php if (!empty($tugas)) : ?>
        <?php $no = 1; ?>
        <?php foreach ($tugas as $item) : ?>
        <tr class="<?= $item['selesai'] == 1 ? 'task-completed' : '' ?>">

<!-- NOMOR -->

        <td>
            <?= $no++ ?>
        </td>

<!-- TUGAS -->

    <td>
        <div class="task-wrapper">
            <?php if ($item['selesai'] == 0) : ?>

            <a
                href="<?= base_url('tugas/selesai/' . $item['id_tugas']) ?>"
                class="check-task"
                title="Tandai selesai">
                    <i class="bi bi-check"></i>
            </a>
                    <?php else : ?>
                    <div class="check-task checked">
                        <i class="bi bi-check-lg"></i>
                    </div>                    
                <?php endif; ?>
            <div class="task-content">
                    <div class="task-title">
                        <?= esc($item['judul']) ?>
                    </div>

                    <?php if (!empty($item['deskripsi'])) : ?>

                        <div class="task-description">
                            <?= esc($item['deskripsi']) ?>
                         </div>

                           <?php endif; ?>

        </div>

    </div>

</td>

<!-- DEADLINE -->

    <td>

        <?php if (!empty($item['tenggat_waktu'])) : ?>
         <?php
        $tanggal = date('d-m-Y', strtotime($item['tenggat_waktu']));?>

            <span class="deadline">
                <i class="bi bi-calendar3"></i>
                <?= $tanggal ?>
            </span>

            <?php else : ?>

            <span class="text-muted">
                Tidak ada
            </span>
            
            <?php endif; ?>

    </td>

<!-- AKSI -->

    <td>
        <div class="action-group">

            <a
                 href="<?= base_url('tugas/edit/' . $item['id_tugas']) ?>"
                 class="action-btn btn-edit"
                 title="Edit">
                <i class="bi bi-pencil"></i>
            </a>

            <button
                type="button"
                class="action-btn btn-delete"
                title="Hapus"
                onclick="hapusTugas(<?= $item['id_tugas'] ?>)">
                <i class="bi bi-trash"></i>
            </button>

        </div>
    </td>
        <?php endforeach; ?>
        <?php else : ?>

            <tr>
                <td colspan="4">
                    <div class="empty-state">
                        <i class="bi bi-clipboard-x"></i>
                                <h5>Tidak ada tugas</h5>
                            <p>
                                Belum ada tugas yang tersedia.
                            </p>
                            <a
                                href="<?= base_url('tugas/tambah') ?>"
                                class="btn btn-add">
                                <i class="bi bi-plus-lg"></i>
                                Tambah Tugas
                            </a>

                            </div>
                </td>

                    </tr>

                <?php endif; ?>

                </tbody>

            </table>

        </div>

    </div>


    <!-- FOOTER -->

    <div class="bottom-info">
        <span>
            Menampilkan <?= count($tugas) ?> tugas
        </span>
    </div>

</div>

<!-- FORM HAPUS TERSEMBUNYI -->

<form
    id="formHapus"
    method="post"
    style="display:none;">

    <?= csrf_field() ?>

</form>


<script>

function hapusTugas(id)
{
    if (confirm('Apakah Anda yakin ingin menghapus tugas ini?')) {

        const form = document.getElementById('formHapus');

        form.action = "<?= base_url('tugas/hapus') ?>/" + id;

        form.submit();

    }
}

</script>


<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
</script>

</body>
</html>