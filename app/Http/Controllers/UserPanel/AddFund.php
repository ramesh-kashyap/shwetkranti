<?php

namespace App\Http\Controllers\UserPanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BuyFund;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Hexters\CoinPayment\CoinPayment;
use App\Models\CoinpaymentTransaction;

use App\Models\Staking;
use App\Models\WalletTransfer;
use App\Models\Income;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use Log;
use Redirect;
use Hash;
use Helper;
class AddFund extends Controller
{

// public function index(Request $request)
// {

// $user=Auth::user();
// $this->data['page'] = 'user.fund.addFund';
// return $this->dashboard_layout();

// }







 public function index()
    {
           $userInfo = auth()->user(); // or however you're getting the user info
    $refId = $userInfo->username;
    $url = 'https://api.cryptapi.io/bep20/usdt/create/';
    $queryParams = [
        'callback'      => 'https://oceanusdt.com/dynamicupicallbackkh?refid=' . $refId,
        'address'       => '0xB4fE545b5ddb5bc73A95031a0fD2aBEdBD1342F5',
        'pending'       => 0,
        'confirmations' => 1,   
        'email'         => 'string',
        'post'          => 0,
        'priority'      => 'default',
        'multi_token'   => 0,
        'multi_chain' => 0,
        'convert' => 0,
        ];
        $response = Http::get($url, $queryParams);
        $data = $response->json();
        unset($data['callback_url']); // remove callback_url
        // return response()->json([
        // 'message' => $data,
        // 'status' => true,
        // ]);
                 $this->data['data'] =$data;
        
$this->data['page'] = 'user.fund.addFund';
                return $this->dashboard_layout();
            }  





public function fundHistory(Request $request)
{

   
    $user=Auth::user();
    $limit = $request->limit ? $request->limit : paginationLimit();
    $status = $request->status ? $request->status : null;
    $search = $request->search ? $request->search : null;
    $notes = BuyFund::where('user_id',$user->id);
    if($search <> null && $request->reset!="Reset"){
    $notes = $notes->where(function($q) use($search){
        $q->Where('user_id_fk', 'LIKE', '%' . $search . '%')
        ->orWhere('txn_no', 'LIKE', '%' . $search . '%')
        ->orWhere('status', 'LIKE', '%' . $search . '%')
        ->orWhere('type', 'LIKE', '%' . $search . '%')
        ->orWhere('amount', 'LIKE', '%' . $search . '%');
    });

    }

    $notes = $notes->paginate($limit)
        ->appends([
            'limit' => $limit
        ]);

    $this->data['search'] =$search;
    $this->data['level_income'] =$notes;
    $this->data['page'] = 'user.fund.fundHistory';
    return $this->dashboard_layout();

}





public function SubmitBuyFund(Request $request)
{

  try{
        $validation =  Validator::make($request->all(), [
            'amount' => 'required|numeric|min:0',
            'transaction_hash' => 'required',
            'icon_image'=>'max:4096|mimes:jpeg,png,jpg,svg',
        ]);

        if($validation->fails()) {
            Log::info($validation->getMessageBag()->first());

            return redirect()->route('user.AddFund')->withErrors($validation->getMessageBag()->first())->withInput();
        }


        $icon_image = $request->file('icon_image');
        $imageName = time().'.'.$icon_image->extension();
        $request->icon_image->move(public_path('slip/'),$imageName);

        $user=Auth::user();

               $data = [
                    'txn_no' =>$request->transaction_hash,
                    'user_id' => $user->id,
                    'user_id_fk' => $user->username,
                    'amount' => $request->amount,
                    'slip' => 'public/slip/'.$imageName,
                    'type' => 'USDT',
                    'bdate' => Date("Y-m-d"),

                ];
               $payment =  BuyFund::create($data);


      $notify[] = ['success', 'Fund Request Submited successfully'];
      return redirect()->back()->withNotify($notify);
      }
       catch(\Exception $e){
        Log::info('error here');
        Log::info($e->getMessage());
        print_r($e->getMessage());
        die("hi");
        return  redirect()->route('user.AddFund')->withErrors('error', $e->getMessage())->withInput();
    }

}





 public function walletTransfer()
    {
          
        
       $this->data['page'] = 'user.fund.wallet-transfer';
                return $this->dashboard_layout();
            }  


    
    public function walletTransfers(Request $request)
    {
         $request->validate([
            'amount' => 'required|numeric|min:1'
        ]);

        $user = Auth::user();
        $amount = $request->input('amount');


        
        //  $boosterBalance = $user->boster_balance();

        if ($user->fund_balance() < $amount) {
            return back()->with('error', 'Insufficient Fund Wallet balance.');
        }

      $invoiceId = DB::table('wallet_transfers')->insertGetId([
            'user_id' => $user->id, // Logged-in user's ID
            // 'wallet_type' => $request->wallet_type,
            'amount' => $request->amount,
            'trx_id' => $user->TPSR, // Use logged-in user's transaction password
            // 'username' => $recipientUser->username, // Recipient's username
            'status' => 'Active',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
      

        return back()->with('success', '' . $amount . ' Transferred from Fund Wallet to Self Wallet!');
    }


}
