<?php

namespace App\Http\Controllers;

use App\Models\PaymentPlan;
use App\Models\Tower;
use App\Models\TowerPaymentplan;
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
        $towers = Tower::all();
        return view('admin.payment-plans.create', compact('towers'));
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


            $towers = $request->input('towers');
            foreach($towers as $tower){
                $plan_tower = new TowerPaymentplan();
                $plan_tower->payment_plan_id = $plan->id;
                $plan_tower->tower_id = $tower;
                $plan_tower->created_at = now();
                $plan_tower->save();
            }

            

            return redirect()->back()->with('message', 'Plan de pago registrado exitosamente');
        }
    }

    public function edit($id)
    {
        $plan = PaymentPlan::find($id);
        $towers = Tower::all();

        return view('admin.payment-plans.edit', compact('plan', 'towers'));
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

            //Borramos las anteriores primero
            $old_towers = TowerPaymentplan::where('payment_plan_id', $plan->id)->get();
            foreach($old_towers as $tower){
                $tower->delete();
            }

            $towers = $request->input('towers');
            foreach($towers as $tower){
                $plan_tower = new TowerPaymentplan();
                $plan_tower->payment_plan_id = $plan->id;
                $plan_tower->tower_id = $tower;
                $plan_tower->created_at = now();
                $plan_tower->save();
            }

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
