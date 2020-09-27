<template>
<b-navbar variant="dark" type="dark" sticky toggleable="lg">
    <b-container>
        <inertia-link class="navbar-brand" href="/">
            <img class="d-inline-block" src="/images/icons/wreck.png" style="width: 16px; height: 16px;"> {{ $page.app.name }}
        </inertia-link>
        <b-navbar-toggle target="navbarNav" />
        <b-collapse is-nav id="navbarNav">
            <b-navbar-nav>
                <b-nav-item-dropdown text="Menu" right>
                    <b-dropdown-item router-component-name="inertia-link" href="/kills/abyssal/">Abyssal</b-dropdown-item>
                    <b-dropdown-item router-component-name="inertia-link" to="/kills/abyssalpvp/">Abyssal PvP</b-dropdown-item>
                    <b-dropdown-item router-component-name="inertia-link" href="/kills/awox/">Awox</b-dropdown-item>
                    <b-dropdown-item router-component-name="inertia-link" to="/kills/bigkills/">Big Kills</b-dropdown-item>
                    <b-dropdown-item router-component-name="inertia-link" to="/kills/citadels/">Citadels</b-dropdown-item>
                    <b-dropdown-item router-component-name="inertia-link" to="/kills/ganked/">Ganked</b-dropdown-item>
                    <b-dropdown-item router-component-name="inertia-link" to="/kills/solo/">Solo</b-dropdown-item>
                    <b-dropdown-item router-component-name="inertia-link" to="/kills/sponsored/">Sponsored</b-dropdown-item>
                    <b-dropdown-divider />
                    <b-dropdown-item router-component-name="inertia-link" to="/kills/highsec/">Highsec</b-dropdown-item>
                    <b-dropdown-item router-component-name="inertia-link" to="/kills/lowsec/">Lowsec</b-dropdown-item>
                    <b-dropdown-item router-component-name="inertia-link" to="/kills/nullsec/">Nullsec</b-dropdown-item>
                    <b-dropdown-item router-component-name="inertia-link" to="/kills/w-space/">W-Space</b-dropdown-item>
                    <b-dropdown-divider />
                    <b-dropdown-item router-component-name="inertia-link" to="/kills/5b/">+5b</b-dropdown-item>
                    <b-dropdown-item router-component-name="inertia-link" to="/kills/10b/">+10b</b-dropdown-item>
                    <b-dropdown-divider />
                    <b-dropdown-item router-component-name="inertia-link" to="/kills/capitals/">Capitals</b-dropdown-item>
                    <b-dropdown-item router-component-name="inertia-link" to="/kills/freighters/">Freighters</b-dropdown-item>
                    <b-dropdown-item router-component-name="inertia-link" to="/kills/rorquals/">Rorquals</b-dropdown-item>
                    <b-dropdown-item router-component-name="inertia-link" to="/kills/supers/">Supers</b-dropdown-item>
                </b-nav-item-dropdown>
                <!-- {{-- <li class="dropdown hidden-xs hidden-sm" id="tracker-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Tracker <b class="caret"></b></a>
                    <ul class="dropdown-menu" id="tracker-dropdown">
                        <li>Please log in first.</li>
                    </ul>
                </li> --}} -->
                <b-nav-item router-component-name="inertia-link" href="/post">
                    Post
                </b-nav-item>

                <!-- {{-- <li class="hidden-xs hidden-sm"><a href="/information/payments/"><img src="/img/golden-wreck.png"></a></li> --}}
                {{-- <li class="hidden-xs hidden-sm"><a href="/account/favorites/"><span id="favorite" style="width: 1em; cursor: pointer;"><b id="fav-star" class="glyphicon glyphicon-star" style="color: #FDBC2C"></b></span></a></li> --}} -->
            </b-navbar-nav>
            <b-navbar-nav class="ml-auto justify-content-end">
                <b-nav-item class="d-none d-lg-block" href="/top/lasthour/all/">
                    765
                </b-nav-item>
                <b-nav-item class="d-none d-lg-block">
                    <span id="tqStatus"><span class="green">TQ 27,986</span></span>
                </b-nav-item>

                <b-nav-item class="d-none d-lg-block" href="/ztop/">
                    <div id="my_clock">15:42 UTC</div>
                </b-nav-item>
                <!-- {{-- <li style="padding-right: 0px; margin-right: 0px;">

                </li> --}} -->
                <!-- <li id="usermenu" class="dropdown">
                    <a href="#" class="dropdown-toggle hidden-xs" data-toggle="dropdown" id="usermenu-dropdown">
                        <img id="char-image" src="/img/1_32.jpg" style="height: 32px; width: 32px; padding: 0px; margin: 0px; margin-top: -8px;">
                        <span class="caret"></span></a>
                    <a href="#" class="dropdown-toggle hidden-lg hidden-md hidden-sm" data-toggle="dropdown">Account <span class="caret"></span></a>

                    <ul class="dropdown-menu" id="char-loggedout">
                        <form action="/ccplogin/" id="loginform">
                            <label class="checkbox"><input type="checkbox" name="scopes[]" value="esi-killmails.read_killmails.v1" checked="">Fetch killmails?</label>
                            <label class="checkbox"><input type="checkbox" name="scopes[]" value="esi-fittings.write_fittings.v1" checked="">Save Fittings?</label>
                            <label class="checkbox"><input type="checkbox" name="scopes[]" value="esi-universe.read_structures.v1" checked="">Fetch Citadel Names &amp; Locations?</label>
                            <input id="ssologinimage" type="image" src="/img/ssologin.png">
                        </form>
                    </ul>
                </li> -->
            </b-navbar-nav>
            <form name="search" id="search" class="form-inline ml-md-2 mt-2 mt-lg-0">
                <div class="input-group w-100">
                    <div class="input-group-prepend">
                        <a class="btn btn-secondary btn" href="/asearch/"><i class="fas fa-search-plus"></i></a>
                    </div>
                    <input type="text" class="form-control" placeholder="Search" autocomplete="off" id="searchbox" name="searchbox" tabindex="1">
                </div>
            </form>
        </b-collapse>
    </b-container>
</b-navbar>
</template>

<script>
export default {

}
</script>

<style>

</style>
