<?php

namespace Artem\HillelHomework;


abstract class Model
{
    protected $id;

    static public function find(int $id): static
    {
        $tableName = static::class;
        $cols = implode(',', array_keys(get_class_vars($tableName)));

        $sql = "SELECT $cols FROM $tableName";
        var_dump($sql . '<br>');

        $user = new static();
        $user->id = $id;
        return $user;
    }

    protected function create()
    {
        $tableName = static::class;
        $cols = [];
        foreach (array_keys(get_class_vars(static::class)) as $el){
            if($el !== 'id'){
                $cols[] = $el;
            }
        }
        $colsWithoutID = implode(',', $cols);
        $sql = "INSERT INTO $tableName ($colsWithoutID) VALUES ($this->name, $this->email)";

        $this->id = random_int(2, 10); /** New increment*/
        var_dump($sql . '<br>');
    }

    protected function update()
    {
        $tableName = static::class;
        $sql = "UPDATE $tableName SET name=$this->name, email= $this->email WHERE id={$this->id}";
        var_dump($sql . '<br>');
    }

    public function save()
    {
        if ($this->id !== null) {
            $this->update();
        } else {
            $this->create();
        }
    }

    public function delete()
    {
        $tableName = static::class;
        $sql = "DELETE FROM $tableName WHERE id={$this->id}";
        var_dump($sql . '<br>');
    }


}