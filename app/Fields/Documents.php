<?php

namespace App\Fields;

use Log1x\AcfComposer\Field;
use StoutLogic\AcfBuilder\FieldsBuilder;

class Documents extends Field
{
    /**
     * The field group.
     *
     * @return array
     */
    public function fields()
    {
        $documents = new FieldsBuilder('documents',  ['title' => 'Dokumenty do pobrania']);

        $documents
        ->setLocation('page_template', '==', 'template-documents.blade.php');

        $documents
            ->addRepeater('boxes', ['label' => 'Pliki do pobrania', 'button_label' => 'Dodaj kolumne z plikami'])
                ->addWysiwyg('title', [
                    'label' => 'Nagłówek',
                ])
                ->addRepeater('links', ['label' => 'Linki do plików', 'button_label' => 'Dodaj link'])
                    ->addFile('file', [
                        'label' => 'Plik',
                        'return_format' => 'array',
                        'library' => 'all',
                        'mime_types' => 'pdf, doc, docx, xls, xlsx, ppt, pptx, zip, rar',
                    ])
            ->endRepeater();

        return $documents->build();
    }
}
