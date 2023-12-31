<div wire:ignore.self class="modal fade bd-example-modal-lg" id="newPatient" tabindex="-1" role="dialog"
aria-labelledby="myLargeModalLabel"
aria-hidden="true">
<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="card">
            <form class="form-horizontal" wire:submit.prevent="create" enctype="multipart/form-data">
                <div class="card-body row">
                    <div class='form-group col-md-6'>
                        <label for='name' class='control-label'> {{ __('Nama Lengkap') }}</label>
                        <input type='text' wire:model.lazy='name'
                        class="form-control @error('name') is-invalid @enderror" id='name' autofocus placeholder="Nama Lengkap pasien">
                        @error('name')
                        <div class='invalid-feedback'>{{ $message }}</div> @enderror
                    </div>
                    <div class='form-group col-md-6'>
                        <label for='birth_date' class='control-label'> {{ __('Tanggal Lahir') }}</label>
                        <input type='date' wire:model.lazy='birth_date'
                        placeholder="Harga" class="form-control @error('birth_date') is-invalid @enderror" id='birth_date'>
                        @error('birth_date')
                        <div class='invalid-feedback'>{{ $message }}</div> @enderror
                    </div>
                    <div class='form-group col-md-12'>
                        <input type='text' wire:model.lazy='nik'
                        placeholder="Nomor Induk Kependudukan (NIK)" class="form-control @error('nik')
                        is-invalid
                        @enderror"
                        id='nik'>
                        @error('nik')
                        <div class='invalid-feedback'>{{ $message }}</div> @enderror
                    </div>
                    <div class='form-group col-md-12'>
                        <textarea class="form-control" wire:model="address" placeholder="Alamat Lengkap"></textarea>
                        @error('address')
                        <div class='invalid-feedback'>{{ $message }}</div> @enderror
                    </div>
                    <div class='form-group col-md-6'>
                        <input type='text' wire:model.lazy='profession'
                        class="form-control @error('pro') is-invalid @enderror" id='pro' placeholder="Nama Pekerjaan pasien">
                        @error('profession')
                        <div class='invalid-feedback'>{{ $message }}</div> @enderror
                    </div>
                    <div class='form-group col-md-6'>
                        <input type='text' wire:model.lazy='phone_number'
                        class="form-control @error('phone_number') is-invalid @enderror" id='phone_number' placeholder="Nomer Handphone pasien">
                        @error('phone_number')
                        <div class='invalid-feedback'>{{ $message }}</div> @enderror
                    </div>
                    <div class='col-md-6 form-group'>
                        <select  id="gender" class="form-control custom-select" wire:model="gender" name="gender">
                            <option selected="selected" value="">--Pilih Jenis Kelamin--</option>
                            <option value="Laki-Laki">Laki Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class='col-md-6 form-group'>
                        <select  id="study" class="form-control custom-select" wire:model="study" name="study">
                            <option selected="selected" value="">--Pilih Pendidikan--</option>
                            <option value="Tidak Sekolah">Tidak Sekolah</option>
                            <option value="SD">Sekolah Dasar</option>
                            <option value="SMP">Sekolah Menengah Pertama</option>
                            <option value="SMA">Sekolah Menengah Atas</option>
                            <option value="Perguruan Tinggi">Perguruan Tinggi</option>
                        </select>
                    </div>
                    <div class='form-group col-md-12'>
                        <textarea class="form-control" wire:model="allergy" placeholder="List Alergi Yang di derita"></textarea>
                        @error('allergy')
                        <div class='invalid-feedback'>{{ $message }}</div> @enderror
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-success">{{ __('Simpan Data') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
