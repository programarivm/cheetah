<?php

namespace App\DataFixtures\EasyAcl;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Programarivm\EasyAclBundle\EasyAcl;
use Programarivm\EasyAclBundle\Entity\Permission;

class PermissionFixtures extends Fixture implements FixtureGroupInterface, DependentFixtureInterface
{
    private $easyAcl;

    public function __construct(EasyAcl $easyAcl)
    {
        $this->easyAcl = $easyAcl;
    }

    public function load(ObjectManager $manager)
    {
        foreach ($this->easyAcl->getPermission() as $permission) {
            foreach ($permission['routes'] as $route) {
                $manager->persist(
                    (new Permission())
                        ->setRolename($permission['role'])
                        ->setRoutename($route)
                );
            }
        }

        $manager->flush();
    }

    public static function getGroups(): array
    {
        return [
            'easy-acl',
        ];
    }

    public function getDependencies(): array
    {
        return [
            RoleFixtures::class,
            RouteFixtures::class,
        ];
    }
}
