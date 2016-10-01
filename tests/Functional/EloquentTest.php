<?php

namespace WouterJ\EloquentBundle\Functional;

use AppBundle\Model\User;
use Illuminate\Database\Schema\Blueprint;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use WouterJ\EloquentBundle\Facade\Db;
use WouterJ\EloquentBundle\Facade\Schema;

/**
 * @author Wouter J <wouter@wouterj.nl>
 */
class EloquentTest extends KernelTestCase
{
    protected static function getKernelClass()
    {
        require_once __DIR__.'/app/TestKernel.php';

        return 'TestKernel';
    }

    public function testRunningMigrations()
    {
        static::bootKernel();

        // create user table
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email');
            $table->string('password');
            $table->timestamps();
        });

        User::create([
            'name'     => 'John Doe',
            'email'    => 'j.doe@example.com',
            'password' => 'pa$$word',
        ]);
    }
}

