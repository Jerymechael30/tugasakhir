<section>
    <div class="row">
        <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-secondary">
                <div class="inner">
                    <h3><?= isset($total_pasien) ? $total_pasien : 0; ?></h3>

                    <p>Kelola User</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="<?= base_url('user'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3><?= isset($total_admin) ? $total_admin : 0; ?></h3>

                    <p>Kelola Admin</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="<?= base_url('manajemen'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
                <div class="inner">
                    <h3><?= isset($total_gangguan) ? $total_gangguan : 0; ?></h3>

                    <p>Jumlah Data Gangguan</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="<?= base_url('manajemen'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3><?= isset($total_rules) ? $total_rules : 0; ?></h3>

                    <p>Data Rules</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="<?= base_url('rules'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3><?= isset($total_gejala) ? $total_gejala : 0; ?></h3>

                    <p>Data Gejala</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="<?= base_url('gejala'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <!-- ./col -->
        <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3><?= isset($total_diagnosa) ? $total_diagnosa : 0; ?></h3>

                    <p>Data Rekam Psikologis</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="<?= base_url('hasil'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"></h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body" style="display: block;">
                    <h1>Hallo, Selamat Datang di Sistem Pakar Diagnosa Gangguan Tidur</h1>
                </div>
                <!-- /.card-body -->
                <div class="card-footer" style="display: block;">
                    
                <!-- /.card-footer-->
            </div>
        </div>
    </div>
</section>

<section>
    <div class="row">
        <div class="col-12">
            <!-- Card 1: Tetap Terbuka -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Sistem Pakar Berbasis Certainty Factor untuk Diagnosa Gangguan Tidur</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body" style="display: block;">
                    Sistem ini dirancang untuk membantu dalam mendiagnosis gangguan tidur berdasarkan gejala-gejala yang dialami pengguna, menggunakan metode Certainty Factor untuk menghitung tingkat kepastian dari setiap kemungkinan diagnosis.
                </div>
                <div class="card-footer" style="display: block;">
                    © 2025 Sistem Pakar Gangguan Tidur
                </div>
            </div>

            <!-- Card 2 -->
            <div class="card collapsed-card">
                <div class="card-header">
                    <h3 class="card-title">Panduan Penggunaan</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                    </div>
                </div>
                <div class="card-body" style="display: none;">
                    Mulailah dengan menjawab beberapa pertanyaan terkait gejala tidur yang Anda alami. Sistem akan menganalisis jawaban Anda dan memberikan kemungkinan gangguan tidur yang sesuai.
                </div>
                <div class="card-footer" style="display: none;">
                    Ikuti langkah-langkah yang ditampilkan untuk hasil terbaik.
                </div>
            </div>

            <!-- Card 3 -->
            <div class="card collapsed-card">
                <div class="card-header">
                    <h3 class="card-title">Tentang Gangguan Tidur</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                    </div>
                </div>
                <div class="card-body" style="display: none;">
                    Gangguan tidur adalah kondisi yang memengaruhi kualitas, durasi, dan pola tidur seseorang. Diagnosis yang tepat dapat membantu memperbaiki kualitas hidup secara keseluruhan.
                </div>
                <div class="card-footer" style="display: none;">
                    Kenali gejalanya sejak dini untuk penanganan lebih cepat.
                </div>
            </div>

            <!-- Card 4 -->
            <div class="card collapsed-card">
                <div class="card-header">
                    <h3 class="card-title">Fitur Sistem</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                    </div>
                </div>
                <div class="card-body" style="display: none;">
                    Sistem ini dilengkapi dengan basis pengetahuan yang mencakup berbagai jenis gangguan tidur, mekanisme pencocokan gejala, serta rekomendasi solusi yang sesuai.
                </div>
                <div class="card-footer" style="display: none;">
                    Sistem ini terus diperbarui berdasarkan referensi medis terbaru.
                </div>
            </div>

            <!-- Card 5 -->
            <div class="card collapsed-card">
                <div class="card-header">
                    <h3 class="card-title">Keamanan dan Privasi</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                    </div>
                </div>
                <div class="card-body" style="display: none;">
                    Semua data pengguna yang diinputkan ke dalam sistem akan dijaga kerahasiaannya dan tidak dibagikan kepada pihak ketiga.
                </div>
                <div class="card-footer" style="display: none;">
                    Privasi Anda adalah prioritas kami.
                </div>
            </div>
        </div>
    </div>
</section>