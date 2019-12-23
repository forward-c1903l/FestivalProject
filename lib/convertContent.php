<!-- Action Convert Content  -->

<?php 
    function ConvertDesBook($content) {
        $contentOut = strlen($content) > 150 ? substr($content,0,150)."..." : $content;
        return $contentOut;
    }

?>