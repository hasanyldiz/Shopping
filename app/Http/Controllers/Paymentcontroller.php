<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Iyzipay\IyzipayResource;
use Iyzipay\Model\Address;
use Iyzipay\Model\BasketItem;
use Iyzipay\Model\BasketItemType;
use Iyzipay\Model\Buyer;
use Iyzipay\Model\CheckoutFormInitialize;
use Iyzipay\Model\Currency;
use Iyzipay\Model\Locale;
use Iyzipay\Model\PaymentGroup;
use Iyzipay\Options;
use Iyzipay\Request\CreateCheckoutFormInitializeRequest;


class Paymentcontroller extends Controller
{
    public function notification()
    {
       
        $options=new Options();
        $options->setApiKey(env('PAYTR_MERCHANT_ID'));
        $options->setSecretKey(env('PAYTR_MERCHANT_KEY'));
        $options->setBaseUrl('https://sandbox-api.iyzipay.com');

        # create request class
        $request = new \Iyzipay\Request\RetrieveCheckoutFormRequest();
        $request->setLocale(Locale::TR);
        $request->setConversationId("123456789");
        $request->setToken($_POST['token']);

        # make request
        $checkoutForm = \Iyzipay\Model\CheckoutForm::retrieve($request,$options);

        
        if ($checkoutForm->getStatus() === 'success') {
            // Ödeme başarılı mesajı veya başka bir işlem yapabilirsiniz
            
            $message = 'Ödemeniz başarıyla gerçekleşti.';
            return view('shopping.success',compact('message'));
        } else {
            // Ödeme başarısızsa
            // Hata mesajını alabilir veya başka bir işlem yapabilirsiniz
            $errorMessage = $checkoutForm->getErrorMessage();
            $message = 'Ödeme işlemi başarısız: ' . $errorMessage;
        }
        return redirect()->route('welcome');
        
      
    }  
}
