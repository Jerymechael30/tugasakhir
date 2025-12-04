<!-- Contact Section -->
<section id="contact" class="contact section">

    <div class="container section-title" data-aos="fade-up">
        <h2>Diagnosa Gangguan Tidur</h2>
        <p>Apakah Anda mengalami masalah tidur yang mengganggu kualitas hidup Anda? Jawab beberapa pertanyaan sederhana untuk membantu sistem menganalisis kemungkinan gangguan tidur yang Anda alami, seperti insomnia, sleep apnea, atau gangguan tidur lainnya. Hasil diagnosa ini dapat menjadi langkah awal untuk mendapatkan penanganan yang tepat.</p>
    </div>

    <div class="container" data-aos="fade-up" data-aos-delay="100">

        <form action="forms/contact.php" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="200" style="background-color: transparent; border: none; box-shadow: none; padding: 0;">
            <div class="row gy-4">

                <div class="col-lg-5">

                    <div class="info-wrap">
                        <div class="row gy-4">
                            <div class="col-md-12">
                                <label for="nama_lengkap" class="pb-2">Masukan Nama Lengkap</label>
                                <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control" required="">
                            </div>
                            <div class="col-md-12">
                                <label for="email" class="pb-2">Email</label>
                                <input type="email" class="form-control" name="email" id="email" required="">
                            </div>
                            <div class="col-md-12">
                                <label for="tanggal_lahir" class="pb-2">Tanggal Lahir</label>
                                <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" required="">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-7">
                    <div class="info-wrap">
                        <div class="row gy-4">
                            <div class="col-md-12">
                                <div class="container section-title" data-aos="fade-up">
                                    <h2>Diagnosa Gangguan Tidur</h2>
                                    <p>Apakah Anda mengalami masalah tidur yang mengganggu kualitas hidup Anda? Jawab beberapa pertanyaan sederhana untuk membantu sistem menganalisis kemungkinan gangguan tidur yang Anda alami, seperti insomnia, sleep apnea, atau gangguan tidur lainnya. Hasil diagnosa ini dapat menjadi langkah awal untuk mendapatkan penanganan yang tepat.</p>
                                </div>

                                <?php if (!empty($gejala)) : ?>
                                    <?php foreach ($gejala as $g) : ?>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input" type="checkbox" name="gejala[]" value="<?= $g->kode ?>" id="<?= strtolower($g->kode) ?>">
                                            <label class="form-check-label" for="<?= strtolower($g->kode) ?>">
                                                [<?= $g->kode ?>] - <?= $g->deskripsi ?>
                                            </label>
                                        </div>
                                    <?php endforeach; ?>
                                <?php else : ?>
                                    <p>Tidak ada data gejala tersedia.</p>
                                <?php endif; ?>
                            </div>

                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-primary">Diagnosa Sekarang</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </form>

    </div>

</section><!-- /Contact Section -->