<?php

if (isset($_POST["csvExportForm"])) {
    csvExport();
}

?>

<html>
<head>
<title>test page csvExport</title>
</head>
<body>
<form method="post">
  <input type="hidden" name="csvExportForm" value="1">
  <input type="submit" value="csvExport">
</form>
</body>

</html>



<?php
function csvExport()
{
    $data = array(
    array('佐藤', '東京都', '29歳'),
    array('田中', '千葉県', '31歳'),
    array('鈴木', '北海道', '54歳')
  );
 
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename=data.csv');
 
    $stream = fopen('php://output', 'w');
    foreach ($data as $row) {
        fputcsv($stream, $row);
    }
}
