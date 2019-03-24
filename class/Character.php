<?php


class Character
{
    public const ALIVE = 'alive';

    public const DEAD = 'dead';

    public const ATTAQUE_COST = 5;

    public const HEAL_COST = 2;

    public const AP_REGEN = 60;

    public const HP_MAX = 100;

    public const AP_MAX = 100;

    public const LEVEL_EXPERIENCE = 1000;

    private $id;

    private $name;

    private $hp;

    private $ap;

    private $password;

    private $lastaction;

    private $experience = 0;

    private $level = 1;

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
        if ($hp > $this->getHpMax()) {
            $this->hp = $this->getHpMax();
        } else {
            $this->hp = $hp;
        }
    }

    public function getHpMax()
    {
        return floor(self::HP_MAX + ($this->level * 8));
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

    public function getLastaction()
    {
        return $this->lastaction;
    }

    public function setLastaction($lastaction)
    {
        $this->lastaction = $lastaction;
    }

    public function getExperience()
    {
        return $this->experience;
    }

    public function setExperience($experience): void
    {
        $this->experience = $experience;
    }

    public function getLevel()
    {
        return $this->level;
    }

    public function setLevel($level): void
    {
        $this->level = $level;
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

    public function getNewAp()
    {
        $datetime1 = new DateTime('now');
        $datetime2 = new DateTime($this->lastaction);
        $interval = $datetime1->diff($datetime2);
        $seconde = $interval->s + $interval->i * 60 + $interval->h * 60 * 60;
        if ($seconde > self::AP_REGEN) {
            $newAP = floor($seconde / self::AP_REGEN);
            $this->ap = $this->ap + $newAP;
            if ($this->ap > self::AP_MAX) {
                $this->ap = self::AP_MAX;
            }
        }
    }

    public function addExperience($experience)
    {
        $this->experience += $experience;
    }

    public function checkExperience()
    {
        $experienceMax = $this->level * self::LEVEL_EXPERIENCE;
        if ($this->experience >= $experienceMax) {
            ++$this->level;
            $this->experience = 0;
        }
    }




}