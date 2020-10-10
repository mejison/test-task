<?php

    class Viewer {

        private $viewsDir = "./views/";

        public function tpl($templateName, $data = []) {
            ob_start();
            extract($data);
            include($this->viewsDir . "{$templateName}.php");
            $content = ob_get_contents();
            ob_end_clean();
            return $content;
        }
    }