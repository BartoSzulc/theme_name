<?php

namespace App\Fields\Partials\About;

use Log1x\AcfComposer\Partial;
use StoutLogic\AcfBuilder\FieldsBuilder;

class Video extends Partial
{
    /**
     * The partial field group.
     *
     * @return \StoutLogic\AcfBuilder\FieldsBuilder
     */
    public function fields()
    {
        $video = new FieldsBuilder('video');

        $video
            ->addGroup('video', ['label' => 'Video'])
                ->addTab('left-tab', ['label' => 'Lewa kolumna'])
                    ->addGroup('left', ['label' => "Lewa kolumna"])
                        ->addImage('image', ['label' => 'Zdjęcie'])
                        ->addUrl('link', ['label' => 'Link do filmu'])
                    ->endGroup()
                ->addTab('right-tab', ['label' => 'Prawa kolumna'])
                    ->addGroup('right', ['label' => "Prawa kolumna"])
                        ->addWysiwyg('title', ['label' => 'Nagłówek'])
                        ->addWysiwyg('subtitle', ['label' => 'Podtytuł'])
                        ->addWysiwyg('content', ['label' => 'Treść'])
                        ->addLink('link', ['label' => 'Link'])
                    ->endGroup()
            ->endGroup()
        ;   

        return $video;
    }
}
