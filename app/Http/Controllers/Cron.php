<?php

namespace App\Http\Controllers;
use Illuminate\Console\Command;

use Illuminate\Http\Request;
use App\Models\Investment;
use App\Models\Income;
use App\Models\User;
use App\Models\BuyFund;
use App\Models\Reward;
use App\Models\Withdraw;
use Illuminate\Support\Facades\URL;
use App\Models\Trade;
use Illuminate\Support\Facades\Http;
use DateTime;
use DateInterval;
use DatePeriod;
use Carbon\Carbon;
use Helper;
use DB;
use Plisio\PlisioSdkLaravel\Payment;
use Illuminate\Support\Facades\Log;


class Cron extends Controller
{
    
    public function __construct()
{
date_default_timezone_set("Asia/Kolkata");   //India time (GMT+5:30)
}
public function tradeAmt()
{
  User::where('id','>=',0)->update(['tradeAmt' => 0]);
}


protected $signature = 'roi:generate';
protected $description = 'Generate ROI income for eligible users';

public function generate_roi()
{
    $today = Carbon::today();
    $investments = Investment::where('cycle', '<=', 21)
                             ->where('status', 'Active')
                             ->get();

    foreach ($investments as $investment) {
        $startDate = Carbon::parse($investment->sdate);
        $nextCycleDays = 0 + ($investment->cycle); 
        $nextCycleDate =Carbon::parse($investment->next_date);
        $newDate = date("Y-m-d", strtotime($investment->next_date));
        // dd($today->greaterThanOrEqualTo($newDate));
         $checkAlready = Income::where('user_id', $investment->user_id)->where('remarks','Roi Income')->where('invest_id',$investment->id)->where('credit_type',1)->first();
        if ($today->greaterThanOrEqualTo($newDate) && !$checkAlready) {
            DB::beginTransaction();
            try {
                $roiAmount = $investment->amount * 0.08; 

             Income::create([
                    'user_id' => $investment->user_id,
                    'user_id_fk' => $investment->user_id_fk,
                    'comm' => $roiAmount,
                    'amt' => $investment->amount,
                    'invest_id' => $investment->id,
                    'credit_type'=>1,
                    'level'=>1,
                    'remarks' => 'Roi Income',
                    'ttime' => now(),
                ]);
                $this->level_roi_income($investment->user_id, $roiAmount);

                DB::commit();
            } catch (\Exception $e) {
                DB::rollBack();
                \Log::error('ROI generation failed: '.$e->getMessage());
            }
        }
    }
}




 public function my_level_team_countBusiness($userid){
        $arrin=array($userid);
        $ret=array();

        $i=1;
        while(!empty($arrin)){
            $alldown=User::select('id')->whereIn('sponsor',$arrin)->get()->toArray();    
            $alldown2=User::select('id')->whereIn('sponsor',$arrin)->where('active_status','Active')->get()->toArray(); 
            if(!empty($alldown)){
                $arrin = array_column($alldown,'id');
                $arrin2 = array_column($alldown2,'id');
                   
                $total=Investment::whereIn('user_id',$arrin2)->where('status','Active')->where('active_from','!=','Deposit Bonus')->sum('amount');
                 $this->final_business += $total;
                $ret[$i]=$arrin;
                $i++;
              
            }else{
                $arrin = array();
            } 
        }   
       
        
    }





