<?php

namespace App\Fields\Partials\About;

use Log1x\AcfComposer\Partial;
use StoutLogic\AcfBuilder\FieldsBuilder;

class Hero extends Partial
{
    /**
     * The partial field group.
     *
     * @return \StoutLogic\AcfBuilder\FieldsBuilder
     */
    public function fields()
    {
        $hero = new FieldsBuilder('hero');

        $hero
        ->addGroup('hero', ['label' => 'Hero'])
            ->addTab('left-tab', ['label' => 'Lewa kolumna'])
            ->addGroup('left', ['label' => "Lewa kolumna"])
                ->addWysiwyg('title', ['label' => 'Nagłówek'])
                ->addWysiwyg('content', ['label' => 'Treść'])
                ->addWysiwyg('content2', ['label' => 'Treść 2'])
                ->addLink('link', ['label' => 'Link'])
            ->endGroup()
            ->addTab('right-tab', ['label' => 'Prawa kolumna'])
            ->addRepeater('right', ['label' => 'Prawa kolumna ze zdjęciami', 'button_label' => 'Dodaj zdjęcie'])
                ->addImage('image', ['label' => 'Zdjęcie'])
            ->endRepeater()

        ->endGroup()
        ;   

        return $hero;
    }
}
