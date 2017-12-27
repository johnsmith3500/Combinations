<?php
	// Get all combinations of elements of an array (Use recursion)

	// Initial array
	$a=[0 => ['a1', 'a2', 'a3'],
		1 => ['b1', 'b2'],
		2 => ['c1', 'c2', 'c3'],
		3 => ['d1']
		];

	$temp=[];	// Stack
	$total=count($a);	// Number of elements in required combination
	$result=[];	// Array for result (all combinations)

	// The function goes through all elements of the first "string"(subarray)
	// Take first (second etc) element of the first "string"(subarray) and if are there more "strings"(subarrays) - goes through them recursivly and etc.

	function get_next($root, $index=0)
	{
		global $temp;
		global $total;
		global $result;
		foreach($root[$index] as $value)
		{
			array_push($temp, $value);	// Put the element in the stack
			if(isset($root[$index+1]))
			{
				get_next($root, $index+1);
			}
			if(count($temp) == $total)	// We need only full combinations
				$result[]=$temp;
			array_pop($temp);	// Put the element out of the stack
		}
		unset($value);
	}

	get_next($a);

	// Print the result
	foreach($result as $comb_array)
	{
		foreach($comb_array as $element)
		{
			print $element.' ';
		}
		print "\n";
	}