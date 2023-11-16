
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                   
                    <div class="row">
                        <div class="col-6"> {{ __('Sepet') }} </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table" >
                        <thead>
                    
                        <tr >
                            <th scope="col" >#</th>                            
                            <th scope="col" >Kitap Adı</th>
                            <th scope="col" >Kitap Adedi</th>
                            <th scope="col" >Fiyat</th>
                            <th scope="col" >işlem</th>
                        </tr>
                        </thead>
                    <tbody>     
                        @foreach ($books as $book)                            
                                <tr>
                                    <td scope="row">{{$loop->index+1}}</td>
                                    <td>{{$book->name}}</td>
                                    <td>{{$book->quantity}}
                                        <a href="{{route('Shop.cartupdate',['id'=>$book->id , 'newQuantity'=>1])}}" class="btn btn-primary">+</a>
                                        <a href="{{route('Shop.cartupdate',['id'=>$book->id , 'newQuantity'=>-1])}}" class="btn btn-warning">-</a>
                                    </td>
                                    <td>{{$book->price}}₺</td>    
                                    <td >
                                        
                                        <a href="{{route('Shop.removefromcart',['id'=>$book->id])}}" class="btn btn-danger">Sepetten çıkar</a>
                                    </td>
                                </tr>
                        @endforeach
                        <tr>
                            <td>Toplam Fiyat</td>
                            <td>{{CartFacade::getSubTotal()}}₺</td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody> 
                    </table>
                    <h2>Sipariş bilgileri</h2>
                    <form action="{{route('Order.store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="">İsim</label>
                            <input type="text" name="name" id="" class="form-control" placeholder="İsim" required>

                        </div>
                        <div class="form-group">
                            <label for="">Soyİsim</label>
                            <input type="text" name="surname" id="" class="form-control" placeholder="Soyisim" required>

                        </div>
                        <div class="form-group">
                            <label for="">Adres</label>
                            <input type="text" name="adress" id="" class="form-control" placeholder="Adres" required>

                        </div>
                        <div class="form-group">
                            <label for="">Yorum</label>
                            <input type="text" name="message" id="" class="form-control" placeholder="Yorum" required>

                        </div>
                    <button type="submit" class="btn btn-primary mt-2">Sipariş Ver</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection