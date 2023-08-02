<?php

namespace App\Fields\Partials\About;

use Log1x\AcfComposer\Partial;
use StoutLogic\AcfBuilder\FieldsBuilder;

class TwoColumns extends Partial
{
    /**
     * The partial field group.
     *
     * @return \StoutLogic\AcfBuilder\FieldsBuilder
     */
    public function fields()
    {
        $twocolumns = new FieldsBuilder('twocolumns');

        $twocolumns
            ->addGroup('twocolumns', ['label' => 'twocolumns'])
                ->addWysiwyg('title', ['label' => 'Nagłówek'])
                ->addWysiwyg('kolumna_1', ['label' => 'Kolumna 1'])
                ->addWysiwyg('kolumna_2', ['label' => 'Kolumna 2'])
                ->addRepeater('links', ['label' => "Linki", 'button_label' => "Dodaj link"])
                    ->addLink('link', ['label' => 'Link'] )
                ->endRepeater()
            ->endGroup()
        ;   

        return $twocolumns;
    }
}
