<?php

function filename(int $length = 15): string
{
    $str = '';
    while($length--)
    {
        $choose = random_int(0, 2);
        switch($choose)
        {
            case 0:
                $str .= chr(random_int(ord('A'), ord('Z')));
                break;
            case 1:
                $str .= chr(random_int(ord('a'), ord('z')));
                break;
            case 2:
                $str .= chr(random_int(ord('0'), ord('9')));
                break;
        }
        }
    return $str;
}

if( $_FILES['file']['error'] === 0 )
{
    move_uploaded_file($_FILES['file']['tmp_name'], __DIR__.'/storage/'.filename().'.'.$_POST['suffix']);
    die(json_encode('Upload Success'));
}

die(json_encode('Upload Failed'));