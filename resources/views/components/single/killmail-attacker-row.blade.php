@props(['attacker'])

<tr class="attacker">
    <td class="col-largelogo pl-1">
        <a href="/character/97002385/" rel="tooltip" title="" data-original-title="{{ optional($attacker->character)->name ?? $attacker->character_id }}">
            <img src="{{ img_url('characters', 'portrait', $attacker->character_id ?? 1, 128) }}" style="height: 64px; width: 64px;" class="eveimage img-rounded" loading="lazy" alt="Samuel J Audene">
        </a>
    </td>
    <td class="col-smalllogo">
        <a href="/ship/47271/" rel="tooltip" title="" class="" data-original-title="Leshak">
            <img src="{{ img_url('types', 'icon', $attacker->ship_type_id ?? $attacker->weapon_type_id, 64) }}" style="height: 32px; width: 32px;" class="eveimage img-rounded" loading="lazy" alt="Leshak">
        </a>
        <a href="/item/47271/" rel="tooltip" title="" data-original-title="Leshak">
            <img class="eveimage img-rounded" src="{{ img_url('types', 'icon', $attacker->weapon_type_id ?? $attacker->ship_type_id, 64) }}" style="height: 32px; width: 32px;" loading="lazy" alt="Leshak">
        </a>
    </td>
    <td class="pilotinfo">
        @isset($attacker->character_id)
            <a href="/character/97002385/">{{ optional($attacker->character)->name ?? $attacker->character_id }}</a>
        @else
            <a href="/ship/97002385/">{{ optional($attacker->ship_type)->name ?? $attacker->ship_type_id }}</a>
        @endisset
        <br>
        @isset($attacker->corporation_id)
            <a href="/corporation/98243034/">{{ optional($attacker->corporation)->name ?? $attacker->corporation_id }}</a>
        @endisset
        <br>
        @isset($attacker->alliance_id)
            <a href="/alliance/1727758877/">{{ optional($attacker->alliance)->name ?? $attacker->alliance_id }}</a>
        @endisset
    </td>
    <td class="col-damage">
        <div class="damage-value">{{ number_format($attacker->damage_done) }}</div>
        <div class="damage-percentage">{{ $damagePercentage }}%</div>
    </td>
</tr>
