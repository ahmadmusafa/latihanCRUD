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
                Edit Tugas
            </h2>

            <p class="page-subtitle">
                Perbarui informasi tugas Anda.
            </p>

        </div>

    </div>


    <div class="form-card">

        <form
            action="<?= base_url('tugas/update/' . $tugas['id_tugas']) ?>"
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
                    value="<?= esc($tugas['judul']) ?>"
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
                    placeholder="Masukkan deskripsi tugas"><?= esc($tugas['deskripsi']) ?></textarea>

            </div>


            <div class="mb-4">

                <label class="form-label">
                    Tenggat Waktu
                </label>

                <input
                    type="date"
                    name="tenggat_waktu"
                    class="form-control form-input"
                    value="<?= esc($tugas['tenggat_waktu']) ?>">

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
                    Simpan Perubahan

                </button>

            </div>

        </form>

    </div>

</div>

</body>

</html>