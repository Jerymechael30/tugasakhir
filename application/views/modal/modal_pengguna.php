<div class="modal fade" id="tambahPengguna" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-md" role="document">
        <form action="<?= site_url('manajemen/store') ?>" method="post" id="formPengguna">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTambahLabel">Tambah Admin</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="id">
                    <input type="hidden" name="mode" id="mode" value="tambah">

                    <form action="<?= base_url('manajemen/store'); ?>" method="post">
                        <div class="input-group mb-3">
                            <input id="nama" type="text" class="form-control" placeholder="Name" name="name" required value="<?= set_value('name') ?>">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input id="email" type="email" class="form-control" placeholder="Email" name="email" required value="<?= set_value('email') ?>">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                        <div id="row_password" class="input-group mb-3">
                            <input id="password" type="password" class="form-control" placeholder="Password" name="password" required value="<?= set_value('password') ?>">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div id="row_confirm_password" class="input-group mb-3">
                            <input id="confirm_password" type="password" class="form-control" placeholder="Confirm Password" name="confirm_password" required value="<?= set_value('confirm_password') ?>">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <!-- pilih Role -->
                        <div class="form-group">
                            <label for="role">Pilih Role</label>
                            <select id="role" name="role" id="role" class="form-control" required>
                                <option value="">-- Pilih Role --</option>
                                <option value="admin">Admin</option>
                                <option value="user">User</option>
                            </select>
                        </div>
                    </form>

                </div>
                <div class="modal-footer">
                    <button class="btn btn-success" type="submit">Simpan</button>
                    <button class="btn btn-secondary" data-dismiss="modal" type="button">Batal</button>
                </div>
            </div>
        </form>
    </div>
</div>