@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6">{{ __('Ödemeniz Başarıyla Gerçekleşti') }}</div>
                    </div>
                </div>
                <div class="card-body">
                    <p>Siparişiniz başarıyla onaylandı. Teşekkür ederiz!</p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection