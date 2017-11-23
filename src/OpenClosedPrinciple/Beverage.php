<?php
declare(strict_types=1);

namespace SOLIDExamples\OpenClosePrinciple;

abstract class Beverage
{
    private $description;
    private $milk;
    private $soyMilk;
    private $chocolate;

    public function description(string $description)
    {
        if (empty($description)) {
            return $this->description;
        }

        $this->description = $description;
    }

    public function withMilk(): bool
    {
        return $this->milk;
    }

    public function addMilk(bool $milk): void
    {
        $this->milk = $milk;
    }

    public function withSoyMilk(): bool
    {
        return $this->soyMilk;
    }

    public function addSoyMilk(bool $soyMilk): void
    {
        $this->soyMilk = $soyMilk;
    }

    public function withChocolate(): bool
    {
        return $this->chocolate;
    }

    public function addChocolate(bool $chocolate): void
    {
        $this->chocolate = $chocolate;
    }

    /**
     * This example comes from "Head First! Design Patterns"
     * - the book contains Java code but example below is a try of translating it into PHP
     *
     * This is the center of breaking of this OCP principle
     * Every change of addition cost will force the method below body change.
     * Providing next new additions also will force the change of the method.
     * Some kind of beverage are not suitable to all additions.
     */
    public function cost(): float
    {
        $cost = 0.0;
        if ($this->withMilk()) {
            $cost += 1.2;
        }

        if ($this->withChocolate()) {
            $cost += 2.1;
        }

        if ($this->withSoyMilk()) {
            $cost += 3.1;
        }

        return $cost;
    }
}
