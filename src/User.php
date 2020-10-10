<?php

    class User extends Controller {
        protected $viewer;
        private $dbFileName = "./db.json";

        public function __construct(Viewer $viewer) {
            $this->viewer = $viewer;
        }

        public function getAction() {
            $this->createDbFileIfNotExist();
            $data = json_decode(file_get_contents($this->dbFileName), true);
            return $this->viewer->tpl("form", ['userList' => $data]);
        }

        public function postAction($request) {
            $this->createDbFileIfNotExist();
            $data = file_get_contents($this->dbFileName);
            $data = json_decode($data, true);
            array_push($data, [
                'name' => $request['name'],
                'email' => $request['email']
            ]);
            return file_put_contents($this->dbFileName, json_encode($data));
        }

        private function createDbFileIfNotExist() {
            if( ! is_file($this->dbFileName)){
                file_put_contents($this->dbFileName, "[]");
            }
        }
    }