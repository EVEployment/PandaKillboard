<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App{
/**
 * App\Alliance
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $name
 * @property string $ticker
 * @property bool $closed
 * @method static \Illuminate\Database\Eloquent\Builder|Alliance newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Alliance newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Alliance query()
 * @method static \Illuminate\Database\Eloquent\Builder|Alliance whereClosed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Alliance whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Alliance whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Alliance whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Alliance whereTicker($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Alliance whereUpdatedAt($value)
 */
	class Alliance extends \Eloquent {}
}

namespace App{
/**
 * App\Character
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $name
 * @property int $corporation_id
 * @property int|null $alliance_id
 * @property int|null $faction_id
 * @property bool $npc
 * @method static \Illuminate\Database\Eloquent\Builder|Character newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Character newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Character query()
 * @method static \Illuminate\Database\Eloquent\Builder|Character whereAllianceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Character whereCorporationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Character whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Character whereFactionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Character whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Character whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Character whereNpc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Character whereUpdatedAt($value)
 */
	class Character extends \Eloquent {}
}

namespace App{
/**
 * App\Corporation
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $name
 * @property string $ticker
 * @property bool $closed
 * @property bool $npc
 * @property int|null $alliance_id
 * @method static \Illuminate\Database\Eloquent\Builder|Corporation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Corporation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Corporation query()
 * @method static \Illuminate\Database\Eloquent\Builder|Corporation whereAllianceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Corporation whereClosed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Corporation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Corporation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Corporation whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Corporation whereNpc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Corporation whereTicker($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Corporation whereUpdatedAt($value)
 */
	class Corporation extends \Eloquent {}
}

namespace App{
/**
 * Class InvGroup.
 *
 * @package App
 * @property int $groupID
 * @property int|null $categoryID
 * @property string|null $groupName
 * @property int|null $iconID
 * @property bool|null $useBasePrice
 * @property bool|null $anchored
 * @property bool|null $anchorable
 * @property bool|null $fittableNonSingleton
 * @property bool|null $published
 * @method static \Illuminate\Database\Eloquent\Builder|InvGroup newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|InvGroup newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|InvGroup query()
 * @method static \Illuminate\Database\Eloquent\Builder|InvGroup whereAnchorable($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InvGroup whereAnchored($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InvGroup whereCategoryID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InvGroup whereFittableNonSingleton($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InvGroup whereGroupID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InvGroup whereGroupName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InvGroup whereIconID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InvGroup wherePublished($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InvGroup whereUseBasePrice($value)
 */
	class InvGroup extends \Eloquent {}
}

