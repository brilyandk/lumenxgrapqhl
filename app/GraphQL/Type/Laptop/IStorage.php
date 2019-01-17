<?php

namespace App\GraphQL\Type\Laptop;
use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Mutation;
use GraphQL;



class IStorage extends Mutation
{
	protected $attributes = [
		'name'		=> 'IStorage',
	];
	public function type()
    {
        return GraphQL::type('Mutation');
	}
	public function fields()
	{
		return [
			'type'	=> 	[
								'name' 	=> 'type', 		
								'type' 	=> Type::nonNull(Type::string()),
							],
            'capacity'	=> 	[
								'name' 	=> 'capacity', 		
								'type' 	=> Type::nonNull(Type::number()),
                            ],
		];
	}

	public function resolve($root, $args)
    {
        
        $storage = new Storage();
        $storage->type = $args['type'];
		$storage->capacity = $args['capacity'];
		
        
        $saved = $storage->save();
        return $storage;
    }
}
