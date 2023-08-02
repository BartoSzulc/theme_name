<?php

namespace App\Options\Partials;

use Log1x\AcfComposer\Partial;
use StoutLogic\AcfBuilder\FieldsBuilder;

class Contact extends Partial
{
    /**
     * The partial field group.
     *
     * @return array
     */
    public function fields()
    {
        $contact = new FieldsBuilder('contact');

        $contact

            
            ->addText('badge', ['label' => 'Nagłówek'])
            ->addText('title', ['label' => 'Tytuł'])
            ->addText('subtitle', ['label' => 'Napis pod tytułem'])
            ->addText('phone', ['label' => 'Telefon'])
            ->addText('shortcode', ['label' => 'Shortcode do formularza'])

            ;


        return $contact;
    }
}





