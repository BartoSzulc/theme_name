<?php
namespace App\Fields\Partials\Offer;

use Log1x\AcfComposer\Partial;
use StoutLogic\AcfBuilder\FieldsBuilder;

class Specialized extends Partial
{
    /**
     * The partial field group.
     *
     * @return \StoutLogic\AcfBuilder\FieldsBuilder
     */
    public function fields()
    {
        $specialized = new FieldsBuilder('specialized');

        $specialized

        ->addGroup('offer_standard', ['label' => "Stolarka Specjalistyczna"])
            ->addWysiwyg('title', ['label' => "Tytuł"])
            ->addWysiwyg('content', ['label' => "Opis"])
            // Systemy przeciwpożarowe
            ->addTab('systemy-przeciw-tab', ['label' => "Systemy przeciwpożarowe", 'placement' => 'top'])
            ->addGroup('systemy-przeciw', ['label' => "Systemy przeciwpożarowe"])
                ->addWysiwyg('content', ['label' => "Nazwa"])
                ->addImage('image', ['label' => "Zdjęcie"])
                ->addRepeater('elements_slider', ['label' => "Elementy danej oferty"])
                    ->addWysiwyg('content', ['label' => "Nazwa"])
                    ->addImage('image', ['label' => "Zdjęcie"])
                    ->addLink('link', ['label' => "Link do strony produktu"])
                ->endRepeater()
            ->endGroup()
            // Systemy dymoszczelne
            ->addTab('systemy-dymoszczelne-tab', ['label' => "Systemy dymoszczelne"])
            ->addGroup('systemy-dymoszczelne', ['label' => "Systemy dymoszczelne"])
                ->addWysiwyg('content', ['label' => "Nazwa"])
                ->addImage('image', ['label' => "Zdjęcie"])
                ->addRepeater('elements_slider', ['label' => "Elementy danej oferty"])
                    ->addWysiwyg('content', ['label' => "Nazwa"])
                    ->addImage('image', ['label' => "Zdjęcie"])
                    ->addLink('link', ['label' => "Link do strony produktu"])
                ->endRepeater()
            ->endGroup()
            // Systemy przeciwlamowe
            ->addTab('systemy-ewakuacyjne-tab', ['label' => "Systemy ewakuacyjne"])
            ->addGroup('systemy-ewakuacyjne', ['label' => "Systemy ewakuacyjne"])
                ->addWysiwyg('content', ['label' => "Nazwa"])
                ->addImage('image', ['label' => "Zdjęcie"])
                ->addRepeater('elements_slider', ['label' => "Elementy danej oferty"])
                    ->addWysiwyg('content', ['label' => "Nazwa"])
                    ->addImage('image', ['label' => "Zdjęcie"])
                    ->addLink('link', ['label' => "Link do strony produktu"])
                ->endRepeater()
            ->endGroup()
            // Systemy oddymiajace i napowietrzające
            ->addTab('systemy-oddymiajace-tab', ['label' => "Systemy oddymiajace i napowietrzające"])
            ->addGroup('systemy-oddymiajace', ['label' => "Systemy oddymiajace i napowietrzające"])
                ->addWysiwyg('content', ['label' => "Nazwa"])
                ->addImage('image', ['label' => "Zdjęcie"])
                ->addRepeater('elements_slider', ['label' => "Elementy danej oferty"])
                    ->addWysiwyg('content', ['label' => "Nazwa"])
                    ->addImage('image', ['label' => "Zdjęcie"])
                    ->addLink('link', ['label' => "Link do strony produktu"])
                ->endRepeater()
            ->endGroup()
        ->endGroup()
        ;

        return $specialized;
    }
}