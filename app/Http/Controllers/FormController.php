<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function form1()
    {
        return view('forms.form1');
    }

    public function form1_data(Request $request)
    {
        // dd($request->all());
        // dd($request->except('_token'));
        // dd($request->only('name', 'email'));

        // $name = $_POST['name'];
        // $email = $_POST['email'];
        // $_POST = [];
        // $_POST['name'] = $name;
        // $_POST['email'] = $email;
        // unset($_POST['_token']);
        // dd($_POST);

        // $name = $request->input('name');
        // $age = $request->input('age');
        // $email = $request->input('email');

        $name = $request->name;
        $age = $request->age;
        $email = $request->email;

        return "Welcome $name, your age is $age and your email is $email";
    }

    public function form2()
    {
        return view('forms.form2');
    }

    public function form2_data(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'name' => 'required|min:4|max:20|string',
            'name' => ['required', 'min:4', 'max:20' ,'string'],
            'email' => 'required|email|ends_with:gmail.com',
            'phone' => 'required|min:6|max:20',
            // 'dob' => 'required|before:today',
            'end' => 'after:start'
        ]);

        $name = $request->name;
        $email = $request->email;
        $phone = $request->phone;
        $dob = $request->dob;

        return view('forms.form2_data', compact('name', 'email', 'phone', 'dob'));
    }
}
