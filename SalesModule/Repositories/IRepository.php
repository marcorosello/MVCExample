<?php

namespace SalesModule\Repositories;

interface IRepository {

    public static function getAll();

    public static function getById(int $id);

}