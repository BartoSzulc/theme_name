<?php
namespace App\Fields\Partials\Offer;

use Log1x\AcfComposer\Partial;
use StoutLogic\AcfBuilder\FieldsBuilder;

class Premium extends Partial
{
    /**
     * The partial field group.
     *
     * @return \StoutLogic\AcfBuilder\FieldsBuilder
     */
    public function fields()
    {
        $premium = new FieldsBuilder('premium');

        $premium
        ->addGroup('offer_premium', ['label' => "Stolarka Premium"])
            ->addWysiwyg('title', ['label' => "Tytuł"])
            ->addWysiwyg('content', ['label' => "Opis"])
            // Systemy przesuwne
            ->addTab('systemy-przesuwne-tab', ['label' => "Systemy przesuwne", 'placement' => 'top'])
            ->addGroup('systemy-przesuwne', ['label' => "Systemy przesuwne"])
                ->addWysiwyg('content', ['label' => "Nazwa"])
                ->addImage('image', ['label' => "Zdjęcie"])
                ->addRepeater('elements_slider', ['label' => "Elementy danej oferty"])
                    ->addWysiwyg('content', ['label' => "Nazwa"])
                    ->addImage('image', ['label' => "Zdjęcie"])
                    ->addLink('link', ['label' => "Link do strony produktu"])
                ->endRepeater()
            ->endGroup()
            // Systemy fasadowe
            //add same tab like in systemy-przesuwne-tab
            ->addTab('systemy-fasadowe-tab', ['label' => "Systemy fasadowe"])
            ->addGroup('systemy-fasadowe', ['label' => "Systemy Fasadowe"])
                ->addWysiwyg('content', ['label' => "Nazwa"])
                ->addImage('image', ['label' => "Zdjęcie"])
                ->addRepeater('elements_slider', ['label' => "Elementy danej oferty"])
                    ->addWysiwyg('content', ['label' => "Nazwa"])
                    ->addImage('image', ['label' => "Zdjęcie"])
                    ->addLink('link', ['label' => "Link do strony produktu"])

                ->endRepeater()
            ->endGroup()
            // Ozdrobne drzwi wejściowe
            ->addTab('ozdobne-drzwi-tab', ['label' => "Ozdobne drzwi wejściowe"])
            ->addGroup('ozdobne-drzwi', ['label' => "Ozdobne drzwi wejściowe"])
                ->addWysiwyg('content', ['label' => "Nazwa"])
                ->addImage('image', ['label' => "Zdjęcie"])
                ->addRepeater('elements_slider', ['label' => "Elementy danej oferty"])
                    ->addWysiwyg('content', ['label' => "Nazwa"])
                    ->addImage('image', ['label' => "Zdjęcie"])
                    ->addLink('link', ['label' => "Link do strony produktu"])
                ->endRepeater()
            ->endGroup()    
            // Systemy okienno drzwiowe
            ->addTab('systemy-okienno-tab', ['label' => "Systemy okienno drzwiowe"])
            ->addGroup('systemy-okienno', ['label' => "Systemy okienno drzwiowe "])
                ->addWysiwyg('content', ['label' => "Nazwa"])
                ->addImage('image', ['label' => "Zdjęcie"])
                ->addRepeater('elements_slider', ['label' => "Elementy danej oferty"])
                    ->addWysiwyg('content', ['label' => "Nazwa"])
                    ->addImage('image', ['label' => "Zdjęcie"])
                    ->addLink('link', ['label' => "Link do strony produktu"])
                ->endRepeater()
            ->endGroup()
        ->endGroup()
        ;

        return $premium;
    }
}