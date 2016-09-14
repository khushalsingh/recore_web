<?php

return [

//    'characters' => '2346789abcdefghjmnpqrtuxyzABCDEFGHJMNPQRTUXYZ',
    'characters' => '123456789',

    'default'   => [
        'length'    => 5,
        'width'     => 150,
        'height'    => 36,
        'quality'   => 90,
		'bgColor'   => '#fff',
    ],

    'flat'   => [
        'length'    => 6,
        'width'     => 110,
        'height'    => 42,
        'quality'   => 60,
        'lines'     => -1,
        'bgImage'   => false,
        'bgColor'   => '#fff',
        'fontColors'=> ['#000'],
        'contrast'  => 0,
    ],

    'mini'   => [
        'length'    => 3,
        'width'     => 60,
        'height'    => 32,
    ],

    'inverse'   => [
        'length'    => 5,
        'width'     => 150,
        'height'    => 36,
        'quality'   => 90,
        'sensitive' => true,
        'angle'     => 12,
        'sharpen'   => 10,
        'blur'      => 2,
        'invert'    => true,
        'contrast'  => -5,
    ]

];
