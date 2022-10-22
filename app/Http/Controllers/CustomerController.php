<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('customer.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:customers,email',
            'password'=>'required|min:5|max:30',
            'cpassword'=>'required|min:5|max:30,same:password',
            'payment'=>'required'
        ]);

        $customer = new Customer();
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->password = Hash::make($request->password);
        $customer->activated = 1;
        $customer->payment = $request->payment;
        $customer = $customer->save();

        if($customer) {
            return redirect()->back()->with('success', 'You are registered successfully.');
        } else {
            return redirect()->back()->with('fail', 'You are not registered.');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('customer.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        //
    }

    public function register()
    {
        return view('customer.register');
    }

    public function check(Request $request)
    {
        $requestData = $request->request->all();
        $email = $requestData['email'];
        $activated = Customer::select('activated')->where('email', '=' , $email)->first();
        if($activated['activated']) {
            $request->validate([
                'email'=>'required|email|exists:customers,email',
                'password'=>'required|min:5|max:30'
            ],[
                'email.exists'=>'This email is not exists in users table'
            ]);

            $creds = $request->only('email','password');
            if( Auth::guard('customer')->attempt($creds) ) {
                return redirect()->route('customer.home');
            } else {
                return redirect()->route('customer.login')->with('fail', 'Incorrect credentials.');
            }
        } else {
            return redirect()->route('customer.login')->with('fail', 'Your account is deactivated.');
        }
    }

    public function logout()
    {
        Auth::guard('customer')->logout();
        return redirect()->route('customer.login');
    }
}
