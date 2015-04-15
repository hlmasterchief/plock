<?php

return [

    'settings' => [
        'analysis' => [
            'filter' => [
                'nGram_filter' => [
                    'type'        => 'nGram',
                    'min_gram'    => 3,
                    'max_gram'    => 8,
                    'token_chars' => ["letter", "digit"]
                ] // nGram_filter
            ], // filter

            'analyzer' => [
                'nGram_analyzer' => [
                    'type'      => 'custom',
                    'tokenizer' => 'whitespace',
                    'filter'    => ["lowercase", "asciifolding", "nGram_filter"]
                ], // nGram_analyzer

                'whitespace_analyzer' => [
                    'type'      => 'custom',
                    'tokenizer' => 'whitespace',
                    'filter'    => ["lowercase", "asciifolding"]
                ], // whitespace_analyzer
            ] // analyzer
        ] // analysis
    ], // settings

];