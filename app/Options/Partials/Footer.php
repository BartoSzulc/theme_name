<?php

namespace App\Options\Partials;

use App\Options\Partials\FourColumnBox;
use Log1x\AcfComposer\Partial;
use StoutLogic\AcfBuilder\FieldsBuilder;

class Footer extends Partial
{
    /**
     * The partial field group.
     *
     * @return array
     */
    public function fields()
    {
        $footer = new FieldsBuilder('footer');

        $footer
            
            ->addAccordion('contact_info_accordion', ['label' => 'Informacje kontaktowe', 'open' => 0, 'multi_expand' => 1, 'wrapper' => ['class' => 'acf-custom-group-section']])
                ->addGroup('contact_info', ['label' => 'Dodaj informacje kontaktowe'])
                    ->addText('contact_info--phone', ['label' => 'Telefon', 'wrapper' => ['width' => '50%']])
                    ->addText('contact_info--email', ['label' => 'Email', 'wrapper' => ['width' => '50%']])
                    ->addText('contact_info--address', ['label' => 'Adres', 'wrapper' => ['width' => '50%']])
                    ->addUrl('contact_info--address-url', ['label' => 'Link do map', 'wrapper' => ['width' => '50%']])
                ->endGroup()
            ->addAccordion('contact_info_accordion_end')->endPoint()
            ->addAccordion('socials_accordion', ['label' => 'Social media', 'open' => 0, 'multi_expand' => 1, 'wrapper' => ['class' => 'acf-custom-group-section']])
                ->addRepeater('socials', ['label' => 'Dodaj social media', 'max' => 4, 'button_label' => 'Dodaj social media'])
                    ->addUrl('socials_url', ['label' => 'Link do social media'])
                    ->addSelect('socials_select', ['label' => 'Wybierz social media', 'choices' => ['facebook' => 'Facebook', 'linkedin' => 'Linkedin', 'tiktok' => 'Tiktok', 'youtube' => 'Youtube']])
                ->endRepeater()
            ->addAccordion('socials_accordion_end')->endPoint()
            ->addAccordion('content_accordion', ['label' => 'Zawartość stopki', 'open' => 0, 'multi_expand' => 1, 'wrapper' => ['class' => 'acf-custom-group-section']])
                ->addGroup('footer_content--left', ['label' => 'Lewa kolumna'])
                    ->addWysiwyg('footer_content--left--content', ['label' => 'Treść'])
                    ->addTextarea('footer_content--left--about_us', ['label' => 'O nas'])
                ->endGroup()
                ->addGroup('footer_content--right', ['label' => 'Prawa kolumna'])
                    ->addWysiwyg('footer_content--right--content', ['label' => 'Treść'])
                ->endGroup()
            ->addAccordion('content_accordion_end')->endPoint()



            
            
            ;

        return $footer;
    }
}





