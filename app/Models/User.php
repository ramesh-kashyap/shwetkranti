<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Auth;
use App\Models\Boster;
use App\Models\WalletTransfer;
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name', 'email', 'password','phone','username','sponsor','ParentId','position','active_status','jdate','level','tpassword','adate','PSR','TPSR',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'sponsor');
    } 


    public function sponsor_detail()
    {
        return $this->belongsTo('App\Models\User', 'sponsor');
    } 


   public function fund_balance()
    {
    $balance = (Auth::user()->buy_fund()) - (Auth::user()->buy_packageAmt()+ Auth::user()->transfer_wallet());
    return $balance;
    } 
   
      
 public function transfer_wallet()
    {
    return WalletTransfer::where('user_id', Auth::user()->id)->sum('amount');   
 } // 
  
  public function totalbooster()
    {
    return Income::where('user_id', Auth::user()->id)->sum('self_wallet');   
 } 
    
    
     public function boster_balance()
    {
    $balance = (Auth::user()->totalbooster()) - (Auth::user()->boster_packageAmt() - Auth::user()->transfer_wallet());
    return $balance;
    } 


   public function boster()
    {
        return Income::where('user_id', Auth::user()->id)->where('remarks', 'Self Income') ->sum('comm');   
     } 


      public function boster_packageAmt(){
        $amt= Boster::where('active_from',Auth::user()->username)->where('walletType',2)->sum('amount');
        return $amt;
    }
    
      public function boster_packageAmt2(){
        $amt= Boster::where('active_from',Auth::user()->username)->where('walletType',1)->sum('amount');
        return $amt;
    }
    
    

  public function totalincome()
    {
    return Income::where('user_id', Auth::user()->id)->sum('comm');   
 } 

    public function buy_fund()
    {
        return  BuyFund::where('user_id',Auth::user()->id)->sum('amount');
    } 

     public function buy_packageAmt(){
        $amt= Investment::where('active_from',Auth::user()->username)->where('walletType',1)->sum('amount');
        return $amt;
    }

    public function roi_bonus()
    {
        return $this->hasMany('App\Models\Income','user_id','id')->where('remarks','Self Income');
    } 

    public function sponsor_bonus()
    {
        return $this->hasMany('App\Models\Income','user_id','id')->where('remarks','Ocean Vip Income');
    } 
        
    public function level_bonus()
    {
        return $this->hasMany('App\Models\Income','user_id','id')->where('remarks','Direct Sponsor Level Income');
    } 

    public function payout()
    {
       return $this->hasMany('App\Models\Payout','user_id','id');
   } 
          
    public function reward_bonus()
    {
        return $this->hasMany('App\Models\Income','user_id','id')->where('remarks','Direct Sponsor Income');
    } 

    public function leadership_bonus()
    {
        return $this->hasMany('App\Models\Income','user_id','id')->where('remarks','Team Bonanza');
    } 
    
    
    
    
      public function available_balance()
    {
    $balance = (Auth::user()->users_incomes()) - (Auth::user()->withdraw())-(Auth::user()->boster_packageAmt2());
    return $balance;
    } 

    // public function users_incomes()
    // {
    //     return $this->hasMany('App\Models\Income','user_id','id');
    // } 
    

    //   public function users_incomes()
    // {
    //     return  Income::where('user_id',Auth::user()->id)->where('credit_type',0)->sum('comm');
    // } 

        public function users_incomes()
    {
        return  Income::where('user_id',Auth::user()->id)->sum('comm');
    } 

     public function withdraw()
    {
        return  Withdraw::where('user_id',Auth::user()->id)->where('status','!=','Failed')->sum('amount');
    } 

    public function investment(){
        return $this->hasMany('App\Models\Investment','user_id','id')->where('status','Active')->where('roiCandition',0);
    }

    
}