namespace App{
/**
 * Class InvType.
 *
 * @package App
 * @OA\Schema (
 *     description="Inventory Type",
 *     title="InvType",
 *     type="object"
 * )
 * @OA\Property (
 *     type="integer",
 *     minimum=1,
 *     property="typeID",
 *     description="The inventory type ID"
 * )
 * @OA\Property (
 *     type="integer",
 *     minimum=1,
 *     property="groupID",
 *     description="The group to which the type is related"
 * )
 * @OA\Property (
 *     type="string",
 *     property="typeName",
 *     description="The inventory type name"
 * )
 * @OA\Property (
 *     type="string",
 *     property="description",
 *     description="The inventory type description"
 * )
 * @OA\Property (
 *     type="number",
 *     format="double",
 *     property="mass",
 *     description="The inventory type mass"
 * )
 * @OA\Property (
 *     type="number",
 *     format="double",
 *     property="volume",
 *     description="The inventory type volume"
 * )
 * @OA\Property (
 *     type="number",
 *     format="double",
 *     property="capacity",
 *     description="The inventory type storage capacity"
 * )
 * @OA\Property (
 *     type="integer",
 *     property="portionSize"
 * )
 * @OA\Property (
 *     type="integer",
 *     property="raceID",
 *     description="The race to which the inventory type is tied"
 * )
 * @OA\Property (
 *     type="number",
 *     format="double",
 *     property="basePrice",
 *     description="The initial price used by NPC to create order"
 * )
 * @OA\Property (
 *     type="boolean",
 *     property="published",
 *     description="True if the item is available in-game"
 * )
 * @OA\Property (
 *     type="integer",
 *     property="marketGroupID",
 *     description="The group into which the item is available on market"
 * )
 * @OA\Property (
 *     type="integer",
 *     property="iconID"
 * )
 * @OA\Property (
 *     type="integer",
 *     property="soundID"
 * )
 * @OA\Property (
 *     type="integer",
 *     property="graphicID"
 * )
 * @property int $typeID
 * @property int|null $groupID
 * @property string|null $typeName
 * @property string|null $description
 * @property float|null $mass
 * @property float|null $volume
 * @property float|null $capacity
 * @property int|null $portionSize
 * @property int|null $raceID
 * @property string|null $basePrice
 * @property bool|null $published
 * @property int|null $marketGroupID
 * @property int|null $iconID
 * @property int|null $soundID
 * @property int|null $graphicID
 * @property-read \Illuminate\Database\Eloquent\Collection|InvType[] $components
 * @property-read int|null $components_count
 * @property-read \App\InvGroup|null $group
 * @property-read \Illuminate\Database\Eloquent\Collection|InvType[] $reactions
 * @property-read int|null $reactions_count
 * @method static \Illuminate\Database\Eloquent\Builder|InvType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|InvType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|InvType query()
 * @method static \Illuminate\Database\Eloquent\Builder|InvType whereBasePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InvType whereCapacity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InvType whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InvType whereGraphicID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InvType whereGroupID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InvType whereIconID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InvType whereMarketGroupID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InvType whereMass($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InvType wherePortionSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InvType wherePublished($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InvType whereRaceID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InvType whereSoundID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InvType whereTypeID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InvType whereTypeName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InvType whereVolume($value)
 */
	class InvType extends \Eloquent {}
}

namespace App{
/**
 * App\Killmail
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $hash
 * @property \Illuminate\Support\Carbon $time
 * @property int|null $moon_id
 * @property int $solar_system_id
 * @property int|null $war_id
 * @property float $position_x
 * @property float $position_y
 * @property float $position_z
 * @property int $nearest_celestial_id
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\KillmailAttacker[] $attacker
 * @property-read int|null $attacker_count
 * @property-read mixed $link
 * @property-read \App\MapDenormalize $nearest_celestial
 * @property-read \App\MapDenormalize $solar_system
 * @property-read \App\KillmailVictim|null $victim
 * @method static \Illuminate\Database\Eloquent\Builder|Killmail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Killmail newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Killmail query()
 * @method static \Illuminate\Database\Eloquent\Builder|Killmail whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Killmail whereHash($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Killmail whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Killmail whereMoonId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Killmail whereNearestCelestialId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Killmail wherePositionX($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Killmail wherePositionY($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Killmail wherePositionZ($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Killmail whereSolarSystemId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Killmail whereTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Killmail whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Killmail whereWarId($value)
 */
	class Killmail extends \Eloquent {}
}

namespace App{
/**
 * App\KillmailAttacker
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $killmail_id
 * @property int|null $alliance_id
 * @property \App\Corporation $corporation_id
 * @property int|null $character_id
 * @property int $damage_done
 * @property int|null $faction_id
 * @property bool $final_blow
 * @property string $security_status
 * @property int|null $ship_type_id
 * @property int|null $weapon_type_id
 * @property-read \App\Alliance|null $alliance
 * @property-read \App\Character|null $character
 * @property-read \App\Killmail $killmail
 * @property-read \App\InvType|null $ship_type
 * @property-read \App\InvType|null $weapon_type
 * @method static \Illuminate\Database\Eloquent\Builder|KillmailAttacker newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|KillmailAttacker newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|KillmailAttacker query()
 * @method static \Illuminate\Database\Eloquent\Builder|KillmailAttacker whereAllianceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|KillmailAttacker whereCharacterId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|KillmailAttacker whereCorporationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|KillmailAttacker whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|KillmailAttacker whereDamageDone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|KillmailAttacker whereFactionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|KillmailAttacker whereFinalBlow($value)
 * @method static \Illuminate\Database\Eloquent\Builder|KillmailAttacker whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|KillmailAttacker whereKillmailId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|KillmailAttacker whereSecurityStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|KillmailAttacker whereShipTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|KillmailAttacker whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|KillmailAttacker whereWeaponTypeId($value)
 */
	class KillmailAttacker extends \Eloquent {}
}

