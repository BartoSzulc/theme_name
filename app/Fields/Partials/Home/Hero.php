<?php

namespace App\Fields\Partials\Home;

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
            ->addRepeater('heros', ['label' => "Hero", 'button_label' => "Dodaj slajd"])
                ->addImage('hero_image', ['label' => 'Zdjęcie'] )
                ->addWysiwyg('hero_content', ['label' => 'Treść'] )
                ->addRepeater('hero_links', ['label' => "Linki", 'button_label' => "Dodaj link"])
                    ->addLink('hero_link', ['label' => 'Link'] )
                ->endRepeater()
            ->endRepeater();

        return $hero;
    }
}
