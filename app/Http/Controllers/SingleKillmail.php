<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\KillmailRepository as KillmailRepo;

class SingleKillmail extends Controller
{
    private $killmailRepo;

    public function __construct(KillmailRepo $killmailRepo) {
        $this->killmailRepo = $killmailRepo;
    }

    public function get(Request $request, $id) {
        $killmail = $this->killmailRepo->getSingleKillmail($id);
        return view('single', [
            'killmail' => $killmail,
        ]);
    }
}
