    <!-- Contact Section -->
    <section id="contact" class="contact section">

        <div class="container section-title" data-aos="fade-up">
            <h2>Diagnosa Gangguan Tidur</h2>
            <p>Apakah Anda mengalami masalah tidur yang mengganggu kualitas hidup Anda? Jawab beberapa pertanyaan sederhana untuk membantu sistem menganalisis kemungkinan gangguan tidur yang Anda alami, seperti insomnia, sleep apnea, atau gangguan tidur lainnya. Hasil diagnosa ini dapat menjadi langkah awal untuk mendapatkan penanganan yang tepat.</p>
        </div>

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <form action="<?= base_url('diagnosis/submit'); ?>" method="post" data-aos="fade-up" data-aos-delay="200" style="background-color: transparent; border: none; box-shadow: none; padding: 0;">
                <div class="row gy-4">

                    <div class="col-lg-8 mx-auto">
                        <div class="info-wrap">
                            <div class="row gy-4">
                                <div class="col-md-5">
                                    <label for="nama" class="pb-2">Masukan Nama Lengkap</label>
                                    <input type="text" name="nama" id="nama" class="form-control" required>
                                    <?= form_error('nama', '<small class="text-danger">', '</small>') ?>
                                </div>
                                <div class="col-md-3">
                                    <label for="umur" class="pb-2">Masukan Umur</label>
                                    <input type="number" name="umur" id="umur" class="form-control" required>
                                    <?= form_error('umur', '<small class="text-danger">', '</small>') ?>
                                </div>
                                <div class="col-md-4">
                                    <label for="jenis_kelamin" class="pb-2">Jenis Kelamin</label>
                                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
                                        <option value="">Pilih Jenis Kelamin</option>
                                        <option value="L">Laki-laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>
                                    <?= form_error('jenis_kelamin', '<small class="text-danger">', '</small>') ?>
                                </div>

                                <!-- alamat -->
                                <div class="col-md-12">
                                    <label for="alamat" class="pb-2">Alamat</label>
                                    <textarea name="alamat" id="alamat" class="form-control" rows="3"></textarea>
                                    <?= form_error('alamat', '<small class="text-danger">', '</small>') ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8 mx-auto">
                        <div class="info-wrap">


                            <div class="row gy-4">

                                <div class="col-md-12">
                                    <div class="container section-title text-start" data-aos="fade-up">
                                        <h2 class="text-center">Diagnosa Gangguan Tidur</h2>
                                        <p>Apakah Anda mengalami masalah tidur yang mengganggu kualitas hidup Anda? Jawab beberapa pertanyaan sederhana untuk membantu sistem menganalisis kemungkinan gangguan tidur yang Anda alami, seperti insomnia, sleep apnea, atau gangguan tidur lainnya. Hasil diagnosa ini dapat menjadi langkah awal untuk mendapatkan penanganan yang tepat.</p>
                                    </div>

                                    <?php if (isset($gejala)) : ?>
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th style="width: 5%;">No</th>
                                                    <th style="width: 55%;">Pertanyaan</th>
                                                    <th style="width: 40%;">Jawaban</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($gejala as $key => $g) : ?>
                                                    <?php $id = $g['id']; ?>
                                                    <tr>
                                                        <td><?= $key + 1; ?>.</td>
                                                        <td><?= $g['nama']; ?></td>
                                                        <td>
                                                            <?php if (isset($jawaban)) : ?>
                                                                <?php foreach ($jawaban as $j => $cf) : ?>
                                                                    <div class="form-check mb-1">
                                                                        <input class="form-check-input" type="radio" name="gejala[<?= $id; ?>]" id="cf_<?= $id . '_' . $j; ?>" value="<?= $cf['id']; ?>">
                                                                        <label class="form-check-label" for="cf_<?= $id . '_' . $j; ?>"><?= $cf['label']; ?></label>
                                                                    </div>
                                                                <?php endforeach; ?>
                                                            <?php endif; ?>
                                                        </td>
                                                        <td>
                                                            <button type="button" class="btn btn-sm btn-danger hapus-jawaban" style="cursor: pointer; font-size:12px;" data-id="<?= $id; ?>">hapus</button>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    <?php else : ?>
                                        <p class="text-danger text-center">Tidak ada data gejala yang ditemukan. Silakan hubungi administrator.</p>
                                    <?php endif ?>
                                </div>

                                <!-- btn submit -->
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary">Diagnosa Sekarang</button>
                                </div>
                                <!-- end btn submit -->

                            </div>
                        </div>
                    </div>

                </div>

            </form>

        </div>

    </section><!-- /Contact Section -->

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.hapus-jawaban').forEach(function(el) {
                el.addEventListener('click', function() {
                    const id = this.getAttribute('data-id');
                    // Cari semua radio dalam kelompok name="gejala[id]"
                    const radios = document.querySelectorAll('input[name="gejala[' + id + ']"]');
                    radios.forEach(function(radio) {
                        radio.checked = false;
                    });
                });
            });
        });
    </script>