<?php

namespace App\Http\Controllers\UserPanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Investment;
use App\Models\Income;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Log;
use App\Models\Boster;

use Redirect;
use Hash;
use DB;

use Carbon\Carbon;


class Invest extends Controller
{

 
    public function index()
    {
        $user=Auth::user();
        $invest_check=Investment::where('user_id',$user->id)->where('status','!=','Decline')->orderBy('id','desc')->limit(1)->first();

        $this->data['last_package'] = ($invest_check)?$invest_check->amount:0;
        $this->data['page'] = 'user.invest.Deposit';
        return $this->dashboard_layout();
    }


   
public function fundActivation1(Request $request)
{
    try {
        $validation = Validator::make($request->all(), [
            // 'amount' => 'required|numeric|min:50',
            // 'paymentMode' => 'required',
            'username' => 'required|exists:users,username',
            'transaction_password' => 'required',
        ]);

        if ($validation->fails()) {
            Log::info($validation->getMessageBag()->first());
            return redirect()->route('user.invest')
                ->withErrors($validation->getMessageBag()->first())
                ->withInput();
        }

        $user = Auth::user();
        $password = $request->transaction_password;

        date_default_timezone_set("Asia/Kolkata");   // India time (GMT+5:30)
        $plan = "1";

        $user_detail = User::where('username', $request->username)
            ->orderBy('id', 'desc')
            ->limit(1)
            ->first();

        $invest_check = Investment::where('user_id', $user_detail->id)
            ->where('status', '!=', 'Decline')
            ->orderBy('id', 'desc')
            ->limit(1)
            ->first();

        $invoice = substr(str_shuffle("0123456789"), 0, 7);
        $joining_amt = 35;

        // ✅ Condition: agar package already active hai, to dobara deposit nahi hoga
        if ($invest_check && $invest_check->status == 'Active') {
            return redirect()->route('user.invest')
                ->withErrors(['Your package is already active.']);
        }

        $balance = $user->fund_balance();
        $last_package = ($invest_check) ? $invest_check->amount : 0;

        if (Hash::check($password, $user->tpassword)) {
            if ($balance >= $joining_amt) {

                $data = [
                    'transaction_id' => md5(time() . rand()),
                    'user_id'        => $user_detail->id,
                    'user_id_fk'     => $user_detail->username,
                    'amount'         => $joining_amt, // ✅ fixed 35
                    'payment_mode'   => 'USDT',
                    'status'         => 'Active',
                    'sdate'          => Date("Y-m-d"),
                    'active_from'    => $user->username,
                    'walletType'     => 1,
                ];
                $payment = Investment::insert($data);

                if ($user_detail->active_status == "Pending") {
                    $user_update = [
                        'active_status' => 'Active',
                        'adate'         => Date("Y-m-d H:i:s"),
                        'package'       => $joining_amt,
                        'rank'          => 1,
                    ];
                    User::where('id', $user_detail->id)->update($user_update);
                } else {
                    $total = $user_detail->package + $joining_amt;
                    $user_update = [
                        'active_status' => 'Active',
                        'package'       => $total,
                    ];
                    User::where('id', $user_detail->id)->update($user_update);
                }

                
                $round = 'round1';
                $extra_round = 'extras_round1';

                $check_user = DB::table($round)->where('user_id_fk', $user_detail ? $user_detail->username : '')->first();

                if (!$check_user) {
                    $userID = $user_detail->id;
                    
                    $Report = getTreeChildId($extra_round);
                    
                    $pos = $Report['position'];
                   switch ($pos) {
                    case 1:
                        $positionText = "Left";
                        $colunmUpdate = "paid_left";
                        break;
                  
                    default:
                        $positionText = "Right";
                        $colunmUpdate = "paid_right";
                        break;
                  }

                    $sponsor = $Report['parentId'] ?? 0;
                    $userLevel = DB::table($round)->where('user_id_fk', $sponsor)->first();
                    $mxLevel = !empty($userLevel) ? $userLevel->level + 1 : 0;

                    DB::table($round)->insert([
                        'ParentId' => $sponsor,
                        'sponsor' => $sponsor,
                        'level' => $mxLevel,
                        'user_id' => $userID,
                        'user_id_fk' => $user_detail->username,
                        'position' => $positionText,
                    ]);
                    DB::table($extra_round)->insert([
                        'user_id_fk' => $user_detail->username,
                        'user_id' => $userID,
                    ]);

                    DB::table($extra_round)->where('user_id_fk', $sponsor)->update([$colunmUpdate => 1]);
                    Log::info('Sponsor Placed in Autopool', ['sponsor_id' => $sponsor]);

                }

                add_direct_income($user_detail->id, $joining_amt);

                $notify[] = ['success', 'User activation submitted successfully'];
                return redirect()->route('user.invest')->withNotify($notify);

            } else {
                return Redirect::back()->withErrors(['Insufficient balance in your account.']);
            }
        } else {
            return Redirect::back()->withErrors(['Invalid Transaction Password']);
        }

    } catch (\Exception $e) {
        Log::info('error here');
        Log::info($e->getMessage());
        return redirect()->route('user.invest')
            ->withErrors('Error: ' . $e->getMessage())
            ->withInput();
    }
}












