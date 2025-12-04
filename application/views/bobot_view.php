<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <h2 class="card-title">Informasi Bobot Nilai CF Pakar & CF User</h2>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <h5>Tabel 1.1 Bobot Nilai CF Pakar</h5>
                        <table class="table table-bordered table-striped">
                            <thead>
                                <th>No.</th>
                                <th>Keterangan</th>
                                <th>Nilai CF</th>
                            </thead>
                            <tbody>
                                <?php if (isset($cf_pakar)) : ?>
                                    <?php foreach ($cf_pakar as $index => $pakar) : ?>
                                        <tr>
                                            <td><?php echo $index + 1; ?></td>
                                            <td><?php echo $pakar['label']; ?></td>
                                            <td><?php echo $pakar['nilai']; ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-12 col-md-6">
                        <h5>Tabel 1.2 Bobot Nilai CF Pakar</h5>
                        <table class="table table-bordered table-striped">
                            <thead>
                                <th>No.</th>
                                <th>Keterangan</th>
                                <th>Nilai CF</th>
                            </thead>
                            <tbody>
                                <?php if (isset($cf_user)) : ?>
                                    <?php foreach ($cf_user as $index => $user) : ?>
                                        <tr>
                                            <td><?php echo $index + 1; ?></td>
                                            <td><?php echo $user['label']; ?></td>
                                            <td><?php echo $user['nilai']; ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>