<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Job;
class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
  
        public function run()
        {
            $jobs = [
                [
                    'title' => 'Full-Stack Developer',
                    'description' => 'We are looking for a skilled full-stack developer to join our team.',
                    'requirements' => '3+ years of experience in web development, strong knowledge of PHP and JavaScript',
                    'workspace' => 'Office',
                    'employment' => 'Full-time',
                    'country' => 'USA',
                    'location' => 'New York',
                    'category' => 'Web Development',
                    'salary' => 80000,
                    'bid' => null,
                    'company_id' => 1,
                ],
                [
                    'title' => 'Marketing Manager',
                    'description' => 'We are looking for a dynamic marketing manager to join our team.',
                    'requirements' => '5+ years of experience in marketing, strong communication and leadership skills',
                    'workspace' => 'Remote',
                    'employment' => 'Part-time',
                    'country' => 'Canada',
                    'location' => 'Toronto',
                    'category' => 'Marketing',
                    'salary' => 60000,
                    'bid' => null,
                    'company_id' => 2,
                ],
                // Add more jobs as needed
            ];
    
            foreach ($jobs as $job) {
                Job::create($job);
            }
        }
    }
    
