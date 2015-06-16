<?php
/**
 * Created by PhpStorm.
 * User: Marco
 * Date: 13/06/15
 * Time: 18:06
 */
use Faker\Factory as Faker;
use \Faker\Generator;
use \Illuminate\Database\Seeder;

abstract class BaseSeeder extends Seeder{

    abstract public function getModel();

    abstract public function getDummyData(Generator $faker,array $customValues = array());

    protected function createMultiple($total,array $customValues = array())
    {
        for($i = 1; $i <= $total; $i++)
        {
            $this->create($customValues);
        }

    }


    protected function create(array $customValues = array())
    {

        $values = $this->getDummyData(Faker::create(),$customValues);
        $values = array_merge($values, $customValues);
        $this->getModel()->create($values);
    }



}
