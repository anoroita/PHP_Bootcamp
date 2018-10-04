#!/usr/bin/php
<?PHP
$list = file($argv[1]);

if ($list)
{
    foreach ($list as $line)
    {
        if (strstr($line, "href=") != FALSE)
        {
            $new_line = substr($line, strpos($line, "href="));
            $res = preg_match('/>(.*?)\</s', $new_line, $matches);
            $new_line2 = trim($matches[1]);
            $line = str_replace($new_line2, strtoupper($new_line2), $line);
            if (strstr($new_line, "title=") != FALSE)
            {
                $new_line = substr($new_line, strpos($new_line, "title="));
                $res = preg_match('/"(.*?)\"/s', $new_line, $matches);
                $new_line2 = trim($matches[1]);
                $line = str_replace($new_line2, strtoupper($new_line2), $line);
            }
        }
        print($line);
    }
}
?>
