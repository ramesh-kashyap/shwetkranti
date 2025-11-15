<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/clear', function() {

    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
 
    return "Cleared!";
 
 });

 
Route::get('/', function () {
    return view('main.home');
});

Auth::routes();

Route::get('/generate_roi', [App\Http\Controllers\Cron::class, 'generate_roi'])->name('generate_roi');
Route::get('/rank-update', [App\Http\Controllers\Cron::class, 'rank_update'])->name('rank-update');
Route::get('/reward_bonus', [App\Http\Controllers\Cron::class, 'reward_bonus'])->name('reward_bonus');
Route::get('/globaly_community', [App\Http\Controllers\Cron::class, 'globaly_community'])->name('globaly_community');
Route::get('/managePayout', [App\Http\Controllers\Cron::class, 'managePayout'])->name('managePayout');
Route::get('/releasefund', [App\Http\Controllers\Cron::class, 'releasefund'])->name('releasefund');
Route::any('/dynamicupicallbackkh', [App\Http\Controllers\Cron::class, 'dynamicupicallbacks'])->name('dynamicupicallbackkh');
Route::get('/distributeIncome', [App\Http\Controllers\Cron::class, 'distributeIncome'])->name('distributeIncome');
Route::get('/add-booster-income', [App\Http\Controllers\Cron::class, 'processExtraRound1'])->name('add-booster-income');



Route::post('login', [App\Http\Controllers\Login::class, 'login'])->name('login');
Route::get('forgot-password', [App\Http\Controllers\Login::class, 'forgot_password'])->name('forgot-password');
Route::any('forgot_submit', [App\Http\Controllers\Login::class, 'forgot_password_submit'])->name('forgot_submit');
Route::any('submitResetPassword', [App\Http\Controllers\Login::class, 'submitResetPassword'])->name('submitResetPassword');
Route::any('verifyCode', [App\Http\Controllers\Login::class, 'verifyCode'])->name('verifyCode');
Route::get('codeVerify', [App\Http\Controllers\Login::class, 'codeVerify'])->name('codeVerify');
Route::get('resetPassword', [App\Http\Controllers\Login::class, 'resetPassword'])->name('resetPassword');

Route::post('/getUserName', [App\Http\Controllers\Register::class, 'getUserNameAjax'])->name('getUserName');
Route::post('/registers', [App\Http\Controllers\Register::class, 'register'])->name('registers');
Route::get('/register_sucess', [App\Http\Controllers\Register::class, 'index'])->name('register_sucess');

Route::get('/Index', [App\Http\Controllers\FrontController::class, 'index'])->name('Index');
Route::get('/about-us', [App\Http\Controllers\FrontController::class, 'about_us'])->name('about-us');
Route::get('/services', [App\Http\Controllers\FrontController::class, 'services'])->name('services');
Route::get('/faq', [App\Http\Controllers\FrontController::class, 'faq'])->name('faq');
Route::get('/support', [App\Http\Controllers\FrontController::class, 'support'])->name('support');