    public function boster()
    {
    $this->data['page'] = 'user.invest.boster';
    return $this->dashboard_layout();

    }











public function bosterActivation(Request $request)
{
    try {
        $validation = Validator::make($request->all(), [
          'walletType' => 'required|in:1,2',
            // 'transaction_password' => 'required',
        ]);

        if ($validation->fails()) {
            Log::info($validation->getMessageBag()->first());
            return redirect()->route('user.boster')
                ->withErrors($validation->getMessageBag()->first())
                ->withInput();
        }

        $user = Auth::user();
        // $password = $request->transaction_password;

        date_default_timezone_set("Asia/Kolkata");   // India time (GMT+5:30)
        $plan = "1";

        // $user_detail = User::where('username', $request->username)
        //     ->orderBy('id', 'desc')
        //     ->limit(1)
        //     ->first();
        
        
        $user_detail = Auth::user();


        $invest_check = Boster::where('user_id', $user_detail->id)
            ->where('status', '!=', 'Decline')
            ->orderBy('id', 'desc')
            ->limit(1)
            ->first();

        $invoice = substr(str_shuffle("0123456789"), 0, 7);
        $joining_amt = 10;

        // ✅ Condition: agar package already active hai, to dobara deposit nahi hoga
        // if ($invest_check && $invest_check->status == 'Active') {
        //     return redirect()->route('user.invest')
        //         ->withErrors(['Your package is already active.']);
        // }



      $blance=$user->available_balance();
      
      
        $balance = $user->boster_balance();
        
        $last_package = ($invest_check) ? $invest_check->amount : 0;

$rand = rand(1000, 9999999);




    if ($request->walletType == 1) {
        // Main Wallet
        $balance = $user->available_balance();
    } elseif ($request->walletType == 2) {
        // Self Wallet (booster balance)
        $balance = $user->boster_balance();
    } else {
        return back()->withErrors(['walletType' => 'Invalid wallet type selected']);
    }

        // if (Hash::check($password, $user->tpassword)) 
        
        
        // {
            if ($balance >= $joining_amt) 
            
            {

                $data = [

                    'user_id'        => $user_detail->id,
                    'user_id_fk'     => $rand,
                    'amount'         => $joining_amt, // ✅ fixed 35
                    'payment_mode'   => 'USDT',
                    'status'         => 'Active',
                    'active_from'    => $user->username,
                    'walletType'     =>$request->walletType,
                    // 'user_id_fake'   => $rand
                    
                ];
                $payment = Boster::insert($data);

        
                  $round = 'round1';
                $extra_round = 'extras_round1';

                $check_user = DB::table($round)->where('user_id_fk', $rand)->first();

                if (!$check_user) {
                    $userID = $user_detail->id;
                    
                    $Report = getTreeChildId($extra_round);
                    
                    $pos = $Report['position'];
                   switch ($pos) {
                    case 1:
                        $positionText = "Left";
                        $colunmUpdate = "paid_left";
                        break;
                  
                    default:
                        $positionText = "Right";
                        $colunmUpdate = "paid_right";
                        break;
                  }

                    $sponsor = $Report['parentId'] ?? 0;
                    $userLevel = DB::table($round)->where('user_id_fk', $sponsor)->first();
                    $mxLevel = !empty($userLevel) ? $userLevel->level + 1 : 0;

                    DB::table($round)->insert([
                        'ParentId' => $sponsor,
                        'sponsor' => $sponsor,
                        'level' => $mxLevel,
                        'user_id' => $userID,
                        'user_id_fk' => $rand,
                        'position' => $positionText,
                        // 'user_id_fake' => $rand,
                    ]);
                    DB::table($extra_round)->insert([
                        'user_id_fk' =>$rand,
                        'user_id' => $userID,
                        //  'user_id_fake' => $rand,
                    ]);

                    DB::table($extra_round)->where('user_id_fk', $sponsor)->update([$colunmUpdate => 1]);
                    Log::info('Sponsor Placed in Autopool', ['sponsor_id' => $sponsor]);

                }

                $notify[] = ['success', 'Self activation submitted successfully'];
                return redirect()->route('user.boster')->withNotify($notify);

            } 
            else {
                return Redirect::back()->withErrors(['Boster Insufficient balance in your account.']);
            }
        // } 
        
        // else {
        //     return Redirect::back()->withErrors(['Invalid Transaction Password']);
        // }

    } catch (\Exception $e) {
        Log::info('error here');
        Log::info($e->getMessage());
        return redirect()->route('user.boster')
            ->withErrors('Error: ' . $e->getMessage())
            ->withInput();
    }
}















