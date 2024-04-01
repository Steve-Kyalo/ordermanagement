<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use App\Models\Order;
use Auth;
use DB;

class OrderController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function show_order(){
        $client = new Client();
        $params='{"spec":{"itemsType":"avl_unit","propName":"sys_name","propValueMask":"*","sortType":"sys_name"},"force":1,"flags":13644935,"from":0,"to":4294967295}&svc=core/search_items&sid=51c11e92210629d196b2572d94abf860';
        $apiUrl = "https://hst-api.wialon.com/wialon/ajax.html?params=$params";
        try {
            // Make a GET request to the API
            $response = $client->get($apiUrl);

            // Get the response body as an array
            $data = json_decode($response->getBody(), true);

            // Handle the retrieved data as needed (e.g., pass it to a view)
            return view('client.order', ['data' => $data]);
        } catch (\Exception $e) {
            // Handle any errors that occur during the API request
            return view('api_error', ['error' => $e->getMessage()]);
        }
        
    }
    public function show_editorder(){
        return view('client.editorder');
    }
    public function store_orders(Request $request){
        // $this->validate($request,
        // ['ordername' => 'required']);

        $ordername = $request->input('ordername');
        $ordertype = $request->input('ordertype');
        $address = $request->input('address');
        $startdate = $request->input('startdate');
        $enddate = $request->input('enddate');
        $cost = $request->input('cost');
        $weight = $request->input('weight');
        $volume = $request->input('volume');
        $servicetime = $request->input('servicetime');
        $radius = $request->input('radius');
        $priority = $request->input('priority');
        $comment = $request->input('comment');
        $firstname = $request->input('firstname');
        $lastname = $request->input('lastname');
        $phone = $request->input('phone');
        $email = $request->input('email');
        //custom fields
        $branch = $request->input('branch');
        $jobtype = $request->input('jobtype');
        $no_of_devices = $request->input('no_of_devices');
        $loan_amt = $request->input('loan_amt');
        $wiredlocation = $request->input('wiredlocation');
        $wirelesslocation = $request->input('wirelesslocation');
        $ro = $request->input('ro');
        $status = 'New';
        $created_by = Auth::user()->id;
 
        $order = Order::where('ordername', '=', $request->input('ordername'))->where('status','<>','Completed')->first();
        if ($order === null) {
            DB::insert('insert into orders(ordername,ordertype,address,startdate,enddate,cost,weight,volume,servicetime,radius,priority,comment,firstname,lastname,phone,email,status,branch,jobtype,no_of_devices,loan_amt,wiredlocation,wirelesslocation,ro,created_by) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)',[$ordername,$ordertype,$address,$startdate,$enddate,$cost,$weight,$volume,$servicetime,$radius,$priority,$comment,$firstname,$lastname,$phone,$email,$status,$branch,$jobtype,$no_of_devices,$loan_amt,$wiredlocation,$wirelesslocation,$ro,$created_by]);
            return redirect()->route('order')->with('success','Order details added successfully');
        } else {
            return redirect()->route('order')->with('error','Order processes ongoing!');
        } 

    }

    public function edit_order($id)
        {
            $orders = DB::table('orders')->where('id',$id)->first();
            return view('client.editorder',['orders'=> $orders]);
        }
    public function update_order(Request $request)
        {
            $orders = Order::find($request->input('id'));
            $orders->ordername = $request->input('ordername');
            $orders->ordertype = $request->input('ordertype');
            $orders->address = $request->input('address');
            $orders->startdate = $request->input('startdate');
            $orders->enddate = $request->input('enddate');
            $orders->cost = $request->input('cost');
            $orders->weight = $request->input('weight');
            $orders->volume = $request->input('volume');
            $orders->servicetime = $request->input('servicetime');
            $orders->radius = $request->input('radius');
            $orders->priority = $request->input('priority');
            $orders->comment = $request->input('comment');
            $orders->firstname = $request->input('firstname');
            $orders->lastname = $request->input('lastname');
            $orders->phone = $request->input('phone');
            $orders->email = $request->input('email');
            //custom fields
            $orders->branch = $request->input('branch');
            $orders->jobtype = $request->input('jobtype');
            $orders->no_of_devices = $request->input('no_of_devices');
            $orders->loan_amt = $request->input('loan_amt');
            $orders->wiredlocation = $request->input('wiredlocation');
            $orders->wirelesslocation = $request->input('wirelesslocation');
            $orders->ro = $request->input('ro');
            $orders->edited_by = Auth::user()->id;
            $orders->edited_at = date('Y-m-d H:i:s');

            $orders->save();

            return redirect()->route('dashboard')->with('success','Order details updated Successfully');   
        }

    public function destroyorder(Request $request,$id)
        {
            $orders = Order::find($id);
            $orders->status='Deleted';
            $orders->deleted_by=Auth::user()->id;
            $orders->deleted_at = date('Y-m-d H:i:s');
            $orders->save();
            return back()->with('Success','Order details deleted successfully');
        }
    
}
