<?php if ($this->session->flashdata('success')): ?>
    <div class="alert alert-success"><?= $this->session->flashdata('success') ?></div>
<?php elseif ($this->session->flashdata('error')): ?>
    <div class="alert alert-danger"><?= $this->session->flashdata('error') ?></div>
<?php endif; ?>
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <h2 class="card-title">Informasi Data Admin</h2>
                <div class="card-tools">
                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#tambahPengguna" id="btnTambahPengguna">Tambah Admin</button>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Lengkap</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Tanggal Daftar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (count($pengguna) > 0): ?>
                            <?php foreach ($pengguna as $key => $item): ?>
                                <tr>
                                    <td><?= $key + 1 ?></td>
                                    <td><?= $item['nama'] ?></td>
                                    <td><?= $item['email'] ?></td>
                                    <td><?= $item['role'] ?></td>
                                    <td><?= $item['created_at'] ?></td>
                                    <td>
                                        <a href="#" class="text-primary btnEditPengguna"
                                            data-id="<?= $item['id'] ?>"
                                            data-nama="<?= htmlspecialchars($item['nama']) ?>"
                                            data-email="<?= htmlspecialchars($item['email']) ?>"
                                            data-role="<?= htmlspecialchars($item['role']) ?>"
                                            data-toggle="modal" data-target="#tambahPengguna">Edit</a> |
                                        <a href="<?= site_url('manajemen/delete/'.$item['id']) ?>" 
                                            class="text-danger btn-confirm-delete" 
                                            data-url="<?= site_url('manajemen/delete/'.$item['id']) ?>" 
                                            data-message="Yakin ingin menghapus pengguna ini?">
                                            Delete
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        <?php else: ?>
                            <tr><td colspan="5" class="text-center">Tidak ada data</td></tr>
                        <?php endif ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('modal/modal_pengguna'); ?>

<script>
    $(document).ready(function () {
        $('#btnTambahPengguna').on('click', function () {
            $('#formPengguna')[0].reset();
            $('#modalTambahLabel').text('Tambah Pengguna');
            $('#formGejala').attr('action', '<?= site_url('manajemen/store') ?>');
            $('#mode').val('tambah');
            $('#id').val('');
            $('#nama').val('');
            $('#email').val('');
            $('#role').val('');
            $('#password').val('');
            $('#confirm_password').val('');
        });

        $('.btnEditPengguna').on('click', function () {
            setTimeout(() => {
                $('#modalTambahLabel').text('Edit Pengguna');
                $('#formGejala').attr('action', '<?= site_url('gejala/store') ?>');
                $('#mode').val('edit');
                $('#id').val($(this).data('id'));
                $('#nama').val($(this).data('nama'));
                $('#email').val($(this).data('email'));
                $('#role').val($(this).data('role'));
            }, 100);
        });
    });
</script>