<?php
// controllers/PageController.php

require_once 'models/Page.php';

class PageController {
    public function index() {
        $pages = Page::getAll();
        require 'views/pages/index.php';
    }

    public function create() {
        require 'views/pages/create.php';
    }

    public function store() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            Page::create($_POST);
            header('Location: /pages');
            exit();
        }
    }

    public function show($id) {
        $page = Page::find($id);
        if ($page) {
            require 'views/pages/show.php';
        } else {
            echo "Page not found.";
        }
    }

    public function edit($id) {
        $page = Page::find($id);
        if ($page) {
            require 'views/pages/edit.php';
        } else {
            echo "Page not found.";
        }
    }

    public function update($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            Page::update($id, $_POST);
            header("Location: /pages/$id");
            exit();
        }
    }

    public function destroy($id) {
        Page::delete($id);
        header('Location: /pages');
        exit();
    }
}
?>
