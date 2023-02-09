<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class CalculatorController extends Controller
{
    public function index()
    {
        return view('app');
    }

    public function calculate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'number_1' => 'required|numeric',
            'number_2' => 'required|numeric',
            'operator' => ['required', Rule::in(['/', '*', '+', '-'])]
        ]);

        if ($validator->fails()) {
            return response()->json(['message'=> 'An error has occured']);
        }

        $result = null;
        $number_1 = $request->number_1;
        $number_2 = $request->number_2;
        $operator = $request->operator;
        $message = null;

        switch ($operator) {
            case '/':
                if($number_2 == 0)
                    $message = 'Cannot divide by 0';
                else
                    $result = $number_1 / $number_2;
                break;
            case '*':
                $result = $number_1 * $number_2;
                break;
            case '+':
                $result = $number_1 + $number_2;
                break;
            case '-':
                $result = $number_1 - $number_2;
                break;
        }

        return response()->json(['result' => $result, 'message'=> $message]);
    }
}
