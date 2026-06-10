@extends('layout.app')
@section('main_content')
    <div class="col-lg-12">
        <div class="card card-h-100">
            <div class="card-body">
                <div class="mb-5 text-end">
                    <a href="{{ url('/vendor/addview') }}" class="btn btn-primary">
                        Add Vendors
                    </a>
                </div>
                {{-- {{ $dataTable->table() }} --}}
                <div class="container overflow-hidden">
                    <h2 class="mb-4">Vendors</h2>
                    {!! $dataTable->table(['class' => 'table table-bordered table-hover nowrap']) !!}
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
