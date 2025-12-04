<!-- Contact Section -->
<section id="contact" class="contact section">

    <div class="container section-title" data-aos="fade-up">
        <h2>Jenis Gangguan Tidur</h2>
        <p>Setiap gangguan tidur memiliki gejala dan dampak yang berbeda-beda terhadap kesehatan fisik maupun mental.</p>
        <p>Untuk mengetahui jenis gangguan tidur yang mungkin Anda alami, silakan lanjutkan ke halaman Diagnosis dan jawab beberapa pertanyaan yang telah disiapkan oleh sistem pakar kami.</p>
    </div>

    <div class="row">
        <div class="col-6 mx-auto">
            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Jenis Gangguan</th>
                            <th scope="col">Deskripsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (isset($gangguan)) : ?>
                            <?php foreach ($gangguan as $index => $g) : ?>
                                <tr>
                                    <th scope="row"><?= $index + 1 ?>.</th>
                                    <td><?= htmlspecialchars($g['nama']) ?></td>
                                    <td><?= htmlspecialchars($g['deskripsi']) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="3">Tidak ada data gangguan tidur.</td>
                            </tr>
                        <?php endif ?>
                </table>

            </div>
        </div>
    </div>

</section><!-- /Contact Section -->