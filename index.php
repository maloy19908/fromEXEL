<?php
require 'vendor/autoload.php';
$inputFileName = 'files/1.xlsx';
$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
$spreadsheet = $reader->load($inputFileName);
$worksheet = $spreadsheet->getActiveSheet();
$highestRow = $worksheet->getHighestRow();
$highestColumn = $worksheet->getHighestColumn();
$highestColumnIndex = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($highestColumn);
?>

<table>
  <? for ($row = 1; $row <= $highestRow; $row++) :?>
    <tr>
      <? for ($col = 1; $col <= $highestColumnIndex; $col++) : ?>
        <td><?=$worksheet->getCellByColumnAndRow($col, $row)->getValue()?></td>
      <?endfor;?>
    </tr>
  <?endfor;?>
</table>