@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6"> {{ __('Kitap Ekle') }} </div>
                            
                        
                        <div class="col-6 d-flex justify-content-end" > <a href="{{route('books.index')}}" class="btn btn-primary"> Kitaplar</a></div>                   
                        
                    </div>
                </div>
                <div class="card-body">
                    <h1>Kitap Ekle</h1>
                    <form action="{{route('books.create')}}" method="POST">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        @csrf
                        <div class="form-group">
                            <label for="">Kitabın Adı</label>
                            <input type="text" name="BookName" class="form-control" placeholder="Kitabın Adı" required>

                        </div>
                        <div class="form-group">
                            <label for="">Kitabın Fiyatı</label>
                            <input type="text" name="BookPrice" class="form-control" placeholder="Kitabın Fiyatı" required>

                        </div>
                        <button type="submit" class="btn btn-success mt-1" >Ekle</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection