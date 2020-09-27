<template>
    <b-card no-body bg-variant="black-transparent" text-variant="white">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <b-card-title>Kill Report</b-card-title>
                <div>
                    <b-nav class="ml-auto">
                        <b-nav-item-dropdown text="External" right>
                            <b-dropdown-header>DOTLAN</b-dropdown-header>
                            <!-- <a class="dropdown-item" href="#">{{ $killmail->solar_system->itemName }}</a> -->
                            <!-- <a class="dropdown-item" href="#">{{ $killmail->solar_system->region->itemName }}</a> -->

                            <b-dropdown-divider />
                        </b-nav-item-dropdown>
                        <b-nav-item-dropdown text="Export" right>
                            <b-dropdown-item href="#">DNA</b-dropdown-item>
                            <b-dropdown-item href="#">ESI Link</b-dropdown-item>
                            <b-dropdown-item href="#">In Game Link</b-dropdown-item>
                            <b-dropdown-item href="#">EFT</b-dropdown-item>
                        </b-nav-item-dropdown>
                    </b-nav>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-xl-8 mb-3 order-xl-2">
                    <div class="row">
                        <div class="col-lg pt-2">
                            <!-- <x-single.killmail-basic-info :killmail="$killmail" /> -->
                        </div>

                        <div class="col-lg">
                            <!-- <x-fitting-panel :victim="$killmail->victim" /> -->
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 order-xl-1">
                    <!-- <x-single.killmail-attackers :attackers="$killmail->attackers" :totalDamage="$killmail->victim->damage_taken" /> -->
                </div>
            </div>
        </div>
    </b-card>
</template>

<script>
import Layout from '../Layout'
export default {
    layout: Layout
}
</script>

<style>

</style>
