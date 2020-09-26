<nav class="navbar navbar-dark sticky-top navbar-expand-lg bg-dark">
    <div class="container">
        <a class="navbar-brand" href="/"><img class="d-inline-block" src="{{ asset('/images/icons/wreck.png') }}" style="width: 16px; height: 16px;"> {{ config('app.name') }}</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">{{ __('Menu') }}</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="/kills/abyssal/">{{ __('Abyssal') }}</a>
                        <a class="dropdown-item" href="/kills/abyssalpvp/">Abyssal PvP</a>
                        <a class="dropdown-item" href="/kills/awox/">Awox</a>
                        <a class="dropdown-item" href="/kills/bigkills/">Big Kills</a>
                        <a class="dropdown-item" href="/kills/citadels/">Citadels</a>
                        <a class="dropdown-item" href="/kills/ganked/">Ganked</a>
                        <a class="dropdown-item" href="/kills/solo/">Solo</a>
                        <a class="dropdown-item" href="/kills/sponsored/">Sponsored</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="/kills/highsec/">Highsec</a>
                        <a class="dropdown-item" href="/kills/lowsec/">Lowsec</a>
                        <a class="dropdown-item" href="/kills/nullsec/">Nullsec</a>
                        <a class="dropdown-item" href="/kills/w-space/">W-Space</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="/kills/5b/">+5b</a>
                        <a class="dropdown-item" href="/kills/10b/">+10b</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="/kills/capitals/">Capitals</a>
                        <a class="dropdown-item" href="/kills/freighters/">Freighters</a>
                        <a class="dropdown-item" href="/kills/rorquals/">Rorquals</a>
                        <a class="dropdown-item" href="/kills/supers/">Supers</a>
                    </div>
                </li>
                {{-- <li class="dropdown hidden-xs hidden-sm" id="tracker-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Tracker <b class="caret"></b></a>
                    <ul class="dropdown-menu" id="tracker-dropdown">
                        <li>Please log in first.</li>
                    </ul>
                </li> --}}
                <li class="nav-item">
                    <a class="nav-link" href="/post/">Post</a>
                </li>

                {{-- <li class="hidden-xs hidden-sm"><a href="/information/payments/"><img src="/img/golden-wreck.png"></a></li> --}}
                {{-- <li class="hidden-xs hidden-sm"><a href="/account/favorites/"><span id="favorite" style="width: 1em; cursor: pointer;"><b id="fav-star" class="glyphicon glyphicon-star" style="color: #FDBC2C"></b></span></a></li> --}}
            </ul>
            <ul class="navbar-nav ml-auto justify-content-end">
                <li class="nav-item d-none d-lg-block">
                    <a class="nav-link" href="/top/lasthour/all/" rel="tooltip" title="" id="lasthour" data-original-title="Kills added this hour">765</a>
                </li>
                <li class="nav-item d-none d-lg-block">
                    <a class="nav-link" href="#" rel="tooltip" title="" onclick="return false;" data-original-title="Tranquility Status"><span id="tqStatus"><span class="green">TQ 27,986</span></span></a>
                </li>

                <li class="nav-item d-none d-lg-block">
                    <a class="nav-link" href="/ztop/" rel="tooltip" title="" data-original-title="Eve Time">
                        <div id="my_clock">15:42 UTC</div>
                    </a>
                </li>
                {{-- <li style="padding-right: 0px; margin-right: 0px;">

                </li> --}}
                {{-- <li id="usermenu" class="dropdown">
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
                </li> --}}
            </ul>
            <form name="search" id="search" class="form-inline ml-md-2 mt-2 mt-lg-0">
                <div class="input-group w-100">
                    <div class="input-group-prepend">
                        <a class="btn btn-secondary btn" href="/asearch/"><i class="fas fa-search-plus"></i></a>
                    </div>
                    <input type="text" class="form-control" placeholder="Search" autocomplete="off" id="searchbox" name="searchbox" tabindex="1">
                </div>
            </form>
        </div>
    </div>
</nav>
