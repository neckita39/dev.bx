<?php

namespace Army\Builder;
use Army\Armor\Armor;
use Army\WarriorTemplate;
use Army\Weapon\ArcherWeapon;
use Army\Weapon\WeaponForge;

interface WarriorBuilder
{
	public function addRightHandWeapon(?ArcherWeapon $weapon = null): WarriorBuilder;
	public function addLeftHandWeapon(?ArcherWeapon $weapon = null): WarriorBuilder;

	public function addRightHandArmor(?Armor $armor = null): WarriorBuilder;
	public function addLeftHandArmor(?Armor $armor = null): WarriorBuilder;
	public function addHeadArmor(?Armor $armor = null): WarriorBuilder;

	public function createWarriorTemplate(): WarriorBuilder;

	public function getWarrior(): WarriorTemplate;
}