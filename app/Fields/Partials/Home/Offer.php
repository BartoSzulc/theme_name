<?php

namespace App\Fields\Partials\Home;

use Log1x\AcfComposer\Partial;
use StoutLogic\AcfBuilder\FieldsBuilder;

class Offer extends Partial
{
    /**
     * The partial field group.
     *
     * @return \StoutLogic\AcfBuilder\FieldsBuilder
     */
    public function fields()
    {
        $offer = new FieldsBuilder('offer');

        $offer
            
            // add group Offer
            ->addGroup('offer', ['label' => 'Oferta'])
                ->addWysiwyg('badge', ['label' => 'Badge'])
                ->addTab('left-tab', ['label' => 'Lewa kolumna (Stolarka Premium)', 'placement' => 'top'])
                ->addGroup('left', ['label' => 'Lewa kolumna (Stolarka Premium)'])
                    ->addWysiwyg('title', ['label' => 'Tytuł'])
                    ->addWysiwyg('content', ['label' => 'Treść'])
                    ->addLink('link', ['label' => 'Link'])
                    ->addRepeater('elements', ['label' => 'Elementy', 'button_label' => 'Dodaj element'])
                        ->addWysiwyg('title', ['label' => 'Tytuł'])
                        ->addImage('image', ['label' => 'Zdjęcie'])
                        ->addText('link', ['label' => 'Link', 'instructions' => 'Linki takie same jak w <a target="_blank" href="nav-menus.php">Menu</a>'])
                    ->endRepeater()
                ->endGroup()
                ->addTab('right-tab', ['label' => 'Prawa kolumna (Stolarka Specjalistyczna)', 'placement' => 'top'])
                ->addGroup('right', ['label' => 'Prawa kolumna (Stolarka Specjalistyczna)'])
                    ->addWysiwyg('title', ['label' => 'Tytuł'])
                    ->addWysiwyg('content', ['label' => 'Treść'])
                    ->addLink('link', ['label' => 'Link'])
                    ->addRepeater('elements', ['label' => 'Elementy', 'button_label' => 'Dodaj element'])
                        ->addWysiwyg('title', ['label' => 'Tytuł'])
                        ->addImage('image', ['label' => 'Zdjęcie'])
                        ->addText('link', ['label' => 'Link', 'instructions' => 'Linki takie same jak w <a target="_blank" href="nav-menus.php">Menu</a>'])
                    ->endRepeater()
                ->endGroup()
            ->endGroup()
        ;
        return $offer;
    }
}
