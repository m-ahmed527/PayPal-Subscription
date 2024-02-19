<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PayPalController extends Controller
{
    // private $provider;
    // public function __construct()
    // {
    //     $this->provider = new PayPalClient;
    //     $this->provider->setApiCredentials(config('paypal'));
    //     $this->provider->setCurrency('USD');
    // }
    public function subscribe(Request $request)
    {
        // dd($request);
        session()->put('form_data', $request->all());
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->setCurrency('USD');
        $paypalToken = $provider->getAccessToken();
        $response = $provider->addProduct($request->product, 'Demo Product', 'SERVICE', 'SOFTWARE')
            // ->addPlanTrialPricing('DAY')
            ->addDailyPlan($request->plan, $request->description, $request->prod_price)
            ->setReturnAndCancelUrl(route('successTransaction'), route('cancelTransaction'))
            ->setupSubscription(auth()->user()->name, auth()->user()->email,'2024-02-22');
            $user= User::find(auth()->user()->id);
            $user->plan_id = $response['id'];
            $user->save();


           return redirect($response['links'][0]['href']);
    }


    public function successTransaction(Request $request)
    {
        // dd($request->all());
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request['token']);
        // $response = $provider->listSubscriptionTransactions('I-BW452GLLEP1G', '2018-01-21T07:50:20.940Z', '2018-08-22T07:50:20.940Z');
        // dd($response);
        $formData= session('form_data');
        $order= new Order();
        $order->user_id =Auth::id();
        $order->product_id=$formData['prod_id'];
        $order->plan_id=auth()->user()->plan_id;
        $order->save();
        return "You Have Subcribed Successfully...!";
    }

    public function cancelTransaction(Request $request)
    {
        dd(123);
    }
}