namespace App{
/**
 * App\KillmailItem
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $killmail_victim_id
 * @property int|null $container_id
 * @property int $flag
 * @property int $item_type_id
 * @property int $quantity_destroyed
 * @property int $quantity_dropped
 * @property int $singleton
 * @property-read KillmailItem|null $container
 * @property-read \App\InvType $item_type
 * @property-read \Illuminate\Database\Eloquent\Collection|KillmailItem[] $items
 * @property-read int|null $items_count
 * @property-read \App\KillmailVictim $killmail_victim
 * @method static \Illuminate\Database\Eloquent\Builder|KillmailItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|KillmailItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|KillmailItem query()
 * @method static \Illuminate\Database\Eloquent\Builder|KillmailItem whereContainerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|KillmailItem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|KillmailItem whereFlag($value)
 * @method static \Illuminate\Database\Eloquent\Builder|KillmailItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|KillmailItem whereItemTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|KillmailItem whereKillmailVictimId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|KillmailItem whereQuantityDestroyed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|KillmailItem whereQuantityDropped($value)
 * @method static \Illuminate\Database\Eloquent\Builder|KillmailItem whereSingleton($value)
 * @method static \Illuminate\Database\Eloquent\Builder|KillmailItem whereUpdatedAt($value)
 */
	class KillmailItem extends \Eloquent {}
}

namespace App{
/**
 * App\KillmailVictim
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $killmail_id
 * @property int|null $alliance_id
 * @property \App\Corporation $corporation_id
 * @property int|null $character_id
 * @property int $damage_taken
 * @property int $faction_id
 * @property int $ship_type_id
 * @property-read \App\Alliance|null $alliance
 * @property-read \App\Character|null $character
 * @property-read \App\Killmail $killmail
 * @property-read \App\InvType $ship_type
 * @method static \Illuminate\Database\Eloquent\Builder|KillmailVictim newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|KillmailVictim newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|KillmailVictim query()
 * @method static \Illuminate\Database\Eloquent\Builder|KillmailVictim whereAllianceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|KillmailVictim whereCharacterId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|KillmailVictim whereCorporationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|KillmailVictim whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|KillmailVictim whereDamageTaken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|KillmailVictim whereFactionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|KillmailVictim whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|KillmailVictim whereKillmailId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|KillmailVictim whereShipTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|KillmailVictim whereUpdatedAt($value)
 */
	class KillmailVictim extends \Eloquent {}
}

