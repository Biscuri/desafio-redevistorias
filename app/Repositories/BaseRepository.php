<?php

namespace App\Repositories;

interface BaseRepositoryInterface
{
    public function get();
    public function list();
    public function create();
    public function delete();
}