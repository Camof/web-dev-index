<html>
    <head>
        <style>
            @import url(http://reset5.googlecode.com/hg/reset.min.css);
            <?php
                $bg = '#272822';
                $fg = '#66d9df';
                $hv = '#f9275d';
            ?>
            html { background-color: <?php echo $bg; ?> }
            body {
                max-width: 576px;
                margin: 50px auto;
                background-color: <?php echo $bg; ?>;
                padding: 20px 10px;
                font: 12px Monaco, monospace;
                color: <?php echo $fg; ?>;
                line-height: 24px;
            }
            h1, h2, h3, h4, p, li, hr, a {
                font: 12px Monaco, monospace;
                line-height: 24px;
            }
            h1:after {
                content: '\a================================================================================\a\a';
                white-space: pre;
            }
            a {
                text-decoration: none;
                color: <?php echo $fg; ?>;
            }
            a:hover {
                text-decoration: none;
                color: <?php echo $hv; ?>;
            }
            .nav ul {
                margin: 0;
                padding-left: 0;
                webkit-padding-start: 0;
            }
            .nav li {
                display: inline-block;
            }
            .nav li:after {
                content: '  ';
                white-space: pre;
            }
        </style>
    </head>
    <body>
        <h1><?php echo $_SERVER['SERVER_NAME']; ?></h1>

<?php
$dirs = array_filter(glob('*'), 'is_dir');
$menu = "";
if (in_array('info', $dirs)) {
    $menu .= "<li><a href = 'http://info.oliver.dev'>phpinfo</a></li>";
    $dirs = array_diff($dirs, ['info']);
}
if (in_array('phpmyadmin', $dirs)) {
    $menu .= "<li><a href = 'http://phpmyadmin.oliver.dev'>phpmyadmin</a></li>";
    $dirs = array_diff($dirs, ['phpmyadmin']);
}
if (in_array('rockmongo', $dirs)) {
    $menu .= "<li><a href = 'http://rockmongo.oliver.dev'>rockmongo</a></li>";
    $dirs = array_diff($dirs, ['rockmongo']);
}

if ($menu) {
    echo "<ul class='nav'>$menu</ul>................................................................................";
}

foreach ($dirs as $dir) {
    $name = $dir;
    echo "<p><a href = 'http://" . $name . ".oliver.dev'>" . $name . "</a></p>";
}
?>

    </body>
</html>
