<?php

function writeCode($string) {
    echo '<pre><code>';
    echo htmlspecialchars($string);     
    echo '</code></pre>';
}

function writeHtml($string) {
    echo $string;
}

function writeHeader() {
    $html = '<html>
<head>
<meta charset="UTF-8">
<title>FormBuilder Tests</title>
    <style>
    .incomplete {
    	color: grey;
    }
    .complete {
    	
    }
    </style> 
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/8.5/styles/default.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/8.5/highlight.min.js"></script>
    <script>hljs.initHighlightingOnLoad();</script>
</head>
<body>';
    echo $html;
}

function writeFooter() {
    $html = '<div><a href="index.php">back to examples</a></div><br></body>
</html>';
    echo $html;
}

function writeExpect($expect, $actual) {
    if ($expect == $actual) {
        $html = '<div style="color:green">Passed</div>';
    } else {
        $html = '<div style="color:red">Failed</div>';
    }
    echo $html;
}

function whereAmI($str) {
    $d = dir($str);
    echo "Handle: " . $d->handle . "\n";
    echo "Path: " . $d->path . "\n";
    while (false !== ($entry = $d->read())) {
        echo $entry."<br>";
    }
    $d->close();
}

function out($data) {
    echo '<pre>';
    var_dump($data);
    echo '</pre>';
    exit;
}