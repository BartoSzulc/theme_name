<?php

namespace App\Fields;


use Log1x\AcfComposer\Field;
use StoutLogic\AcfBuilder\FieldsBuilder;

class Single extends Field
{
    /**
     * The field group.
     *
     * @return array
     */
    public function fields()
    {
        $Single = new FieldsBuilder('posttype', ['title' => 'Sekcje z polami do wypełnienia']);

        $Single
        ->setLocation('post_type', '==', 'realizacje')
        ->or('post_type', '==', 'post')
            ;
        //set location to post type post and realizacje

        $Single

        ->addImage('featured_image', ['label' => 'Zdjęcie wyróżniające', 'return_format' => 'array', 'preview_size' => 'thumbnail', 'library' => 'all', 'instructions' => 'Zdjęcie wyróżniające, które zostanie wyświetlone jako baner (jeśli nie wypełnimy tego pola, baner zostanie wygenerowany automatycznie z "Obrazek wyróżniający"'])
        ->addGroup('post', ['label' => 'Wpis', ])
        //add message
            ->addMessage('message_field', 'Pola do wypełnienia z możliwym ostylowaniem w "Formaty", jeśli nie chcemy używać tych pól możemy wpis wypełnić w edytorze powyżej a te pola zostawić puste', ['label' => 'Instrukcja'])
            ->addWysiwyg('post_title', ['label' => 'Kolumna  pełna szerokość'])
            ->addGroup('post_columns', ['label' => 'Kolumny'])
                ->addWysiwyg('post_column_1', ['label' => 'Kolumna 1'])
                ->addImage('post_column_2', ['label' => 'Kolumna 2'])
            ->endGroup()
        ->endGroup()

        ;


        return $Single->build();
    }
}
