<?php

namespace App\Command;

use App\Entity\Area;
use App\Entity\Comment;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class MakeAverageCommand extends Command
{
    protected static $defaultName = 'app:make:average';

    private $container;

    public function __construct(ContainerInterface $container)
    {
        parent::__construct();
        $this->container = $container;;
    }

    protected function configure()
    {
        $this
            ->setDescription('Make average of the comment\'s rate by area for all areas and set averageRate')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        // Here we get the Doctrine's entity manager object
        $em = $this->container->get('doctrine')->getManager();
        
        // Get all the areas
        $allAreas = $em->getRepository(Area::class)->findAll();
        
        // Get each area from all areas
        foreach ($allAreas as $area) {
            // Get all rates for one area and calculate average rate
            $rates = $em->getRepository(Comment::class)->findAverageRateByArea($area->getId());
            // set the new average rate in DB
            $average = $em->getRepository(Area::class)->find($area->getId())->setAverageRate($rates[0][1]);
            $em->persist($average);
        }
        $em->flush();

        // Return 0 in case of success for the Terminal
        return 0;
    }
}
