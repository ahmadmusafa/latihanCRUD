<?php

namespace App\Controllers;

use App\Models\TugasModel;

class Tugas extends BaseController
{
    protected $tugasModel;

    public function __construct()
    {
        $this->tugasModel = new TugasModel();
    }

    public function index()
    {
        $keyword = $this->request->getGet('keyword');

        if ($keyword) {
            $tugas = $this->tugasModel
                ->groupStart()
                ->like('judul', $keyword)
                ->orLike('deskripsi', $keyword)
                ->groupEnd()
                ->orderBy('id_tugas', 'DESC')
                ->findAll();
        } else {
            $tugas = $this->tugasModel
                ->orderBy('id_tugas', 'DESC')
                ->findAll();
        }

        $data = [
            'judul' => 'Daftar Tugas',
            'tugas' => $tugas,
            'keyword' => $keyword,

            'totalTugas' => $this->tugasModel->countAll(),

            'belumSelesai' => $this->tugasModel
                ->where('selesai', 0)
                ->countAllResults(),

            'selesai' => $this->tugasModel
                ->where('selesai', 1)
                ->countAllResults()
        ];

        return view('tugas/index', $data);
    }

    public function tambah()
    {
        $data = [
            'judul' => 'Tambah Tugas'
        ];

        return view('tugas/tambah', $data);
    }

    public function simpan()
    {
        $this->tugasModel->insert([
            'judul' => $this->request->getPost('judul'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'tenggat_waktu' => $this->request->getPost('tenggat_waktu'),
            'selesai' => 0,
            'dibuat_pada' => date('Y-m-d H:i:s'),
            'diperbarui_pada' => date('Y-m-d H:i:s')
        ]);

        return redirect()
            ->to('/tugas')
            ->with('success', 'Tugas berhasil ditambahkan.');
    }

    public function selesai($id)
    {
        $tugas = $this->tugasModel->find($id);

        if (!$tugas) {
            return redirect()
                ->to('/tugas')
                ->with('error', 'Tugas tidak ditemukan.');
        }

        $this->tugasModel->update($id, [
            'selesai' => 1,
            'diperbarui_pada' => date('Y-m-d H:i:s')
        ]);

        return redirect()
            ->to('/tugas')
            ->with('success', 'Tugas berhasil diselesaikan.');
    }

    public function edit($id)
    {
        $tugas = $this->tugasModel->find($id);

        if (!$tugas) {
            return redirect()
                ->to('/tugas')
                ->with('error', 'Tugas tidak ditemukan.');
        }

        $data = [
            'judul' => 'Edit Tugas',
            'tugas' => $tugas
        ];

        return view('tugas/edit', $data);
    }

    public function update($id)
    {
        $tugas = $this->tugasModel->find($id);

        if (!$tugas) {
            return redirect()
                ->to('/tugas')
                ->with('error', 'Tugas tidak ditemukan.');
        }

        $this->tugasModel->update($id, [
            'judul' => $this->request->getPost('judul'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'tenggat_waktu' => $this->request->getPost('tenggat_waktu'),
            'diperbarui_pada' => date('Y-m-d H:i:s')
        ]);

        return redirect()
            ->to('/tugas')
            ->with('success', 'Tugas berhasil diperbarui.');
    }

    public function hapus($id)
    {
        $tugas = $this->tugasModel->find($id);

        if (!$tugas) {
            return redirect()
                ->to('/tugas')
                ->with('error', 'Tugas tidak ditemukan.');
        }

        $this->tugasModel->delete($id);

        return redirect()
            ->to('/tugas')
            ->with('success', 'Tugas berhasil dihapus.');
    }
}