 public function globaly_community()
    {  

    $allResult=User::where('active_status','Active')->get();
// print_r($allResult);die;
    if ($allResult) 
    {
     foreach ($allResult as $key => $value) 
     {
      
      $user_id=$value->id;
      $username=$value->username;
      
      
      
      
         $direct_list=User::where('sponsor',$user_id)->where('active_status','Active')->get(); 
    
	            $vicker_leg=0;
	        $power_leg=0;
	           $arrayabc = array();
	           if($direct_list!="")
	           {
	               foreach($direct_list as $key=>$value)
	               {
	                   $id_value=$value->id;
	                   $user_id_value=$value->username;
	                
	               //   $this->a=0;
	               $this->final_business=0;  
	                 $this->my_level_team_countBusiness($id_value);
	             
	                   $total=Investment::where('user_id',$id_value)->where('status','Active')->orderBy('id', 'DESC')->sum('amount');
	                  $this->final_business +=$total;
	                 $abc = $this->final_business;  
	               //  echo $abc; die;
	                 $arrayabc[$user_id_value] = $abc;
	                    
	                 //print_r($total_business)."<br>".$user_id_value;echo "<br>";
	               }
	             
	              if(!empty($arrayabc))
	              {
	               
	               
	                  
              
	               
	               $maxValue = max(@$arrayabc);
                  $maxIndex = array_search(max($arrayabc), $arrayabc);
                  $vicker_leg=array_sum($arrayabc); 
                  
                  
	               
                  arsort($arrayabc);
               
	               
                   $secondValue = array_splice($arrayabc, 0, 2);
           
                   $secondValue=array_sum($secondValue)-$maxValue;

	                 
	       	        $power_leg=$maxValue;
	       	        
	               
	               
	       $vicker_leg=$vicker_leg-($power_leg+$secondValue);
	       
	              }else
	              {
	                    $vicker_leg=0;
	        $power_leg=0;
	              }
	              
	             
	       //echo $username."<br>";
	       // echo "<pre>";print_r($power_leg)."<br>";
	       // echo "<pre>";print_r($vicker_leg);die;
	  
	    }
	    else
	    {
	        $vicker_leg=0;
	        $power_leg=0;
	    }
	    
             
               echo "<br>";
                 echo "ID : ".$username."<br>";
                 echo "Team A : ".$power_leg."<br>";
                 echo "Team B : ".$secondValue."<br>";
          echo "Other Team : ".$vicker_leg;
             
        User::where('id', $user_id)
      ->update([
          'teamA' => $power_leg,
          'teamB' => $secondValue,
          'other_team' => $vicker_leg
        ]); 
     
     }
    } 

}





public function level_roi_income($user_id, $roi_bonus)
{
    $user = User::find($user_id);

    if (!$user) {
        return false;
    }

    $sponsor_id = $user->sponsor;
    $level = 1;

    while ($sponsor_id && $level <= 11) {
        $sponsor = User::find($sponsor_id);

        if (!$sponsor) {
            break;
        }

        $directs = User::where('sponsor', $sponsor->id)
                       ->where('active_status', 'Active')
                       ->count();

        if ($directs >= $level) {
            if ($level <= 3) {
                $percentage = 5;
            } elseif ($level <= 7) {
                $percentage = 3;
            } else {
                $percentage = 2;
            }

            $commission = ($roi_bonus * $percentage) / 100;

            Income::create([
                'user_id' => $sponsor->id,
                'user_id_fk' => $sponsor->username,
                'amt' => $roi_bonus,
                'comm' => $commission,
                'remarks' => 'Level Income',
                'level' => $level,
                'rname' => $user->username,
                'fullname' => $user->name,
                'ttime' => date("Y-m-d"),
            ]);
        }

        $sponsor_id = $sponsor->sponsor;
        $level++;
    }

    return true;
}





public function dynamicupicallbacks(Request $request)
{
    try {
        $queryData = $request->query();
        Log::info('Incoming callback data: ' . json_encode($queryData));

        // Save raw JSON
        // Activitie::create(['data' => json_encode($queryData)]);

        $validAddresses = [
            "0xB4fE545b5ddb5bc73A95031a0fD2aBEdBD1342F5",
            "0xB4fE545b5ddb5bc73A95031a0fD2aBEdBD1342F5"
        ];

        if (
            in_array($queryData['address_out'], $validAddresses) &&
            $queryData['result'] === "sent" &&
            in_array($queryData['coin'], ['bep20_usdt', 'trc20_usdt'])
        ) {
            $txnId = $queryData['txid_in'];
            $userName = $queryData['refid'];

            $exists = BuyFund::where('txn_no', $txnId)->exists();

            if (!$exists) {
                Log::info("Processing new transaction: {$txnId} for user: {$userName}");

                $amount = number_format((float) $queryData['value_coin'], 2, '.', '');
                $blockchain = $queryData['coin'] === 'bep20_usdt' ? 'USDT_BSC' : 'USDT_TRON';

                $user = User::where('username', $userName)->first();
                if (!$user) {
                    return response()->json([
                        'message' => 'User not found',
                        'status' => false,
                    ]);
                }

                $now = Carbon::now();
                $invoice = rand(1000000, 9999999);
                
                // Insert investment
                BuyFund::insert([
                    'txn_no' => $txnId,
                    'user_id' => $user->id,
                    'user_id_fk' => $user->username,
                    'amount' => $amount,
                    'type' => $blockchain,
                    'status' => 'Approved',
                    'bdate' => $now,
                    'created_at' => $now,
                ]);
              

              

            }
        }

        return response()->json([
            'message' => 'Callback processed',
            'status' => true,
        ]);
    } catch (\Exception $e) {
        Log::error('UPI Callback Error: ' . $e->getMessage());
        return response()->json([
            'message' => 'Failed',
            'status' => false,
        ]);
    }
}




public function releasefund()
{

$allResult=Investment::where('status','Pending')->get();
$todays=Date("Y-m-d");
  User::where('id',1)->update(['name' => 'etriton']);
if ($allResult)
{
 foreach ($allResult as $key => $value)
 {

  $userID=$value->user_id;
   $joining_amt = $value->amount;

  $user_detail=User::where('id',$userID)->first();
  $today=date("Y-m-d");
   $previous_date =date('Y-m-d',(strtotime ( '-1 day' , strtotime ( $today) ) ));

  if ($user_detail)
  {
    
  
    $result=Helper::Gettxninfo($value->transaction_id);
    
    // dd($result);
    if($result['error']=="ok")
    {
    
      if($result['result']['status']>=1)
      {
        $invoice = substr(str_shuffle("0123456789"), 0, 7);

        $income = Investment::where('transaction_id',$value->transaction_id)->update(['status' => 'Active']);
          if ($user_detail->active_status=="Pending")
          {   
          $user_update=array('active_status'=>'Active','adate'=>Date("Y-m-d H:i:s"),'package'=>$value->amount);
          User::where('id',$user_detail->id)->update($user_update);
        \DB::table('general_settings')->where('id',1)->update(['people_online'=>generalDetail()->people_online+1]);
        \DB::table('general_settings')->where('id',1)->update(['our_investors'=>generalDetail()->our_investors+1]);
         }
         else
         {
           $total=$user_detail->package+$value->amount;
            $user_update=array('package'=>$total,'active_status'=>'Active');
          User::where('id',$user_detail->id)->update($user_update); 
         }
                  $amount=  $value->amount;
                  
          \DB::table('general_settings')->where('id',1)->update(['total_fund_invested'=>generalDetail()->total_fund_invested+$amount]);
                //   $plan ='BEGINNER';
                if ($amount>=50 && $amount<=200) 
                   {
                    $plan ='BEGINNER';
                   }
                   elseif($amount>=400 && $amount<=800)
                   {
                    $plan ='STANDARD';
                   }
                   elseif($amount>=1000 && $amount<=2000)
                   {
                    $plan ='EXCLUSIVE';
                   }
                   elseif($amount>=2500 && $amount<=5000)
                   {
                    $plan ='ULTIMATE';
                   }
            
                   elseif($amount>=5000 && $amount<=10000)
                   {
                    $plan ='PREMIUM';
                   }
            
                   elseif($amount>=5000)
                   {
                    $plan ='PREMIUM';
                   }
                   
                  sendEmail($user_detail->email, 'Account Activated -'.siteName(), [
                    'name' => $user_detail->name,
                    'username' => $user_detail->username,
                    'amount' => $value->amount,
                    'plan' => $plan,
                    'date' => date("D, d M Y h:i:s a", strtotime(Date("Y-m-d H:i:s"))),
                    'viewpage' => 'activation',
    
                 ]);
                     
            add_direct_income($user_detail->id,$value->amount);


      }

    }


  }

 }
}




}




// public function generate_roi()
// {

// $allResult=Investment::where('status','Active')->where('roiCandition',0)->get();
// $todays=Date("Y-m-d");
// $day=Date("l");

// if ($allResult)
// {

//  foreach ($allResult as $key => $value)
//  {

//   $userID=$value->user_id;
//    $joining_amt = $value->amount;
//    $plan = $value->plan;
//    $startDate = $value->sdate;

//   $userDetails=User::where('id',$userID)->where('active_status','Active')->first();
//   $today=date("Y-m-d");
//    $previous_date =date('Y-m-d',(strtotime ( '-1 day' , strtotime ( $today) ) ));

//   if ($userDetails)
//   {
     
     
//         $total_get=$joining_amt*200/100;
//         $total_profit_b = Income::where('user_id', $userID)->sum('comm');
//         $total_profit=($total_profit_b)?$total_profit_b:0;
   
//           $percent= 2.5;
        
//           if ($joining_amt>=50 && $joining_amt<=800) 
//            {
//             $percent= 2.5;
//            }
//            elseif($joining_amt>=1000 && $joining_amt<=5000)
//            {
//             $percent= 3;
//            }
         
           
       
//        $roi = ($joining_amt*$percent/100);

//        $max_income=$total_get;
//        $n_m_t = $max_income - $total_profit;
//        // dd($total_received);
//          if($roi >= $n_m_t)
//          {
//              $roi = $n_m_t;
//          }  
       
//       if ($roi>0)
//       {

//         echo "ID:".$userDetails->username." Package:".$joining_amt." Roi:".$roi."<br>";
//          $data['remarks'] = 'Trading Income';
//         $data['comm'] = $roi;
//         $data['amt'] = $joining_amt;
//         $data['invest_id']=$value->id;
//         $data['level']=0;
//         $data['ttime'] = date("Y-m-d");
//         $data['user_id_fk'] = $userDetails->username;
//         $data['user_id']=$userDetails->id;
//        $income = Income::firstOrCreate(['remarks' => 'Trading Income','ttime'=>date("Y-m-d"),'user_id'=>$userID,'invest_id'=>$value->id],$data);
//        add_leadership_bonus($userDetails->id,$roi);
//       }
//       else
//       {
//       Investment::where('id',$value->id)->update(['roiCandition' => 1]);
//       }
      

//   }

//  }
 
// }




// }



public function processExtraRound1()
{
    $round = 'round1';
    $extra_round = 'extras_round1';

    // get all qualified users
    $qualifiedUsers = DB::table($extra_round)
        ->where('paid_left', 1)
        ->where('paid_right', 1)
        ->where('is_paid', 0)
        ->get();

    foreach ($qualifiedUsers as $row) {
        $user_detail = User::find($row->user_id); // assuming user_id = users.id

        if (!$user_detail) continue;

        // 1) Add Self Income
        Income::create([
            'user_id'    => $user_detail->id,
            'comm'       => 10, // <-- set your self income amount
            'amt'        => 10,
            'self_wallet'  => 10,
            'level'      => 0,
            'rname'      => $row->user_id_fk,
            'ttime'      => date('Y-m-d'),
            'remarks'    => 'Self Income',
            'user_id_fk' => $user_detail->username,
        ]);

    //   $rand = rand(1000, 9999999);
    //     // 2) Re-entry process
    //     $check_user = DB::table($round)->where('user_id_fk', $rand)->first();

    //     if (!$check_user) {
    //         $userID = $user_detail->id;
    //         $Report = getTreeChildId($extra_round);

    //         $pos = $Report['position'];
    //         switch ($pos) {
    //             case 1:
    //                 $positionText = "Left";
    //                 $colunmUpdate = "paid_left";
    //                 break;
    //             default:
    //                 $positionText = "Right";
    //                 $colunmUpdate = "paid_right";
    //                 break;
    //         }

    //         $sponsor = $Report['parentId'] ?? 0;
    //         $userLevel = DB::table($round)->where('user_id_fk', $sponsor)->first();
    //         $mxLevel = !empty($userLevel) ? $userLevel->level + 1 : 0;

    //         DB::table($round)->insert([
    //             'ParentId'   => $sponsor,
    //             'sponsor'    => $sponsor,
    //             'level'      => $mxLevel,
    //             'user_id'    => $userID,
    //             'user_id_fk' => $rand,
    //             'position'   => $positionText,
    //         ]);

    //         DB::table($extra_round)->insert([
    //             'user_id_fk' =>$rand,
    //             'user_id'    => $userID,
    //         ]);

    //         DB::table($extra_round)->where('user_id_fk', $sponsor)->update([$colunmUpdate => 1]);

    //         Log::info('Sponsor Placed in Autopool', ['sponsor_id' => $sponsor]);
    //     }

        // 3) Update is_paid = 1
        DB::table($extra_round)->where('id', $row->id)->update(['is_paid' => 1]);
    }
}


public function distributeIncome()
{
    $users=User::where('active_status','Active')->get();

    foreach ($users as $user) {
        // ---- Direct referral count ----
        $directs = User::where('sponsor', $user->id)
            ->where('active_status', 'Active')
            ->count();

        // Direct VIP incomes (VIP1–VIP3)
        $directIncomes = [
            1 => 4,
            2 => 11,
            3 => 14,
        ];

        // Pay VIP1–VIP3 if qualified
        if ($directs >= 1) {
            $this->payIncome($user, 1, $directIncomes[1]);
        }
        if ($directs >= 2) {
            $this->payIncome($user, 2, $directIncomes[2]);
        }
        if ($directs >= 3) {
            $this->payIncome($user, 3, $directIncomes[3]);
        }

        // ---- Team business ----
        $teamA     = (float) $user->teamA;
        $teamB     = (float) $user->teamB;
        $otherTeam = (float) $user->other_team;

        // VIP business milestones (cumulative)
        $vipTargets = [
            4  => ['target' =>  500,    'income' =>   66],
            5  => ['target' => 2000,    'income' =>  280],  // 500+1500
            6  => ['target' => 6000,    'income' =>  500],  // +4000
            7  => ['target' => 16000,   'income' => 1096],  // +10000
            8  => ['target' => 38000,   'income' => 2800],  // +22000
            9  => ['target' => 83000,   'income' => 6050],  // +45000
            10 => ['target' => 183000,  'income' => 11000],
            11 => ['target' => 343000,  'income' => 19000],
            12 => ['target' => 593000,  'income' => 30000],
            13 => ['target' => 1093000, 'income' => 50000],
            14 => ['target' => 2093000, 'income' => 80000],
            15 => ['target' => 3693000, 'income' => 160000],
        ];

        // Check each VIP milestone
        foreach ($vipTargets as $vip => $row) {
            $needA = 0.40 * $row['target'];
            $needB = 0.30 * $row['target'];
            $needO = 0.30 * $row['target'];
            
            // dd($teamA ." ". $needA ." ". $teamB ." ". $needB ." ". $otherTeam ." ". $needO);

            if ($teamA >= $needA && $teamB >= $needB && $otherTeam >= $needO) {
                $this->payIncome($user, $vip, $row['income']);
            }
        }
    }
}

// Simple helper to insert income once
protected function payIncome($user, $vip, $amount)
{
    $mine =  Income::firstOrCreate(
        [
            'user_id' => $user->id,
            'remarks' => 'Ocean Vip Income',
            'level' =>$vip,
        ],
        [
            'comm'       => $amount*50/100,
            'self_wallet'       => $amount*50/100,
            'amt'        => $amount,
            'level'      => $vip,
            'remarks'      => 'Ocean Vip Income',
            'ttime'      => date('Y-m-d'),
            'user_id_fk' => $user->username,
        ]
    );
    
    
    
    
       // Only trigger upline payment if this VIP income was just created (avoid duplicates)
    if (! $mine->wasRecentlyCreated) {
        return;
    }
    
    
     // 3) TEAM BONANZA (user) — from the new image
    static $bonanza = [
        // VIP 1-4: none
        5=>50, 6=>100, 7=>300, 8=>800, 9=>2000,
        10=>8000, 11=>15000, 12=>25000, 13=>35000, 14=>60000, 15=>90000,
    ];
    if (isset($bonanza[$vip])) {
        Income::firstOrCreate(
            [
                'user_id' => $user->id,
                'level' => $vip,
                'remarks' => 'Team Bonanza',
            ],
            [
                'comm'       => $bonanza[$vip]*50/100,
                'self_wallet'       => $bonanza[$vip]*50/100,
                'amt'        => $bonanza[$vip],
                'level'      => $vip,
                'remarks'      => 'Team Bonanza',
                'ttime'      => date('Y-m-d'),
                'user_id_fk' => $user->username,
                'user_id' => $user->id,
            ]
        );
    }
    
    
    

    // 2) pay the DIRECT SPONSOR (Direct Sponsor Level Income)
    // Map from your table (VIP 1 -> 1$, VIP 2 -> 4$, ... VIP 15 -> 40000$)
    static $sponsorBonus = [
        1  => 1,
        2  => 4,
        3  => 6,
        4  => 15,
        5  => 100,
        6  => 250,
        7  => 450,
        8  => 900,
        9  => 1400,
        10 => 2500,
        11 => 4000,
        12 => 9000,
        13 => 15000,
        14 => 25000,
        15 => 40000,
    ];

    if (!isset($sponsorBonus[$vip])) return;

    // assuming $user->sponsor stores the sponsor's USER ID
    $sponsorId = $user->sponsor;
    if (!$sponsorId) return;

    $sponsor = User::find($sponsorId);
    if (!$sponsor) return;
    
    $spDirect = User::where('sponsor',$sponsor->id)->where('active_status','Active')->count();

  if($spDirect>=$vip)
  {
       Income::firstOrCreate(
        [
            'user_id' => $sponsor->id,
            'level' => $vip,
            'rname' => $user->username,
            'remarks' => 'Direct Sponsor Level Income',
        ],
        [
            'self_wallet'       => $sponsorBonus[$vip]*50/100,
            'comm'       => $sponsorBonus[$vip]*50/100,
            'amt'        => $sponsorBonus[$vip],
            'level'      => $vip,
            'remarks'      => 'Direct Sponsor Level Income',
            'ttime'      => date('Y-m-d'),
            'rname' => $user->username, // who triggered it
            'fullname' => $user->name, // who triggered it
            'user_id_fk' => $sponsor->username, // who triggered it
            'user_id' => $sponsor->id, // who triggered it
        ]
    );   
  }
  
  
   // 3) TEAM BONANZA (user) — from the new image
    static $bonanza = [
        // VIP 1-4: none
        5=>50, 6=>100, 7=>300, 8=>800, 9=>2000,
        10=>8000, 11=>15000, 12=>25000, 13=>35000, 14=>60000, 15=>90000,
    ];
    if (isset($bonanza[$vip])) {
        Income::firstOrCreate(
            [
                'user_id' => $user->id,
                'remarks' => 'Team Bonanza - VIP '.$vip,
            ],
            [
                'comm'       => $bonanza[$vip],
                'amt'        => $bonanza[$vip],
                'level'      => $vip,
                'ttime'      => date('Y-m-d'),
                'user_id_fk' => $user->username,
            ]
        );
    }

    
}


