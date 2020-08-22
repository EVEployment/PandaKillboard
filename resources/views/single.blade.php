@extends('layout.base')

@section('content')
    <div class="card bg-black-transparent text-white">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h3 class="card-title">Kill Report</h3>
                <div>
                    <ul class="nav ml-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">External</a>
                            <div class="dropdown-menu">
                                <div class="dropdown-header">DOTLAN</div>
                                <a class="dropdown-item" href="#">{{ $killmail->solar_system->itemName }}</a>
                                <a class="dropdown-item" href="#">{{ $killmail->solar_system->region->itemName }}</a>

                                <div class="dropdown-divider"></div>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Export</a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">DNA</a>
                                <a class="dropdown-item" href="#">ESI Link</a>
                                <a class="dropdown-item" href="#">In Game Link</a>
                                <a class="dropdown-item" href="#">EFT</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-xl-8 mb-3 order-xl-2">
                    <div class="row">
                        <div class="col-lg pt-2">
                            <x-single.killmail-basic-info :killmail="$killmail" />
                        </div>

                        <div class="col-lg">
                            <x-single.fitting-panel :shipTypeID="$killmail->victim->ship_type_id" :items="$killmail->victim->items" />
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 order-xl-1">
                    <x-single.killmail-attackers :attackers="$killmail->attackers" />
                </div>
            </div>
        </div>
    </div>
@endsection
