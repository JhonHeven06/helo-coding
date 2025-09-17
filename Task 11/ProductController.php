<?php
// controllers/ProductController.php

require_once 'models/Product.php';

class ProductController {
    public function index() {
        $products = Product::getAll();
        require 'views/products/index.php';
    }

    public function create() {
        require 'views/products/create.php';
    }

    public function store() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            Product::create($_POST);
            header('Location: /products');
            exit();
        }
    }

    public function show($id) {
        $product = Product::find($id);
        if ($product) {
            require 'views/products/show.php';
        } else {
            echo "Product not found.";
        }
    }

    public function edit($id) {
        $product = Product::find($id);
        if ($product) {
            require 'views/products/edit.php';
        } else {
            echo "Product not found.";
        }
    }

    public function update($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            Product::update($id, $_POST);
            header("Location: /products/$id");
            exit();
        }
    }

    public function destroy($id) {
        Product::delete($id);
        header('Location: /products');
        exit();
    }
}
?>
