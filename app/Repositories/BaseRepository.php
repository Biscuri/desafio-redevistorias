<?php

namespace App\Repositories;

interface BaseRepositoryInterface {
    public function get($id);
    public function list();
    public function create($data);
    public function delete($data);
}