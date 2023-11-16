@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                   
                    <div class="row">
                        <div class="col-6"> {{ __('Kitaplar') }} </div>
                            
                        
                        <div class="col-6 d-flex justify-content-end" > <a href="{{route('books.create')}}" class="btn btn-success">Kitap Ekle</a></div>                   
                        
                    </div>
                </div>
               
                <div class="card-body">
                    <table class="table">
                        <thead>
                    
                        <tr>
                            <th scope="col" >#</th>
                            <th scope="col">Yazar</th>
                            <th scope="col" >Kitap Adı</th>
                            <th scope="col" >Fiyat</th>
                        </tr>
                        </thead>
                    <tbody>     
                        @foreach ($books as $book)
                                    
                            
                                <tr>

                                    <td scope="row">{{$book->id}}</td>
                                    <td>{{$book->user->name}}</td>
                                    <td>{{$book->BookName}}</td>
                                    <td>{{$book->BookPrice}}₺</td>
                                                               
                                    <td>
                                        @if(!$book->deleted_at)
                                        
                                            <a href="{{route('books.edit',$book->id)}}" class="btn btn-success">Düzenle</a>
                                            <a href="{{route('books.delete',$book->id)}}" class="btn btn-danger">Sil</a>
                                          
                                                                        
                                        @else
                                        
                                            <a href="{{route('books.takeback',$book->id)}}" class="btn btn-primary">Geri Al</a>
                                        
                                        @endif  
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
@endsection