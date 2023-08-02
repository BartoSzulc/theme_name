<?php

namespace App\Fields;

use Log1x\AcfComposer\Field;
use StoutLogic\AcfBuilder\FieldsBuilder;

use App\Fields\Partials\Offer\Premium;
use App\Fields\Partials\Offer\Specialized;



class Offer extends Field
{
    /**
     * The field group.
     *
     * @return array
     */
    public function fields()
    {
        $offer = new FieldsBuilder('offer', ['title' => 'Oferta']);

        $offer
        ->setLocation('page_template', '==', 'template-offer.blade.php');

        $offer
        
        ->addGroup('offer', ['label' => "Oferta"])
            ->addTab('hero-tab', ['label' => "Hero"])
                ->addGroup('hero', ['label' => "Hero"])
                    ->addWysiwyg('title', ['label' => "Tytuł"])
                    ->addWysiwyg('subtitle', ['label' => "Podtytuł"])
                ->endGroup()
            ->addTab('offer_premium-tab', ['label' => "Stolarka Premium"])
                ->addFields($this->get(Premium::class)) 
            ->addTab('offer_standard-tab', ['label' => "Stolarka Specjalistyczna"])
                ->addFields($this->get(Specialized::class))
        ->endGroup()
        
        ;


        return $offer->build();
    }
}
