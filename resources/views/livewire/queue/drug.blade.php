@section('meta_title', 'LAB')
@section('page_title', 'DATA PEMBAYARAN')
@section('page_title_icon')
<i class="metismenu-icon fa fa-credit-card" aria-hidden="true"></i>
@endsection
<div class="row">
    <div class="col-12">
        <div class="mb-3 card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="input-group">
                            <input type="text" class="form-control form-control" wire:model.lazy="search"
                            placeholder="{{ __('Pencarian') }}" value="{{ request('search') }}">
                            <div class="input-group-append">
                                <button class="btn btn-default">
                                    <a wire:target="search" wire:loading.remove><i class="fa fa-search"></i></a>
                                    <a wire:loading wire:target="search"><i class="fas fa-spinner fa-spin"></i></a>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-4" wire:poll>
                    <div class="col-md-12">
                        <table class="mb-0 table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Nama Pasien</th>
                                    <th>No Antrian</th>
                                    <th>Selesai Checkup</th>
                                    <th>Selesai Obat</th>
                                    <th>Dokter / Bidan</th>
                                    <th>Layanan</th>
                                    <th>Jenis Rawat</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $hasQueue = false;
                                @endphp
                                @forelse($queues as $queue)
                                    {{-- @if (!$queue->transaction) --}}
                                        <livewire:queue.drug-table :queue="$queue" :key="time() . $queue->id" />
                                        {{-- @php
                                            $hasQueue = true;
                                        @endphp
                                    @endif --}}
                                @empty
                                    @php
                                        $hasQueue = false;
                                    @endphp
                                <tr>
                                    <td colspan="7" class="text-center">
                                        Data kosong
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="m-auto pt-3 pr-3">
                    {{ $queues->appends(request()->query())->links() }}
                </div>
                <div wire:loading wire:target="nextPage,gotoPage,previousPage" class="loader-page"></div>
            </div>
        </div>
    </div>
</div>
