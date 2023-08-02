<?php

namespace App\Fields\Partials\About;

use Log1x\AcfComposer\Partial;
use StoutLogic\AcfBuilder\FieldsBuilder;

class Technology extends Partial
{
    /**
     * The partial field group.
     *
     * @return \StoutLogic\AcfBuilder\FieldsBuilder
     */
    public function fields()
    {
        $technology = new FieldsBuilder('technology');

        $technology
            ->addGroup('technology', ['label' => 'technology'])
                ->addTab('left-tab', ['label' => 'Lewa kolumna'])
                    ->addImage('image', ['label' => 'Zdjęcie'])
                ->addTab('right-tab', ['label' => 'Prawa kolumna'])
                    ->addGroup('right', ['label' => "Prawa kolumna"])
                        ->addWysiwyg('title', ['label' => 'Nagłówek'])
                        ->addWysiwyg('subtitle', ['label' => 'Podtytuł'])
                        ->addWysiwyg('content', ['label' => 'Treść'])
                      
                    ->endGroup()
            ->endGroup()
        ;   

        return $technology;
    }
}
