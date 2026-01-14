<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    public const CATEGORY_CONCERT = 'category-concert';
    public const CATEGORY_EXPO = 'category-expo';
    public const CATEGORY_ATELIER = 'category-atelier';
    public const CATEGORY_CONFERENCE = 'category-conference';

    public function load(ObjectManager $manager): void
    {
        // Cat1 Concert
        $concert = new Category();
        $concert->setNom('Concert');
        $concert->setCouleur('#F54927');
        $concert->setIcone('🤘');
        $manager->persist($concert);
        $this->addReference(self::CATEGORY_CONCERT, $concert);

        // Cat2 Exposition
        $expo = new Category();
        $expo->setNom('Exposition');
        $expo->setCouleur('#2742F5');
        $expo->setIcone('🖼️');
        $manager->persist($expo);
        $this->addReference(self::CATEGORY_EXPO, $expo);

        // Cat3 Atelier
        $atelier = new Category();
        $atelier->setNom('Atelier');
        $atelier->setCouleur('#F5F527');
        $atelier->setIcone('🛠️');
        $manager->persist($atelier);
        $this->addReference(self::CATEGORY_ATELIER, $atelier);

        // Cat4 Conférence
        $conference = new Category();
        $conference->setNom('Conférence');
        $conference->setCouleur('#2AF527');
        $conference->setIcone('🗣️');
        $manager->persist($conference);
        $this->addReference(self::CATEGORY_CONFERENCE, $conference);

        $manager->flush();
    }
}
