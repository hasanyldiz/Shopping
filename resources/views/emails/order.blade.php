<x-mail::message>
# Introduction

Sipariş Detayları

<x-mail::table>
| Ürün          | Ürün Adedi    | Fiyat    |
| ------------- |:-------------:| --------:|
@foreach($order->details as $detail)
|    {{$detail->product->BookName}}                |{{$detail->quantity}}                |{{$detail->perprice}}     |
@endforeach
</x-mail::table>

<x-mail::button :url="''">
Detay
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