  public function managePayout()

    {  

date_default_timezone_set("Asia/Kolkata"); 
//   User::where('id',20)->update(['name' =>'Rameshk']);
    $allResult=User::where('active_status','Active')->orderBy('id','ASC')->cursor();

    if ($allResult) 
    {
       $counter=1;
     foreach ($allResult as $key => $value) 
     {
      
     $userID=$value->id;
     $userName=$value->username;
     $adate_date =$value->adate;
     $balance=$value->balance;


  
     $income =Income::where('user_id',$userID)->sum('comm');
     $withdraw = Withdraw::where('user_id',$userID)->sum('amount');
     
       $balance = round($income-$withdraw,2);
  
    if($balance>0)
    {
    //   echo 'ID: '. $userName." Balance : ".$balance."<br>";   
        

        
        
    // $amountTotal= 5;
    // $transaction['item'] = 'Add wallet'; // invoice number
    // $transaction['amount'] =$amountTotal;
    // $transaction['currency1'] = 'USD';
    // $transaction['currency2'] = 'BNB.BSC';
    // $transaction['buyer_email'] = $value->email;
    // $transaction['success_url'] = URL::to('/user/invest');
    // $resultAarray = Helper::CreateTransaction($transaction);
       
    //   dd($resultAarray);
                   
    }
    
   
     $counter++;   
     }
    } 
    
    
    

}




public function reward_bonus()
{
    $allUsers = User::where('active_status', 'Active')->get();

           $require_power_business = [
            1 => 1000,
            2 => 1000 + 5000,            // 6000
            3 => 6000 + 15000,           // 21000
            4 => 21000 + 40000,          // 61000
            5 => 61000 + 100000,         // 161000
            6 => 161000 + 500000,        // 661000
            7 => 661000 + 1500000,       // 2161000
            8 => 2161000 + 4000000,      // 6161000
            9 => 6161000 + 10000000,     // 16161000
            10 => 16161000 + 25000000,   // 41161000
            11 => 41161000 + 60000000,   // 101161000
            12 => 101161000 + 100000000  // 201161000
        ];
        
        
          $require_bonus = [
            1 => 50,
            2 => 200,
            3 => 500,
            4 => 1000,
            5 => 2000,
            6 => 5000,
            7 => 10000,
            8 => 20000,
            9 => 40000,
            10 => 60000,
            11 => 75000,
            12 => 100000
        ];

    foreach ($allUsers as $user) {
        $user_id = $user->id;
        $username = $user->username;
        $power_leg = $user->power_leg;
        $vicker_leg = $user->vicker_leg;

        for ($p = 1; $p < 12; $p++) {
            $required_business = $require_power_business[$p];
            $bonus = $require_bonus[$p];

            $has_already_reward = Reward::where('status', 'Approved')
                ->where('user_id', $user_id)
                ->where('level', $p)
                ->exists();

            if (!$has_already_reward && $power_leg >= $required_business && $vicker_leg >= $required_business) {
                // Update user rank
                // User::where('id', $user_id)->update(['rank' => $p]);

                // Insert into rewards table
                $rewardData = [
                    'remarks' => 'Matching Income',
                    'amount' => $bonus,
                    'total_business' => $required_business,
                    'level' => $p,
                    'tdate' => date("Y-m-d"),
                    'user_id_fk' => $username,
                    'user_id' => $user_id,
                    'status' => 'Approved',
                ];

                Reward::firstOrCreate(
                    [
                        'remarks' => 'Matching Income',
                        'level' => $p,
                        'user_id' => $user_id
                    ],
                    $rewardData
                );

                // Insert into income table
                Income::firstOrCreate(
                    [
                        'remarks' => 'Matching Income',
                        'level' => $p,
                        'user_id' => $user_id
                    ],
                    [
                        'comm' => $bonus,
                        'amt' => $bonus,
                        'level' => $p,
                        'ttime' => date("Y-m-d"),
                        'user_id_fk' => $username,
                        'user_id' => $user_id
                    ]
                );

                echo "✅ Bonus Achieved — ID: <strong>$username</strong> | Level: <strong>$p</strong><br>";
            }
        }
    }
}



public function dailyIncentive()
{


    $allResult=User::where('active_status','Active')->get();
    $todays=Date("Y-m-d");


    if ($allResult)
    {
        foreach ($allResult as $key => $value)
        {
        $userID=$value->id;
        $userName = $value->username;
        $userRank = $value->rank;
        
        $rewardDetail = Reward::where('user_id',$userID)->orderBy('id','DESC')->limit(1)->first();
        
        if($rewardDetail)
        {
           
            $data['remarks'] = 'Royalty Bonus';
            $data['comm'] = $rewardDetail->amount;
            $data['level'] = $rewardDetail->level;
            $data['amt'] = $rewardDetail->amount;
            $data['invest_id']=$rewardDetail->id;
            $data['ttime'] = date("Y-m-d");
            $data['user_id_fk'] = $userName;
            $data['user_id']=$userID; 
          $income = Income::firstOrCreate(['remarks' => 'Royalty Bonus','ttime'=>date("Y-m-d"),'user_id'=>$userID],$data);
           
        }
        
        
   


        }
    }
}




// public function dynamicupicallback()
// {
    
 
  
// //   echo "Hello";
// //   print_r($response);die();
//          $response = file_get_contents('php://input');
//           date_default_timezone_set('Asia/Kolkata');
//           $day=date('l');
//           $todays=date("Y-m-d");
//          $result = json_decode($response, true);
           
//          \DB::table('activities')->insert(['data' =>$response]);  
//          if(!empty($result))
//          {
             
//              if($result['status']=="completed")
//              {
                 
//               $orderId= $result['order_number'];
//               $username= $result['order_name'];
//               $amount= $result['source_amount'];
//               $updateTrue = Investment::where('orderId',$orderId)->where('status','Pending')->update(['status' => 'Active']);
           
//            if($updateTrue)  
//            {
            
//              $user_detail=User::where('username',$username)->first();
//               if ($user_detail->active_status=="Pending")
//               {   
//               $user_update=array('active_status'=>'Active','adate'=>Date("Y-m-d H:i:s"),'package'=>$amount);
//               User::where('id',$user_detail->id)->update($user_update);
//             \DB::table('general_settings')->where('id',1)->update(['people_online'=>generalDetail()->people_online+1]);
//             \DB::table('general_settings')->where('id',1)->update(['our_investors'=>generalDetail()->our_investors+1]);
//              }
//              else
//              {
//                $total=$user_detail->package+$amount;
//                 $user_update=array('package'=>$total,'active_status'=>'Active');
//               User::where('id',$user_detail->id)->update($user_update); 
//              }
                
                  
//              \DB::table('general_settings')->where('id',1)->update(['total_fund_invested'=>generalDetail()->total_fund_invested+$amount]);
//                   $plan ='BEGINNER';
//                 if ($amount>=50 && $amount<=200) 
//                    {
//                     $plan ='BEGINNER';
//                    }
//                    elseif($amount>=400 && $amount<=800)
//                    {
//                     $plan ='STANDARD';
//                    }
//                    elseif($amount>=1000 && $amount<=2000)
//                    {
//                     $plan ='EXCLUSIVE';
//                    }
//                    elseif($amount>=2500 && $amount<=5000)
//                    {
//                     $plan ='ULTIMATE';
//                    }
            
//                    elseif($amount>=5000 && $amount<=10000)
//                    {
//                     $plan ='PREMIUM';
//                    }
            
//                    elseif($amount>=5000)
//                    {
//                     $plan ='PREMIUM';
//                    }
                   
//                   sendEmail($user_detail->email, 'Account Activated -'.siteName(), [
//                     'name' => $user_detail->name,
//                     'username' => $user_detail->username,
//                     'amount' => $amount,
//                     'plan' => $plan,
//                     'date' => date("D, d M Y h:i:s a", strtotime(Date("Y-m-d H:i:s"))),
//                     'viewpage' => 'activation',
    
//                  ]);
                     
//             add_direct_income($user_detail->id,$amount);

                    
//            }
           
                 
//              }
//              else
//              {
//                 if($result['status']=="mismatch" && $result['amount'] >= $result['invoice_total_sum']) 
//                 {
                    
                         
//               $orderId= $result['order_number'];
//               $username= $result['order_name'];
//               $amount= $result['source_amount'];
//               $updateTrue = Investment::where('orderId',$orderId)->where('status','Pending')->update(['status' => 'Active']);
           
//            if($updateTrue)  
//            {
            
//              $user_detail=User::where('username',$username)->first();
//               if ($user_detail->active_status=="Pending")
//               {   
//               $user_update=array('active_status'=>'Active','adate'=>Date("Y-m-d H:i:s"),'package'=>$amount);
//               User::where('id',$user_detail->id)->update($user_update);
//             \DB::table('general_settings')->where('id',1)->update(['people_online'=>generalDetail()->people_online+1]);
//             \DB::table('general_settings')->where('id',1)->update(['our_investors'=>generalDetail()->our_investors+1]);
//              }
//              else
//              {
//                $total=$user_detail->package+$value->amount;
//                 $user_update=array('package'=>$total,'active_status'=>'Active');
//               User::where('id',$user_detail->id)->update($user_update); 
//              }
                
                  
//              \DB::table('general_settings')->where('id',1)->update(['total_fund_invested'=>generalDetail()->total_fund_invested+$amount]);
//                   $plan ='BEGINNER';
//                 if ($amount>=50 && $amount<=200) 
//                    {
//                     $plan ='BEGINNER';
//                    }
//                    elseif($amount>=400 && $amount<=800)
//                    {
//                     $plan ='STANDARD';
//                    }
//                    elseif($amount>=1000 && $amount<=2000)
//                    {
//                     $plan ='EXCLUSIVE';
//                    }
//                    elseif($amount>=2500 && $amount<=5000)
//                    {
//                     $plan ='ULTIMATE';
//                    }
            
//                    elseif($amount>=5000 && $amount<=10000)
//                    {
//                     $plan ='PREMIUM';
//                    }
            
//                    elseif($amount>=5000)
//                    {
//                     $plan ='PREMIUM';
//                    }
//                   add_direct_income($user_detail->id,$amount);
                  
                  
//                   sendEmail($user_detail->email, 'Account Activated -'.siteName(), [
//                     'name' => $user_detail->name,
//                     'username' => $user_detail->username,
//                     'amount' => $amount,
//                     'plan' => $plan,
//                     'date' => date("D, d M Y h:i:s a", strtotime(Date("Y-m-d H:i:s"))),
//                     'viewpage' => 'activation',
    
//                  ]);
                     
          

                    
//            }
           
           
                    
//                 }
//              }
             
//          }
        
            
         
        
           
// }



function expireOldBonusInvestments()
{
    $sevenDaysAgo = Carbon::now()->subDays(7)->toDateString();

    // Get all active "Deposit Bonus" investments older than 7 days
    $investments = Investment::where('active_from', 'Deposit Bonus')
        ->where('status', 'Active')
        ->whereDate('sdate', '<=', $sevenDaysAgo)
        ->get();

    foreach ($investments as $investment) {
        $investment->status = 'Expire';
        $investment->save();

        // Optional: log the change
        Log::info("Bonus expired for investment ID: {$investment->id}, User ID: {$investment->user_id}");
    }
}
        public  function my_binary($userid){
        $arrin=array($userid);
        $ret=array();
        // print_r($arrin);die();
        while(!empty($arrin)){
         $alldown= User::select('id')->whereIn('Parentid',$arrin)->get()->toArray();
         if(!empty($alldown)){
                $arrin = array_column($alldown,'id');
                $ret[]=$arrin;
              
              
            }else{
                $arrin = array();
            } 
        }
        // continue;    
        $final = array();         
        if(!empty($ret)){
            array_walk_recursive($ret, function($item, $key) use (&$final){
                $final[] = $item;
            });
        }

        return $final;
        
    }  