  public function ditributor_gap_margin($userid,$gapMarginBonus,$amt,$userPercent,$user_detail,$level=20){
        $arrin=$userid;
        $userPercent=$userPercent;
        // dd($userPercent);
        $gapMarginBonus=$gapMarginBonus;
        $ret=array();
        $i=1;
        while(!empty($arrin) && $gapMarginBonus>0){
            $alldown=User::where('id',$arrin)->get()->first();
            if($alldown){
                $arrin = $alldown->sponsor;
                $i++;
                
            
            $Sposnor_cnt = User::where('sponsor',$alldown->id)->where('active_status','Active')->count("id");  
            $percent=0;
            if($Sposnor_cnt>=4)
            {
              $percent = 20; 
              
             if($Sposnor_cnt>=6)
              {
                $percent = 30; 
              }
              if($Sposnor_cnt>=8)
              {
                $percent = 40; 
              }
              if($Sposnor_cnt>=10)
              {
                $percent = 50; 
              }  
            
             $sponsor_profit= $percent-$userPercent; 
             
           
             
             $preSponsor= $userPercent;
             if($sponsor_profit>$gapMarginBonus)
             {
                $sponsor_profit= $gapMarginBonus;
             }
           
              $gapMarginBonus=$gapMarginBonus-$sponsor_profit;
              
         
         
        //   echo "ID :".$alldown->id."<br>";
        //   echo "Per :".$percent."<br>";
        //   echo "User :".$userPercent."<br>";
        //   echo "SP :".$sponsor_profit."<br>";
              
              if($sponsor_profit>0 && $percent>$userPercent)
              {
                $sp_pp =  $amt* $sponsor_profit;
                
                  $data = [
              'user_id' => $alldown->id,
              'user_id_fk' =>$alldown->username,
              'amt' => $amt,
              'comm' => $sp_pp,
              'remarks' => 'Gap Margin Bonus',
              'level' => $i,
              'rname' => $user_detail->username,
              'fullname' => $user_detail->name,
              'ttime' => Date("Y-m-d"),
              ];
             Income::create($data);   
              }
              
              
            $userPercent= $percent;   
            }
            else
            {
             $userPercent=$userPercent;
              $gapMarginBonus=$gapMarginBonus;
            }
         
            if($i>$level || $alldown->id==1)
            {
                break;
            }
     

            }else{
                $arrin ='';
            }
        }
        
        // dd("hi");

       


        return true;

    }
    
      public  function find_9directSponsor($snode)
      {
          $q=User::where('id',$snode)->first();
          $sponsor=User::where('sponsor',$snode)->where('active_status','Active')->count();
          if ($sponsor>=10 || $q->id==1)
          {
            $this->downline = $snode; 
          }
          else
          {
            $user = $q->id;
            $this->find_9directSponsor($user);   
          }
      }



        public function invest_list(Request $request){

    $user=Auth::user();
      $limit = $request->limit ? $request->limit : paginationLimit();
        $status = $request->status ? $request->status : null;
        $search = $request->search ? $request->search : null;
        $notes = Investment::where('user_id',$user->id);
      if($search <> null && $request->reset!="Reset"){
        $notes = $notes->where(function($q) use($search){
          $q->Where('user_id_fk', 'LIKE', '%' . $search . '%')
          ->orWhere('txn_no', 'LIKE', '%' . $search . '%')
          ->orWhere('status', 'LIKE', '%' . $search . '%')
          ->orWhere('type', 'LIKE', '%' . $search . '%')
          ->orWhere('amount', 'LIKE', '%' . $search . '%');
        });

      }

        $notes = $notes->paginate($limit)->appends(['limit' => $limit ]);

      $this->data['search'] =$search;
      $this->data['deposit_list'] =$notes;
      $this->data['page'] = 'user.invest.DepositHistory';
      return $this->dashboard_layout();


        }




