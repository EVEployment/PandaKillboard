<div class="fitting-panel-container">
    <div class="fitting-panel">

        <div class="mask panel-mask">
            <img src="{{ asset('/images/fittingpanels/tyrannis.png') }}" alt="">
        </div>


        <div class="mask slot-mask highx">
            <img src="{{ asset('/images/fittingpanels/8h.png') }}" alt="">
        </div>

        <div class="item-lg high1"></div>
        <div class="item-lg high2"></div>
        <div class="item-lg high3"></div>
        <div class="item-lg high4"></div>
        <div class="item-lg high5"></div>
        <div class="item-lg high6"></div>
        <div class="item-lg high7"></div>
        <div class="item-lg high8"></div>


        <div class="mask slot-mask midx">
            <img src="{{ asset('/images/fittingpanels/8m.png') }}" alt="">
        </div>

        <div class="item-lg mid1"></div>
        <div class="item-lg mid2"></div>
        <div class="item-lg mid3"></div>
        <div class="item-lg mid4"></div>
        <div class="item-lg mid5"></div>
        <div class="item-lg mid6"></div>
        <div class="item-lg mid7"></div>
        <div class="item-lg mid8"></div>


        <div class="mask slot-mask lowx">
            <img src="{{ asset('/images/fittingpanels/8l.png') }}" alt="">
        </div>

        <div class="item-lg low1"></div>
        <div class="item-lg low2"></div>
        <div class="item-lg low3"></div>
        <div class="item-lg low4"></div>
        <div class="item-lg low5"></div>
        <div class="item-lg low6"></div>
        <div class="item-lg low7"></div>
        <div class="item-lg low8"></div>


        <div class="mask slot-mask rigx">
            <img src="{{ asset('/images/fittingpanels/3r.png') }}" alt="">
        </div>

        <div class="item-lg rig1"></div>
        <div class="item-lg rig2"></div>
        <div class="item-lg rig3"></div>


        <div class="mask slot-mask subx">
            <img src="{{ asset('/images/fittingpanels/5s.png') }}" alt="">
        </div>

        <div class="item-lg sub1"></div>
        <div class="item-lg sub2"></div>
        <div class="item-lg sub3"></div>
        <div class="item-lg sub4"></div>
        <div class="item-lg sub5"></div>


        <div class="item-sm high1l"></div>
        <div class="item-sm high2l"></div>
        <div class="item-sm high3l"></div>
        <div class="item-sm high4l"></div>
        <div class="item-sm high5l"></div>
        <div class="item-sm high6l"></div>
        <div class="item-sm high7l"></div>
        <div class="item-sm high8l"></div>

        <div class="item-sm mid1l"></div>
        <div class="item-sm mid2l"></div>
        <div class="item-sm mid3l"></div>
        <div class="item-sm mid4l"></div>
        <div class="item-sm mid5l"></div>
        <div class="item-sm mid6l"></div>
        <div class="item-sm mid7l"></div>
        <div class="item-sm mid8l"></div>

        <div class="item-sm low1l"></div>
        <div class="item-sm low2l"></div>
        <div class="item-sm low3l"></div>
        <div class="item-sm low4l"></div>
        <div class="item-sm low5l"></div>
        <div class="item-sm low6l"></div>
        <div class="item-sm low7l"></div>
        <div class="item-sm low8l"></div>

        <div class="ship-image">
            <a href="/ship/{{ $shipType->typeID ?? 670 }}/" rel="tooltip" title="{{ $shipType->typeName }}">
                <img src="https://images.evetech.net/types/{{ $shipType->typeID ?? 670 }}/render?size=512" class="eveimage img-rounded" alt="{{ $shipType->typeName }}">

            </a>
        </div>
        {{ $slot ?? '' }}
    </div>
</div>
