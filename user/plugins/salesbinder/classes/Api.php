<?php
namespace Grav\Plugin\SalesBinder;

class Api
{
    // Static method to return fake data
    public static function getStaticItems()
    {
        // Simulating API data structure
        return [
            [
                'name' => 'John Doe',
                'description' => 'Software Engineer'
            ],
            [
                'name' => 'Jane Smith',
                'description' => 'Product Manager'
            ],
            [
                'name' => 'Mike Johnson',
                'description' => 'UX Designer'
            ]
        ];
    }
}
