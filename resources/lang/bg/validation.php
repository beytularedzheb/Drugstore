<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => ':attribute трябва да бъде приет.',
    'active_url'           => ':attribute е невалиден URL адрес.',
    'after'                => ':attribute трябва да е дата след :date.',
    'alpha'                => ':attribute може да съдържа само букви.',
    'alpha_dash'           => ':attribute може да съдържа само букви, числа и тире.',
    'alpha_num'            => ':attribute може да съдържа само букви и числа.',
    'array'                => ':attribute трябва да е масив',
    'before'               => ':attribute трябва да е дата преди :date.',
    'between'              => [
        'numeric' => ':attribute трябва да е между :min и :max.',
        'file'    => ':attribute трябва да е между :min и :max килобайта.',
        'string'  => ':attribute трябва да е между :min и :max символа.',
        'array'   => ':attribute трябва да съдържа между :min и :max елемента.',
    ],
    'boolean'              => ':attribute полето трябва да е true или false.',
    'confirmed'            => ':attribute потвърждението не съвпада.',
    'date'                 => ':attribute е невалидна дата.',
    'date_format'          => ':attribute не отговаря на формата :format.',
    'different'            => ':attribute и :other трябва да са различни.',
    'digits'               => ':attribute трябва да са :digits цифри.',
    'digits_between'       => ':attribute трябва да е между :min и :max.',
    'distinct'             => ':attribute се повтаря.',
    'email'                => ':attribute трябва да е валиден email адрес.',
    'exists'               => 'избраният :attribute е невалиден.',
    'filled'               => ':attribute полето е задължително.',
    'image'                => ':attribute трябва да е изображение.',
    'in'                   => 'избраният :attribute е невалиден.',
    'in_array'             => ':attribute не е намерен в :other.',
    'integer'              => ':attribute трябва да е цяло число.',
    'ip'                   => ':attribute трябва да е валиден IP адрес.',
    'json'                 => ':attribute трябва да е валиден JSON стринг.',
    'max'                  => [
        'numeric' => ':attribute не може да е по-голям от :max.',
        'file'    => ':attribute не може да е по-голям от :max килобайта.',
        'string'  => ':attribute не може да е по-голям от :max символа.',
        'array'   => ':attribute не може да има повече от :max елемента.',
    ],
    'mimes'                => ':attribute трябва да е файл от тип: :values.',
    'min'                  => [
        'numeric' => ':attribute трябва да е поне :min.',
        'file'    => ':attribute трябва да е поне :min килобайта.',
        'string'  => ':attribute трябва да е поне :min символа.',
        'array'   => ':attribute трябва да има поне :min елемента.',
    ],
    'not_in'               => 'Избраният елемент :attribute е невалиден.',
    'numeric'              => ':attribute трябва да е число.',
    'present'              => ':attribute полето трябва да съществува.',
    'regex'                => ':attribute форматът е невалиден.',
    'required'             => 'Полето :attribute е задължително.',
    'required_if'          => 'Полето :attribute е задължително, когато :other е :value.',
    'required_unless'      => 'Полето :attribute е задължително докато :other е в :values.',
    'required_with'        => 'Полето :attribute е задължително, когато :values присъства.',
    'required_with_all'    => 'Полето :attribute е задължително, когато :values присъства.',
    'required_without'     => 'Полето :attribute е задължително, когато :values не присъства.',
    'required_without_all' => 'Полето :attribute е задължително, когато нито един от :values не присъства.',
    'same'                 => ':attribute и :other трябва да са еднакви.',
    'size'                 => [
        'numeric' => ':attribute трябва да е :size.',
        'file'    => ':attribute трябва да е :size килобайта.',
        'string'  => ':attribute трябва да е :size символа.',
        'array'   => ':attribute трябва да съдържа :size елемента.',
    ],
    'string'               => ':attribute трябва да е символен низ.',
    'timezone'             => ':attribute трябва да е валидна времева зона.',
    'unique'               => 'Стойността на полето \':attribute\' е вече заета.',
    'url'                  => 'URL форматът :attribute е невалиден.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [],

];
