<template>
    <div style="padding: 0px; width: 100%; margin: 0px;">
        <b-table small style="width: 100%; margin: 0px;">
            <tbody>
                <tr>
                    <td style="width: 66px; padding: 0px;">
                        @if (!is_null($killmail->victim->character_id))
                            <a href="/character/93694437/" rel="tooltip">
                                <img src="{{ img_url('characters', 'portrait', $killmail->victim->character_id, 128) }}" style="height: 64px; width: 64px;" class="eveimage img-rounded" alt="{{ $killmail->victim->character_id }}">
                            </a>
                        @else
                            <img src="{{ img_url('characters', 'portrait', 1, 128) }}" style="height: 64px; width: 64px;" class="eveimage img-rounded" alt="default">
                        @endif
                    </td>
                    <td style="width: 34px; padding: 0px;">
                        @if (!is_null($killmail->victim->corporation_id))
                            <a href="/corporation/98255033/" rel="tooltip">
                                <img src="{{ img_url('corporations', 'logo', $killmail->victim->corporation_id, 64) }}" style="height: 32px; width: 32px;" class="eveimage img-rounded" alt="{{ $killmail->victim->corporation_id }}">
                            </a>
                        @endif
                        <br>
                        @if (!is_null($killmail->victim->alliance_id))
                            <a href="/corporation/98255033/" rel="tooltip">
                                <img src="{{ img_url('alliances', 'logo', $killmail->victim->alliance_id, 64) }}" style="height: 32px; width: 32px;" class="eveimage img-rounded" alt="{{ $killmail->victim->alliance_id }}">
                            </a>
                        @endif
                    </td>
                    <td>
                        @if (!is_null($killmail->victim->character_id))
                            <a href="/character/93694437/">{{ $killmail->victim->character_id }}</a>
                        @endif
                        <br>
                        @if (!is_null($killmail->victim->corporation_id))
                            <a href="/corporation/98255033/">{{ $killmail->victim->corporation_id }}</a>
                        @endif
                        <br>
                        @if (!is_null($killmail->victim->alliance_id))
                            <a href="/corporation/98255033/">{{ $killmail->victim->alliance_id }}</a>
                        @endif
                    </td>
                </tr>
            </tbody>
        </b-table>
        <table class="table table-sm table-striped table-hover" style="width: 100%; padding: 0px; margin: 0px;">
            <tbody>
                <tr>
                    <th>Ship:</th>
                    <td style="width: 100%">
                        <a href="/ship/20185/">{{ $killmail->victim->ship_type->typeName }}</a>
                        <small>( <a href="/group/513/">{{ $killmail->victim->ship_type->group->groupName }}</a> )</small>
                    </td>
                </tr>

                <tr>
                    <th>System:</th>
                    <td>
                        <a href="/system/30000144/" class="">{{ $killmail->solar_system->itemName }} </a>
                        <span>(<span style="color: #33F9F9">{{ number_format($killmail->solar_system->security, 1) }}</span>)</span> / <a href="/region/10000002/" class="">{{ $killmail->solar_system->region->itemName }}</a>

                    </td>
                </tr>
                @if (!is_null($killmail->nearest_celestial))
                    <tr>
                        <th>Location:</th>
                        <td><a href="/location/50002184/">{{ $killmail->nearest_celestial->itemName }}</a> </td>
                    </tr>
                @endif
                <tr>
                    <th>Time:</th>
                    <td class="info_kill_dttm">{{ $killmail->time }}</td>
                </tr>
                <tr>
                    <th>Points:</th>
                    <td>TBD</td>
                </tr>
                <tr>
                    <th>Damage:</th>
                    <td>{{ number_format($killmail->victim->damage_taken) }}</td>
                </tr>
                <tr rel="tooltip" title="" data-original-title="$0.01 / 0.01€ / £0.01">
                    <th>Fitted:</th>
                    <td class="item_fitted">TBD ISK</td>
                </tr>
                <tr class="item_dropped_row" rel="tooltip" title="" data-original-title="$1.40 / 1.07€ / £0.82">
                    <th>Dropped:</th>
                    <td class="item_dropped">TBD ISK</td>
                </tr>
                <tr rel="tooltip" title="" data-original-title="$408.03 / 312.02€ / £240.02">
                    <th>Destroyed:</th>
                    <td class="item_destroyed">TBD ISK</td>
                </tr>
                <tr rel="tooltip" title="" data-original-title="$417.35 / 319.15€ / £245.50">
                    <th>Total:</th>
                    <td><strong class="item_dropped">TBD ISK</strong></td>
                </tr>
            </tbody>
        </table>
    </div>

</template>

<script>
export default {
    props: {
        
    }
}
</script>

<style>

</style>
