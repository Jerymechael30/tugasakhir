<?php if ($this->session->flashdata('success')): ?>
    <div class="alert alert-success"><?= $this->session->flashdata('success') ?></div>
<?php elseif ($this->session->flashdata('error')): ?>
    <div class="alert alert-danger"><?= $this->session->flashdata('error') ?></div>
<?php endif; ?>
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <h2 class="card-title">Informasi Data Rules</h2>
                <div class="card-tools">
                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#tambahPengetahuan" id="btntambahPengetahuan">Tambah Pengetahuan</button>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Gangguan</th>
                            <th>Gejala</th>
                            <th>Pakar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (count($rules) > 0): ?>
                            <?php
                            $groupedRules = [];
                            foreach ($rules as $rule) {
                                $groupedRules[$rule['nama_gangguan']][] = $rule;
                            }
                            $groupIndex = 1;
                            ?>
                            <?php foreach ($groupedRules as $gangguan => $items): ?>
                                <?php $rowspan = count($items); ?>
                                <?php foreach ($items as $itemIndex => $item): ?>
                                    <tr>
                                        <?php if ($itemIndex === 0): ?>
                                            <td rowspan="<?= $rowspan ?>"><?= $groupIndex ?></td>
                                            <td rowspan="<?= $rowspan ?>"><?= htmlspecialchars($gangguan, ENT_QUOTES, 'UTF-8') ?></td>
                                        <?php endif; ?>
                                        <td><?= htmlspecialchars($item['nama_gejala'], ENT_QUOTES, 'UTF-8') ?></td>
                                        <td><?= htmlspecialchars($item['nilai_cf'], ENT_QUOTES, 'UTF-8') ?></td>
                                        <td>
                                            <a href="#"
                                                class="text-primary btnEditGejala"
                                                data-id="<?= htmlspecialchars($item['id'], ENT_QUOTES, 'UTF-8') ?>"
                                                data-nama_gejala="<?= htmlspecialchars($item['gejala_id'], ENT_QUOTES, 'UTF-8') ?>"
                                                data-nama_gangguan="<?= htmlspecialchars($item['gangguan_id'], ENT_QUOTES, 'UTF-8') ?>"
                                                data-nilai_cf="<?= htmlspecialchars($item['cf_pakar_id'], ENT_QUOTES, 'UTF-8') ?>"
                                                data-toggle="modal" data-target="#tambahPengetahuan">Edit</a>
                                            |
                                            <a href="<?= site_url('rules/delete/' . $item['id']) ?>"
                                                class="text-danger btn-confirm-delete"
                                                data-url="<?= site_url('rules/delete/' . $item['id']) ?>"
                                                data-message="Yakin ingin menghapus rules ini?">Delete</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                <?php $groupIndex++; ?>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="5" class="text-center">Tidak ada data</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('modal/modal_rules'); ?>

<script>
    $(document).ready(function() {
        $('#btntambahPengetahuan').on('click', function() {
            $('#formRules')[0].reset();
            $('#modalTambahLabel').text('Tambah Rules');
            $('#formRules').attr('action', '<?= site_url('rules/store') ?>');
            $('#mode').val('tambah');
            $('#id').val('');
            $('#nama_gejala').val('');
            $('#nama_gangguan').val('');
            $('#nilai_cf').val('');
        });

        $('.btnEditGejala').on('click', function() {
            setTimeout(() => {
                $('#modalTambahLabel').text('Edit Rule');
                $('#formRules').attr('action', '<?= site_url('rules/store') ?>');
                $('#mode').val('edit');
                $('#id').val($(this).data('id'));
                $('#nama_gejala').val($(this).data('nama_gejala'));
                $('#nama_gangguan').val($(this).data('nama_gangguan'));
                $('#nilai_cf').val($(this).data('nilai_cf'));
            }, 100);
        });
    });
</script>