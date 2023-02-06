<?php

namespace Artem\HillelHomework;


abstract class Model
{
    protected $id;

    static public function find(int $id): static
    {
        $tableName = explode('\\', static::class);
        $tableName = end($tableName);

        $cols = implode(',', array_keys(get_class_vars(static::class)));

        $sql = "SELECT $cols FROM $tableName";
        var_dump($sql . '<br>');

        $user = new static();
        $user->id = $id;
        return $user;
    }

    protected function create()
    {
        $tableName = explode('\\', static::class);
        $tableName = end($tableName);
        $cols = [];

        foreach (array_keys(get_class_vars(static::class)) as $el) {
            if ($el !== 'id') {
                $cols[] = $el;
            }
        }

        $varArr = [];
        foreach (array_keys(get_class_vars(static::class)) as $el){
            $var[]= $this->{$el};
        }
        $var = implode(',', $var);

        $colsWithoutID = implode(',', $cols);
        $sql = "INSERT INTO $tableName ($colsWithoutID) VALUES ($var)";
        var_dump($sql . '<br>');

        /** New increment*/
        $this->id = random_int(2, 10);

    }

    protected function update()
    {
        $tableName = explode('\\', static::class);
        $tableName = end($tableName);

        $varArr = [];
        foreach (array_keys(get_class_vars(static::class)) as $el){
            if($el!='id'){
                $value = $this->{$el};
                $var[]= "$el=$value";
            }
        }
        $var = implode(',', $var);
        $sql = "UPDATE $tableName SET $var WHERE id={$this->id}";
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
        $tableName = explode('\\', static::class);
        $tableName = end($tableName);
        $sql = "DELETE FROM $tableName WHERE id={$this->id}";
        var_dump($sql . '<br>');
    }


}