@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                   
                    <div class="row">
                        <div class="col-6"> 
                            {{ __('Sanal POS Ödeme sayfası') }} 
                          
                        
                        </div>
                    </div>
                </div>
            <div class="card-body">
                <div id="iyzipay-checkout-form" class="popup">
                    
                    {!! $paymentinput !!}

                </div>
            </div>
        </div>
    </div>
</div>
</div>

@endsection