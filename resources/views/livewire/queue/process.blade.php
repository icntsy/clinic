@section('meta_title', 'MEDICAL RECORD')
@section('page_title', 'PROCESS CHECKUP MEDICAL RECORD')
@section('page_title_icon')
<i class="metismenu-icon fa fa-list"></i>
@endsection
@section('modal')
<livewire:component.modal-diagnosa :id="$queue->id"/>
<livewire:component.modal-lab/>
<livewire:component.modal-drug/>
@endsection

<div class="row">
    <div class="card col-md-12">
        @role("dokter")
        <div class="card-header">
            <div class="btn-actions-pane-right text-capitalize">
                <button  wire:click="save" class="btn-wide btn-outline-2x mr-md-2 btn btn-primary"><i class="fa
                    fa-check"></i> Selesai
                </button>
            </div>
        </div>
        @endrole
        @role("bidan")
        <div class="card-header">
            <div class="btn-actions-pane-right text-capitalize">
                <button  wire:click="save" class="btn-wide btn-outline-2x mr-md-2 btn btn-primary"><i class="fa
                    fa-check"></i> Selesai
                </button>
            </div>
        </div>
        @endrole
        <div class="card-body row">
            <div class="col-md-12">
                <div class="main-card">
                    <div class="card-header">
                        Data Pasien
                    </div>
                    <div class="card-body row">
                        <div class="col-md-6">
                            <table width="100%">
                                <tbody>
                                    <tr>
                                        <td style="font-weight: bold;" width="35%">NIK</td>
                                        <td width="1%">:</td>
                                        <td>
                                            {{$queue->patient->nik}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight: bold;" width="35%">Nama Lengkap</td>
                                        <td width="1%">:</td>
                                        <td>
                                            {{$queue->patient->name}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight: bold;" width="35%">Sex / Umur</td>
                                        <td>:</td>
                                        <td>
                                            {{$queue->patient->gender}} / {{\Carbon\Carbon::parse($queue->patient->birth_date)->diffInYears()}} Thn
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight: bold;" width="35%">Alamat</td>
                                        <td width="1%">:</td>
                                        <td>
                                            {{$queue->patient->address}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight: bold;" width="35%">Gol. Darah</td>
                                        <td width="1%">:</td>
                                        <td>
                                            {{$queue->patient->blood_type}}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <table width="100%">
                                <tbody>
                                    <tr>
                                        <td style="font-weight: bold;" width="35%">Tanggal Masuk / Jam</td>
                                        <td width="1%">:</td>
                                        <td>{{\Carbon\Carbon::parse($queue->created_at)->format('d F Y / H:i')}}</td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight: bold;" width="35%">No. Rekam Medis</td>
                                        <td width="1%">:</td>
                                        <td>
                                            {{$queue->patient->no_rekam_medis}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight: bold;" width="35%">
                                            @if ($role === 'dokter')
                                            Dokter Pemeriksa
                                            @elseif ($role === 'bidan')
                                            Bidan Pemeriksa
                                            @endif
                                        </td>
                                        <td>:</td>
                                        <td>
                                            @if ($role === 'dokter')
                                            {{$queue->doctor->name}}
                                            @elseif ($role === 'bidan')
                                            {{$queue->doctor->name}}
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight: bold;" width="35%">Layanan </td>
                                        <td>:</td>
                                        <td>{{$queue->service->name}}</td>
                                    </tr>
                                    @if ($role === 'dokter')
                                    <tr>
                                        <td style="font-weight: bold;" width="35%">Jenis Rawat</td>
                                        <td>:</td>
                                        <td>{{ $queue->jenis_rawat }}</td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            @role("dokter")
            <div class="col-md-12">
                <div class="main-card">
                    <div class="card-header">
                        Data Anamnesa
                    </div>
                    <div class="card-body row">
                        <div class=" form-group col-md-6">
                            <label for='anamnesis' class='control-label'> {{ __('Alasan Masuk (Anamnesa)') }}</label>
                            <textarea  wire:model.lazy='anamnesis' placeholder="Anamnesa" class="form-control @error('anamnesis') is-invalid @enderror"
                            id='anamnesis'></textarea>
                            @error('anamnesis')
                            <div class='invalid-feedback'>{{ $message }}</div> @enderror
                        </div>
                        <div class='form-group col-md-6'>
                            <label for='alerggy' class='control-label'> {{ __('Riwayat Alergi') }}</label>
                            <textarea wire:model="allergy" class="form-control @error('alerggy') is-invalid
                            @enderror">{{$queue->patient->allergy ?? ""}}</textarea>
                            @error('alerggy')
                            <div class='invalid-feedback'>{{ $message }}</div> @enderror
                        </div>
                        <div class='form-group col-md-6'>
                            <label for='main_complaint' class='control-label'> {{ __('Keluhan Utama') }}</label>
                            <textarea wire:model="main_complaint" class="form-control @error('main_complaint') is-invalid
                            @enderror">{{$queue->patient->main_complaint ?? ""}}</textarea>
                            @error('main_complaint')
                            <div class='invalid-feedback'>{{ $message }}</div> @enderror
                        </div>
                        <div class='form-group col-md-6'>
                            <label for='history_disease' class='control-label'> {{ __('Riwayat Penyakit') }}</label>
                            <textarea wire:model="history_disease" class="form-control @error('history_disease') is-invalid
                            @enderror">{{$queue->patient->history_disease ?? ""}}</textarea>
                            @error('history_disease')
                            <div class='invalid-feedback'>{{ $message }}</div> @enderror
                        </div>
                        <div class=" form-group col-md-6">
                            <label for='komplikasi' class='control-label'> {{ __('Komplikasi') }}</label>
                            <textarea  wire:model.lazy='komplikasi' placeholder="Komplikasi"
                            class="form-control @error('komplikasi') is-invalid @enderror"
                            id='komplikasi'> </textarea>
                            @error('komplikasi')
                            <div class='invalid-feedback'>{{ $message }}</div> @enderror
                        </div>
                        <div class='form-group col-md-3'>
                            <label for='height' class='control-label'> {{ __('Tinggi Badan (CM)') }}</label>
                            <input type='number' autofocus wire:model.lazy='height' placeholder="Tinggi Badan"
                            class="form-control @error('height') is-invalid @enderror" id='height'>
                            @error('height')
                            <div class='invalid-feedback'>{{ $message }}</div> @enderror
                        </div>
                        <div class='form-group col-md-3'>
                            <label for='weight' class='control-label'> {{ __('Berat Badan (KG)') }}</label>
                            <input type='number' autofocus wire:model.lazy='weight' placeholder="Berat Badan"
                            class="form-control @error('weight') is-invalid @enderror" id='weight'>
                            @error('weight')
                            <div class='invalid-feedback'>{{ $message }}</div> @enderror
                        </div>
                    </div>
                </div>
            </div>
            @endrole
            @role("bidan")
            <div class="card-body row">
                <div class='form-group col-md-6'>
                    <label for='anak_ke' class='control-label'> {{ __('Hamil Anak ke') }}</label>
                    <input type='text' wire:model.lazy='anak_ke'
                    class="form-control @error('anak_ke') is-invalid @enderror" id='anak_ke' autofocus placeholder="Hamil Anak ke">
                    @error('anak_ke')
                    <div class='invalid-feedback'>{{ $message }}</div> @enderror
                </div>
                <div class='form-group col-md-6'>
                    <label for='hpht' class='control-label'> {{ __('HPHT') }}</label>
                    <input type='date' wire:model.lazy='hpht'
                    class="form-control @error('hpht') is-invalid @enderror" id='hpht' autofocus placeholder="HPHT" >
                    @error('hpht')
                    <div class='invalid-feedback'>{{ $message }}</div> @enderror
                </div>
                <div class='form-group col-md-6'>
                    <label for='hpll' class='control-label'> {{ __('HPL') }}</label>
                    <input type='date' wire:model.lazy='hpll'
                    class="form-control @error('hpll') is-invalid @enderror" id='hpll' autofocus placeholder="HPL">
                    @error('hpll')
                    <div class='invalid-feedback'>{{ $message }}</div> @enderror
                </div>
                <div class='form-group col-md-6'>
                    <label for='pregnant_age' class='control-label'> {{ __('Usia Kehamilan') }}</label>
                    <input type='text' wire:model.lazy='pregnant_age'
                    class="form-control @error('pregnant_age') is-invalid @enderror" id='pregnant_age' autofocus placeholder="Usia Kehamilan">
                    @error('pregnant_age')
                    <div class='invalid-feedback'>{{ $message }}</div> @enderror
                </div>
                <div class='form-group col-md-6'>
                    <label for='lila' class='control-label'> {{ __('Lingkar Lengan Atas') }}</label>
                    <input type='text' wire:model.lazy='lila'
                    class="form-control @error('lila') is-invalid @enderror" id='lila' autofocus placeholder="LILA">
                    @error('lila')
                    <div class='invalid-feedback'>{{ $message }}</div> @enderror
                </div>
                <div class='form-group col-md-6'>
                    <label for='weight' class='control-label'> {{ __('Berat Badan') }}</label>
                    <input type='text' wire:model.lazy='weight'
                    class="form-control @error('weight') is-invalid @enderror" id='weight' autofocus placeholder="Berat Badan">
                    @error('weight')
                    <div class='invalid-feedback'>{{ $message }}</div> @enderror
                </div>
                <div class='form-group col-md-6'>
                    <label for='blood_pressure' class='control-label'> {{ __('Tekanan Darah') }}</label>
                    <input type='text' wire:model.lazy='blood_pressure'
                    class="form-control @error('blood_pressure') is-invalid @enderror" id='blood_pressure' autofocus placeholder="Tekanan Darah">
                    @error('blood_pressure')
                    <div class='invalid-feedback'>{{ $message }}</div> @enderror
                </div>
                <div class='form-group col-md-6'>
                    <label for='tfu' class='control-label'> {{ __('Tinggi Fudus Uteri') }}</label>
                    <input type='text' wire:model.lazy='tfu'
                    class="form-control @error('tfu') is-invalid @enderror" id='tfu' autofocus placeholder="TFU">
                    @error('tfu')
                    <div class='invalid-feedback'>{{ $message }}</div> @enderror
                </div>
                <div class='form-group col-md-6'>
                    <label for='djj' class='control-label'> {{ __('Denyut Jantung Janin') }}</label>
                    <input type='text' wire:model.lazy='djj'
                    class="form-control @error('djj') is-invalid @enderror" id='djj' autofocus placeholder="DJJ">
                    @error('djj')
                    <div class='invalid-feedback'>{{ $message }}</div> @enderror
                </div>
                <div class='form-group col-md-6'>
                    <label for='immunization_tt' class='control-label'> {{ __('Imunisasi TT') }}</label>
                    <input type='text' wire:model.lazy='immunization_tt'
                    class="form-control @error('immunization_tt') is-invalid @enderror" id='immunization_tt' autofocus placeholder="Imunisasi TT">
                    @error('immunization_tt')
                    <div class='invalid-feedback'>{{ $message }}</div> @enderror
                </div>
                <div class='form-group col-md-6'>
                    <label for='complaint' class='control-label'> {{ __('Keluhan') }}</label>
                    <input type='text' wire:model.lazy='complaint'
                    class="form-control @error('complaint') is-invalid @enderror" id='complaint' autofocus placeholder="Keluhan">
                    @error('complaint')
                    <div class='invalid-feedback'>{{ $message }}</div> @enderror
                </div>
            </div>
            <div class="col-md-12">
                <div class="card-main">
                    <div class="card-header">
                        Data Obat
                        <div class="btn-actions-pane-right text-capitalize">
                            <button  wire:click="addDrug" class="btn-wide btn-outline-2x mr-md-2 btn
                            btn-primary btn-sm">
                                <i class="fa fa-plus-circle"></i>
                                Tambah Obat
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nama Obat</th>
                                    <th>Qty</th>
                                    <th>Aturan Pakai</th>
                                    @if ($queue->jenis_rawat == NULL)
                                    <th>Harga</th>
                                    @endif
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($listDrug as $index => $drug)
                                <tr>
                                    <td>{{$drug["drug"]["nama"]}}</td>
                                    <td> <input type="number"
                                        min="0"
                                        max="{{$drug["drug"]["stok"]}}"
                                        class="form-control"
                                        wire:model="listDrug.{{$index}}.quantity"/>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control"
                                        wire:model="listDrug.{{$index}}.instruction"
                                        placeholder="Aturan Pakai"/>
                                    </td>
                                    @if ($queue->jenis_rawat == NULL)
                                    <td>
                                        <input type="text" class="form-control"
                                        wire:model.lazy="harga"
                                        placeholder="0"/>
                                    </td>
                                    @endif
                                    <td>
                                        <button wire:click="deleteDrug({{$index}})" class="btn btn-sm
                                        btn-danger">Hapus</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @endrole
            @role("dokter")
            <div class="col-md-12">
                <div class="main-card">
                    <div class="card-header">
                        Pemeriksaan Fisik
                    </div>
                    <div class="card-body row">
                        <div class='form-group col-md-3'>
                            <label for='kepala' class='control-label'> {{ __('Kepala') }}</label>
                            <select  wire:model.lazy='kepala' class="form-control @error('kepala') is-invalid @enderror" id='kepala'>
                                <option value="" >---Kepala--</option>
                                <option value="Normochepal" >Normochepal</option>
                                <option value="Tidak" >Tidak</option>
                            </select>
                            @error('kepala')
                            <div class='invalid-feedback'>{{ $message }}</div> @enderror
                        </div>
                        <div class='form-group col-md-3'>
                            <label for='mata' class='control-label'> {{ __('Mata') }}</label>
                            <select  wire:model.lazy='mata' class="form-control @error('mata') is-invalid @enderror" id='mata'>
                                <option value="" >---Mata--</option>
                                <option value="Conjungtiva Anemis (-)" >Conjungtiva Anemis (-)</option>
                                <option value="Conjungtiva Anemis (+)" >Conjungtiva Anemis (+)</option>
                                <option value="Sklera Ikterik (-)" >Sklera Ikterik (-)</option>
                                <option value="Sklera Ikterik (+)" >Sklera Ikterik (+)</option>
                            </select>
                            @error('mata')
                            <div class='invalid-feedback'>{{ $message }}</div> @enderror
                        </div>
                        <div class='form-group col-md-3'>
                            <label for='thoraks' class='control-label'> {{ __('Thoraks') }}</label>
                            <select  wire:model.lazy='thoraks' class="form-control @error('thoraks') is-invalid @enderror" id='thoraks'>
                                <option value="" >---Thoraks--</option>
                                <option value="Bj I-II Murni regular" >Bj I-II Murni regular</option>
                                <option value="Bj I-II Murni iregular" >Bj I-II Murni iregular</option>
                                <option value="Murmur (-)" >Murmur (-)</option>
                                <option value="Murmur (+)" >Murmur (+)</option>
                                <option value="Gallop (-)" >Gallop (-)</option>
                                <option value="Gallop (+)" >Gallop (+)</option>
                            </select>
                            @error('thoraks')
                            <div class='invalid-feedback'>{{ $message }}</div> @enderror
                        </div>
                        <div class='form-group col-md-3'>
                            <label for='ekstremitas' class='control-label'> {{ __('Ekstremitas') }}</label>
                            <select  wire:model.lazy='ekstremitas' class="form-control @error('ekstremitas') is-invalid @enderror" id='ekstremitas'>
                                <option value="" >---Ekstremitas--</option>
                                <option value="Akral Hangat" >Akral Hangat</option>
                                <option value="Akral Dingin" >Akral Dingin</option>
                                <option value="CRT < 2 detik" >CRT < 2 detik</option>
                            </select>
                            @error('ekstremitas')
                            <div class='invalid-feedback'>{{ $message }}</div> @enderror
                        </div>
                        <div class='form-group col-md-3'>
                            <label for='pulmo' class='control-label'> {{ __('Pulmo') }}</label>
                            <select  wire:model.lazy='pulmo' class="form-control @error('pulmo') is-invalid @enderror" id='pulmo'>
                                <option value="" >---Pulmo--</option>
                                <option value="VBS Ka=Ki" >VBS Ka=Ki</option>
                                <option value="Wheezing (-)" >Wheezing (-)</option>
                                <option value="wheezing (+)" >Wheezing (+)</option>
                                <option value="Ronkhi (-)" >Ronkhi (-)</option>
                                <option value="Ronkhi (+)" >Ronkhi (+)</option>
                            </select>
                            @error('pulmo')
                            <div class='invalid-feedback'>{{ $message }}</div> @enderror
                        </div>
                        <div class='form-group col-md-3'>
                            <label for='abdomen' class='control-label'> {{ __('Abdomen') }}</label>
                            <select  wire:model.lazy='abdomen' class="form-control @error('abdomen') is-invalid @enderror" id='abdomen'>
                                <option value="" >---Abdomen--</option>
                                <option value="Nyeri Tekan (-)" >Nyeri Tekan (-)</option>
                                <option value="Nyeri Tekan (+)" >Nyeri Tekan (+)</option>
                            </select>
                            @error('abdomen')
                            <div class='invalid-feedback'>{{ $message }}</div> @enderror
                        </div>
                        <div class='form-group col-md-3'>
                            <label for='leher' class='control-label'> {{ __('Kelenjar Getah Bening Ka/Ki') }}</label>
                            <input type='text' autofocus wire:model.lazy='leher' placeholder="Leher" class="form-control @error('leher') is-invalid @enderror" id='leher'>
                            @error('leher')
                            <div class='invalid-feedback'>{{ $message }}</div> @enderror
                        </div>
                        <div class='form-group col-md-3'>
                            <label for='blood_pressure' class='control-label'> {{ __('Tekanan Darah (mmHg)') }}</label>
                            <input type='number' autofocus wire:model.lazy='blood_pressure' placeholder="Tekanan Darah"
                            class="form-control @error('blood_pressure') is-invalid @enderror"
                            id='blood_pressure'>
                            @error('blood_pressure')
                            <div class='invalid-feedback'>{{ $message }}</div> @enderror
                        </div>
                        <div class='form-group col-md-3'>
                            <label for='respiration' class='control-label'> {{ __('Respirasi (X/Menit)') }}</label>
                            <input type='number' autofocus wire:model.lazy='respiration' placeholder="Respirasi"
                            class="form-control @error('respiration') is-invalid @enderror"
                            id='respiration'>
                            @error('respiration')
                            <div class='invalid-feedback'>{{ $message }}</div> @enderror
                        </div>
                        <div class='form-group col-md-3'>
                            <label for='pulse' class='control-label'> {{ __('Nadi (X/Menit)') }}</label>
                            <input type='number' autofocus wire:model.lazy='pulse' placeholder="Nadi"
                            class="form-control @error('pulse') is-invalid @enderror"
                            id='pulse'>
                            @error('pulse')
                            <div class='invalid-feedback'>{{ $message }}</div> @enderror
                        </div>
                        <div class='form-group col-md-3'>
                            <label for='temperature' class='control-label'> {{ __('Suhu (C)') }}</label>
                            <input type='number' autofocus wire:model.lazy='temperature' placeholder="Suhu"
                            class="form-control @error('temperature') is-invalid @enderror"
                            id='temperature'>
                            @error('temperature')
                            <div class='invalid-feedback'>{{ $message }}</div> @enderror
                        </div>
                        <div class='form-group col-md-3' id="optionMati" wire:ignore >
                            <label for='jenis_rawat' class='control-label'> {{ __('Pilihan Rawat') }}</label>
                            <select  wire:model='jenis_rawat' class="form-control @error('jenis_rawat') is-invalid @enderror" id='jenis_rawat'>
                                <option value="">- Pilih -</option>
                                <option value="Jalan">Rawat Jalan</option>
                                <option value="Inap">Rawat Inap</option>
                            </select>
                            @error('jenis_rawat')
                            <div class='invalid-feedback'>{{ $message }}</div> @enderror
                        </div>
                        <div class=" form-group col-md-6">
                            <label for='keterangan' class='control-label'> {{ __('Keterangan') }}</label>
                            <textarea  wire:model.lazy='keterangan' placeholder="keterangan" class="form-control @error('keterangan') is-invalid @enderror" id='keterangan'>
                            </textarea>
                            @error('keterangan')
                            <div class='invalid-feedback'>{{ $message }}</div> @enderror
                        </div>
                    </div>
                    <div class="card-header">
                        Data Diagnosa, Laboratorium Dan Obat
                    </div>
                    <div class="card-body row">
                        <div class="col-md-12">
                            <div class="card-main">
                                <div class="card-header">
                                    Data Labs
                                    <div class="btn-actions-pane-right text-capitalize">
                                        <button  wire:click="addLab" class="btn-wide btn-outline-2x mr-md-2 btn btn-primary btn-sm"><i class="fa
                                            fa-plus-circle"></i> Tambah Lab
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Nama Lab</th>
                                                <th>Satuan</th>
                                                <th>Hasil</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($listLab as $index => $lab)
                                            <tr>
                                                <td>{{$lab["lab"]["nama"]}}</td>
                                                <td>{{$lab["lab"]["satuan"]}}</td>
                                                <td>
                                                    <input type="text" name="listLab[{{$index}}][quantity]"
                                                    class="form-control" wire:model="listLab.{{$index}}.result">
                                                </td>
                                                <td>
                                                    <button wire:click="deleteLab({{$index}})" class="btn-sm btn-danger">
                                                        Hapus
                                                    </button>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="card-main">
                                <div class="card-header">
                                    Data Diagnosa
                                    <div class="btn-actions-pane-right text-capitalize">
                                        <button  wire:click="addDiagnosa" class="btn-wide btn-outline-2x mr-md-2 btn btn-primary btn-sm">
                                            <i class="fa fa-plus-circle"></i> Tambah Diagnosa
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Category</th>
                                                <th>Subcategory</th>
                                                <th>English Name</th>
                                                <th>Indonesian Name</th>
                                                <th>Keterangan</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($listDiagnosa as $index => $diagnosa)
                                            <tr>
                                                <td>{{$diagnosa["diagnosa"]["category"]}}</td>
                                                <td>{{$diagnosa["diagnosa"]["subcategory"]}}</td>
                                                <td>{{$diagnosa["diagnosa"]["english_name"]}}</td>
                                                <td>{{$diagnosa["diagnosa"]["indonesian_name"]}}</td>
                                                <td>
                                                    <input type="text" class="form-control" wire:model="listDiagnosa.{{$index}}.description"/>
                                                </td>
                                                <td>
                                                    <button wire:click="deleteDiagnosa({{$index}})" class="btn btn-sm
                                                    btn-danger">Hapus</button>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="card-main">
                                <div class="card-header">
                                    Data Obat
                                    <div class="btn-actions-pane-right text-capitalize">
                                        <button  wire:click="addDrug" class="btn-wide btn-outline-2x mr-md-2 btn btn-primary btn-sm">
                                            <i class="fa fa-plus-circle"></i> Tambah Obat
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Nama Obat</th>
                                                <th>Qty</th>
                                                <th>Aturan Pakai</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($listDrug as $index => $drug)
                                            <tr>
                                                <td>{{$drug["drug"]["nama"]}}</td>
                                                <td> <input type="number"
                                                    min="0"
                                                    max="{{$drug["drug"]["stok"]}}"
                                                    class="form-control"
                                                    wire:model="listDrug.{{$index}}.quantity"/>
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control"
                                                    wire:model="listDrug.{{$index}}.instruction"
                                                    placeholder="Aturan Pakai"/>
                                                </td>
                                                <td>
                                                    <button wire:click="deleteDrug({{$index}})" class="btn btn-sm
                                                    btn-danger">Hapus</button>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endrole
        </div>
    </div>
</div>
