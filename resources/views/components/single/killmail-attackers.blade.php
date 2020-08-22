
@props(['attackers'])

<div id="details">
    <div class="mb-2">
        <div class="final-blow special-attacker mb-2">
            <h4 class="tbl-title">Final Blow</h4>
            <x-single.killmail-attacker-table>
                <x-single.killmail-attacker-row />
            </x-single.killmail-attacker-table>
        </div>

        <div class="top-damage special-attacker">
            <h4 class="tbl-title">Top Damage</h4>
            <x-single.killmail-attacker-table>
                <x-single.killmail-attacker-row />
            </x-single.killmail-attacker-table>
        </div>
    </div>
    <hr>
    <div>
        <div class="all-attackers">
            <h4 class="tbl-title">%d Involved</h4>
            <div class="table-scroll" style="max-height: 450px;">
                <x-single.killmail-attacker-table>
                    @for ($i = 0; $i < 50; $i++)
                    <x-single.killmail-attacker-row />
                    @endfor
                </x-single.killmail-attacker-table>
            </div>
        </div>
    </div>
    <div style="margin: 0px;">
        <div class="accordion well well-small" id="invAll">
            <div class="accordion-group">
                <div class="accordion-heading">
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#invAll" href="#listInvAll">
                        <div class="centered">Involved Alliances / Corporations <span class="glyphicon glyphicon-resize-vertical"></span></div>
                    </a>
                </div>
                <div id="listInvAll" class="accordion-body collapse out">
                    <div class="accordion-inner">
                        <h3>Involved <small>Alliance(s) / Corp(s)</small></h3>
                        <table class="table table-condensed table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        <a href="/alliance/99005338/">Pandemic Horde</a>
                                    </th>
                                    <th style="text-align: right;">283</th>
                                </tr>
                                <tr>
                                    <td>— <a href="/corporation/98558506/">A Blessed Bean</a>
                                    </td>
                                    <td style="text-align: right;">70</td>
                                </tr>
                                <tr>
                                    <td>— <a href="/corporation/98388312/">Pandemic Horde Inc.</a>
                                    </td>
                                    <td style="text-align: right;">64</td>
                                </tr>
                                <tr>
                                    <td>— <a href="/corporation/98496411/">WipeOut Inc.</a>
                                    </td>
                                    <td style="text-align: right;">17</td>
                                </tr>
                                <tr>
                                    <td>— <a href="/corporation/98477766/">Horde Vanguard.</a>
                                    </td>
                                    <td style="text-align: right;">14</td>
                                </tr>
                                <tr>
                                    <td>— <a href="/corporation/98628015/">Hollow United Garuda</a>
                                    </td>
                                    <td style="text-align: right;">11</td>
                                </tr>
                                <tr>
                                    <td>— <a href="/corporation/98582593/">Circle-0f-Two</a>
                                    </td>
                                    <td style="text-align: right;">10</td>
                                </tr>
                                <tr>
                                    <td>— <a href="/corporation/98585844/">Infinite Improbable Industry Inc</a>
                                    </td>
                                    <td style="text-align: right;">9</td>
                                </tr>
                                <tr>
                                    <td>— <a href="/corporation/98437227/">Banished Braindead Zombies</a>
                                    </td>
                                    <td style="text-align: right;">7</td>
                                </tr>
                                <tr>
                                    <td>— <a href="/corporation/98410772/">Beyond Frontier</a>
                                    </td>
                                    <td style="text-align: right;">7</td>
                                </tr>
                                <tr>
                                    <td>— <a href="/corporation/98148549/">Capital Fusion.</a>
                                    </td>
                                    <td style="text-align: right;">7</td>
                                </tr>
                                <tr>
                                    <td>— <a href="/corporation/98480050/">Fancypants Inc</a>
                                    </td>
                                    <td style="text-align: right;">6</td>
                                </tr>
                                <tr>
                                    <td>— <a href="/corporation/98599557/">Horde Armada</a>
                                    </td>
                                    <td style="text-align: right;">6</td>
                                </tr>
                                <tr>
                                    <td>— <a href="/corporation/1001562011/">Sturmgrenadier Inc</a>
                                    </td>
                                    <td style="text-align: right;">6</td>
                                </tr>
                                <tr>
                                    <td>— <a href="/corporation/2014367342/">Blackwater USA Inc.</a>
                                    </td>
                                    <td style="text-align: right;">5</td>
                                </tr>
                                <tr>
                                    <td>— <a href="/corporation/98110767/">Lisnave</a>
                                    </td>
                                    <td style="text-align: right;">5</td>
                                </tr>
                                <tr>
                                    <td>— <a href="/corporation/98653307/">No Prop</a>
                                    </td>
                                    <td style="text-align: right;">5</td>
                                </tr>
                                <tr>
                                    <td>— <a href="/corporation/98597291/">Bunny N Beer</a>
                                    </td>
                                    <td style="text-align: right;">4</td>
                                </tr>
                                <tr>
                                    <td>— <a href="/corporation/98083089/">Redhogs</a>
                                    </td>
                                    <td style="text-align: right;">4</td>
                                </tr>
                                <tr>
                                    <td>— <a href="/corporation/98609309/">Arctic Guard</a>
                                    </td>
                                    <td style="text-align: right;">3</td>
                                </tr>
                                <tr>
                                    <td>— <a href="/corporation/98118130/">Silver Guardians</a>
                                    </td>
                                    <td style="text-align: right;">3</td>
                                </tr>
                                <tr>
                                    <td>— <a href="/corporation/98618399/">Yamanus</a>
                                    </td>
                                    <td style="text-align: right;">3</td>
                                </tr>
                                <tr>
                                    <td>— <a href="/corporation/98605852/">Arctic Beans</a>
                                    </td>
                                    <td style="text-align: right;">2</td>
                                </tr>
                                <tr>
                                    <td>— <a href="/corporation/98097817/">Concordiat</a>
                                    </td>
                                    <td style="text-align: right;">2</td>
                                </tr>
                                <tr>
                                    <td>— <a href="/corporation/98643246/">GOD LOVE 499</a>
                                    </td>
                                    <td style="text-align: right;">2</td>
                                </tr>
                                <tr>
                                    <td>— <a href="/corporation/98333500/">Pandemic Lizards.</a>
                                    </td>
                                    <td style="text-align: right;">2</td>
                                </tr>
                                <tr>
                                    <td>— <a href="/corporation/98180098/">Special Assault Unit</a>
                                    </td>
                                    <td style="text-align: right;">2</td>
                                </tr>
                                <tr>
                                    <td>— <a href="/corporation/1902054535/">Victim Support</a>
                                    </td>
                                    <td style="text-align: right;">2</td>
                                </tr>
                                <tr>
                                    <td>— <a href="/corporation/98575255/">Dragon.</a>
                                    </td>
                                    <td style="text-align: right;">1</td>
                                </tr>
                                <tr>
                                    <td>— <a href="/corporation/98377568/">Knavish Knight Kingdom</a>
                                    </td>
                                    <td style="text-align: right;">1</td>
                                </tr>
                                <tr>
                                    <td>— <a href="/corporation/98393722/">Marquie-X.</a>
                                    </td>
                                    <td style="text-align: right;">1</td>
                                </tr>
                                <tr>
                                    <td>— <a href="/corporation/144765676/">MASS</a>
                                    </td>
                                    <td style="text-align: right;">1</td>
                                </tr>
                                <tr>
                                    <td>— <a href="/corporation/98633462/">Taipan's Fury</a>
                                    </td>
                                    <td style="text-align: right;">1</td>
                                </tr>
                                <tr>
                                    <th>
                                        <a href="/alliance/1727758877/">Northern Coalition.</a>
                                    </th>
                                    <th style="text-align: right;">167</th>
                                </tr>
                                <tr>
                                    <td>— <a href="/corporation/98583428/">Blank-Space</a>
                                    </td>
                                    <td style="text-align: right;">21</td>
                                </tr>
                                <tr>
                                    <td>— <a href="/corporation/402487260/">FinFleet</a>
                                    </td>
                                    <td style="text-align: right;">16</td>
                                </tr>
                                <tr>
                                    <td>— <a href="/corporation/98335809/">The Northerners</a>
                                    </td>
                                    <td style="text-align: right;">15</td>
                                </tr>
                                <tr>
                                    <td>— <a href="/corporation/323998201/">Militaris Industries</a>
                                    </td>
                                    <td style="text-align: right;">13</td>
                                </tr>
                                <tr>
                                    <td>— <a href="/corporation/544199803/">Macabre Votum</a>
                                    </td>
                                    <td style="text-align: right;">9</td>
                                </tr>
                                <tr>
                                    <td>— <a href="/corporation/1402464745/">THORN Syndicate</a>
                                    </td>
                                    <td style="text-align: right;">9</td>
                                </tr>
                                <tr>
                                    <td>— <a href="/corporation/935907718/">Destructive Influence</a>
                                    </td>
                                    <td style="text-align: right;">8</td>
                                </tr>
                                <tr>
                                    <td>— <a href="/corporation/98418172/">Rabble Inc.</a>
                                    </td>
                                    <td style="text-align: right;">8</td>
                                </tr>
                                <tr>
                                    <td>— <a href="/corporation/739403251/">Shiva</a>
                                    </td>
                                    <td style="text-align: right;">8</td>
                                </tr>
                                <tr>
                                    <td>— <a href="/corporation/98561880/">Toxic Squadron</a>
                                    </td>
                                    <td style="text-align: right;">7</td>
                                </tr>
                                <tr>
                                    <td>— <a href="/corporation/148763686/">Liga Freier Terraner</a>
                                    </td>
                                    <td style="text-align: right;">6</td>
                                </tr>
                                <tr>
                                    <td>— <a href="/corporation/1854679820/">BENEVOLENC3</a>
                                    </td>
                                    <td style="text-align: right;">5</td>
                                </tr>
                                <tr>
                                    <td>— <a href="/corporation/98375902/">Original Sinners</a>
                                    </td>
                                    <td style="text-align: right;">5</td>
                                </tr>
                                <tr>
                                    <td>— <a href="/corporation/98569969/">Running with Wolves</a>
                                    </td>
                                    <td style="text-align: right;">5</td>
                                </tr>
                                <tr>
                                    <td>— <a href="/corporation/98486133/">SQUAD V</a>
                                    </td>
                                    <td style="text-align: right;">5</td>
                                </tr>
                                <tr>
                                    <td>— <a href="/corporation/155453528/">Das zweite Konglomerat</a>
                                    </td>
                                    <td style="text-align: right;">4</td>
                                </tr>
                                <tr>
                                    <td>— <a href="/corporation/98058224/">RED GUARD.inc</a>
                                    </td>
                                    <td style="text-align: right;">4</td>
                                </tr>
                                <tr>
                                    <td>— <a href="/corporation/1056867436/">Super Villains</a>
                                    </td>
                                    <td style="text-align: right;">4</td>
                                </tr>
                                <tr>
                                    <td>— <a href="/corporation/1282059165/">Van Diemen's Demise</a>
                                    </td>
                                    <td style="text-align: right;">4</td>
                                </tr>
                                <tr>
                                    <td>— <a href="/corporation/98243034/">Remember The Fallen.</a>
                                    </td>
                                    <td style="text-align: right;">3</td>
                                </tr>
                                <tr>
                                    <td>— <a href="/corporation/424525976/">Criterion.</a>
                                    </td>
                                    <td style="text-align: right;">2</td>
                                </tr>
                                <tr>
                                    <td>— <a href="/corporation/144749962/">Evolution</a>
                                    </td>
                                    <td style="text-align: right;">2</td>
                                </tr>
                                <tr>
                                    <td>— <a href="/corporation/1275978870/">SUPERNOVA SOCIETY</a>
                                    </td>
                                    <td style="text-align: right;">2</td>
                                </tr>
                                <tr>
                                    <td>— <a href="/corporation/98389944/">Tai-Chi</a>
                                    </td>
                                    <td style="text-align: right;">2</td>
                                </tr>
                                <tr>
                                    <th>
                                        <a href="/alliance/386292982/">Pandemic Legion</a>
                                    </th>
                                    <th style="text-align: right;">56</th>
                                </tr>
                                <tr>
                                    <td>— <a href="/corporation/828800677/">Sniggerdly</a>
                                    </td>
                                    <td style="text-align: right;">24</td>
                                </tr>
                                <tr>
                                    <td>— <a href="/corporation/98536621/">Kill Mail Delivery</a>
                                    </td>
                                    <td style="text-align: right;">7</td>
                                </tr>
                                <tr>
                                    <td>— <a href="/corporation/1089040789/">Coreli Corporation</a>
                                    </td>
                                    <td style="text-align: right;">5</td>
                                </tr>
                                <tr>
                                    <td>— <a href="/corporation/98569755/">Lucidus Ordo</a>
                                    </td>
                                    <td style="text-align: right;">5</td>
                                </tr>
                                <tr>
                                    <td>— <a href="/corporation/1941177176/">Habitual Euthanasia</a>
                                    </td>
                                    <td style="text-align: right;">4</td>
                                </tr>
                                <tr>
                                    <td>— <a href="/corporation/98254901/">Collapsed Out</a>
                                    </td>
                                    <td style="text-align: right;">3</td>
                                </tr>
                                <tr>
                                    <td>— <a href="/corporation/144833788/">Roving Guns Inc.</a>
                                    </td>
                                    <td style="text-align: right;">3</td>
                                </tr>
                                <tr>
                                    <td>— <a href="/corporation/98481691/">Girls Lie But Zkill Doesn't</a>
                                    </td>
                                    <td style="text-align: right;">2</td>
                                </tr>
                                <tr>
                                    <td>— <a href="/corporation/425883056/">Hoover Inc.</a>
                                    </td>
                                    <td style="text-align: right;">2</td>
                                </tr>
                                <tr>
                                    <td>— <a href="/corporation/98521924/">Lethal Injection Inc.</a>
                                    </td>
                                    <td style="text-align: right;">1</td>
                                </tr>
                                <tr>
                                    <th>
                                        <a href="/alliance/99003581/">Fraternity.</a>
                                    </th>
                                    <th style="text-align: right;">38</th>
                                </tr>
                                <tr>
                                    <td>— <a href="/corporation/98641682/">Into Oblivion.</a>
                                    </td>
                                    <td style="text-align: right;">3</td>
                                </tr>
                                <tr>
                                    <td>— <a href="/corporation/98522122/">Operation Grayskull</a>
                                    </td>
                                    <td style="text-align: right;">3</td>
                                </tr>
                                <tr>
                                    <td>— <a href="/corporation/98599181/">Attack On CALDARI</a>
                                    </td>
                                    <td style="text-align: right;">2</td>
                                </tr>
                                <tr>
                                    <td>— <a href="/corporation/98227378/">Comply Or Die</a>
                                    </td>
                                    <td style="text-align: right;">2</td>
                                </tr>
                                <tr>
                                    <td>— <a href="/corporation/98285865/">Jian Sheng</a>
                                    </td>
                                    <td style="text-align: right;">2</td>
                                </tr>
                                <tr>
                                    <td>— <a href="/corporation/98291463/">Para Bellum INC</a>
                                    </td>
                                    <td style="text-align: right;">2</td>
                                </tr>
                                <tr>
                                    <td>— <a href="/corporation/98479723/">ScrewDrivers s.a de c.v</a>
                                    </td>
                                    <td style="text-align: right;">2</td>
                                </tr>
                                <tr>
                                    <td>— <a href="/corporation/98108175/">Thunders Claw Fleet</a>
                                    </td>
                                    <td style="text-align: right;">2</td>
                                </tr>
                                <tr>
                                    <td>— <a href="/corporation/98588384/">YeLuo-XingHai</a>
                                    </td>
                                    <td style="text-align: right;">2</td>
                                </tr>
                                <tr>
                                    <td>— <a href="/corporation/98542815/">Beng beng Begn</a>
                                    </td>
                                    <td style="text-align: right;">1</td>
                                </tr>
                                <tr>
                                    <td>— <a href="/corporation/98309816/">Bueno Excellente.</a>
                                    </td>
                                    <td style="text-align: right;">1</td>
                                </tr>
                                <tr>
                                    <td>— <a href="/corporation/98524084/">Chi Gua</a>
                                    </td>
                                    <td style="text-align: right;">1</td>
                                </tr>
                                <tr>
                                    <td>— <a href="/corporation/98535868/">ChuangShi</a>
                                    </td>
                                    <td style="text-align: right;">1</td>
                                </tr>
                                <tr>
                                    <td>— <a href="/corporation/98538918/">Foredawn Business Corporation</a>
                                    </td>
                                    <td style="text-align: right;">1</td>
                                </tr>
                                <tr>
                                    <td>— <a href="/corporation/98537981/">Galactic Empire Co LTD</a>
                                    </td>
                                    <td style="text-align: right;">1</td>
                                </tr>
                                <tr>
                                    <td>— <a href="/corporation/98614214/">Gaze into the Abyss</a>
                                    </td>
                                    <td style="text-align: right;">1</td>
                                </tr>
                                <tr>
                                    <td>— <a href="/corporation/98622034/">Happy Game Club</a>
                                    </td>
                                    <td style="text-align: right;">1</td>
                                </tr>
                                <tr>
                                    <td>— <a href="/corporation/98585972/">Inverse Entropy Fleet</a>
                                    </td>
                                    <td style="text-align: right;">1</td>
                                </tr>
                                <tr>
                                    <td>— <a href="/corporation/98498703/">Kiosk Cartel</a>
                                    </td>
                                    <td style="text-align: right;">1</td>
                                </tr>
                                <tr>
                                    <td>— <a href="/corporation/98521871/">Mineclub</a>
                                    </td>
                                    <td style="text-align: right;">1</td>
                                </tr>
                                <tr>
                                    <td>— <a href="/corporation/98532838/">Nuclear Explosion Fleet</a>
                                    </td>
                                    <td style="text-align: right;">1</td>
                                </tr>
                                <tr>
                                    <td>— <a href="/corporation/98540583/">Special law enforcement department</a>
                                    </td>
                                    <td style="text-align: right;">1</td>
                                </tr>
                                <tr>
                                    <td>— <a href="/corporation/98550682/">Stardust-Guardian</a>
                                    </td>
                                    <td style="text-align: right;">1</td>
                                </tr>
                                <tr>
                                    <td>— <a href="/corporation/98538099/">Starry Sky Fleet</a>
                                    </td>
                                    <td style="text-align: right;">1</td>
                                </tr>
                                <tr>
                                    <td>— <a href="/corporation/98575120/">Sylvanas Windrunner United Fleet</a>
                                    </td>
                                    <td style="text-align: right;">1</td>
                                </tr>
                                <tr>
                                    <td>— <a href="/corporation/98416288/">The Looney Bin</a>
                                    </td>
                                    <td style="text-align: right;">1</td>
                                </tr>
                                <tr>
                                    <td>— <a href="/corporation/98582540/">ZephyrFalcon</a>
                                    </td>
                                    <td style="text-align: right;">1</td>
                                </tr>
                                <tr>
                                    <th>
                                        <a href="/alliance/99009289/">Reckless Contingency.</a>
                                    </th>
                                    <th style="text-align: right;">19</th>
                                </tr>
                                <tr>
                                    <td>— <a href="/corporation/98629499/">Akavhi Guard</a>
                                    </td>
                                    <td style="text-align: right;">6</td>
                                </tr>
                                <tr>
                                    <td>— <a href="/corporation/532148499/">BlackWatch Industrial Group</a>
                                    </td>
                                    <td style="text-align: right;">4</td>
                                </tr>
                                <tr>
                                    <td>— <a href="/corporation/98481789/">Colonial Industries</a>
                                    </td>
                                    <td style="text-align: right;">4</td>
                                </tr>
                                <tr>
                                    <td>— <a href="/corporation/98566768/">Arbora Nova</a>
                                    </td>
                                    <td style="text-align: right;">3</td>
                                </tr>
                                <tr>
                                    <td>— <a href="/corporation/98605451/">Skilldefizit</a>
                                    </td>
                                    <td style="text-align: right;">2</td>
                                </tr>
                                <tr>
                                    <th>
                                        <a href="/alliance/99006343/">Lord of Worlds Alliance</a>
                                    </th>
                                    <th style="text-align: right;">14</th>
                                </tr>
                                <tr>
                                    <td>— <a href="/corporation/98555959/">TOCAIA</a>
                                    </td>
                                    <td style="text-align: right;">3</td>
                                </tr>
                                <tr>
                                    <td>— <a href="/corporation/98479815/">Cruisers Crew</a>
                                    </td>
                                    <td style="text-align: right;">2</td>
                                </tr>
                                <tr>
                                    <td>— <a href="/corporation/98470244/">P A I R A D I C E</a>
                                    </td>
                                    <td style="text-align: right;">2</td>
                                </tr>
                                <tr>
                                    <td>— <a href="/corporation/98498947/">Star-Tech Industries</a>
                                    </td>
                                    <td style="text-align: right;">2</td>
                                </tr>
                                <tr>
                                    <td>— <a href="/corporation/98333748/">10 Hammers Black Ops Division</a>
                                    </td>
                                    <td style="text-align: right;">1</td>
                                </tr>
                                <tr>
                                    <td>— <a href="/corporation/98325665/">Divine Angels</a>
                                    </td>
                                    <td style="text-align: right;">1</td>
                                </tr>
                                <tr>
                                    <td>— <a href="/corporation/98565780/">GPP Corp</a>
                                    </td>
                                    <td style="text-align: right;">1</td>
                                </tr>
                                <tr>
                                    <td>— <a href="/corporation/98310216/">Mass HaVoK</a>
                                    </td>
                                    <td style="text-align: right;">1</td>
                                </tr>
                                <tr>
                                    <td>— <a href="/corporation/98522960/">You're Dead Fool</a>
                                    </td>
                                    <td style="text-align: right;">1</td>
                                </tr>
                                <tr>
                                    <th>
                                        <a href="/alliance/707482380/">Destiny's Call</a>
                                    </th>
                                    <th style="text-align: right;">13</th>
                                </tr>
                                <tr>
                                    <td>— <a href="/corporation/98101331/">Industrial Networking Community</a>
                                    </td>
                                    <td style="text-align: right;">3</td>
                                </tr>
                                <tr>
                                    <td>— <a href="/corporation/98496173/">Sternenflotte Kallahari Corp</a>
                                    </td>
                                    <td style="text-align: right;">3</td>
                                </tr>
                                <tr>
                                    <td>— <a href="/corporation/98165469/">Hammerwerke</a>
                                    </td>
                                    <td style="text-align: right;">2</td>
                                </tr>
                                <tr>
                                    <td>— <a href="/corporation/98270312/">Men of Business Ltd.</a>
                                    </td>
                                    <td style="text-align: right;">2</td>
                                </tr>
                                <tr>
                                    <td>— <a href="/corporation/1119499077/">Cha Ching LtD</a>
                                    </td>
                                    <td style="text-align: right;">1</td>
                                </tr>
                                <tr>
                                    <td>— <a href="/corporation/2036478771/">Ocean Eleven</a>
                                    </td>
                                    <td style="text-align: right;">1</td>
                                </tr>
                                <tr>
                                    <td>— <a href="/corporation/1485403148/">The Confederation of Eves good Knights</a>
                                    </td>
                                    <td style="text-align: right;">1</td>
                                </tr>
                                <tr>
                                    <th>
                                        <a href="/alliance/99005393/">Blades of Grass</a>
                                    </th>
                                    <th style="text-align: right;">10</th>
                                </tr>
                                <tr>
                                    <td>— <a href="/corporation/709221692/">Blueprint Haus</a>
                                    </td>
                                    <td style="text-align: right;">6</td>
                                </tr>
                                <tr>
                                    <td>— <a href="/corporation/98434943/">Zap Blap Mining Co.</a>
                                    </td>
                                    <td style="text-align: right;">2</td>
                                </tr>
                                <tr>
                                    <td>— <a href="/corporation/1062381405/">Alea Iacta Est Universal</a>
                                    </td>
                                    <td style="text-align: right;">1</td>
                                </tr>
                                <tr>
                                    <td>— <a href="/corporation/661878887/">Canadian Forces Corp</a>
                                    </td>
                                    <td style="text-align: right;">1</td>
                                </tr>
                                <tr>
                                    <th>
                                        <a href="/alliance/99008278/">Literally Triggered</a>
                                    </th>
                                    <th style="text-align: right;">10</th>
                                </tr>
                                <tr>
                                    <td>— <a href="/corporation/98632357/">Imperium Cartel.</a>
                                    </td>
                                    <td style="text-align: right;">7</td>
                                </tr>
                                <tr>
                                    <td>— <a href="/corporation/98512118/">Suddenly Spaceless</a>
                                    </td>
                                    <td style="text-align: right;">2</td>
                                </tr>
                                <tr>
                                    <td>— <a href="/corporation/98133337/">Evil Space Goblins</a>
                                    </td>
                                    <td style="text-align: right;">1</td>
                                </tr>
                                <tr>
                                    <th>
                                        <a href="/alliance/99001969/">SONS of BANE</a>
                                    </th>
                                    <th style="text-align: right;">7</th>
                                </tr>
                                <tr>
                                    <td>— <a href="/corporation/98025417/">Exotic Dancers Union</a>
                                    </td>
                                    <td style="text-align: right;">2</td>
                                </tr>
                                <tr>
                                    <td>— <a href="/corporation/98595918/">Siren's Call.</a>
                                    </td>
                                    <td style="text-align: right;">2</td>
                                </tr>
                                <tr>
                                    <td>— <a href="/corporation/98568703/">Nullsec Stunner's</a>
                                    </td>
                                    <td style="text-align: right;">1</td>
                                </tr>
                                <tr>
                                    <td>— <a href="/corporation/98608783/">The Lords of The Underground</a>
                                    </td>
                                    <td style="text-align: right;">1</td>
                                </tr>
                                <tr>
                                    <td>— <a href="/corporation/144832822/">TOHA Heavy Industries</a>
                                    </td>
                                    <td style="text-align: right;">1</td>
                                </tr>
                                <tr>
                                    <th>
                                        <a href="/alliance/99003006/">Brothers of Tangra</a>
                                    </th>
                                    <th style="text-align: right;">6</th>
                                </tr>
                                <tr>
                                    <td>— <a href="/corporation/98018841/">30O.</a>
                                    </td>
                                    <td style="text-align: right;">6</td>
                                </tr>
                                <tr>
                                    <th>
                                        <a href="/alliance/1042504553/">Solyaris Chtonium</a>
                                    </th>
                                    <th style="text-align: right;">6</th>
                                </tr>
                                <tr>
                                    <td>— <a href="/corporation/98293349/">Alpha Republic - Transcenders of Space and Time</a>
                                    </td>
                                    <td style="text-align: right;">2</td>
                                </tr>
                                <tr>
                                    <td>— <a href="/corporation/2043331849/">Evermore Warriors</a>
                                    </td>
                                    <td style="text-align: right;">2</td>
                                </tr>
                                <tr>
                                    <td>— <a href="/corporation/98569633/">Arsenico</a>
                                    </td>
                                    <td style="text-align: right;">1</td>
                                </tr>
                                <tr>
                                    <td>— <a href="/corporation/98311406/">The Exchange Collective</a>
                                    </td>
                                    <td style="text-align: right;">1</td>
                                </tr>
                                <tr>
                                    <th>
                                        <a href="/alliance/498125261/">Test Alliance Please Ignore</a>
                                    </th>
                                    <th style="text-align: right;">6</th>
                                </tr>
                                <tr>
                                    <td>— <a href="/corporation/98087081/">Tr0pa de elite.</a>
                                    </td>
                                    <td style="text-align: right;">2</td>
                                </tr>
                                <tr>
                                    <td>— <a href="/corporation/1018389948/">Dreddit</a>
                                    </td>
                                    <td style="text-align: right;">1</td>
                                </tr>
                                <tr>
                                    <td>— <a href="/corporation/98491871/">Incognito Mode</a>
                                    </td>
                                    <td style="text-align: right;">1</td>
                                </tr>
                                <tr>
                                    <td>— <a href="/corporation/98420562/">Moosearmy</a>
                                    </td>
                                    <td style="text-align: right;">1</td>
                                </tr>
                                <tr>
                                    <td>— <a href="/corporation/98480565/">Spartan Vanguard</a>
                                    </td>
                                    <td style="text-align: right;">1</td>
                                </tr>
                                <tr>
                                    <th>
                                        <a href="/alliance/99002003/">No Value</a>
                                    </th>
                                    <th style="text-align: right;">4</th>
                                </tr>
                                <tr>
                                    <td>— <a href="/corporation/98608364/">Golden Dragons Corporation</a>
                                    </td>
                                    <td style="text-align: right;">2</td>
                                </tr>
                                <tr>
                                    <td>— <a href="/corporation/1719660426/">NeoCorteX Industry</a>
                                    </td>
                                    <td style="text-align: right;">1</td>
                                </tr>
                                <tr>
                                    <td>— <a href="/corporation/98306027/">SpaceFire Holding</a>
                                    </td>
                                    <td style="text-align: right;">1</td>
                                </tr>
                                <tr>
                                    <th>
                                        None
                                    </th>
                                    <th style="text-align: right;">3</th>
                                </tr>
                                <tr>
                                    <td>— <a href="/corporation/98587350/">4338 Year</a>
                                    </td>
                                    <td style="text-align: right;">1</td>
                                </tr>
                                <tr>
                                    <td>— <a href="/corporation/1000009/">Caldari Provisions</a>
                                    </td>
                                    <td style="text-align: right;">1</td>
                                </tr>
                                <tr>
                                    <td>— <a href="/corporation/98369160/">Serp i Mordor</a>
                                    </td>
                                    <td style="text-align: right;">1</td>
                                </tr>
                                <tr>
                                    <th>
                                        <a href="/alliance/99001954/">Caladrius Alliance</a>
                                    </th>
                                    <th style="text-align: right;">2</th>
                                </tr>
                                <tr>
                                    <td>— <a href="/corporation/98055960/">SAKUMA DROP</a>
                                    </td>
                                    <td style="text-align: right;">2</td>
                                </tr>
                                <tr>
                                    <th>
                                        <a href="/alliance/99008469/">UNREAL Alliance</a>
                                    </th>
                                    <th style="text-align: right;">2</th>
                                </tr>
                                <tr>
                                    <td>— <a href="/corporation/98615321/">THE ELECTRIC STATE</a>
                                    </td>
                                    <td style="text-align: right;">2</td>
                                </tr>
                                <tr>
                                    <th>
                                        <a href="/alliance/99008301/">Beanstalk Inc.</a>
                                    </th>
                                    <th style="text-align: right;">1</th>
                                </tr>
                                <tr>
                                    <td>— <a href="/corporation/98634472/">New Eden Capsuleer College</a>
                                    </td>
                                    <td style="text-align: right;">1</td>
                                </tr>
                                <tr>
                                    <th>
                                        <a href="/alliance/99003214/">Brave Collective</a>
                                    </th>
                                    <th style="text-align: right;">1</th>
                                </tr>
                                <tr>
                                    <td>— <a href="/corporation/98169165/">Brave Newbies Inc.</a>
                                    </td>
                                    <td style="text-align: right;">1</td>
                                </tr>
                                <tr>
                                    <th>
                                        <a href="/alliance/99009919/">Dreadbomb.</a>
                                    </th>
                                    <th style="text-align: right;">1</th>
                                </tr>
                                <tr>
                                    <td>— <a href="/corporation/561395926/">The Suicide Kings</a>
                                    </td>
                                    <td style="text-align: right;">1</td>
                                </tr>
                                <tr>
                                    <th>
                                        <a href="/alliance/99007252/">The Ancients.</a>
                                    </th>
                                    <th style="text-align: right;">1</th>
                                </tr>
                                <tr>
                                    <td>— <a href="/corporation/98580857/">Whiskers of Doom.</a>
                                    </td>
                                    <td style="text-align: right;">1</td>
                                </tr>
                                <tr>
                                    <th>
                                        <a href="/alliance/99009716/">The Commonwealth.</a>
                                    </th>
                                    <th style="text-align: right;">1</th>
                                </tr>
                                <tr>
                                    <td>— <a href="/corporation/98626918/">Orbital Wreckoning</a>
                                    </td>
                                    <td style="text-align: right;">1</td>
                                </tr>
                                <tr>
                                    <th>
                                        <a href="/alliance/99010099/">Trailer Park Illuminati</a>
                                    </th>
                                    <th style="text-align: right;">1</th>
                                </tr>
                                <tr>
                                    <td>— <a href="/corporation/98638003/">Shadow Legions.</a>
                                    </td>
                                    <td style="text-align: right;">1</td>
                                </tr>
                                <tr>
                                    <th>
                                        <a href="/alliance/99009310/">VENI VIDI VICI.</a>
                                    </th>
                                    <th style="text-align: right;">1</th>
                                </tr>
                                <tr>
                                    <td>— <a href="/corporation/98609265/">Death'sEnd</a>
                                    </td>
                                    <td style="text-align: right;">1</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
