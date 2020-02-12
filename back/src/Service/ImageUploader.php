<?php

namespace App\Service;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class ImageUploader
{
    private $container;

    /**
     * On crée un constructeur pour injecter une dépendance, celle qui nous permet d'obtenir le paramètre kernel.project_dir
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * @var $file UploadFile from form
     * @var $localDirectory string The relative target path from the public directory
     * 
     * @return string The random filename determined the method
     */
    public function moveFile(UploadedFile $file, string $localDirectory)
    {
        $targetDirectory = $this->container->getParameter('kernel.project_dir').'/public/' . $localDirectory;

        $targetFileName = uniqid().'.'.$file->guessExtension();
        $file->move($targetDirectory, $targetFileName);

        return $targetFileName;
    }

    public function downloadFile(string $url, string $localDirectory)
    {
        // On détermine le nom du fichier avec la même technique que dans moveFile()
        $fileName = uniqid().'.jpg';

        // On crée ce fichier avec le contenu de l'image trouvée et on le nomme comme $fileName
        file_put_contents(
            $this->container->getParameter('kernel.project_dir')
           .'/public/'
           .$localDirectory
           .'/'.$fileName
           ,
            fopen($url, 'r')
        );

        // La fonction a terminé son travail, comme pour moveFile(), on retourne le nom du fichier
        return $fileName;
    }
}