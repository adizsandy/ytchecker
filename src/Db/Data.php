<?php

class Data 
{
    public function getData() 
    {
        return file_get_contents(__DIR__ . '/../../storage/db/data.json');
    }
}