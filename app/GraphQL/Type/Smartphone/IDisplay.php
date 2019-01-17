<?php

namespace App\GraphQL\Type\Smartphone;
use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as GraphQLType;
use GraphQL;
class IDisplay extends GraphQLType
{
	protected $attributes = [
		'name'		=> 'IDisplay',
	];
	protected $inputObject = true;

	public function fields()
	{
		return [
			'display_size'	=> 	[
								'name' 	=> 'display_size', 		
								'type' 	=> Type::nonNull(Type::number()),
							],
			'resolution'	=> 	[
								'name' 	=> 'resolution', 		
								'type' 	=> Type::nonNull(Type::string()),
                            ],
            'pixel_density'	=> 	[
								'name' 	=> 'pixel_density', 		
								'type' 	=> Type::nonNull(Type::number()),
                            ],
            'technology'	=> 	[
								'name' 	=> 'technology', 		
								'type' 	=> Type::nonNull(Type::text()),
							],
			 'screen_to_body_ratio'	=> 	[
								'name' 	=> 'screen_to_body_ratio', 		
								'type' 	=> Type::nonNull(Type::number()),
							],
			'features'	=> 	[
								'name' 	=> 'features', 		
								'type' 	=> Type::nonNull(Type::text()),
							],
		];
	}
}
