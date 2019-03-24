<?php


class Character
{
    public const ALIVE = 'alive';

    public const DEAD = 'dead';

    public const ATTAQUE_COST = 5;

    private $id;

    private $name;

    private $hp;

    private $ap;

    private $password;

    public function __construct(array $arrayOfValues = null)
    {
        if ($arrayOfValues !== null) {
            $this->hydrate($arrayOfValues);
        }
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getHp()
    {
        return $this->hp;
    }

    public function setHp($hp)
    {
        $this->hp = $hp;
    }

    public function getAp()
    {
        return $this->ap;
    }

    public function setAp($ap)
    {
        $this->ap = $ap;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }


    public function hydrate(array $donnees)
    {
        foreach ($donnees as $key => $value)
        {
            $method = 'set'.ucfirst($key);

            if (method_exists($this, $method))
            {
                $this->$method($value);
            }
        }
    }

    public function getState()
    {
        if ($this->hp < 0) {
            return self::DEAD;
        }
        return self::ALIVE;
    }


}