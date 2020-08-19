<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Account;

class AccountController extends Controller
{
    public function pendingApproval(){
        $pendingApproval = Account::GetPendingApproval();
        return response()->json($pendingApproval);
    }
}
