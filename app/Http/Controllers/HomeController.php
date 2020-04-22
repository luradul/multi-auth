<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateContactFormRequest;
use App\Mail\ContactForm;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
//    /**
//     * Create a new controller instance.
//     *
//     * @return void
//     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    /**
     * This method is used for sending mails
     *
     * @param CreateContactFormRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function mail(CreateContactFormRequest $request)
    {
        Mail::to('radluk10@gmail.com')->send(new ContactForm(
            $request->name,
            $request->email,
            $request->message
        ));

        return redirect()->back();
    }
}