Route::get('/home', [App\Http\Controllers\UserPanel\Dashboard::class, 'index'])->name('home');
Route::prefix('user')->group(function ()
{
Route::middleware('auth')->group(function ()
{
Route::get('/dashboard', [App\Http\Controllers\UserPanel\Dashboard::class, 'index'])->name('user.dashboard');

// profile
Route::get('/profile', [App\Http\Controllers\UserPanel\Profile::class, 'index'])->name('user.profile');
Route::post('/update-profile', [App\Http\Controllers\UserPanel\Profile::class, 'profile_update'])->name('user.update-profile');
Route::get('/ChangePass', [App\Http\Controllers\UserPanel\Profile::class, 'change_password'])->name('user.ChangePass');
Route::get('/BankDetail', [App\Http\Controllers\UserPanel\Profile::class, 'BankDetail'])->name('user.BankDetail');

Route::post('/edit-password', [App\Http\Controllers\UserPanel\Profile::class, 'change_password_post'])->name('user.edit-password');
Route::post('/bank-update', [App\Http\Controllers\UserPanel\Profile::class, 'bank_profile_update'])->name('user.bank-update');
Route::post('/change-trxpasswword', [App\Http\Controllers\UserPanel\Profile::class, 'change_trxpassword_post'])->name('user.change-trxpasswword');
// end profile


// add fund

Route::get('/AddFund', [App\Http\Controllers\UserPanel\AddFund::class, 'index'])->name('user.AddFund');
Route::get('/fundHistory', [App\Http\Controllers\UserPanel\AddFund::class, 'fundHistory'])->name('user.fundHistory');
Route::any('/SubmitBuyFund', [App\Http\Controllers\UserPanel\AddFund::class, 'SubmitBuyFund'])->name('user.SubmitBuyFund');
Route::get('/walletTransfer', [App\Http\Controllers\UserPanel\AddFund::class, 'walletTransfer'])->name('user.walletTransfer');
Route::post('/walletTransfers', [App\Http\Controllers\UserPanel\AddFund::class, 'walletTransfers'])->name('user.walletTransfers');
// end add fund

// invest
Route::get('/invest', [App\Http\Controllers\UserPanel\Invest::class, 'index'])->name('user.invest');
Route::any('/confirmDeposit', [App\Http\Controllers\UserPanel\Invest::class, 'confirmDeposit'])->name('user.confirmDeposit');

Route::any('/confirmDeposits', [App\Http\Controllers\UserPanel\Invest::class, 'confirmDeposits'])->name('user.confirmDeposits');

Route::post('/fundActivation', [App\Http\Controllers\UserPanel\Invest::class, 'fundActivation'])->name('user.fundActivation');
Route::get('/DepositHistory', [App\Http\Controllers\UserPanel\Invest::class, 'invest_list'])->name('user.DepositHistory');
Route::get('/boster', [App\Http\Controllers\UserPanel\Invest::class, 'boster'])->name('user.boster');
Route::post('/bosterActivation', [App\Http\Controllers\UserPanel\Invest::class, 'bosterActivation'])->name('user.bosterActivation');
Route::get('/bosterhistory', [App\Http\Controllers\UserPanel\Invest::class, 'bosterhistory'])->name('user.bosterhistory');


// end invest

// withdraw
Route::get('/Withdraw', [App\Http\Controllers\UserPanel\WithdrawRequest::class, 'index'])->name('user.withdraw');
Route::post('/WithdrawRequest', [App\Http\Controllers\UserPanel\WithdrawRequest::class, 'WithdrawRequest'])->name('user.Withdraw-Request');
Route::get('/WithdrawHistory', [App\Http\Controllers\UserPanel\WithdrawRequest::class, 'WithdrawHistory'])->name('user.Withdraw-History');
// end withdraw

//team
Route::get('/referral-team', [App\Http\Controllers\UserPanel\Team::class, 'index'])->name('user.referral-team');
Route::get('/level-team', [App\Http\Controllers\UserPanel\Team::class, 'LevelTeam'])->name('user.level-team');
//end team

//bonus
Route::get('/fast_track_income', [App\Http\Controllers\UserPanel\Bonus::class, 'index'])->name('user.ocenan_income');
Route::get('/cbr_income', [App\Http\Controllers\UserPanel\Bonus::class, 'direct_income'])->name('user.Self_income');
Route::get('/reward-bonus', [App\Http\Controllers\UserPanel\Bonus::class, 'reward_income'])->name('user.reward-bonus');
Route::get('/royalty_income', [App\Http\Controllers\UserPanel\Bonus::class, 'roi_income'])->name('user.team_bonanza');
Route::get('/referral_Income', [App\Http\Controllers\UserPanel\Bonus::class, 'cashback_bonus'])->name('user.Direct_Sponsor_Income');
Route::get('/reward_income', [App\Http\Controllers\UserPanel\Bonus::class, 'direct_sponor_level'])->name('user.direct_sponor_level');

//end bonus

//tickets
Route::get('/GenerateTicket',[App\Http\Controllers\UserPanel\Tickets::class,'GenerateTicket'])->name('user.GenerateTicket');
Route::post('/SubmitTicket',[App\Http\Controllers\UserPanel\Tickets::class,'SubmitTicket'])->name('user.SubmitTicket');
Route::get('/SupportMessage',[App\Http\Controllers\UserPanel\Tickets::class,'SupportMessage'])->name('user.SupportMessage');
Route::get('/ViewMessage',[App\Http\Controllers\UserPanel\Tickets::class,'ViewMessage'])->name('user.ViewMessage');

//end tickets

});
});


