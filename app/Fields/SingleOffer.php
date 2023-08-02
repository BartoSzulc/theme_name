<?php

namespace App\Fields;

use Log1x\AcfComposer\Field;
use StoutLogic\AcfBuilder\FieldsBuilder;

class SingleOffer extends Field
{
    /**
     * The field group.
     *
     * @return array
     */
    public function fields()
    {
        $SingleOffer = new FieldsBuilder('singleoffer', ['title' => 'Sekcje z polami do wypełnienia']);

        $SingleOffer
            ->setLocation('post_type', '==', 'premium')
            ->or('post_type', '==', 'specjalistyczna')
            ;
        $SingleOffer
            ->addFlexibleContent('flexeditor', ['button_label' => 'Dodaj sekcję'])
                ->addLayout('hero', ['label' => 'Hero'])
                    ->addImage('image', ['label' => 'Zdjęcie'])
                    ->addText('title', ['label' => 'Tytuł', 'instructions' => 'Jeśli zostawimy puste, automatycznie pobierze tytuł z nagłówka'])
                    ->addText('subtitle', ['label' => 'Podtytuł'])
                    ->addWysiwyg('content', ['label' => 'Treść'])
                ->addLayout('wysiwyg', ['label' => 'WYSIWYG'])
                    ->addText('title', ['label' => 'Tytuł'])
                    ->addWysiwyg('content', ['label' => 'WYSIWYG'])
                ->addLayout('two_columns', ['label' => 'Dwie kolumny'])
                    ->addGroup('column_1', ['label' => 'Kolumna 1'])
                        ->addText('title', ['label' => 'Tytuł'])
                        ->addWysiwyg('content', ['label' => 'Treść'])
                    ->endGroup()
                    ->addRepeater('column_2', ['label' => 'Kolumna 2 ze zdjęciami', 'button_label' => 'Dodaj zdjęcie'])
                        ->addImage('image', ['label' => 'Zdjęcie'])
                    ->endRepeater()
                ->addLayout('two_columns_2', ['label' => 'Dwie kolumny (zdjęcie z pracej'])
                    ->addRepeater('column_2', ['label' => 'Kolumna 2 ze zdjęciami', 'button_label' => 'Dodaj zdjęcie'])
                        ->addImage('image', ['label' => 'Zdjęcie'])
                    ->endRepeater()
                    ->addGroup('column_1', ['label' => 'Kolumna 1'])
                        ->addText('title', ['label' => 'Tytuł'])
                        ->addWysiwyg('content', ['label' => 'Treść'])
                    ->endGroup()
                ->addLayout('two_columns_3', ['label' => 'Dwie kolumny z produktami (ozdobne drzwi)'])
                    ->addGroup('column_1', ['label' => 'Kolumna 1'])
                        ->addText('title', ['label' => 'Tytuł'])
                        ->addImage('image', ['label' => 'Zdjęcie'])
                        ->addWysiwyg('content', ['label' => 'Treść'])
                    ->endGroup()
                    ->addGroup('column_2', ['label' => 'Kolumna 2'])
                        ->addText('title', ['label' => 'Tytuł'])
                        ->addImage('image', ['label' => 'Zdjęcie'])
                        ->addWysiwyg('content', ['label' => 'Treść'])
                    ->endGroup()
                ->addLayout('video', ['label' => 'Video'])
                    ->addOembed('video_url', ['label' => 'Url do Video'])
            ->endFlexibleContent()
            ;

        return $SingleOffer->build();
    }
}
