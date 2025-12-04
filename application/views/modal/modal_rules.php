<div class="modal fade" id="tambahPengetahuan" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <form action="<?= site_url('rules/store') ?>" method="post" id="formRules">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTambahLabel">Tambah Gejala</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="id">
                    <input type="hidden" name="mode" id="mode" value="tambah">

                    <div class="form-group">
                        <label for="nama_gejala">Nama Gejala</label>
                        <select type="text" name="nama_gejala" id="nama_gejala" class="form-control" required></select>
                    </div>
                    <div class="form-group">
                        <label for="nama_penyakit">Nama Penyakit</label>
                        <select name="nama_penyakit" id="nama_penyakit" class="form-control" required></select>
                    </div>
                    <div class="form-group">
                        <label for="nilai_cf">Nilai CF</label>
                        <select name="nilai_cf" id="nilai_cf" class="form-control" required></select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-success" type="submit">Simpan</button>
                    <button class="btn btn-secondary" data-dismiss="modal" type="button">Batal</button>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    const URL = {
        get_gejala: '<?= site_url('option/get_gejala') ?>',
        get_penyakit: '<?= site_url('option/get_penyakit') ?>',
        get_pakar: '<?= site_url('option/get_pakar') ?>',
    };

    function fetchGejala() {
        $.ajax({
            url: URL.get_gejala,
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                const $select = $('#nama_gejala');
                $select.empty().append('<option value="">Pilih Gejala</option>');
                data.forEach(item => {
                    $select.append(`<option value="${item.id}">${item.kode}</option>`);
                });
            },
            error: function() {
                alert('Gagal mengambil data aset.');
            }
        });
    }

    function fetchPenyakit() {
        $.ajax({
            url: URL.get_penyakit,
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                const $select = $('#nama_penyakit');
                $select.empty().append('<option value="">Pilih Penyakit</option>');
                data.forEach(item => {
                    $select.append(`<option value="${item.id}">${item.kode}</option>`);
                });
            },
            error: function() {
                alert('Gagal mengambil data aset.');
            }
        });
    }

    function fetchPakar() {
        $.ajax({
            url: URL.get_pakar,
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                const $select = $('#nilai_cf');
                $select.empty().append('<option value="">Pilih Pakar</option>');
                data.forEach(item => {
                    $select.append(`<option value="${item.id}">${item.label}</option>`);
                });
            },
            error: function() {
                alert('Gagal mengambil data aset.');
            }
        });
    }

    fetchGejala();
    fetchPenyakit();
    fetchPakar();

</script>
