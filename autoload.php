<?php
spl_autoload_register(
    function($className)
    {
        $className = str_replace("_", "\\", $className);
        $className = ltrim($className, '\\');
        $fileName = '';
        $namespace = '';
        if ($lastNsPos = strripos($className, '\\'))
        {
            $namespace = substr($className, 0, $lastNsPos);
            $className = substr($className, $lastNsPos + 1);
            $fileName = str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
        }
        $fileName .= str_replace('_', '_', $className) . '.php';

        require $fileName;
        require_once 'DFSClient/Models/KeywordsFinderApi/Related_Keywords/RelatedKeywords.php';
        require_once 'GuzzleHttp/Client.php';
        
    }
);
?>
