<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use PayPal\Api\Amount;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;
use Redirect;
use Session;
use URL;
use App\Order;
use App\Transaccion;

class PaymentController extends Controller
{
    private $_api_context;

    public function __construct()
    {
        /** PayPal api context **/
        $paypal_conf = \Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential(
                $paypal_conf['client_id'],
                $paypal_conf['secret'])
        );
        $this->_api_context->setConfig($paypal_conf['settings']);
    }

    public function payWithpaypal(Request $request)
    {
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

        // Creamos la orden
        $id_order = (new Order_controller)->createOrder($request->get('amount'));

        $item_1 = new Item();
        $item_1->setName('Orden ID: ' . $id_order)/** item name **/
        ->setCurrency('EUR')
            ->setQuantity(1)
            ->setPrice($request->get('amount'));
        /** unit price **/

        $item_list = new ItemList();
        $item_list->setItems(array($item_1));

        $amount = new Amount();
        $amount->setCurrency('EUR')
            ->setTotal($request->get('amount'));

        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($item_list)
            ->setDescription('Order #' . $id_order);

        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl(url('/status'))/** Specify return URL **/
        ->setCancelUrl(url('/status'));

        $payment = new Payment();
        $payment->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions(array($transaction));
        /** dd($payment->create($this->_api_context));exit; **/

        try {
            $payment->create($this->_api_context);
        } catch (\PayPal\Exception\PPConnectionException $ex) {
            if (\Config::get('app.debug')) {
                \Session::put('error', 'Connection timeout');
                return Redirect::route('paywithpaypal');
            } else {
                \Session::put('error', 'Some error occur, sorry for inconvenient');
                return Redirect::route('paywithpaypal');
            }
        }

        foreach ($payment->getLinks() as $link) {
            if ($link->getRel() == 'approval_url') {
                $redirect_url = $link->getHref();
                break;
            }
        }

        /** add payment ID to session **/
        Session::put('paypal_payment_id', $payment->getId());
        if (isset($redirect_url)) {
            /** redirect to paypal **/
            return Redirect::away($redirect_url);
        }
        \Session::put('error', 'Unknown error occurred');
        return Redirect::route('paywithpaypal');
    }

    public function getPaymentStatus(Request $request)
    {

        /** Get the payment ID before session clear **/
        $payment_id = Session::get('paypal_payment_id');

        /** clear the session payment ID **/
        Session::forget('paypal_payment_id');
        if (empty($request->get('PayerID')) || empty($request->get('token'))) {
            \Session::put('error', 'Payment failed');
            return Redirect::route('/');
        }

        $payment = Payment::get($payment_id, $this->_api_context);
        $execution = new PaymentExecution();
        $execution->setPayerId($request->get('PayerID'));

        /**Execute the payment **/
        $result = $payment->execute($execution, $this->_api_context);
        if ($result->getState() == 'approved') {
            \Session::put('success', 'Payment success');

            // Obtenemos el ID de la orden
            $transactions = $payment->getTransactions();
            $description = $transactions[0]->getDescription();
            $id_order = intval(preg_replace('/[^0-9]+/', '', $description), 10);

            // Cambiamos el estado de la orden
            $order = Order::where('id', $id_order)->first();
            $order->state = "Paid";
            $order->save();

            // Obtenemos todos los datos para la transacción
            $amount = $transactions[0]->getAmount();
            $total = $amount->getTotal();
            $currency = $amount->getCurrency();
            $user = Auth::user();
            $user_email = $user->email;

            // Creamos la transacción
            $trans = new Transaccion;
            $trans->id_order = $id_order;
            $trans->amount = $total;
            $trans->currency = $currency;
            $trans->payer_email = $user_email;
            $trans->save();

            // Decrementamos el stock
            //(new Products_controller())->decreaseStock();
            $this->decreaseStock();

            // Eliminamos la variable de carrito
            session()->forget('cart');

            return redirect()->to('/catalog');
        }
        \Session::put('error', 'Payment failed');

        // Obtenemos el ID de la orden
        $transactions = $payment->getTransactions();
        $description = $transactions[0]->getDescription();
        $id_order = intval(preg_replace('/[^0-9]+/', '', $description), 10);

        Order::where('id', $id_order)->delete();

        return redirect()->to('/userProducts');
    }


    protected function decreaseStock()
    {
        if (session()->exists('cart')) {

            $cartProducts = session()->get('cart');
            foreach ($cartProducts as $item) {

                $products = Product::where('id', $item['id'])->get();

                foreach ($products as $product) {
                    $stock = $product->stock;
                    $finalquantity = $stock - $item['quantity'];
                    $product->stock = $finalquantity;
                    $product->save();
                }
            }
        }
    }
}
