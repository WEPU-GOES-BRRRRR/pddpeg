<!-- Add Modal-->
<div
    class="modal fade"
    id="addFamilyModal"
    tabindex="-1"
    role="dialog"
    aria-labelledby="addFamilyModal"
    aria-hidden="true"
>
    <div
        class="modal-dialog"
        role="document"
    >
        <div class="modal-content">
            <div class="modal-header">
                <h5
                    class="modal-title"
                    id="addFamilyModal"
                >Tambah Data Keluarga</h5>
                <button
                    class="close"
                    type="button"
                    data-dismiss="modal"
                    aria-label="Close"
                >
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form
                    action="#"
                    method="post"
                    id="form_tambah_keluarga"
                    onsubmit="handleSubmit(event)"
                >
                    <div class="form-group">
                        <label for="name">Nama Lengkap</label>
                        <input
                            type="text"
                            name="name"
                            id="name"
                            class="form-control"
                            required
                        >
                    </div>
                    @php
                    $gender = [
                    ['identifier' => 'man', 'label' => 'Laki-laki'],
                    ['identifier' => 'woman', 'label' => 'Perempuan'],
                    ];
                    $religion = ['islam', 'budha', 'katholik', 'kristen'];
                    $blood = ['a', 'b', 'ab', 'o'];
                    @endphp
                    <div class="form-group">
                        <label for="gender">Jenis Kelamin</label>
                        <select
                            name="gender"
                            id="gender"
                            class="form-control"
                        >
                            <option value="">-- Pilih --</option>
                            @foreach ($gender as $g)
                            <option value="{{ $g['identifier'] }}">{{ $g['label'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="place_of_birth">Tempat Lahir</label>
                        <input
                            type="text"
                            name="place_of_birth"
                            id="place_of_birth"
                            class="form-control"
                            required
                        >
                    </div>
                    <div class="form-group">
                        <label for="day_of_birth">Tanggal Lahir</label>
                        <input
                            type="date"
                            name="day_of_birth"
                            id="day_of_birth"
                            class="form-control"
                            required
                        >
                    </div>
                    <div class="form-group">
                        <label for="status">Hubungan Dalam Keluarga</label>
                        <input
                            type="text"
                            name="status"
                            id="status"
                            class="form-control"
                            required
                        >
                    </div>
                    <button class="btn btn-success">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
