<?php

namespace App\Http\Controllers;

use App\Repositories\EntityRepository;
use Illuminate\Http\Request;
use App\Repositories\KillmailRepository as KillmailRepo;
use App\Models\Killmail as KillmailModel;
use Illuminate\Support\Facades\Response;

class Killmail extends Controller
{

    public function __construct(private EntityRepository $entityRepo) {}

    public function get(Request $request, $id) {
        $killmail = KillmailModel::find($id);
        abort_if(is_null($killmail), 404);

        $ids = collect();

        foreach ($killmail->content['attackers'] as $attacker) {
            if (array_key_exists('character_id', $attacker)) $ids->push($attacker['character_id']);
            if (array_key_exists('corporation_id', $attacker)) $ids->push($attacker['corporation_id']);
            if (array_key_exists('alliance_id', $attacker)) $ids->push($attacker['alliance_id']);
            if (array_key_exists('ship_type_id', $attacker)) $ids->push($attacker['ship_type_id']);
            if (array_key_exists('weapon_type_id', $attacker)) $ids->push($attacker['weapon_type_id']);
        }
        if (array_key_exists('character_id', $killmail->content['victim']))
            $ids->push($killmail->content['victim']['character_id']);
        if (array_key_exists('corporation_id', $killmail->content['victim']))
            $ids->push($killmail->content['victim']['corporation_id']);
        if (array_key_exists('alliance_id', $killmail->content['victim']))
            $ids->push($killmail->content['victim']['alliance_id']);
        if (array_key_exists('ship_type_id', $killmail->content['victim']))
            $ids->push($killmail->content['victim']['ship_type_id']);
        if (array_key_exists('item_type_id', $killmail->content['victim']['items']))
            $ids->push($killmail->content['victim']['items']['item_type_id']);

        $names = $this->entityRepo->getNames($ids);

        return Response::json([
            'id' => $killmail->id,
            'hash' => $killmail->hash,
            'time' => $killmail->content['killmail_time'],
            'victim' => $killmail->content['victim'],
            'attackers' => $killmail->content['attackers'],
            'created_at' => $killmail->created_at,
            'content' => $killmail->content,
            'names' => $names,
        ]);
    }

    public function fetchList(Request $request) {
        $request->validate([
            'after' => 'integer',
            'before' => 'integer',
            'limit' => 'integer|between:1,200',
        ]);

        $killmailQuery = KillmailModel::query();
        if (!is_null($request->after)) {
            $killmailQuery = $killmailQuery->where('id', '>=', $request->after);
        }

        if (!is_null($request->before)) {
            $killmailQuery = $killmailQuery->where('id', '>=', $request->before);
        }

        $killmailQuery = $killmailQuery->limit($request->limit ?? 100)->get();

        return Response::json([
            'data' => $killmailQuery,
        ]);
    }
}
