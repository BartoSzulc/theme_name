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

        

        ;


        return $Single->build();
    }
}
