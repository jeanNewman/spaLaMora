<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Slince;

class YapeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cliente = $request->cliente;
        $nro_orden = $request->nro_orden;
        $email = $request->email;
        $datos = ['cliente' => $cliente, 'nro_orden' => $nro_orden, 'email' => $email];
        return view('yape')->with('datos',$datos);
    }
    public function revisarImagen(Request $request){

        if (!$request->ajax()) return redirect('/');
        //dd($request->img);
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.ocr.space/parse/image',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array('language' => 'spa','isOverlayRequired' => 'false',
                                        'url' => $request->img,'iscreatesearchablepdf' => 'false',
                                        'issearchablepdfhidetextlayer' => 'false'),
            CURLOPT_HTTPHEADER => array(
                'apikey: f8731e45a488957'
            ),
        ));
       // dd($curl);
        $response = curl_exec($curl);

        curl_close($curl);
        return $response;

    }

    public function revisarShopify(Request $request){
        //include __DIR__ . '/../vendor/autoload.php';

           if (!$request->ajax()) return redirect('/');

           $shopName = 'la-mora-pasteleria.myshopify.com';
           
           $credential = new Slince\Shopify\PrivateAppCredential(
               '300236ec59e0e78d39227ffc82a349c1', 
               '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', 
               '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'
            );
         // dd($credential);
   
           $client = new Slince\Shopify\Client($credential,$shopName, [
               'metaCacheDir' => './tmp', // Metadata cache dir, required
               'apiVersion' => '2020-01' // API version
           ]);
          
          // $product2 = $client->get("orders/".$request->id);
         /*  $products = $client->get('orders', [
            // filter your product
            'name' => "#2778",
            
        ]); */

       /*  $products = $client->getOrderManager()->findAll([
            // filter your product
            "name" => "#2633"
        ]);

           dd($products); */
           $orderGet = $client->getOrderManager()->find($request->id);
           if($orderGet){
               $newArray = [
                    "name"=> "test2",
                    "value"=> $request->img
               ];
              // dd($orderGet->getNoteAttributes());
               $oldAttr = $orderGet->getNoteAttributes();
               
               array_push($oldAttr,$newArray);
              
               //$setAttr = $orderGet->setNoteAttributes($oldAttr);
              
               $product = $client->put("orders/".$request->id, [
                'order'=> [
                    'id' => $request->id,
                    "note_attributes" => $oldAttr         
                ]
               ]);
               
           }
         
          return [$product];
   
       }

       public function subirYape(Request $request){

            //Update the given product
            $product = $client->getProductManager()->update(12800, [
                "title" => "Burton Custom Freestyle 151",
                "body_html" => "<strong>Good snowboard!<\/strong>",
                "vendor"=> "Burton",
                "product_type" => "Snowboard",
            ]);
       }
   
}
