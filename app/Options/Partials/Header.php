<?php

namespace App\Options\Partials;

use Log1x\AcfComposer\Partial;
use StoutLogic\AcfBuilder\FieldsBuilder;

class Header extends Partial
{
    /**
     * The partial field group.
     *
     * @return array
     */
    public function fields()
    {
        $header = new FieldsBuilder('header');

        $header

            
            ->addAccordion('logo_accordion', ['label' => 'Logo strony', 'open' => 0, 'multi_expand' => 1, 'wrapper' => ['class' => 'acf-custom-group-section']])
                ->addImage('header_logo', ['label' => 'Logo'])
            ->addAccordion('logo_accordion_end')->endPoint()

            ;


        return $header;
    }
}





