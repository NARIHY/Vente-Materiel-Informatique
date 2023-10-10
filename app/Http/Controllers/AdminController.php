<?php

namespace App\Http\Controllers;

use App\Models\Compteur;
use App\Models\Contact;
use App\Models\Subscriber;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\View\View;

class AdminController extends Controller
{
    /**
     * This is already used to join the dashboard view
     * @return View
     */
    public function index(): View
    {
        //Get total visits
        $visits = Compteur::count();
        //only visits for today
        $today = Carbon::today();
        $visitsToday = Compteur::whereDate('created_at', $today)->count();
        //for this months
        $visitsThisMonth = Compteur::whereMonth('created_at', $today->month)->count();
        //for this year
        $visitsThisYear = Compteur::whereYear('created_at', $today->year)->count();
        //numbers of subscriber
        $subscriber = Subscriber::count();
        //numbers of contact
        $contact = Contact::count();
        //numbers of compte
        $compte = User::count();
        return view('admin.index', [
            'visits'=> $visits,
            'visitsToday' => $visitsToday,
            'visitsThisMonth' => $visitsThisMonth,
            'visitsThisYear' => $visitsThisYear,
            'subscriber' => $subscriber,
            'contact' => $contact,
            'compte' => $compte
        ]);
    }
}
