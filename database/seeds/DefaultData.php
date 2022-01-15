<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Employee;
use App\Company;

class DefaultData extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Company::create([
            'name'           => 'Test GmBH.',
            'email'          => 'hello@test.com',
            'logo'           => '123456.jpg',
            'website'        => 'www.test.hu',
        ]);

        Employee::create([
            'last_name'      => 'Doe',
            'first_name'     => 'Jhon',
            'email'          => 'jhondoe@test.com',
            'family'         => 'Jhon Ashlye',
            'mobil'          =>  '06301548560',
            'company'        =>  'Test GmBH.',
        ]);
    }
}
