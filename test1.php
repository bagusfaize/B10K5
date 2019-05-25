<?php

function biodata(){
    $data['name'] = 'Bagus Noor Faizun';
    $data['address'] = 'Kalikajar, Wonosobo, Jawa Tengah';
    $data['hobbies'] = ['design','traveling','bicycling'];
    $data['is_married'] = intval(FALSE);
    $data['school'] = (object)['highSchool' => 'SMK Negeri 1 Wonosobo',
                        'university' => '-'];
    foreach ($data as $key => $value)
    {
        $object = $data;
    }
    $data['skills'] = ['HTML' => '80',
    'PHP' => '70',
    'CSS' => '80',
    'MySQL' => '80',
    'Bootstrap' => '70',
    'JavaScript' => '50'
    ];   

    return $data;
}
$data = biodata();
print_r(json_encode($data));

?>
