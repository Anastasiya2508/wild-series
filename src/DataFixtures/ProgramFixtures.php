<?php
namespace App\DataFixtures;

use App\Entity\Program;
use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;


class ProgramFixtures extends Fixture implements DependentFixtureInterface
{
    public const PROGRAM = [
        'Walking dead',
        'Breaking bad',
        'Supernatural',
        'Game of thrones',
        'Freands',
    ];


    public function load(ObjectManager $manager)
    {
    foreach (self::PROGRAM as $key => $programName){ 
        $program = new Program();
        $program->setTitle($programName);
        $program->setSynopsis('Des zombies envahissent la terre');
        $program->setCategory($this->getReference('category_Action'));
        $program->setPoster('Text');
        $manager->persist($program);
        $this->addReference('program_' . $key , $program);
        
        $manager->flush();
    }
}
    public function getDependencies()
    {
        return [
          CategoryFixtures::class,
        ];
    }


}

