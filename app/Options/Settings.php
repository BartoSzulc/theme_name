<?php

namespace App\Options;

use Log1x\AcfComposer\Options as Field;
use StoutLogic\AcfBuilder\FieldsBuilder;
use App\Options\Partials\Header;
use App\Options\Partials\Footer;
use App\Options\Partials\Contact;

class Settings extends Field
{
    /**
     * The option page menu name.
     *
     * @var string
     */
    public $name = 'Zarządzanie motywem';

    /**
     * The option page document title.
     *
     * @var string
     */
    public $title = 'Zarządzanie motywem | Ustawienia';

    /**
     * The option page field group.
     *
     * @return array
     */
    public function fields()
    {
        $settings = new FieldsBuilder('settings');

        $settings

            ->addTab('header_tab', ['label' => 'Nagłówek', 'placement' => 'left'])
                ->addGroup('header')
                    ->addFields($this->get(Header::class))
                ->endGroup()
            ->addTab('contact_tab', ['label' => 'Kontakt'])
                ->addGroup('contact')
                    ->addFields($this->get(Contact::class))
                ->endGroup()
            ->addTab('footer_tab', ['label' => 'Stopka', 'placement' => 'Left'])
                ->addGroup('footer')
                    ->addFields($this->get(Footer::class))
                ->endGroup()
            
            ->addTab('realizacje_tab', ['label' => 'Realizacje', 'placement' => 'Left'])
                ->addGroup('realizacje')
                    ->addText('realizacje_title', ['label' => 'Tytuł sekcji'])
                    ->addTextarea('realizacje_subtitle', ['label' => 'Podtytuł sekcji'])
                
                    ->addText('realizacje_title--front', ['label' => 'Tytuł sekcji', 'instructions' => 'Tytuł sekcji na stronie głównej'])
                    ->addTextarea('realizacje_subtitle--front', ['label' => 'Podtytuł sekcji', 'instructions' => 'Podtytuł sekcji na stronie głównej'])
                ->endGroup()
            ;

        return $settings->build();
    }
}
