<?php
    return [
        'config1' => [
            'dom' => '<"row" <"col-sm-6 d-flex justify-content-start" f> <"col-sm-6 d-flex justify-content-end" B> >' . 
                    '<"row" <"col-12" tr> >' . 
                    '<"row" <"col-sm-12 d-flex justify-content-between" i p> >',
            'paging' => true,
            'lengthMenu' => [10, 50, 100, 500],
            'language' => ['url' => 'es_es.json'],
            'buttons' => [
            [
                'extend' => 'excel',
                'exportOptions' => [
                    'columns' => ':not(:last-child)'  // Excluye la última columna
                ]
            ],
            [
                'extend' => 'pdf',
                'exportOptions' => [
                    'columns' => ':not(:last-child)'  // Excluye la última columna
                ]
            ],
            [
                'extend' => 'print',
                'exportOptions' => [
                    'columns' => ':not(:last-child)'  // Excluye la última columna
                ]
            ],
        ],
        ],//sin botones
        'config2' => [
            'dom' => '<"row" <"col-sm-6 d-flex justify-content-start" f> <"col-sm-6 d-flex justify-content-end" B> >' . 
                    '<"row" <"col-12" tr> >' . 
                    '<"row" <"col-sm-12 d-flex justify-content-between" i p> >',
            'paging' => true,
            'lengthMenu' => [10, 50, 100, 500],
            'language' => ['url' => 'es_es.json'],
            'buttons' => [],
        ],//Sin search, paginacion y numero de pagina
        'config3' => [
            'dom' => '<"row" <"col-sm-12 d-flex justify-content-start"> >' . '<"row" <"col-12" tr> >',
            'paging' => false,
            'lengthMenu' => [10, 50, 100, 500],
            'language' => ['url' => 'es_es.json'],
            'buttons' => [],
        ],
    ];
?>
