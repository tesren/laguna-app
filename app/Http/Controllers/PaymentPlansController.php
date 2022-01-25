<?php

namespace App\Http\Controllers;

use App\Models\PaymentPlan;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class PaymentPlansController extends Controller
{
    

    public function index()
    {
        return view('admin.payment-plans.index', ['plans' => PaymentPlan::all() ]);
    }

    public function create()
    {
        return view('admin.payment-plans.create');
    }

    public function store(Request $request){
        $inputArray = array(
            'pname'=> $request->input('pname'),
            'pname_en'=> $request->input('pname_en'),
        );

        $rules = array(
            'pname'=>'required',
            'pname_en'=>'required',
        );

        $validator = Validator::make( $inputArray, $rules);

        if($validator->fails()){
            return redirect()->back()->with(['errors'=> $validator->errors()->all()]);
        }else{
            $plan = new PaymentPlan();
            $plan->name = $request->input('pname');
            $plan->name_en = $request->input('pname_en');
            $plan->down_payment = $request->input('down');
            $plan->months = $request->input('months');
            $plan->month_percent = $request->input('month_percent');
            $plan->closing_payment = $request->input('closing');
            $plan->discount = $request->input('discount');
            $plan->created_at = now();
            $plan->save();

            return redirect()->back()->with('message', 'Plan de pago registrado exitosamente');
        }
    }

    public function edit($id)
    {
        return view('admin.payment-plans.edit', ['plan' => PaymentPlan::find($id)]);
    }

    public function update(Request $request, $id){
        $inputArray = array(
            'pname'=> $request->input('pname'),
            'pname_en'=> $request->input('pname_en'),
        );

        $rules = array(
            'pname'=>'required',
            'pname_en'=>'required',
        );

        $validator = Validator::make( $inputArray, $rules);

        if($validator->fails()){
            return redirect()->back()->with(['errors'=> $validator->errors()->all()]);
        }else{
            $plan = PaymentPlan::find($id);
            $plan->name = $request->input('pname');
            $plan->name_en = $request->input('pname_en');
            $plan->down_payment = $request->input('down');
            $plan->months = $request->input('months');
            $plan->month_percent = $request->input('month_percent');
            $plan->closing_payment = $request->input('closing');
            $plan->discount = $request->input('discount');
            $plan->updated_at = now();
            $plan->save();

            return redirect()->back()->with('message', 'Plan de pago actualizado exitosamente');
        }
    }

    public function destroy($id)
    {
        $plan = PaymentPlan::find($id);
        if($plan){
            $plan->delete();
        }
        return redirect()->route('all.payments')->with('message', 'Plan de pago borrado exitosamente');
    }

}
