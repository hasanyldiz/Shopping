@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6"> {{ __('KitabıDüzenle') }} </div>
                            
                        
                        <div class="col-6 d-flex justify-content-end" > <a href="{{route('books.store')}}" class="btn btn-primary"> Kitaplar</a></div>                   
                        
                    </div>
                   
                    
                </div>
                <div class="card-body">
                    <h1>Kitabı Düzenle</h1>
                    <form action="{{route('books.edit',$book->id)}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="">Kitabı Adı</label>
                            <input type="text" name="BookName" value="{{$book->BookName}}" class="form-control" placeholder="Kitabın Adı">

                        </div>
                        <div class="form-group">
                            <label for="">Kitabın Fiyatı</label>
                            <input type="text" name="BookPrice" value="{{$book->BookPrice}}" class="form-control" placeholder="Kitabın Fiyatı">

                        </div>
                        <button type="submit" class="btn btn-success mt-1" >Güncelle</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection