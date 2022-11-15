<?php

namespace App\Http\Controllers;

use App\Mail\ContactUsMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
            'end' => 'after:start',
            'education' => 'required'
        ]);

        dd($request->all());

        $name = $request->name;
        $email = $request->email;
        $phone = $request->phone;
        $dob = $request->dob;

        return view('forms.form2_data', compact('name', 'email', 'phone', 'dob'));
    }

    public function form3()
    {
        return view('forms.form3');
    }

    public function form3_data(Request $request)
    {
        $request->validate([
            'cv' => 'required|image'
        ]);
        // dd($request->all());
        // $filename = rand() . time() . $request->file('cv')->getClientOriginalName();
        $ex = strtolower($request->file('cv')->getClientOriginalExtension());
        $name = strtolower(str_replace(' ', '-', $request->name));
        $cvname = $name.'-'.date('d-m-Y-h-i').'-cv.'.$ex;

        $request->file('cv')->move(public_path('uploads'), $cvname);


        // File System
        // $path = $request->file('cv')->store('uploads', 'public');
        // $path = $request->file('cv')->storeAs('uploads','filename', 'public');

        // return view('show_file', compact('path'));
    }

    public function mail()
    {
        return view('forms.mail');
    }

    public function mail_data(Request $request)
    {
        $request->validate([
            'name' => 'required|min:2',
            'email' => 'required|email',
            'phone' => 'required',
            'subject' => 'required',
            'message' => 'required',
            'cv' => 'required|file|mimes:pdf'
        ]);

        $data = $request->except('_token');

        // dd($request->except('_token'));
        $ex = $request->file('cv')->getClientOriginalExtension();
        $cv_name = strtolower($request->name) . '-cv-'.time().'.'.$ex;
        $request->file('cv')->move(public_path('uploads/cv'), $cv_name);

        $data['cv'] = $cv_name;

        // dd($request->except('_token'), $data);

        Mail::to('sha7in147@gmail.com')->send(new ContactUsMail($data));


    }
}