// admin

Route::prefix('admin')->group(function () {
Route::get('/admin-login', [App\Http\Controllers\Admin\AdminLogin::class, 'index'])->name('admin.admin-login');
Route::post('LoginAction', [App\Http\Controllers\Admin\AdminLogin::class, 'admin_login'])->name('admin.LoginAction');
Route::get('/admin-logout', [App\Http\Controllers\Admin\AdminLogin::class, 'admin_sign_out'])->name('admin.admin-logout');
Route::group(['middleware' => ['admin']], function ()
{

 Route::get('/dashboard', [App\Http\Controllers\Admin\Dashboard::class, 'index'])->name('admin.dashboard');
 Route::get('/add-bank-details', [App\Http\Controllers\Admin\Dashboard::class, 'add_bank_detail'])->name('admin.add-bank-details');
 Route::get('/view-bank-detail', [App\Http\Controllers\Admin\Dashboard::class, 'view_bank_detail'])->name('admin.view-bank-detail');
 Route::get('/edit-bank-kyc', [App\Http\Controllers\Admin\Dashboard::class, 'edit_bank_kyc'])->name('admin.edit-bank-kyc');
 Route::get('/remove-bank-detail', [App\Http\Controllers\Admin\Dashboard::class, 'remove_bank_detail'])->name('admin.remove-bank-detail');

 
 Route::post('/update-user-kyc-detail', [App\Http\Controllers\Admin\Dashboard::class, 'users_bank_kyc'])->name('admin.update-user-kyc-detail');
 
 Route::get('/changePassword', [App\Http\Controllers\Admin\Dashboard::class, 'changePassword'])->name('admin.changePassword');
 Route::post('/change-password-post', [App\Http\Controllers\Admin\Dashboard::class, 'change_password_post'])->name('admin.change-password-post');
 
 // active users controller
 

 Route::get('/active-user', [App\Http\Controllers\Admin\ActiveuserController::class, 'active_user'])->name('admin.active-user');
 Route::post('activate-admin', [App\Http\Controllers\Admin\ActiveuserController::class, 'activate_admin_post'])->name('admin.activate-admin');

 // usercontroller
 Route::get('/totalusers', [App\Http\Controllers\Admin\UserController::class, 'alluserlist'])->name('admin.totalusers');
 Route::get('/active-users', [App\Http\Controllers\Admin\UserController::class, 'active_users'])->name('admin.active-users');
 Route::get('/pending-user', [App\Http\Controllers\Admin\UserController::class, 'pending_users'])->name('admin.pending-user');
 Route::get('/edit-users', [App\Http\Controllers\Admin\UserController::class, 'edit_users'])->name('admin.edit-users');
 Route::get('edit-user-view/{id}', [App\Http\Controllers\Admin\UserController::class, 'edit_users_view'])->name('admin.edit-user-view');

 Route::any('update-user-profile', [App\Http\Controllers\Admin\UserController::class, 'users_profile_update'])->name('admin.update-user-profile');
 Route::get('/block-users', [App\Http\Controllers\Admin\UserController::class, 'block_users'])->name('admin.block-users');
 Route::get('block-submit', [App\Http\Controllers\Admin\UserController::class, 'block_submit'])->name('admin.block-submit');

 //end userController

//DepositManagmentController
 Route::get('/deposit-request', [App\Http\Controllers\Admin\DepositController::class, 'deposit_request'])->name('admin.deposit-request');
 Route::get('/rejected-deposit', [App\Http\Controllers\Admin\DepositController::class, 'rejected_deposit'])->name('admin.rejected-deposit');
 
 Route::get('/deposit-list', [App\Http\Controllers\Admin\DepositController::class, 'deposit_list'])->name('admin.deposit-list');
 Route::get('deposit_request_done', [App\Http\Controllers\Admin\DepositController::class, 'deposit_request_done'])->name('admin.deposit_request_done');
// end DepositManagmentController

//fundController
 Route::get('Add-fund-list', [App\Http\Controllers\Admin\FundController::class, 'add_fund_report'])->name('admin.add-fund-list');
 Route::get('fund-report', [App\Http\Controllers\Admin\FundController::class, 'fund_report'])->name('admin.fund-report');
 
 Route::get('fund_request_done', [App\Http\Controllers\Admin\FundController::class, 'fund_request_done'])->name('admin.fund_request_done');
 Route::get('Add-fund-Report', [App\Http\Controllers\Admin\FundController::class, 'add_fund_reports'])->name('Add-fund-Report');

//end fundController

//bonusController
Route::get('cbr_income', [App\Http\Controllers\Admin\BonusController::class, 'roi_bonus'])->name('admin.sponsor_direct');
Route::get('referral_income', [App\Http\Controllers\Admin\BonusController::class, 'level_bonus'])->name('admin.ocean_income');
Route::get('reward_Income', [App\Http\Controllers\Admin\BonusController::class, 'sponsor_bonus'])->name('admin.Self_Income');
Route::get('fast_track_income', [App\Http\Controllers\Admin\BonusController::class, 'reward_bonus'])->name('admin.direct_Income');
Route::get('royalty_income', [App\Http\Controllers\Admin\BonusController::class, 'Bonanza_income'])->name('admin.Bonanza_income');



// withdraw
Route::get('pendingWithdrawal', [App\Http\Controllers\Admin\WithdrawController::class, 'pendingWithdrawal'])->name('admin.pendingWithdrawal');
Route::get('payment-ledgers', [App\Http\Controllers\Admin\WithdrawController::class, 'paymentledgers'])->name('admin.payment-ledgers');

Route::get('withdraw_request_done', [App\Http\Controllers\Admin\WithdrawController::class, 'withdraw_request_done'])->name('admin.withdraw_request_done');
Route::get('rejectedWithdrawal', [App\Http\Controllers\Admin\WithdrawController::class, 'rejectedWithdrawal'])->name('admin.rejectedWithdrawal');
Route::get('approvedWithdrawal', [App\Http\Controllers\Admin\WithdrawController::class, 'approvedWithdrawal'])->name('admin.approvedWithdrawal');
Route::any('/withdraw_request_done_multiple', [App\Http\Controllers\Admin\WithdrawController::class, 'withdraw_request_done_multiple'])->name('admin.withdraw_request_done_multiple');

// support


Route::get('support-query', [App\Http\Controllers\Admin\SupportController::class, 'index'])->name('admin.support-query');
Route::get('get_support_msg', [App\Http\Controllers\Admin\SupportController::class, 'get_support_msg'])->name('admin.get_support_msg');
Route::get('close_ticket_', [App\Http\Controllers\Admin\SupportController::class, 'close_ticket_'])->name('admin.close_ticket_');
Route::get('reply_support_msg', [App\Http\Controllers\Admin\SupportController::class, 'reply_support_msg'])->name('admin.reply_support_msg');
Route::post('admin_ticket_submit', [App\Http\Controllers\Admin\SupportController::class, 'admin_ticket_submit'])->name('admin.admin_ticket_submit');

});

});
