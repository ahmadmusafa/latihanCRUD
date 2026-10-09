<?= $this ->include('layouts/navbar') ?>

<div class="container-main form-page">

    <div class="form-header">

        <a
            href="<?= base_url('tugas') ?>"
            class="btn-back">

            <i class="bi bi-arrow-left"></i>

        </a>

        <div>

            <h2 class="page-title">
                Tambah Tugas
            </h2>

            <p class="page-subtitle">
                Tambahkan tugas baru ke daftar Anda.
            </p>

        </div>

    </div>


    <div class="form-card">

        <form
            action="<?= base_url('tugas/simpan') ?>"
            method="post">

            <?= csrf_field() ?>


            <div class="mb-4">

                <label class="form-label">
                    Judul Tugas
                </label>

                <input
                    type="text"
                    name="judul"
                    class="form-control form-input"
                    placeholder="Masukkan judul tugas"
                    required>

            </div>


            <div class="mb-4">

                <label class="form-label">
                    Deskripsi
                </label>

                <textarea
                    name="deskripsi"
                    class="form-control form-input"
                    rows="4"
                    placeholder="Masukkan deskripsi tugas"></textarea>

            </div>


            <div class="mb-4">

                <label class="form-label">
                    Tenggat Waktu
                </label>

                <input
                    type="date"
                    name="tenggat_waktu"
                    class="form-control form-input">

            </div>


            <div class="form-actions">

                <a
                    href="<?= base_url('tugas') ?>"
                    class="btn btn-light">

                    Batal

                </a>

                <button
                    type="submit"
                    class="btn btn-add">

                    <i class="bi bi-save me-1"></i>
                    Simpan Tugas

                </button>

            </div>

        </form>

    </div>

</div>

</body>

</html>