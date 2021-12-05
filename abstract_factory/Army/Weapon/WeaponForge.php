<?php
namespace Army\Weapon;
abstract class WeaponForge
{
	abstract public function createBow(): ArcherWeapon;
	abstract public function createKnife(): ArcherWeapon;
}