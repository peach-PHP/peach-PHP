<?php
namespace App;

class View
{
    public static function viewPage($viewname)
    {
        $path = str_replace('.', '/', $viewname);
        $path = $path . '.view.php';
        if (file_exists(__DIR__.'/../../../src/resources/views/'.$path)) {
            $view_obj = new View();
            $content = '<?php use App\View; ?>'.$view_obj->parse_viewPage($path);
            $handle=fopen(__DIR__.'/compiler.php','w');
            fwrite($handle,$content);
            fclose($handle);
            include_once __DIR__.'/compiler.php';
        } else {
            die("File Not Found !!");
        }
    }

    public static function viewIncludes($includeName){
        $path = str_replace('.', '/', $includeName);
        $path = $path . '.view.php';
        if (file_exists(__DIR__.'/../../../src/resources/views/'.$path)) {
            $view_obj = new View();
            $content = $view_obj->parse_viewPage($path);
            return $content;
        } else {
            die($includeName." File Not Found !!");
        }
    }

    private function parse_viewPage($path)
    {
        $page_content = file_get_contents(__DIR__.'/../../../src/resources/views/'.$path);
        $view_obj = new View();
        $parsed_page_content = $view_obj->parse_with_view_engine($page_content);
        return $parsed_page_content;
    }

    private function parse_with_view_engine($content)
    {
        include __DIR__ . '/ViewCustomDirectivesDefinitions.php';
        foreach ($directives as $directive) {
            $content=str_replace($directive, $directives_definition[$directive], $content);
        }
        return $content;
    }
}