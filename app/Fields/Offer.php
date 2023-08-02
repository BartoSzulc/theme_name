<?php

namespace App\Fields;

use Log1x\AcfComposer\Field;
use StoutLogic\AcfBuilder\FieldsBuilder;


class Offer extends Field
{
    /**
     * The field group.
     *
     * @return array
     */
    public function fields()
    {
        $offer = new FieldsBuilder('offer', ['title' => 'Oferta']);

        $offer
        ->setLocation('page_template', '==', 'template-offer.blade.php');

        $offer
        
        
        
        ;


        return $offer->build();
    }
}