        public  function team_by_position($userid,$position){
        $ret=array();
        $get_position_user=User::where('Parentid',$userid)->where('position',$position)->first();
        if($get_position_user){
        
            $ret=$this->my_binary($get_position_user->id);
            $ret[]=$get_position_user->id;
        }
       
        return $ret;
    }







   public function my_level_team_count($userid,$level=10){
        $arrin=array($userid);
        $ret=array();

        $i=1;
        while(!empty($arrin)){
            $alldown=User::select('id')->whereIn('sponsor',$arrin)->get()->toArray();
            if(!empty($alldown)){
                $arrin = array_column($alldown,'id');
                $ret[$i]=$arrin;
                $i++;


            }else{
                $arrin = array();
            }
        }

        $final = array();
        if(!empty($ret)){
            array_walk_recursive($ret, function($item, $key) use (&$final){
                $final[] = $item;
            });
        }


        return $final;

    }






function getTreeChildId($table, $userIdFk = null)
{
    $query = DB::table($table)
        ->where(function($query) {
            $query->where('paid_left', 0)
                  ->orWhere('paid_right', 0);
        });

    // ✅ Optional filter for specific user_id_fk
    if ($userIdFk !== null) {
        $query->where('user_id_fk', $userIdFk);
    }

    $parentid = $query->orderBy('id', 'ASC')->first();

    if (!$parentid) {
        return ['parentId' => 0, 'position' => 1]; // Default to Left if none available
    }

    $res['parentId'] = $parentid->user_id_fk;

    if ($parentid->paid_left == 0) {
        $res['position'] = 1;
    } 
     else {
        $res['position'] = 2; // last choice: Right
    }

    return $res;
}






}
