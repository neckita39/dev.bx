<?php
namespace Army\Weapon;
class ArcherWeapon extends WeaponForge
{

	public function createBow(): ArcherWeapon
	{
		return new Bow();
	}

	public function createKnife(): ArcherWeapon
	{
		return new Knife();
	}
}