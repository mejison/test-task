<?php

    abstract class Controller {
        abstract public function getAction();

        abstract public function postAction($request);

        public function notFoundAction() {
            return $this->viewer->tpl("page-not-found");
        }
    }