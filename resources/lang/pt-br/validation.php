<?php 
// resources/lang/pt/validation.php
return [
    'custom' => [
        'name' => [
            'required' => "O campo nome deve ser preenchido corretamente",
            'min' => 'O campo nome deve ter pelo menos 3 caracteres.',
            'unique' => 'O nome da marca já existe',
        ],
        'image' => [
            'required' => 'O campo imagem deve conter uma imagem válida',
            'mimes' =>"o Campo imagem aceita somente arquivos com extensão .png, jpeg e webp",
        ],
    ],
];