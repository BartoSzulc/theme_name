<?php

namespace App\Fields;

use App\Fields\Partials\About\Hero;
use App\Fields\Partials\About\Video;
use App\Fields\Partials\About\Technology;
use App\Fields\Partials\About\Team;
use App\Fields\Partials\About\TwoColumns;



use Log1x\AcfComposer\Field;
use StoutLogic\AcfBuilder\FieldsBuilder;

class About extends Field
{
    /**
     * The field group.
     *
     * @return array
     */
    public function fields()
    {
        $about = new FieldsBuilder('about', ['title' => 'O nas']);

        $about
        ->setLocation('page_template', '==', 'template-about.blade.php');

        $about
            ->addGroup('about', ['label' => "O firmie"])
            
                ->addTab('hero-tab', ['label' => 'Hero'])
                    ->addFields($this->get(Hero::class))
                ->addTab('video-tab', ['label' => 'Video'])
                    ->addFields($this->get(Video::class))
                ->addTab('team-tab', ['label' => 'Zespół'])
                    ->addFields($this->get(Team::class))
                ->addTab('twocolumns-tab', ['label' => 'Dwie kolumny']) 
                    ->addFields($this->get(TwoColumns::class))
                ->addTab('technology-tab', ['label' => 'Technologia'])
                    ->addFields($this->get(Technology::class))

            ->endGroup()
        
        ;


        return $about->build();
    }
}
