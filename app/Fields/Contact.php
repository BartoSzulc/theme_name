<?php

namespace App\Fields;

use Log1x\AcfComposer\Field;
use StoutLogic\AcfBuilder\FieldsBuilder;

class Contact extends Field
{
    /**
     * The field group.
     *
     * @return array
     */
    public function fields()
    {
        $contact = new FieldsBuilder('contact', ['title' => 'Kontakt']);

        $contact
            ->setLocation('page_template', '==', 'template-kontakt.blade.php');

        $contact
            ->addGroup('contact', ['label' => "Kontakt"])
                
            ->endGroup()
        
            ;


        return $contact->build();
    }
}