        public function bosterhistory(Request $request){

    $user=Auth::user();
      $limit = $request->limit ? $request->limit : paginationLimit();
        $status = $request->status ? $request->status : null;
        $search = $request->search ? $request->search : null;
        $notes = Boster::where('user_id',$user->id);
      if($search <> null && $request->reset!="Reset"){
        $notes = $notes->where(function($q) use($search){
          $q->Where('user_id_fk', 'LIKE', '%' . $search . '%')
          ->orWhere('txn_no', 'LIKE', '%' . $search . '%')
          ->orWhere('status', 'LIKE', '%' . $search . '%')
          ->orWhere('type', 'LIKE', '%' . $search . '%')
          ->orWhere('amount', 'LIKE', '%' . $search . '%');
        });

      }

        $notes = $notes->paginate($limit)->appends(['limit' => $limit ]);

      $this->data['search'] =$search;
      $this->data['deposit_list'] =$notes;
      $this->data['page'] = 'user.invest.bosterhistory';
      return $this->dashboard_layout();


        }









public function confirmDeposits(Request $request)
{
    try {
        // ✅ Validation
        $validator = Validator::make($request->all(), [
            'amount'      => 'required|numeric',
            'paymentMode' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // ✅ Input values
        $amount = $request->amount;
        $paymentMode = $request->paymentMode;

        // ✅ Bank / Wallet details
        if ($paymentMode == "INR") {  
            // Sirf INR ke liye Bank details dikhengi
            $walletAddress = null;
            $bankDetails = DB::table('general_settings')
                ->select('account_no', 'ifsc_code', 'branch_name', 'bank_name')
                ->first();
        } else {
            // Baaki sab modes ke liye Wallet address
            $walletAddress = DB::table('general_settings')->value('usdtBep20');
            $bankDetails = null;
        }

        // ✅ Return confirm page
        return view('user.invest.confirmDeposit', [
            'amount'        => $amount,
            'wallet_address'=> $walletAddress,
            'bankDetails'   => $bankDetails,
            'paymentMode'   => $paymentMode
        ]);

    } catch (Exception $e) {
        return redirect()->back()->with('error', 'Something went wrong: ' . $e->getMessage());
    }
}







  public function fundActivation(Request $request)
  {
    try {
      // âœ… Validation
      $validation = Validator::make($request->all(), [
        'amount' => 'required|numeric',
        'paymentMode' => 'required',
        'utrno' => 'required',
      ]);

      if ($validation->fails()) {
        Log::info($validation->getMessageBag()->first());
        return redirect()
          ->route('user.invest')
          ->withErrors($validation->getMessageBag()->first())
          ->withInput();
      }

      // âœ… Current logged-in user
      $user = Auth::user();
      $user_detail = User::where('username', $user->username)
        ->orderBy('id', 'desc')
        ->first();

      // âœ… Latest investment check
      $invest_check = BuyFund::where('user_id', $user_detail->id)
        ->where('status', '!=', 'Decline')
        ->orderBy('id', 'desc')
        ->first();

      $invoice = substr(str_shuffle("0123456789"), 0, 7);
      $joining_amt = $request->amount;
      $last_package = $invest_check ? $invest_check->amount : 0;

      // âœ… Handle file upload
      if ($request->hasFile('account')) {
        $image = $request->file('account');
        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->move(public_path('uploads/'), $imageName);
      } else {
        $imageName = null;
      }

      // âœ… Store in DB
      $data = [
        'utrno'         => $request->utrno,
        'user_id'       => $user_detail->id,
        'user_id_fk'    => $user_detail->username,
        'amount'        => $request->amount,
        'type'          => $request->paymentMode,
        'status'        => 'Pending',
        // 'payment_mode'  => $request->paymentMode, 
        'slip'          => $imageName,
        'sdate'         => date("Y-m-d"),
      ];

      BuyFund::insert($data);

      // âœ… Success message
      $notify[] = ['success', 'Your fund request has been submitted successfully'];
      return redirect()->route('user.invest')->withNotify($notify);
    } catch (\Exception $e) {
      Log::info('error here');
      Log::info($e->getMessage());
      return redirect()
        ->route('user.invest')
        ->withErrors($e->getMessage())
        ->withInput();
    }
  }




}
