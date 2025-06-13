<div class="container mt-4">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h3>Detail Pasien: <?= $pasien['nama']; ?></h3>
        </div>
        <div class="card-body">
            <p><strong>Tanggal Lahir:</strong> <?= date('d-m-Y', strtotime($pasien['tgl_lahir'])); ?></p>
            <p><strong>Alamat:</strong><br> <?= nl2br(htmlspecialchars($pasien['alamat'])); ?></p>
            <p><strong>No. Telepon:</strong> <?= $pasien['no_telpon']; ?></p>
            <p><strong>Dokter Spesialis:</strong> <?= $pasien['nama_dokter'] . ' - ' . $pasien['specialist']; ?></p>
            <p><strong>Keluhan:</strong><br> <?= nl2br(htmlspecialchars($pasien['keluhan'])); ?></p>
            <p><strong>Tanggal Kunjungan:</strong> <?= date('d-m-Y', strtotime($pasien['tgl_kunjungan'])); ?></p>
            <p><strong>Jam Kunjungan:</strong> <?= date('H:i', strtotime($pasien['jam_kunjungan'])); ?></p>
        </div>
        <td>
                    <a href="<?= base_url('pasien/ditolak/' . $pasien['id_pasien']); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Tolak pasien ini?')">Ditolak</a>
                    <a href="<?= base_url('pasien/disetujui/' . $pasien['id_pasien']); ?>" class="btn btn-sm btn-success" onclick="return confirm('Terima pasien ini?')">Diterima</a>
                    </td>
        <div class="card-footer">
            <a href="<?= base_url('pasien'); ?>" class="btn btn-secondary">Kembali ke Daftar Pasien</a>
        </div>
    </div>
</div>