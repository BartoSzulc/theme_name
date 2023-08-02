<?php

namespace App\Fields;


use App\Fields\Partials\Home\References;
use App\Fields\Partials\Home\Hero;
use App\Fields\Partials\Home\Offer;
use App\Fields\Partials\Home\EmDoro;




use Log1x\AcfComposer\Field;
use StoutLogic\AcfBuilder\FieldsBuilder;

class Front extends Field
{
    /**
     * The field group.
     *
     * @return array
     */
    public function fields()
    {
        $front = new FieldsBuilder('pagetype', ['title' => 'Sekcje z polami do wypełnienia']);

        $front
            ->setLocation('page_type', '==', 'front_page');

        $front

            ->addTab('hero', ['label' => 'Hero', 'placement' => 'left'])
                ->addFields($this->get(Hero::class)) 
            ->addTab('offer', ['label' => 'Oferta', 'placement' => 'left'])
                ->addFields($this->get(Offer::class))
            ->addTab('emdoro', ['label' => 'EmDoro', 'placement' => 'left'])
                ->addFields($this->get(EmDoro::class))
            ->addTab('references', ['label' => 'Referencje', 'placement' => 'left'])
                ->addFields($this->get(References::class))
           

            ;


        return $front->build();
    }
}
