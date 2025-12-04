<section>
    <?php if (!isset($hasil)) : ?>
        <div class="row">
            <div class="col text-center">
                <h2>Tidak ada data</h2>
            </div>
        </div>
    <?php else : ?>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Hasil Perhitungan <strong><?= $hasil['nama']; ?></strong></h3>

                        <div class="card-tools">
                            <!-- btn tambah gejala -->
                            <a href="<?= base_url('hasil'); ?>" class="btn btn-sm btn-danger">Kembali</a>
                            <!-- end btn tambah gejala -->
                        </div>
                    </div>
                    <div class="card-body" style="display: block;">
                        <div class="mb-4">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <th>Penyakit</th>
                                    <th>Gejala</th>
                                    <th>Nilai CF Pakar</th>
                                    <th>Nilai CF User</th>
                                </thead>
                                <tbody>
                                    <?php foreach ($hasil['penyakit'] as $penyakit) : ?>
                                        <?php foreach ($penyakit['gejala'] as $index => $gejala) : ?>
                                            <tr>
                                                <?php if ($index === 0) : ?>
                                                    <td rowspan="<?= count($penyakit['gejala']) ?>">
                                                        <?= $penyakit['nama_gangguan'] ?>
                                                    </td>
                                                <?php endif; ?>
                                                <td><?= '[' . $gejala['kode_gejala'] . '] ' . $gejala['nama_gejala'] ?></td>
                                                <td><?= $gejala['cf_pakar'] ?></td>
                                                <td><?= $gejala['cf_user'] ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <?php foreach ($hasil['penyakit'] as $key => $penyakit) : ?>
                            <div class="mb-4">
                                <h5><?= $key + 1; ?>. Mengambil data Gejala dan Nilai CF User dari Data Pasien</h5>
                                <h6>Alternatif [<?= $penyakit['kode_gangguan']; ?>] <strong><?= $penyakit['nama_gangguan']; ?></strong></h6>
                                <p><strong>Rumus:</strong></p>
                                <p>CF Combine = CF1 + CF2 * (1 - CF1)</p>

                                <?php if (count($penyakit['cf_perhitungan']) === 1 && $penyakit['cf_perhitungan'][0]['cf_2'] === null) : ?>
                                    <p><em><?= $penyakit['cf_perhitungan'][0]['rumus']; ?></em></p>
                                <?php else : ?>
                                    <table border="1" cellpadding="8" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Langkah</th>
                                                <th>Rumus</th>
                                                <th>Hasil</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($penyakit['cf_perhitungan'] as $i => $cf) : ?>
                                                <tr>
                                                    <td>Langkah <?= $i + 1; ?></td>
                                                    <td><?= $cf['rumus']; ?></td>
                                                    <td><?= number_format((float) $cf['cf_combine'], 4); ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                <?php endif; ?>

                                <p class="mt-2">Total CF Combine: <strong><?= number_format((float) $penyakit['cf_combine'], 4); ?></strong></p>
                                <p class="mt-2 text-danger">Hasil CF Combine %: <strong><?= number_format((float) $penyakit['cf_combine'], 4) * 100; ?>%</strong></p>
                                <hr>
                            </div>
                        <?php endforeach; ?>

                        <?php
                        $penyakit_tertinggi = null;
                        $nilai_tertinggi = -1;

                        foreach ($hasil['penyakit'] as $p) {
                            $cf = floatval($p['cf_combine']);
                            if ($cf > $nilai_tertinggi) {
                                $nilai_tertinggi = $cf;
                                $penyakit_tertinggi = $p;
                            }
                        }
                        ?>

                        <h5 class="text-danger">
                            <?= $hasil['nama']; ?> || Hasil Diagnosa:
                            <?= '[' . $penyakit_tertinggi['kode_gangguan'] . '] ' . $penyakit_tertinggi['nama_gangguan']; ?>
                            (CF Combine: <?= number_format($penyakit_tertinggi['cf_combine'], 4) * 100; ?>%)
                        </h5>

                    </div>

                    <!-- /.card-body -->
                    <div class="card-footer" style="display: block;">
                        Footer
                    </div>
                    <!-- /.card-footer-->
                </div>
            </div>
        </div>
    <?php endif ?>
</section>