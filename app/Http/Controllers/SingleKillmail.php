<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Repositories\KillmailRepository as KillmailRepo;

class SingleKillmail extends Controller
{
    private $killmailRepo;

    public function __construct(KillmailRepo $killmailRepo) {
        $this->killmailRepo = $killmailRepo;
    }

    public function get(Request $request, $id) {
        $killmail = $this->killmailRepo->getSingleKillmail($id);
        return Inertia::render('Killmail', [
            'killmail' => $killmail,
        ]);
    }

    public function getAttackers(Request $request, $id) {
        if (!$request->ajax()) {
            return redirect()->route('killmail.show', compact('id'));
        }


    }
}
