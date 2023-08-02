<?php

namespace App\Fields\Partials;

use Log1x\AcfComposer\Partial;
use StoutLogic\AcfBuilder\FieldsBuilder;

class Contact extends Partial
{
    /**
     * The partial field group.
     *
     * @return \StoutLogic\AcfBuilder\FieldsBuilder
     */
    public function fields()
    {
        $contact = new FieldsBuilder('contact');

        $contact
            ->addGroup('contact', ['label' => "Kontakt"])
                ->addText('badge', ['label' => "Badge"])
                ->addWysiwyg('desc', ['label' => "Opis / Adres"])
                ->addRepeater('contact_repeater', ['label' => "Informacje kontaktowe", 'button_label' => "Dodaj informacje kontaktową"])
                    ->addImage('image', ['label' => "Zdjęcie"])
                    ->addLink('link', ['label' => "Link"])
                ->endRepeater()
                ->addUrl('google-maps', ['label' => "Link do Google Maps", 'wrapper' => ['width' => '100%']])
                ->addGroup('form', ['label' => "Formularz"])
                    ->addText('badge', ['label' => "Badge"])
                    ->addWysiwyg('title', ['label' => "Nagłowek"])
                    ->addText('shortcode', ['label' => 'Shortcode formularza', 'wrapper' => ['width' => '50%']])
                ->endGroup()
            ->endGroup()
        ;

        return $contact;
    }
}
