<?php

$associativeArray = array(
    array(
        'Name' => 'Trikse',
        'Color' => 'Green',
        'Element' => 'Earth',
        'Likes' => 'Flowers'
    ),
    array(
        'Name' => 'Vardenis',
        'Element' => 'Air',
        'Likes' => 'Singning',
        'Color' => 'Blue'
    ),
    array(
        'Element' => 'Water',
        'Likes' => 'Dancing',
        'Name' => 'Jonas',
        'Color' => 'Pink'

    ),
);

function printAsciiTable($associativeArray)
{
    $columns_lengths = ammountOfCollumns($associativeArray, array_keys(reset($associativeArray)));
    $row_headers     = printKeys(array_keys(reset($associativeArray)), $columns_lengths);

    echo '<pre>';

    $boarderRow = '';
    foreach ($columns_lengths as $column_length) {
        $boarderRow .= '+' . str_repeat('-', (1 * 2) + $column_length);
    }
    $boarderRow .= '+';

    echo $boarderRow . "\n";
    echo $row_headers . "\n";
    echo $boarderRow . "\n";

    foreach ($associativeArray as $row_cells) {
        $row_cells = printValues($row_cells, array_keys(reset($associativeArray)), $columns_lengths);
        echo $row_cells . "\n";
    }
    echo $boarderRow . "\n";

    echo '</pre>';

}

function ammountOfCollumns($associativeArray, $columns_headers)
{
    $lengths = [];
    foreach ($columns_headers as $header) {
        $header_length = strlen($header);
        $max = $header_length;
        foreach ($associativeArray as $row) {
            $length = strlen($row[$header]);
            if ($length > $max) {
                $max = $length;
            }
        }
        if (($max % 2) != ($header_length % 2)) {
            $max += 1;
        }
        $lengths[$header] = $max;
    }

    return $lengths;
}

function printKeys($columns_headers, $columns_lengths)
{
    $keysRow = '';
    foreach ($columns_headers as $header) {
        $keysRow .= '|<b>' . str_pad($header, (1 * 2) + $columns_lengths[$header], ' ', STR_PAD_BOTH) . '</b>';
    }
    $keysRow .= '|';

    return $keysRow;
}

function printValues($row_cells, $columns_headers, $columns_lengths)
{
    $valuesRow = '';
    foreach ($columns_headers as $header) {
        $valuesRow .= '|' . str_repeat(' ', 1) . str_pad($row_cells[$header], 1 + $columns_lengths[$header], ' ', STR_PAD_RIGHT);
    }
    $valuesRow .= '|';

    return $valuesRow;
}

printAsciiTable($associativeArray);
