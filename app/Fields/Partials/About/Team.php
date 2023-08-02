<?php

namespace App\Fields\Partials\About;

use Log1x\AcfComposer\Partial;
use StoutLogic\AcfBuilder\FieldsBuilder;

class Team extends Partial
{
    /**
     * The partial field group.
     *
     * @return \StoutLogic\AcfBuilder\FieldsBuilder
     */
    public function fields()
    {
        $team = new FieldsBuilder('team');

        $team
            ->addGroup('team', ['label' => 'team'])
                ->addTab('left-tab', ['label' => 'Lewa kolumna'])
                    ->addGroup('right', ['label' => "Lewa kolumna"])
                        ->addWysiwyg('title', ['label' => 'Nagłówek'])
                        ->addWysiwyg('subtitle', ['label' => 'Podtytuł'])
                        ->addWysiwyg('content', ['label' => 'Treść'])
                        ->addRepeater('links', ['label' => "Linki", 'button_label' => "Dodaj link"])
                            ->addLink('link', ['label' => 'Link'] )
                        ->endRepeater()
                    ->endGroup()
                ->addTab('right-tab', ['label' => 'Prawa kolumna'])
                    ->addImage('image', ['label' => 'Zdjęcie'])
            ->endGroup()
        ;   

        return $team;
    }
}
