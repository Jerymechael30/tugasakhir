<section>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Informasi Rekam Psikologis</h3>

                    <div class="card-tools">
                        <!-- btn tambah gejala -->
                        <!-- <a href="</?= base_url('hasil/perhitungan'); ?>" class="btn btn-sm btn-warning">Lihat Perhitungan</a> -->
                        <!-- end btn tambah gejala -->
                    </div>
                </div>
                <div class="card-body" style="display: block;">
                    <table id="datatable-aset" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th rowspan="2">No</th>
                                <th rowspan="2">Tanggal Diagnosis</th>
                                <th rowspan="2">Nama Partisipan</th>
                                <th rowspan="2">Jenis Kelamin</th>
                                <th rowspan="2">Alamat</th>
                                <th colspan="2" class="text-center">Hasil</th>
                                <th rowspan="2">Aksi</th>
                            </tr>
                            <tr>
                                <th>Bobot</th>
                                <th>Hasil Diagnosa</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (isset($hasil)) : ?>
                                <?php foreach ($hasil as $key => $item) : ?>
                                    <tr>
                                        <td><?= $key + 1 ?></td>
                                        <td><?= $item['created_at'] ?></td>
                                        <td><?= $item['nama'] ?></td>
                                        <td><?= $item['jenis_kelamin'] == 'L' ? 'Laki-laki' : 'Perempuan' ?></td>
                                        <td><?= $item['alamat'] ?></td>
                                        <td><?= $item['cf_hasil'] ?? '-' ?></td>
                                        <td><i><?= $item['nama_gangguan'] ?? '-' ?></i></td>
                                        <td>
                                            <a href="<?= site_url('hasil/detail/' . $item['id']) ?>" class="btn btn-sm btn-warning">Detail</a>
                                            <a href="<?= site_url('hasil/delete/' . $item['id']) ?>" class="btn btn-sm btn-danger btn-confirm-delete" data-url="<?= site_url('hasil/delete/' . $item['id']) ?>" data-message="Yakin ingin menghapus hasil ini?">Hapus</a>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            <?php else : ?>
                                <tr>
                                    <td colspan="6" class="text-center">Tidak ada data</td>
                                </tr>
                            <?php endif ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer" style="display: block;">
                    Footer
                </div>
                <!-- /.card-footer-->
            </div>
        </div>
    </div>
</section>