namespace App{
/**
 * Class MapDenormalize.
 *
 * @package App
 * @OA\Schema (
 *     description="Map Denormalize",
 *     title="MapDenormalize",
 *     type="object"
 * )
 * @OA\Property (
 *     type="integer",
 *     property="itemID",
 *     description="The entity ID"
 * )
 * @OA\Property (
 *     type="integer",
 *     property="typeID",
 *     description="The type of the entity"
 * )
 * @OA\Property (
 *     type="integer",
 *     property="groupID",
 *     description="The group to which the entity is related"
 * )
 * @OA\Property (
 *     type="integer",
 *     property="solarSystemID",
 *     description="The system to which the entity is attached"
 * )
 * @OA\Property (
 *     type="integer",
 *     property="constellationID",
 *     description="The constellation to which the entity is attached"
 * )
 * @OA\Property (
 *     type="integer",
 *     property="regionID",
 *     description="The region to which the entity is attached"
 * )
 * @OA\Property (
 *     type="integer",
 *     property="orbitID",
 *     description="The orbit to which the entity is depending"
 * )
 * @OA\Property (
 *     type="number",
 *     format="double",
 *     property="x",
 *     description="x position on the map"
 * )
 * @OA\Property (
 *     type="number",
 *     format="double",
 *     property="y",
 *     description="y position on the map"
 * )
 * @OA\Property (
 *     type="number",
 *     format="double",
 *     property="z",
 *     description="z position on the map"
 * )
 * @OA\Property (
 *     type="number",
 *     format="double",
 *     property="radius",
 *     description="The radius of the entity"
 * )
 * @OA\Property (
 *     type="string",
 *     property="itemName",
 *     description="The entity name"
 * )
 * @OA\Property (
 *     type="number",
 *     format="double",
 *     property="security",
 *     description="The security status of the system to which entity is attached"
 * )
 * @OA\Property (
 *     type="integer",
 *     property="celestialIndex",
 * )
 * @OA\Property (
 *     type="integer",
 *     property="orbitIndex"
 * )
 * @property int $itemID
 * @property int|null $typeID
 * @property int|null $groupID
 * @property int|null $solarSystemID
 * @property int|null $constellationID
 * @property int|null $regionID
 * @property int|null $orbitID
 * @property float|null $x
 * @property float|null $y
 * @property float|null $z
 * @property float|null $radius
 * @property string|null $itemName
 * @property float|null $security
 * @property int|null $celestialIndex
 * @property int|null $orbitIndex
 * @property-read MapDenormalize|null $constellation
 * @property-read string $name
 * @property-read int $structure_id
 * @property-read MapDenormalize|null $region
 * @property-read MapDenormalize|null $system
 * @property-read \App\InvType|null $type
 * @method static \Illuminate\Database\Eloquent\Builder|MapDenormalize constellations()
 * @method static \Illuminate\Database\Eloquent\Builder|MapDenormalize moons()
 * @method static \Illuminate\Database\Eloquent\Builder|MapDenormalize newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MapDenormalize newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MapDenormalize planets()
 * @method static \Illuminate\Database\Eloquent\Builder|MapDenormalize query()
 * @method static \Illuminate\Database\Eloquent\Builder|MapDenormalize regions()
 * @method static \Illuminate\Database\Eloquent\Builder|MapDenormalize systems()
 * @method static \Illuminate\Database\Eloquent\Builder|MapDenormalize whereCelestialIndex($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MapDenormalize whereConstellationID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MapDenormalize whereGroupID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MapDenormalize whereItemID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MapDenormalize whereItemName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MapDenormalize whereOrbitID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MapDenormalize whereOrbitIndex($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MapDenormalize whereRadius($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MapDenormalize whereRegionID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MapDenormalize whereSecurity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MapDenormalize whereSolarSystemID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MapDenormalize whereTypeID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MapDenormalize whereX($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MapDenormalize whereY($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MapDenormalize whereZ($value)
 */
	class MapDenormalize extends \Eloquent {}
}

namespace App{
/**
 * App\RefreshToken
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property string $refresh_token
 * @property string $access_token
 * @property string $scopes
 * @property string $expires_on
 * @method static \Illuminate\Database\Eloquent\Builder|RefreshToken newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RefreshToken newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RefreshToken query()
 * @method static \Illuminate\Database\Eloquent\Builder|RefreshToken whereAccessToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RefreshToken whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RefreshToken whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RefreshToken whereExpiresOn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RefreshToken whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RefreshToken whereRefreshToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RefreshToken whereScopes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RefreshToken whereUpdatedAt($value)
 */
	class RefreshToken extends \Eloquent {}
}

namespace App{
/**
 * App\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

