<?php

namespace App\Fields\Partials\Home;

use Log1x\AcfComposer\Partial;
use StoutLogic\AcfBuilder\FieldsBuilder;

class EmDoro extends Partial
{
    /**
     * The partial field group.
     *
     * @return \StoutLogic\AcfBuilder\FieldsBuilder
     */
    public function fields()
    {
        $emDoro = new FieldsBuilder('emDoro');

        $emDoro
            ->addGroup('emdoro', ['label' => 'EmDoro'])
                ->addImage('emdoro_image', ['label' => 'Zdjęcie'] )
                ->addUrl('emdoro_url', ['label' => 'URL do video'])
                ->addText('emdoro_title', ['label' => 'Tytuł'])
                ->addWysiwyg('emdoro_content', ['label' => 'Treść'] )
                ->addLink('emdoro_link', ['label' => 'Link'] )
            ->endGroup()
            ;

        return $emDoro;
    }
}
