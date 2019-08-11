<?php

namespace Bitfumes\Multiauth\Http\Controllers;

use Auth;
use Bitfumes\Multiauth\Model\Admin;
use DB;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('role:super', ['only' => 'show']);
    }

    public function index()
    {
        $id = Auth::user()->id;
        $profile = DB::table('admins')->where(['id' => $id])->first();
        $totalcustomers = DB::table('customers')->count();
        $customers = DB::table('customers')->orderBy('id', 'desc')->paginate(8);
        $holidays = DB::table('holidays')->orderBy('id', 'desc')->paginate(8);
        $routes = DB::table('routes')->orderBy('id', 'desc')->paginate(8);
        // $transaction = DB::table('transactions')->orderBy('id', 'desc')->paginate(8);
        $transactioncount = DB::table('transactions')->count();
        $transaction = DB::table('transactions')->join('customers as c', 'c.id', '=', 'transactions.customer')
            ->join('customers as g1', 'g1.id', '=', 'transactions.firstguarantor')
            ->join('customers as g2', 'g2.id', '=', 'transactions.secondguarantor')
            ->select('c.name as cname', 'g1.name as g1name', 'g2.name as g2name', 'transactions.id as id',
                'transactions.paymenttype as paymenttype', 'transactions.datepurchased as datepurchased')
            ->orderBy('id', 'desc')->paginate(8);

        $sumoftotalout = DB::table('transactions')->sum('amount');
        $sumoftotalincome = DB::table('transactions')->sum('totalincome');
        return view('multiauth::admin.home', ['routes' => $routes, 'holidays' => $holidays, 'customers' => $customers,
            'totalcustomers' => $totalcustomers, 'profile' => $profile, 'transaction' => $transaction,
            'transactioncount' => $transactioncount, 'sumoftotalout' => $sumoftotalout, 'sumoftotalincome' => $sumoftotalincome]);
        // return view('multiauth::admin.home');
    }

    public function show()
    {
        // $totalcustomers = DB::table('customers')->count();
        $admins = Admin::where('id', '!=', auth()->id())->get();
        return view('multiauth::admin.show', compact('admins'));
        // return view('multiauth::admin.show', ['admins' => $admins, 'totalcustomers' => $totalcustomers]);
    }

    public function showChangePasswordForm()
    {
        return view('multiauth::admin.passwords.change');
    }

    public function changePassword(Request $request)
    {
        $data = $request->validate([
            'oldPassword' => 'required',
            'password' => 'required|confirmed',
        ]);
        auth()->user()->update(['password' => bcrypt($data['password'])]);

        return redirect(route('admin.home'))->with('message', 'Your password is changed successfully');
    }

}
