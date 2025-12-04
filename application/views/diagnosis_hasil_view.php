    <!-- Contact Section -->
    <section id="contact" class="contact section">

        <div class="container section-title" data-aos="fade-up">
            <h2>Diagnosa Gangguan Tidur</h2>
            <p>Berdasarkan jawaban dan gejala yang Anda pilih, sistem mendeteksi adanya indikasi gangguan tidur tertentu. Hasil ini merupakan diagnosis awal yang bertujuan untuk membantu Anda mengenali kondisi kesehatan tidur secara lebih dini.</p>
        </div>

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row">
                <div class="col">
                    <table class="table table-striped">
                        <?php if (isset($hasil)): ?>
                            <tr>
                                <td>Nama</td>
                                <td class="fw-bold"><?= $hasil->nama; ?></td>
                            </tr>
                            <tr>
                                <td>Umur</td>
                                <td><?= $hasil->umur; ?> Tahun</td>
                            </tr>
                            <tr>
                                <td>Jenis Kelamin</td>
                                <td><?= $hasil->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan'; ?></td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td><?= $hasil->alamat ?: 'Tidak ada alamat'; ?></td>
                            </tr>
                            <tr>
                                <td>Hasil Diagnosa</td>
                                <td class="text-danger "><?= $hasil->nama_gangguan ?: 'Tidak ada hasil diagnosa'; ?></td>
                            </tr>
                            <tr>
                                <td width="25%">Deskripsi</td>
                                <td class="text-muted">
                                    <?= $hasil->deskripsi_gangguan; ?>
                                </td>
                            </tr>
                        <?php else : ?>
                            <tr>
                                <td colspan="2" class="text-center">Tidak ada data hasil diagnosa</td>
                            </tr>
                        <?php endif ?>
                    </table>
                </div>
            </div>

        </div>

    </section><!-- /Contact Section -->